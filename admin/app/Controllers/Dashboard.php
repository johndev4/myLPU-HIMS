<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function __construct()
	{
		helper('useraccount');
        // Page title
        $this->data['page_title'] = 'Dashboard';
        // User firstname
        $this->data['adminName'] = getAdminName();
	}

	public function index()
	{
		$credentials = $this->userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
		$this->data['firstname'] = $credentials['admin_name'];

		$this->data['widget_counter'] = [
			'student' => $this->countStudentAccounts(),
			'faculty' => $this->countFacultyAccounts(),
			'staff' => $this->countStaffAccounts(),
			'health_personnel' => $this->countHealthPersonnelAccounts()
		];

		// Display page view
		return view('components/dashboard', $this->data);
	}


	// COUNT DATA FOR DASHBOARD
	// ---------------------------------------------------------
	private function countStudentAccounts()
	{
		$lyceans = $this->lyceansModel
			->where('role', 'student')
			->findAll();

		$count = 0;
		foreach ($lyceans as $value) {
			$lyceansAccount = $this->lyceansAccountModel->find($value['id_no']);
			if ($lyceansAccount) {
				$count += 1;
			}
		}

		return $count;
	}

	private function countFacultyAccounts()
	{
		$lyceans = $this->lyceansModel
			->where('role', 'faculty')
			->findAll();

		$count = 0;
		foreach ($lyceans as $value) {
			$lyceansAccount = $this->lyceansAccountModel->find($value['id_no']);
			if ($lyceansAccount) {
				$count += 1;
			}
		}

		return $count;
	}

	private function countStaffAccounts()
	{
		$lyceans = $this->lyceansModel
			->where('role', 'staff')
			->findAll();

		$count = 0;
		foreach ($lyceans as $value) {
			$lyceansAccount = $this->lyceansAccountModel->find($value['id_no']);
			if ($lyceansAccount) {
				$count += 1;
			}
		}

		return $count;
	}

	private function countHealthPersonnelAccounts()
	{
		return $this->healthPersonnelsAccountModel->countAll();
	}
}
