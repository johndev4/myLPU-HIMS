<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Help extends BaseController
{
	public function __construct()
	{
		helper(['useraccount']);
		// Page title
		$this->data['page_title'] = 'Help Menu';

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
			return view('components/help_menu', $this->data);
		} else {
			return view('help_menu', $this->data);
		}
	}
}
