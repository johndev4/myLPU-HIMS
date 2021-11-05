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
		// Widget counter
		$this->data['widget_counter'] = [
			'newRequestConsultations' => $this->countNewRequestConsultations(),
			'scheduledConsultations' => $this->countScheduledConsultations(),
			'records' => $this->countLyceanRecords()
		];

		// Display page view
		return view('components/dashboard', $this->data);
	}


	// COUNT DATA FOR DASHBOARD
	// ---------------------------------------------------------
	private function countNewRequestConsultations()
	{
		$consultations = $this->consultationsModel
			->where('status', 'pending')
			->find();

		return count($consultations);
	}

	private function countScheduledConsultations()
	{
		$consultations = $this->consultationsModel
			->where('status', 'active')
			->find();

		return count($consultations);
	}

	private function countLyceanRecords()
	{
		return $this->lyceansModel->countAll();
	}
}
