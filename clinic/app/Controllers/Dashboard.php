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
			'records' => $this->countLyceanRecords()
		];

		// Display page view
		return view('components/dashboard', $this->data);
	}


	// COUNT DATA FOR DASHBOARD
	// ---------------------------------------------------------
	private function countLyceanRecords()
	{
		return $this->lyceansModel->countAll();
	}
}
