<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
	public function __construct()
	{
		// Page title
		$this->data['page_title'] = 'Login';
	}

	public function index()
	{
		// Request to login
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$userAccount = $this->userAccountModel->where('username', $_POST['username'])->first();
			$credentials = $this->userAccountModel
				->where('username', $_POST['username'])
				->where('password', hash('sha256', $_POST['password']))
				->first();
				
			if ($userAccount && $userAccount['locked'] >= 5) {
				$this->data['error'] = 'Your account is locked.';
			} else if ($credentials) {
				// Create login session
				session()->set([
					'uid' => $credentials['username'],
					'pwd' => $credentials['password'],
					'logged_in' => TRUE
				]);
				$this->userAccountModel
					->where('username', session()->get('uid'))
					->where('password', session()->get('pwd'))
					->set(['locked' => 0])->update();

				return redirect()->to('dashboard');
			} else {
				$this->data['error'] = 'Invalid login, please try again';

				// On 3 login attempts account will be locked
				$userAccount = $this->userAccountModel->where('username', $_POST['username'])->first();
				if ($userAccount) {
					$userAccount['locked'] += 1;
					$this->userAccountModel
						->where('username', $_POST['username'])
						->set([
							'locked' => $userAccount['locked']
						])->update();
				}
			}
		}

		// Display page view
		return view('auth/login', $this->data);
	}

	public function logout()
	{
		// Delete login session on client
		session()->destroy();
		// Redirect to login page
		return redirect()->to('login');
	}
}
