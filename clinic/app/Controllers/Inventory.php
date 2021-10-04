<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Inventory extends BaseController
{
	public function __construct()
	{
		// Page title
		$this->data['page_title'] = 'Inventory';
	}


	// RETURN VIEWS
	// -----------------------------------------------------------------
	public function medicines()
	{
		$user = $this->userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
		$userInfo = $this->userModel->find($user['id_no']);
		$this->data['firstname'] = $userInfo['first_name'];
		// For guidance counselor permission on sidebar
		$this->data['designation'] = $userInfo['designation'];
		if ($userInfo['designation'] !== "Guidance Counselor") {
			return redirect()->to('dashboard');
		}

		// Display page view
		return view('components/inventory/medicines', $this->data);
	}

	public function equipments()
	{
		$user = $this->userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
		$userInfo = $this->userModel->find($user['id_no']);
		$this->data['firstname'] = $userInfo['first_name'];
		// For guidance counselor permission on sidebar
		$this->data['designation'] = $userInfo['designation'];
		if ($userInfo['designation'] !== "Guidance Counselor") {
			return redirect()->to('dashboard');
		}

		// Display page view
		return view('components/inventory/equipments', $this->data);
	}
}
