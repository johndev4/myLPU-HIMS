<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserAccounts extends BaseController
{
	public function __construct()
	{
		// Page title
		$this->data['page_title'] = 'User Accounts';
	}


	// VALIDATION RULES
	// -----------------------------------------------------------------
	private function getLyceanRules($id = null)
	{
		if ($id !== null) {
			$lyceansAccount = $this->lyceansAccountModel->find($id);
			$optional_idUnq = ',id_no,' . $lyceansAccount['id_no'];
			$optional_usrUnq = ',username,' . $lyceansAccount['username'];
		} else {
			$optional_idUnq = "";
			$optional_usrUnq = "";
		}

		return  [
			'id_no' => [
				'rules' => 'required|max_length[45]|is_unique[lyceans_account.id_no' . $optional_idUnq . ']',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
					'is_unique' => 'ID No. already exists.'

				]
			],
			'username' => [
				'rules' => 'required|valid_email|max_length[45]|is_unique[lyceans_account.username' . $optional_usrUnq . ']',
				'errors' => [
					'required' => '- Required',
					'valid_email' => 'Must be in email address format.',
					'max_length' => 'Max length exceeded.',
					'is_unique' => 'ID No. is already exists'
				]
			],
			'last_name' => [
				'rules' => 'required|max_length[45]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
				]
			],
			'first_name' => [
				'rules' => 'required',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
				]
			],
			'middle_name' => [
				'rules' => 'required|max_length[45]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
				]
			],
			'gender' => [
				'rules' => 'required|max_length[6]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
				]
			],
			'birth_date' => [
				'rules' => 'required',
				'errors' => [
					'required' => '- Required'
				]
			],
			'height' => [
				'rules' => 'max_length[3]',
				'errors' => [
					'max_length' => 'Max length exceeded.',
				]
			],
			'weight' => [
				'rules' => 'max_length[3]',
				'errors' => [
					'max_length' => 'Max length exceeded.',
				]
			],
			'blood_type' => [
				'rules' => 'max_length[3]',
				'errors' => [
					'max_length' => 'Max length exceeded.',
				]
			],
			'department' => [
				'rules' => 'required|max_length[45]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
				]
			]
		];
	}

	private function getHealthPersonnelRules($id = null)
	{
		if ($id !== null) {
			$healthPersonnelsAccount = $this->healthPersonnelsAccountModel->find($id);
			$optional_idUnq = ',id_no,' . $healthPersonnelsAccount['id_no'];
			$optional_usrUnq = ',username,' . $healthPersonnelsAccount['username'];
		} else {
			$optional_idUnq = "";
			$optional_usrUnq = "";
		}

		return  [
			'id_no' => [
				'rules' => 'required|max_length[45]|is_unique[health_personnels_account.id_no' . $optional_idUnq . ']',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
					'is_unique' => 'ID No. already exists.'

				]
			],
			'username' => [
				'rules' => 'required|valid_email|max_length[45]|is_unique[lyceans_account.username' . $optional_usrUnq . ']',
				'errors' => [
					'required' => '- Required',
					'valid_email' => 'Must be in email address format.',
					'max_length' => 'Max length exceeded.',
					'is_unique' => 'ID No. is already exists'
				]
			],
			'last_name' => [
				'rules' => 'required|max_length[45]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
				]
			],
			'first_name' => [
				'rules' => 'required',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
				]
			],
			'middle_name' => [
				'rules' => 'max_length[1]',
				'errors' => [
					'max_length' => 'Max length exceeded.',
				]
			],
			'designation' => [
				'rules' => 'required|max_length[45]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
				]
			]
		];
	}


	// RETURN VIEWS
	// -----------------------------------------------------------------
	public function student()
	{
		// Display page view
		return view('components/user_accounts/student', $this->data);
	}

	public function faculty()
	{
		// Display page view
		return view('components/user_accounts/faculty', $this->data);
	}

	public function staff()
	{
		// Display page view
		return view('components/user_accounts/staff', $this->data);
	}

	public function healthPersonnel()
	{
		// Display page view
		return view('components/user_accounts/health_personnel', $this->data);
	}


	// FETCH ALL DATA
	// -----------------------------------------------------------------
	public function fetchAllStudent()
	{
		$result = array('data' => array());
		$lyceans = $this->lyceansModel
			->where('role', 'student')
			->findAll();

		$count = 0;
		foreach ($lyceans as $value) {
			$lyceansAccount = $this->lyceansAccountModel->find($value['id_no']);
			if ($lyceansAccount) {
				$result['data'][$count] = array(
					$value['id_no'],
					$value['first_name'],
					$value['last_name'],
					$value['department'],
					"<div align=\"center\">
					<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $lyceansAccount['id_no'] . "')\" data-target=\"#modifyModal\" data-toggle=\"modal\">Modify</button>
					<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $lyceansAccount['id_no'] . "')\" data-target=\"#resetModal\" data-toggle=\"modal\">Reset</button>
					</div>"
				);
				$count += 1;
			}
		}

		echo json_encode($result);
	}

	public function fetchAllFaculty()
	{
		$result = array('data' => array());
		$lyceans = $this->lyceansModel
			->where('role', 'faculty')
			->findAll();

		$count = 0;
		foreach ($lyceans as $value) {
			$lyceansAccount = $this->lyceansAccountModel->find($value['id_no']);
			if ($lyceansAccount) {
				$result['data'][$count] = array(
					$value['id_no'],
					$value['first_name'],
					$value['last_name'],
					$value['department'],
					"<div align=\"center\">
					<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $lyceansAccount['id_no'] . "')\" data-target=\"#modifyModal\" data-toggle=\"modal\">Modify</button>
					<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $lyceansAccount['id_no'] . "')\" data-target=\"#resetModal\" data-toggle=\"modal\">Reset</button>
					</div>"
				);
				$count += 1;
			}
		}

		echo json_encode($result);
	}

	public function fetchAllStaff()
	{
		$result = array('data' => array());
		$lyceans = $this->lyceansModel
			->where('role', 'staff')
			->findAll();

		$count = 0;
		foreach ($lyceans as $value) {
			$lyceansAccount = $this->lyceansAccountModel->find($value['id_no']);
			if ($lyceansAccount) {
				$result['data'][$count] = array(
					$value['id_no'],
					$value['first_name'],
					$value['last_name'],
					$value['department'],
					"<div align=\"center\">
					<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $lyceansAccount['id_no'] . "')\" data-target=\"#modifyModal\" data-toggle=\"modal\">Modify</button>
					<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $lyceansAccount['id_no'] . "')\" data-target=\"#resetModal\" data-toggle=\"modal\">Reset</button>
					</div>"
				);
				$count += 1;
			}
		}

		echo json_encode($result);
	}

	public function fetchAllHealthPersonnel()
	{
		$result = array('data' => array());
		$healthPersonnels = $this->healthPersonnelsModel->findAll();

		$count = 0;
		foreach ($healthPersonnels as $value) {
			$healthPersonnelsAccount = $this->healthPersonnelsAccountModel->find($value['id_no']);
			if ($healthPersonnelsAccount) {
				$result['data'][$count] = array(
					$value['id_no'],
					$value['first_name'],
					$value['last_name'],
					$value['designation'],
					"<div align=\"center\">
					<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $healthPersonnelsAccount['id_no'] . "')\" data-target=\"#modifyModal\" data-toggle=\"modal\">Modify</button>
					<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $healthPersonnelsAccount['id_no'] . "')\" data-target=\"#resetModal\" data-toggle=\"modal\">Reset</button>
					</div>"
				);
				$count += 1;
			}
		}

		echo json_encode($result);
	}


	// FETCH DATA BY ID
	// ---------------------------------------------------------
	public function fetchLyceanById($id)
	{
		$lyceans = $this->lyceansModel->find($id);
		$lyceansAccount = $this->lyceansAccountModel->find($id);
		$result = [];

		if ($lyceans) {
			$result = [
				'id_no' 		 => $lyceans['id_no'],
				'last_name' 	 => $lyceans['last_name'],
				'first_name' 	 => $lyceans['first_name'],
				'middle_name' 	 => $lyceans['middle_name'],
				'gender' 		 => $lyceans['gender'],
				'birth_date' 	 => date($lyceans['birth_date']),
				'height' 		 => $lyceans['height'],
				'weight' 		 => $lyceans['weight'],
				'blood_type' 	 => $lyceans['blood_type'],
				'department' 	 => $lyceans['department']
			];
		}

		if ($lyceansAccount) {
			$result['username'] = $lyceansAccount['username'];
		}

		return json_encode($result);
	}

	public function fetchHealthPersonnelById($id)
	{
		$healthPersonnels = $this->healthPersonnelsModel->find($id);
		$healthPersonnelsAccount = $this->healthPersonnelsAccountModel->find($id);
		$result = [];

		if ($healthPersonnels) {
			$result = [
				'id_no' 		 => $healthPersonnels['id_no'],
				'last_name' 	 => $healthPersonnels['last_name'],
				'first_name' 	 => $healthPersonnels['first_name'],
				'middle_name' => $healthPersonnels['middle_name'],
				'designation' 	 => $healthPersonnels['designation']
			];
		}

		if ($healthPersonnelsAccount) {
			$result['username'] = $healthPersonnelsAccount['username'];
		}

		return json_encode($result);
	}


	// FETCH DATA BY ID WITHOUT ACCOUNT
	// ---------------------------------------------------------
	public function fetchLyceanInfoById($id)
	{
		$lyceans = $this->lyceansModel->find($id);
		$lyceansAccount = $this->lyceansAccountModel->find($id);
		$result = [];

		if ($lyceans and !$lyceansAccount) {
			$result = [
				'id_no' 		 => $lyceans['id_no'],
				'last_name' 	 => $lyceans['last_name'],
				'first_name' 	 => $lyceans['first_name'],
				'middle_name' 	 => $lyceans['middle_name'],
				'gender' 		 => $lyceans['gender'],
				'birth_date' 	 => date($lyceans['birth_date']),
				'height' 		 => $lyceans['height'],
				'weight' 		 => $lyceans['weight'],
				'blood_type' 	 => $lyceans['blood_type'],
				'department' 	 => $lyceans['department']
			];
		}

		return json_encode($result);
	}

	public function fetchHealthPersonnelInfoById($id)
	{
		$healthPersonnels = $this->healthPersonnelsModel->find($id);
		$healthPersonnelsAccount = $this->healthPersonnelsAccountModel->find($id);
		$result = [];

		if ($healthPersonnels and !$healthPersonnelsAccount) {
			$result = [
				'id_no' 		 => $healthPersonnels['id_no'],
				'last_name' 	 => $healthPersonnels['last_name'],
				'first_name' 	 => $healthPersonnels['first_name'],
				'middle_name' => $healthPersonnels['middle_name'],
				'designation' 	 => $healthPersonnels['designation']
			];
		}

		return json_encode($result);
	}


	// INSERT DATA
	// ---------------------------------------------------------
	private function addLyceanAccount()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getLyceanRules())) {
				$data1 = [
					'id_no' => htmlspecialchars($_GET['id_no']),
					'first_name' => htmlspecialchars($_GET['first_name']),
					'middle_name' => htmlspecialchars($_GET['middle_name']),
					'last_name' => htmlspecialchars($_GET['last_name']),
					'role' => htmlspecialchars($_GET['role']),
					'department' => htmlspecialchars($_GET['department']),
					'birth_date' => htmlspecialchars(date($_GET['birth_date'])),
					'gender' => htmlspecialchars($_GET['gender']),
					'height' => htmlspecialchars($_GET['height']),
					'weight' => htmlspecialchars($_GET['weight']),
					'blood_type' => htmlspecialchars($_GET['blood_type']),
				];

				$data2 = [
					'id_no' => htmlspecialchars($_GET['id_no']),
					'username' => htmlspecialchars($_GET['username']),
					'password' => hash('sha256', strtoupper(htmlspecialchars($_GET['last_name'])))
				];

				$success1 = $this->lyceansModel->save($data1);
				$success2 = $this->lyceansAccountModel->save($data2);

				if ($success1 && $success2) {
					// Create flashdata for database query status
					session()->setFlashdata('success', 'Successfully added.');
				} else {
				}
			} else {
				session()->setFlashdata('add_validation', $this->validator);
				session()->setFlashdata('getData', json_encode($_GET));
			}
		}
	}

	public function addStudentAccount()
	{
		$this->addLyceanAccount();
		return redirect()->to('useraccounts/student');
	}

	public function addFacultyAccount()
	{
		$this->addLyceanAccount();
		return redirect()->to('useraccounts/faculty');
	}

	public function addStaffAccount()
	{
		$this->addLyceanAccount();
		return redirect()->to('useraccounts/staff');
	}

	public function addHealthPersonnelAccount()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getHealthPersonnelRules())) {
				$data1 = [
					'id_no' => htmlspecialchars($_GET['id_no']),
					'first_name' => htmlspecialchars($_GET['first_name']),
					'middle_name' => htmlspecialchars($_GET['middle_name']),
					'last_name' => htmlspecialchars($_GET['last_name']),
					'designation' => htmlspecialchars($_GET['designation']),
					'department' => htmlspecialchars("HSD")
				];

				$data2 = [
					'id_no' => htmlspecialchars($_GET['id_no']),
					'username' => htmlspecialchars($_GET['username']),
					'password' => hash('sha256', strtoupper(htmlspecialchars($_GET['last_name'])))
				];

				$success1 = $this->healthPersonnelsModel->save($data1);
				$success2 = $this->healthPersonnelsAccountModel->save($data2);

				if ($success1 && $success2) {
					// Create flashdata for database query status
					session()->setFlashdata('success', 'Successfully added.');
				} else {
				}
			} else {
				session()->setFlashdata('add_validation', $this->validator);
				session()->setFlashdata('getData', json_encode($_GET));
			}

			return redirect()->to('useraccounts/healthpersonnel');
		}
	}


	// UPDATE DATA
	// ---------------------------------------------------------
	private function modifyLyceanAccount($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getLyceanRules($id))) {
				$lyceansAccount = $this->lyceansAccountModel->find($id);
				$data1 = [
					'id_no' => htmlspecialchars($_GET['id_no']),
					'first_name' => htmlspecialchars($_GET['first_name']),
					'middle_name' => htmlspecialchars($_GET['middle_name']),
					'last_name' => htmlspecialchars($_GET['last_name']),
					'department' => htmlspecialchars($_GET['department']),
					'birth_date' => htmlspecialchars(date($_GET['birth_date'])),
					'gender' => htmlspecialchars($_GET['gender']),
					'height' => htmlspecialchars($_GET['height']),
					'weight' => htmlspecialchars($_GET['weight']),
					'blood_type' => htmlspecialchars($_GET['blood_type']),
				];

				$data2 = [
					'id_no' => htmlspecialchars($_GET['id_no']),
					'username' => htmlspecialchars($_GET['username']),
					'password' => $lyceansAccount['password']
				];

				$success1 = $this->lyceansAccountModel->delete($id);
				$success2 = $this->lyceansModel
					->where('id_no', $id)
					->set($data1)
					->update();
				$success3 = $this->lyceansAccountModel->save($data2);

				if ($success1 && $success2 && $success3) {
					// Create flashdata for database query status
					session()->setFlashdata('success', 'Successfully updated.');
				} else {
				}
			} else {
				session()->setFlashdata('mod_validation', $this->validator);
				session()->setFlashdata('getData', json_encode($_GET));
				session()->setFlashdata('id_no', $id);
			}
		}
	}

	public function modifyStudentAccount($id)
	{
		$this->modifyLyceanAccount($id);
		return redirect()->to('useraccounts/student');
	}

	public function modifyFacultyAccount($id)
	{
		$this->modifyLyceanAccount($id);
		return redirect()->to('useraccounts/faculty');
	}

	public function modifyStaffAccount($id)
	{
		$this->modifyLyceanAccount($id);
		return redirect()->to('useraccounts/staff');
	}

	public function modifyHealthPersonnelAccount($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getHealthPersonnelRules($id))) {
				$healthPersonnelsAccount = $this->healthPersonnelsAccountModel->find($id);
				$data1 = [
					'id_no' => htmlspecialchars($_GET['id_no']),
					'first_name' => htmlspecialchars($_GET['first_name']),
					'middle_name' => htmlspecialchars($_GET['middle_name']),
					'last_name' => htmlspecialchars($_GET['last_name']),
					'designation' => htmlspecialchars($_GET['designation']),
				];

				$data2 = [
					'id_no' => htmlspecialchars($_GET['id_no']),
					'username' => htmlspecialchars($_GET['username']),
					'password' => $healthPersonnelsAccount['password']
				];

				$success1 = $this->healthPersonnelsAccountModel->delete($id);
				$success2 = $this->healthPersonnelsModel
					->where('id_no', $id)
					->set($data1)
					->update();
				$success3 = $this->healthPersonnelsAccountModel->save($data2);

				if ($success1 && $success2 && $success3) {
					// Create flashdata for database query status
					session()->setFlashdata('success', 'Successfully updated.');
				} else {
				}
			} else {
				session()->setFlashdata('mod_validation', $this->validator);
				session()->setFlashdata('getData', json_encode($_GET));
				session()->setFlashdata('id_no', $id);
			}

			return redirect()->to('useraccounts/healthpersonnel');
		}
	}



	// DELETE DATA
	// ---------------------------------------------------------
	private function deleteLyceanAccount($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$success = $this->lyceansAccountModel->delete($id);

			if ($success) {
				// Create flashdata for database query status
				session()->setFlashdata('success', 'Successfully deleted.');
			} else {
			}
		}
	}

	public function deleteStudentAccount($id)
	{
		$this->deleteLyceanAccount($id);
		return redirect()->to('useraccounts/student');
	}

	public function deleteFacultyAccount($id)
	{
		$this->deleteLyceanAccount($id);
		return redirect()->to('useraccounts/faculty');
	}

	public function deleteStaffAccount($id)
	{
		$this->deleteLyceanAccount($id);
		return redirect()->to('useraccounts/staff');
	}

	public function deleteHealthPersonnelAccount($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$success = $this->healthPersonnelsAccountModel->delete($id);

			if ($success) {
				// Create flashdata for database query status
				session()->setFlashdata('success', 'Successfully deleted.');
			} else {
			}

			return redirect()->to('useraccounts/healthpersonnel');
		}
	}


	// RESET ACCOUNT
	// ---------------------------------------------------------
	private function resetLyceanAccount($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$lyceans = $this->lyceansModel->find($id);
			$success = $this->lyceansAccountModel
				->where('id_no', $id)
				->set(['password' => hash('sha256', strtoupper(htmlspecialchars($lyceans['last_name'])))])
				->update();

			if ($success and $lyceans) {
				// Create flashdata for database query status
				session()->setFlashdata('success', 'Successfully resetted.');
			} else {
			}
		}
	}

	public function resetStudentAccount($id)
	{
		$this->resetLyceanAccount($id);
		return redirect()->to('useraccounts/student');
	}

	public function resetFacultyAccount($id)
	{
		$this->resetLyceanAccount($id);
		return redirect()->to('useraccounts/faculty');
	}

	public function resetStaffAccount($id)
	{
		$this->resetLyceanAccount($id);
		return redirect()->to('useraccounts/staff');
	}

	public function resetHealthPersonnelAccount($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$lyceans = $this->healthPersonnelsModel->find($id);
			$success = $this->healthPersonnelsAccountModel
				->where('id_no', $id)
				->set(['password' => hash('sha256', strtoupper(htmlspecialchars($lyceans['last_name'])))])
				->update();

			if ($success and $lyceans) {
				// Create flashdata for database query status
				session()->setFlashdata('success', 'Successfully resetted.');
			} else {
			}

			return redirect()->to('useraccounts/healthpersonnel');
		}
	}


	// DELETE ALL ACCOUNT
	// ---------------------------------------------------------
	private function deleteAllAccounts()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$lyceans = $this->lyceansModel->where('role', $_GET['role'])->findAll();
			$id = [];

			foreach ($lyceans as $key => $value) {
				$id[$key] = $value['id_no'];
			}

			$success = $this->lyceansAccountModel->delete($id);

			if ($success) {
				// Create flashdata for database query status
				session()->setFlashdata('success', 'Successfully deleted.');
			} else {
			}
		}
	}

	public function deleteAllStudentAccounts()
	{
		$this->deleteAllAccounts();
		return redirect()->to('useraccounts/student');
	}

	public function deleteAllFacultyAccounts()
	{
		$this->deleteAllAccounts();
		return redirect()->to('useraccounts/faculty');
	}

	public function deleteAllStaffAccounts()
	{
		$this->deleteAllAccounts();
		return redirect()->to('useraccounts/staff');
	}

	public function deleteAllHealthPersonnelAccounts()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$success = $this->lyceansAccountModel->delete();

			if ($success) {
				// Create flashdata for database query status
				session()->setFlashdata('success', 'Successfully deleted.');
			} else {
			}
		}
	}
}
