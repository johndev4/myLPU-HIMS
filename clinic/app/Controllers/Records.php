<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Records extends BaseController
{
	public function __construct()
	{
		// Page title
		$this->data['page_title'] = 'Records';
	}


	// VALIDATION RULES
	// -----------------------------------------------------------------
	private function getRecordRules()
	{
		return  [
			'medicalfile' => [
				'rules' => 'uploaded[medicalfile]|max_size[medicalfile,2048]|ext_in[medicalfile,pdf]',
				'errors' => [
					'uploaded' => 'No file attached.'
				],
				'label' => 'File'
			],
			'filename' => [
				'rules' => 'permit_empty|alpha_dash',
				'label' => 'Filename'
			]
		];
	}


	// RETURN VIEWS
	// -----------------------------------------------------------------
	public function student()
	{
		// Display page view
		return view('components/records/student', $this->data);
	}

	public function faculty()
	{
		// Display page view
		return view('components/records/faculty', $this->data);
	}

	public function staff()
	{
		// Display page view
		return view('components/records/staff', $this->data);
	}


	// FETCH ALL DATA
	// ---------------------------------------------------------
	public function fetchAllStudent()
	{
		$result = array('data' => array());
		$lyceans = $this->lyceansModel->where('role', 'student')->findAll();

		foreach ($lyceans as $key => $value) {

			$result['data'][$key] = array(
				$value['id_no'],
				$value['first_name'],
				$value['last_name'],
				$value['department'],
				"<div align=\"center\">
				<a href=\"\" data-target=\"#viewModal\" data-toggle=\"modal\">
				<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $value['id_no'] . "')\">View</button></a> 
				</div>"
			);
		}

		echo json_encode($result);
	}

	public function fetchAllFaculty()
	{
		$result = array('data' => array());
		$lyceans = $this->lyceansModel->where('role', 'faculty')->findAll();

		foreach ($lyceans as $key => $value) {

			$result['data'][$key] = array(
				$value['id_no'],
				$value['first_name'],
				$value['last_name'],
				$value['department'],
				"<div align=\"center\">
				<a href=\"\" data-target=\"#viewModal\" data-toggle=\"modal\">
				<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $value['id_no'] . "')\">View</button></a> 
				</div>"
			);
		}

		echo json_encode($result);
	}

	public function fetchAllStaff()
	{
		$result = array('data' => array());
		$lyceans = $this->lyceansModel->where('role', 'staff')->findAll();

		foreach ($lyceans as $key => $value) {

			$result['data'][$key] = array(
				$value['id_no'],
				$value['first_name'],
				$value['last_name'],
				$value['department'],
				"<div align=\"center\">
				<a href=\"\" data-target=\"#viewModal\" data-toggle=\"modal\">
				<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $value['id_no'] . "')\">View</button></a> 
				</div>"
			);
		}

		echo json_encode($result);
	}


	// FETCH DATA BY ID
	// ---------------------------------------------------------
	public function fetchLyceanById($id)
	{
		$lyceans = $this->lyceansModel->find($id);
		$lyceansAccount = $this->lyceansAccountModel->find($id);
		$result = [];

		if ($lyceans) {
			$result = [
				'id_no' 		 => $lyceans['id_no'],
				'last_name' 	 => $lyceans['last_name'],
				'first_name' 	 => $lyceans['first_name'],
				'middle_initial' => $lyceans['middle_initial'],
				'department' 	 => $lyceans['department']
			];
		}

		if ($lyceansAccount) {
			$result['username'] = $lyceansAccount['username'];
		}

		return json_encode($result);
	}


	// UPLOAD RECORD
	// ---------------------------------------------------------
	private function uploadRecord()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$lycean = $this->lyceansModel->find($_POST['id_no']);

			if ($this->validate($this->getRecordRules())) {
				$file = $this->request->getFile('medicalfile');
				$lyceanName = $lycean['last_name'] . ", " . $lycean['first_name'];
				$tempFileName = $_POST['filename'] != "" ? $_POST['filename'] : str_replace('.pdf', '', $file->getName());
				$fileName = $lyceanName . " - " . $tempFileName . "." . $file->getExtension();
				$fileDirectory = './uploaded/medical_records/' . $lycean['id_no'];

				if ($file->isValid() && !$file->hasMoved()) {
					if (!file_exists($fileDirectory . '/' . $fileName)) {
						$file->move($fileDirectory, $fileName);

						$success = $this->healthRecordsModel->save([
							'id_no' => $lycean['id_no'],
							'file_path' => $fileDirectory . '/' . $fileName
						]);

						if ($success) {
							session()->setFlashdata('success', "Successfully uploaded.");
							session()->setFlashdata('postData', json_encode($_POST));
						} else {
						}
					} else {
						// Same to "codeline#2"
						// codeline#1
						session()->setFlashdata('upload_validation', ['filename' => 'The Filename already exists.']);
						session()->setFlashdata('postData', json_encode($_POST));
					}
				}
			} else {
				// Mag error pag "$this->validator" lang
				// Same to "codeline#1"
				// codeline#2
				session()->setFlashdata('upload_validation', $this->validator->getErrors());
				session()->setFlashdata('postData', json_encode($_POST));
			}
		}
	}

	public function uploadStudentRecord()
	{
		$this->uploadRecord();
		return redirect()->to('records/student');
	}


	// FETCH RECORDS BY ID
	// ---------------------------------------------------------
	public function fetchAllRecordsById($id)
	{
		$healthRecord = $this->healthRecordsModel->where('id_no', $id)->findAll();
		$result = "";

		foreach ($healthRecord as $key => $value) {
			$fileName = explode("/", $value['file_path'])[4];

			$data = "<tr>
			<td>" . $key + 1 . "</td>
			<td><a href=\"" . base_url($value['file_path']) . "\" target=\"_blank\">" . $fileName . "</a></td>
			<td>" . $value['created_at'] . "</td>
			<td><button type=\"button\" class=\"btn text-danger\" onclick=\"deleteActionForm(" . $value['record_id'] . ")\" data-toggle=\"modal\" data-target=\"#tabledeleteModal\">Delete</button></td>
			<tr>";

			$result .= $data;
		}

		return $result;
	}


	// DELETE RECORD
	// ---------------------------------------------------------
	public function deleteRecord($id)
	{
		$healthRecord = $this->healthRecordsModel->find($id);
		$filePath = $healthRecord['file_path'];

		if (file_exists($filePath)) {
			$success1 = $this->healthRecordsModel->delete($id);
			$success2 = unlink($filePath);
		} else {
			$success1 = false;
			$success2 = false;
		}

		if ($success1 && $success2) {
			session()->setFlashdata('success', "Successfully deleted.");
			$_POST['id_no'] = $healthRecord['id_no'];
			session()->setFlashdata('postData', json_encode($_POST));
		}

		return redirect()->to('records/student');
	}
}
