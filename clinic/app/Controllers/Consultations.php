<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Consultations extends BaseController
{
	public function __construct()
	{
		// Page title
		$this->data['page_title'] = 'Consultations';
	}


	// RETURN VIEWS
	// -----------------------------------------------------------------
	public function index()
	{
		// Display page view
		return view('components/consultations', $this->data);
	}
}
