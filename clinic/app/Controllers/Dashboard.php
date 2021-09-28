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
		$credentials = $this->userAccountModel
			->where('username', session()->get('uid'))
			->where('password', session()->get('pwd'))
			->first();
		$user = $this->userModel->find($credentials['id_no']);
		$this->data['firstname'] = $user['first_name'];

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
