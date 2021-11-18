<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function __construct()
	{
		helper('useraccount');
		// Page title
		$this->data['page_title'] = 'Dashboard';
		// User firstname
		$this->data['firstname'] = getUserFirstname();
		// User ID No.
		$this->data['idNo'] = getIdNo();
		// User designation
		$this->data['designation'] = getUserDesignation();
	}


	// RETURN VIEWS
	// -----------------------------------------------------------------
	public function index()
	{
		// Display page view
		return view('components/dashboard', $this->data);
	}


	// COUNT DATA FOR DASHBOARD
	// ---------------------------------------------------------
	public function countNewRequestConsultations()
	{
		if (getDesignation() == 'Guidance Counselor') {
			$consultations = $this->consultationsModel
				->where('status', 'pending')
				->where('personnel_id_no', getIdNo())
				->where('category', 'Mental Wellness')
				->find();
		} else {
			$consultations = $this->consultationsModel
				->where('status', 'pending')
				->where('personnel_id_no', getIdNo())
				->where('category', 'Consultation')
				->find();
		}

		echo count($consultations);
	}

	public function countScheduledConsultations()
	{
		if (getDesignation() == 'Guidance Counselor') {
			$consultations = $this->consultationsModel
				->where('status', 'active')
				->where('personnel_id_no', getIdNo())
				->where('category', 'Mental Wellness')
				->find();
		} else {
			$consultations = $this->consultationsModel
				->where('status', 'active')
				->where('personnel_id_no', getIdNo())
				->where('category', 'Consultation')
				->find();
		}

		echo count($consultations);
	}

	public function countLyceanRecords()
	{
		echo $this->lyceansModel->countAll();
	}
}
