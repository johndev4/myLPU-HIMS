<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
	public function __construct()
	{
		helper(['useraccount', 'activitylogs']);
		// Page title
		$this->data['page_title'] = 'Login';
	}


	// REQUEST TO LOGIN AND VIEW LOGIN PAGE
	// -----------------------------------------------------------------
	public function index()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$user = $this->userAccountModel->where('username', $_POST['username'])->first();
			$credentials = $this->userAccountModel
				->where('username', $_POST['username'])
				->where('password', hash('sha256', $_POST['password']))
				->first();

			if ($credentials && $user['locked'] < 3) {
				// Create login session
				session()->set([
					'uid' => $credentials['username'],
					'pwd' => $credentials['password'],
					'logged_in' => FALSE
				]);
				$this->userAccountModel
					->where('username', session()->get('uid'))
					->where('password', session()->get('pwd'))
					->set(['locked' => 0])->update();

				// CREATE ACTIVITY LOG
				createLog(
					getIdNo(),
					'LYCEAN',
					'Auth',
					'User Login',
					"User \"" . getIdNo() . "\" login to the myLPU Clinic"
				);
				return redirect()->to('dashboard');
			} else if ($user && $user['locked'] >= 3) {
				$this->data['error'] = 'Your account is locked.';
			} else {
				$this->data['error'] = "Invalid login, please try again.";

				// On 3 login attempts account will be locked
				$user = $this->userAccountModel->where('username', $_POST['username'])->first();
				if ($user) {
					$user['locked'] += 1;
					$this->userAccountModel
						->where('username', $_POST['username'])
						->set([
							'locked' => $user['locked']
						])->update();

					$this->data['error'] = "Invalid login, please try again. Attempt " . ($user['locked']);
				}

				// 3rd attempt locked
				if ($user && $user['locked'] == 3) {
					$this->data['error'] = "Invalid login. Your account is locked.";
				}
			}
		}

		// Display page view
		return view('auth/login', $this->data);
	}


	// REQUEST TO LOGOUT
	// -----------------------------------------------------------------
	public function logout()
	{
		$userID = getIdNo();
		// Delete login session on client
		session()->destroy();
		// CREATE ACTIVITY LOG
		createLog(
			$userID,
			'LYCEAN',
			'Auth',
			'User Logout',
			"User \"" . $userID . "\" logout from the myLPU Clinic"
		);
		// Redirect to login page
		return redirect()->to('login');
	}
}
