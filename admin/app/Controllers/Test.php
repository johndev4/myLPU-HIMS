<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Test extends BaseController
{
	public function index()
	{
		return view('test');
	}

	public function notifications()
	{
		$admin = $this->administratorsModel->find(1);
		return json_encode("{\"message\": \"" . $admin['username'] . "\"}");
	}

	public function import()
	{
		$import = file_get_contents(base_url('assets/import.json'));
		$import = json_decode($import, true);

		foreach ($import as $key => $value) {
			$data = [
				"username" => $value['username'],
				"password" => $value['password']
			];
			$this->patientsModel->save($data);
		}
	}
}
