<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Terms extends BaseController
{
    public function __construct()
	{
		helper(['useraccount']);
		// Page title
		$this->data['page_title'] = 'Terms and Conditions';

		if (!empty(session()->get('uid')) && !empty(session()->get('pwd'))) {
			// User fullname
			$this->data['fullname'] = getUserFullname();
			// User ID No.
			$this->data['idNo'] = getIdNo();
		}
	}


	// RETURN VIEWS
	// -----------------------------------------------------------------
	public function index()
	{
		// Display page view
		if (!empty(session()->get('uid')) && !empty(session()->get('pwd'))) {
			return view('components/terms_and_conditions', $this->data);
		} else {
			return view('terms_and_conditions', $this->data);
		}
	}
}
