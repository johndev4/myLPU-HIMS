<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Help extends BaseController
{
	public function __construct()
	{
		helper('useraccount');
		// Page title
		$this->data['page_title'] = 'Dashboard';
		// User fullname
		$this->data['fullname'] = getUserFullname();
	}


	// RETURN VIEWS
	// -----------------------------------------------------------------
	public function index()
	{
		// Display page view
		return view('components/help_menu', $this->data);
	}
}
