<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function __construct()
	{
		helper(['useraccount']);
		// Page title
		$this->data['page_title'] = 'Dashboard';
		// User admin name
		$this->data['adminName'] = getAdminName();
	}

	public function index()
	{
		$credentials = $this->userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
		$this->data['firstname'] = $credentials['admin_name'];

		$this->data['active_widget_counter'] = [
			'student' => $this->countStudentAccounts(),
			'faculty' => $this->countFacultyAccounts(),
			'staff' => $this->countStaffAccounts(),
			'health_personnel' => $this->countHealthPersonnelAccounts()
		];

		$this->data['deleted_widget_counter'] = [
			'student' => $this->countDeletedStudentAccounts(),
			'faculty' => $this->countDeletedFacultyAccounts(),
			'staff' => $this->countDeletedStaffAccounts(),
			'health_personnel' => $this->countDeletedHealthPersonnelAccounts()
		];

		// Display page view
		return view('components/dashboard', $this->data);
	}


	// COUNT DATA FOR DASHBOARD
	// ---------------------------------------------------------

	// Active Accounts
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
		$healthPersonnels = $this->healthPersonnelsModel
			->findAll();

		$count = 0;
		foreach ($healthPersonnels as $value) {
			$healthPersonnelsAccount = $this->healthPersonnelsAccountModel->find($value['id_no']);
			if ($healthPersonnelsAccount) {
				$count += 1;
			}
		}

		return $count;
	}

	// Deleted Accounts
	// ---------------------------------------------------------

	private function countDeletedStudentAccounts()
	{
		$lyceans = $this->lyceansModel
			->where('role', 'student')
			->findAll();

		$count = 0;
		foreach ($lyceans as $value) {
			$lyceansAccount = $this->lyceansAccountModel->find($value['id_no']);
			if (!$lyceansAccount) {
				$count += 1;
			}
		}

		return $count;
	}

	private function countDeletedFacultyAccounts()
	{
		$lyceans = $this->lyceansModel
			->where('role', 'faculty')
			->findAll();

		$count = 0;
		foreach ($lyceans as $value) {
			$lyceansAccount = $this->lyceansAccountModel->find($value['id_no']);
			if (!$lyceansAccount) {
				$count += 1;
			}
		}

		return $count;
	}

	private function countDeletedStaffAccounts()
	{
		$lyceans = $this->lyceansModel
			->where('role', 'staff')
			->findAll();

		$count = 0;
		foreach ($lyceans as $value) {
			$lyceansAccount = $this->lyceansAccountModel->find($value['id_no']);
			if (!$lyceansAccount) {
				$count += 1;
			}
		}

		return $count;
	}

	private function countDeletedHealthPersonnelAccounts()
	{
		$healthPersonnels = $this->healthPersonnelsModel
			->findAll();

		$count = 0;
		foreach ($healthPersonnels as $value) {
			$healthPersonnelsAccount = $this->healthPersonnelsAccountModel->find($value['id_no']);
			if (!$healthPersonnelsAccount) {
				$count += 1;
			}
		}

		return $count;
	}
}
