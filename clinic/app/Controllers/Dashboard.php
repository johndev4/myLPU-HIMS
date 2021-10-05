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
		// For guidance counselor permission on sidebar and dashboard
		$this->data['designation'] = $userInfo['designation'];

		$this->data['widget_counter'] = [
			'records' => $this->countLyceanRecords()
		];

		// Display page view
		return view('components/dashboard', $this->data);
	}


	// COUNT DATA FOR DASHBOARD
	// ---------------------------------------------------------
	private function countLyceanRecords()
	{
		return $this->lyceansModel->countAll();
	}
}
