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
			$credentials = $this->userAccountsModel
				->where('username', $_POST['username'])
				->where('password', hash('sha256', $_POST['password']))
				->first();

			if ($credentials) {
				// Create login session
				session()->set([
					'uid' => $credentials['username'],
					'pwd' => $credentials['password'],
					'logged_in' => TRUE
				]);

				return redirect()->to('dashboard');
			} else {
				$this->data['error'] = 'Invalid login, please try again';
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
