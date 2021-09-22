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
				'rules' => 'permit_empty|alpha_numeric_space',
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
				<a href=\"\" data-target=\"#deleteModal\" data-toggle=\"modal\">
				<button type=\"button\" class=\"btn btn-default \">Delete</button></a>
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
				<a href=\"\" data-target=\"#deleteModal\" data-toggle=\"modal\">
				<button type=\"button\" class=\"btn btn-default \">Delete</button></a>
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
				<a href=\"\" data-target=\"#deleteModal\" data-toggle=\"modal\">
				<button type=\"button\" class=\"btn btn-default \">Delete</button></a>
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


	// UPLOAD RECORDS
	// ---------------------------------------------------------
	public function uploadRecord()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			if ($this->validate($this->getRecordRules())) {
				$file = $this->request->getFile('medicalfile');
				$lycean = $this->lyceansModel->find($_POST['id_no']);
				$lyceanName = $lycean['last_name'] . ", " . $lycean['first_name'];
				$fileName = $_POST['filename'] != "" ? $_POST['filename'] : str_replace('.pdf', '', $file->getName());
				$finalName = $lyceanName . " - " . $fileName . "." . $file->getExtension();

				if ($file->isValid() && !$file->hasMoved()) {
					$file->move(
						'./uploaded/medical_records/' . $_POST['id_no'],
						$finalName
					);
					session()->setFlashdata('success', "Successfully uploaded.");
				}
			} else {
				// Mag error pag "$this->validator" lang
				session()->setFlashdata('upload_validation', $this->validator->getErrors());
				session()->setFlashdata('postData', json_encode($_POST));
			}
		}

		// echo file_get_contents(base_url('uploaded/medical_records/2018-2-01345/De Leon,Chris Jover_hello.pdf'));
	}

	public function uploadStudentRecord()
	{
		$this->uploadRecord();
		return redirect()->to('records/student');
	}
}
