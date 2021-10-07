<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function __construct()
	{
		// Page title
		$this->data['page_title'] = 'Dashboard';
	}


	// RETURN VIEWS
	// -----------------------------------------------------------------
	public function index()
	{
		$user = $this->userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
		$userInfo = $this->userModel->find($user['id_no']);
		$this->data['firstname'] = $userInfo['first_name'];
		$middleInit = $userInfo['middle_name'] != ""? substr($userInfo['middle_name'], 0, 1) . '.' : "";
		$this->data['fullname'] = "{$userInfo['first_name']} {$middleInit} {$userInfo['last_name']}";

		// Display page view
		return view('components/dashboard', $this->data);
	}
}
