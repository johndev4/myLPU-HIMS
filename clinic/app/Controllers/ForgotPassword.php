<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ForgotPassword extends BaseController
{
	public function __construct()
	{
		// Page title
		$this->data['page_title'] = 'Forgot Password?';
	}


	// RETURN VIEWS
	// -----------------------------------------------------------------
	public function index()
	{
		// Display page view
		return view('forgot_password', $this->data);
	}
}
