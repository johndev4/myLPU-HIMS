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
			'medical_file' => [
				'rules' => 'uploaded[medical_file]',
				'label' => 'Upload File'
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
				<a href=\"\" data-target=\"#modifyModal\" data-toggle=\"modal\">
				<button type=\"button\" class=\"btn btn-default \">View</button></a> 
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
				<a href=\"\" data-target=\"#modifyModal\" data-toggle=\"modal\">
				<button type=\"button\" class=\"btn btn-default \">View</button></a> 
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
				<a href=\"\" data-target=\"#modifyModal\" data-toggle=\"modal\">
				<button type=\"button\" class=\"btn btn-default \">View</button></a> 
				<a href=\"\" data-target=\"#deleteModal\" data-toggle=\"modal\">
				<button type=\"button\" class=\"btn btn-default \">Delete</button></a>
				</div>"
			);
		}

		echo json_encode($result);
	}


	// UPLOAD RECORDS
	// ---------------------------------------------------------
	public function uploadRecord()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getRecordRules())) {
				$file = $this->request->getFile('medical_file');
				echo $file->getName();
			} else {
				echo $this->validator->getError('medical_file');
			}

			// return redirect()->to('records/student');
		}
	}
}
