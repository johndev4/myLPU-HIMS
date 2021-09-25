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

	public function index()
	{
		// Display page view
		return view('auth/forgotpassword', $this->data);
	}
}
