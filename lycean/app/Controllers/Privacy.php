<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Privacy extends BaseController
{
    public function __construct()
	{
		helper(['useraccount']);
		// Page title
		$this->data['page_title'] = 'Privacy Policy';

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
			return view('components/privacy_policy', $this->data);
		} else {
			return view('privacy_policy', $this->data);
		}
	}
}
