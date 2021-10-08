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
		// User full name
		$this->data['fullname'] = getUserFullname();
	}


	// RETURN VIEWS
	// -----------------------------------------------------------------
	public function index()
	{
		// User first name
		$this->data['firstname'] = getUserFirstname();
		// Display page view
		return view('components/dashboard', $this->data);
	}
}
