<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Help extends BaseController
{
	public function __construct()
	{
		// Page title
		$this->data['page_title'] = 'Help Menu';
	}


	// RETURN VIEWS
	// -----------------------------------------------------------------
	public function index()
	{
		// Display page view
		return view('components/help_menu', $this->data);
	}
}
