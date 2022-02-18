<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Useraccounts extends BaseController
{
	public function __construct()
	{
		helper(['useraccount', 'activitylogs']);
		// Page title
		$this->data['page_title'] = 'User Accounts';
		// User admin name
		$this->data['adminName'] = getAdminName();
	}


	// VALIDATION RULES
	// -----------------------------------------------------------------
	private function getLyceanDataRules($id = null)
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
				'rules' => 'required|max_length[45]|is_unique[lyceans_account.id_no' . $optional_idUnq . ']|valid_idno[{field}]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
					'is_unique' => 'ID No. already exists.',
					'valid_idno' => 'Must only contain numeric characters and dashes.'
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
				'rules' => 'required|max_length[45]|alpha_space',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
					'alpha_space' => 'Must only contain alphabetical characters and spaces.',
				]
			],
			'first_name' => [
				'rules' => 'required|max_length[45]|alpha_space',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
					'alpha_space' => 'Must only contain alphabetical characters and spaces.',
				]
			],
			'middle_name' => [
				'rules' => 'required|max_length[45]|alpha_space',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
					'alpha_space' => 'Must only contain alphabetical characters and spaces.',
				]
			],
			'gender' => [
				'rules' => 'max_length[10]',
				'errors' => [
					'max_length' => 'Max length exceeded.',
				]
			],
			'height' => [
				'rules' => 'max_length[25]',
				'errors' => [
					'max_length' => 'Max length exceeded.',
				]
			],
			'weight' => [
				'rules' => 'max_length[25]',
				'errors' => [
					'max_length' => 'Max length exceeded.',
				]
			],
			'blood_type' => [
				'rules' => 'max_length[5]',
				'errors' => [
					'max_length' => 'Max length exceeded.',
				]
			],
			'department' => [
				'rules' => 'required|max_length[100]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
				]
			]
		];
	}

	private function getHealthPersonnelDataRules($id = null)
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
				'rules' => 'required|max_length[45]|is_unique[health_personnels_account.id_no' . $optional_idUnq . ']|valid_idno[{field}]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
					'is_unique' => 'ID No. already exists.',
					'valid_idno' => 'Must only contain numeric characters and dashes.'
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
				'rules' => 'required|max_length[45]|alpha_space',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
					'alpha_space' => 'Must only contain alphabetical characters and spaces.',
				]
			],
			'first_name' => [
				'rules' => 'required|max_length[45]|alpha_space',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
					'alpha_space' => 'Must only contain alphabetical characters and spaces.',
				]
			],
			'middle_name' => [
				'rules' => 'required|max_length[45]|alpha_space',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
					'alpha_space' => 'Must only contain alphabetical characters and spaces.',
				]
			],
			'gender' => [
				'rules' => 'required|max_length[10]',
				'errors' => [
					'required' => '- Required',
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
	public function fetchAllLycean($role)
	{
		$result = array('data' => array());
		$lyceans = $this->lyceansModel
			->where('role', $role)
			->findAll();

		$count = 0;
		foreach ($lyceans as $lycean) {
			$lyceansAccount = $this->lyceansAccountModel->find($lycean['id_no']);
			if ($lyceansAccount) {
				$result['data'][$count] = array(
					$lycean['id_no'],
					$lycean['first_name'],
					$lycean['last_name'],
					$lycean['department'],
					"<div align=\"center\">
					<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $lyceansAccount['id_no'] . "')\" data-target=\"#modifyModal\" data-toggle=\"modal\">Modify</button>
					<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $lyceansAccount['id_no'] . "')\" data-target=\"#resetModal\" data-toggle=\"modal\">Reset</button>
					</div>"
				);
				$count += 1;
			}
		}

		return json_encode($result);
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

		return json_encode($result);
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

	public function fetchHealthPersonnelById($id = '')
	{
		$healthPersonnels = $this->healthPersonnelsModel->find($id);
		$healthPersonnelsAccount = $this->healthPersonnelsAccountModel->find($id);
		$result = [];

		if ($healthPersonnels) {
			$result = [
				'id_no' 		 => $healthPersonnels['id_no'],
				'last_name' 	 => $healthPersonnels['last_name'],
				'first_name' 	 => $healthPersonnels['first_name'],
				'middle_name' 	 => $healthPersonnels['middle_name'],
				'gender' 	 	 => $healthPersonnels['gender'],
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
		$lyceans = $this->lyceansModel->where('id_no', $id)->first();
		$result = [];

		if ($lyceans) {
			$lyceansAccount = $this->lyceansAccountModel->find($lyceans['id_no']);

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
				'middle_name' 	 => $healthPersonnels['middle_name'],
				'gender' 	 	 => $healthPersonnels['gender'],
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

			if ($this->validate($this->getLyceanDataRules())) {
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
					'password' => hash('sha256', str_replace(' ', '', strtoupper($_GET['last_name']))),
					'locked' => 0
				];

				$success1 = $this->lyceansModel->save($data1);
				$success2 = $this->lyceansAccountModel->save($data2);

				if ($success1 && $success2) {
					// Create flashdata for database query status
					session()->setFlashdata('success', 'Successfully added.');

					// CREATE ACTIVITY LOG
					createLog(
						getAdminId(),
						'ADMIN',
						'User Accounts',
						'Add LY User',
						"User \"" . getAdminId() . "\" added a user account with id_no: \"{$data1['id_no']}\""
					);
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

			if ($this->validate($this->getHealthPersonnelDataRules())) {
				$data1 = [
					'id_no' => htmlspecialchars($_GET['id_no']),
					'first_name' => htmlspecialchars($_GET['first_name']),
					'middle_name' => htmlspecialchars($_GET['middle_name']),
					'last_name' => htmlspecialchars($_GET['last_name']),
					'gender' 	 	 => htmlspecialchars($_GET['gender']),
					'designation' => htmlspecialchars($_GET['designation']),
					'department' => htmlspecialchars("HSD")
				];

				$data2 = [
					'id_no' => htmlspecialchars($_GET['id_no']),
					'username' => htmlspecialchars($_GET['username']),
					'password' => hash('sha256', str_replace(' ', '', strtoupper($_GET['last_name']))),
					'locked' => 0
				];

				$success1 = $this->healthPersonnelsModel->save($data1);
				$success2 = $this->healthPersonnelsAccountModel->save($data2);

				if ($success1 && $success2) {
					// Create flashdata for database query status
					session()->setFlashdata('success', 'Successfully added.');

					// CREATE ACTIVITY LOG
					createLog(
						getAdminId(),
						'ADMIN',
						'User Accounts',
						'Add HP User',
						"User \"" . getAdminId() . "\" added a user account with id_no: \"{$data1['id_no']}\""
					);
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

			if ($this->validate($this->getLyceanDataRules($id))) {
				// TEMP DATA FOR ACTIVITY LOG
				$tempData1 = $this->lyceansModel->find($id);
				$tempData2 = $this->lyceansAccountModel->find($id);

				$data1 = [
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
					'username' => htmlspecialchars($_GET['username']),
					'locked' => 0
				];

				$success1 = $this->lyceansModel
					->where('id_no', $id)
					->set($data1)
					->update();
				$success2 = $this->lyceansAccountModel
					->where('id_no', $id)
					->set($data2)
					->update();

				if ($success1 && $success2) {
					// Create flashdata for database query status
					session()->setFlashdata('success', 'Successfully updated.');

					// CREATE ACTIVITY LOG
					foreach ($data1 as $key => $value) {
						if ($tempData1[$key] != $value) {
							createLog(
								getAdminId(),
								'ADMIN',
								'User Accounts',
								'Modify LY User',
								"User \"" . getAdminId() . "\" set {$key} field to \"{$value}\" of user \"{$id}\""
							);
						}
					}
					foreach ($data2 as $key => $value) {
						if ($tempData2[$key] != $value) {
							createLog(
								getAdminId(),
								'ADMIN',
								'User Accounts',
								'Modify LY User',
								"User \"" . getAdminId() . "\" set {$key} field to \"{$value}\" of user \"{$id}\""
							);
						}
					}
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

			if ($this->validate($this->getHealthPersonnelDataRules($id))) {
				// TEMP DATA FOR ACTIVITY LOG
				$tempData1 = $this->healthPersonnelsModel->find($id);
				$tempData2 = $this->healthPersonnelsAccountModel->find($id);

				$data1 = [
					'first_name' => htmlspecialchars($_GET['first_name']),
					'middle_name' => htmlspecialchars($_GET['middle_name']),
					'last_name' => htmlspecialchars($_GET['last_name']),
					'gender' => htmlspecialchars($_GET['gender']),
					'designation' => htmlspecialchars($_GET['designation']),
				];
				$data2 = [
					'username' => htmlspecialchars($_GET['username']),
					'locked' => 0
				];

				$success1 = $this->healthPersonnelsModel
					->where('id_no', $id)
					->set($data1)
					->update();
				$success2 = $this->healthPersonnelsAccountModel
					->where('id_no', $id)
					->set($data2)
					->update();

				if ($success1 && $success2) {
					// Create flashdata for database query status
					session()->setFlashdata('success', 'Successfully updated.');

					// CREATE ACTIVITY LOG
					foreach ($data1 as $key => $value) {
						if ($tempData1[$key] != $value) {
							createLog(
								getAdminId(),
								'ADMIN',
								'User Accounts',
								'Modify HP User',
								"User \"" . getAdminId() . "\" set {$key} field to \"{$value}\" of user \"{$id}\""
							);
						}
					}
					foreach ($data2 as $key => $value) {
						if ($tempData2[$key] != $value) {
							createLog(
								getAdminId(),
								'ADMIN',
								'User Accounts',
								'Modify HP User',
								"User \"" . getAdminId() . "\" set {$key} field to \"{$value}\" of user \"{$id}\""
							);
						}
					}
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

				// CREATE ACTIVITY LOG
				createLog(
					getAdminId(),
					'ADMIN',
					'User Accounts',
					'Delete LY User',
					"User \"" . getAdminId() . "\" deleted the account of user \"{$id}\""
				);
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

				// CREATE ACTIVITY LOG
				createLog(
					getAdminId(),
					'ADMIN',
					'User Accounts',
					'Delete HP User',
					"User \"" . getAdminId() . "\" deleted the account of user \"{$id}\""
				);
			} else {
			}

			return redirect()->to('useraccounts/healthpersonnel');
		}
	}


	// DELETE ALL DATA
	// ---------------------------------------------------------
	private function deleteAllAccounts()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$lyceans = $this->lyceansModel->where('role', $_GET['role'])->findAll();

			$success = FALSE;
			foreach ($lyceans as $lycean) {
				$success = $this->lyceansAccountModel->delete($lycean['id_no']);
			}

			if ($success) {
				// Create flashdata for database query status
				session()->setFlashdata('success', 'Successfully deleted.');

				// CREATE ACTIVITY LOG
				createLog(
					getAdminId(),
					'ADMIN',
					'User Accounts',
					'Delete All LY User',
					"User \"" . getAdminId() . "\" deleted all the accounts"
				);
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
			$healthPersonnels = $this->healthPersonnelsModel->findAll();

			$success = FALSE;
			foreach ($healthPersonnels as $healthPersonnel) {
				$success = $this->healthPersonnelsAccountModel->delete($healthPersonnel['id_no']);
			}

			if ($success) {
				// Create flashdata for database query status
				session()->setFlashdata('success', 'Successfully deleted.');

				// CREATE ACTIVITY LOG
				createLog(
					getAdminId(),
					'ADMIN',
					'User Accounts',
					'Delete All HP User',
					"User \"" . getAdminId() . "\" deleted all the accounts"
				);
			} else {
			}
		}

		return redirect()->to('useraccounts/healthpersonnel');
	}


	// RESET ACCOUNT BY ID
	// ---------------------------------------------------------
	private function resetLyceanAccount($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$lycean = $this->lyceansModel->find($id);
			$success = $this->lyceansAccountModel
				->where('id_no', $id)
				->set([
					'password' => hash('sha256', str_replace(' ', '', strtoupper($lycean['last_name']))),
					'locked' => 0
				])->update();

			if ($success and $lycean) {
				// Create flashdata for database query status
				session()->setFlashdata('success', 'Successfully reset.');

				// CREATE ACTIVITY LOG
				createLog(
					getAdminId(),
					'ADMIN',
					'User Accounts',
					'Reset LY Account',
					"User \"" . getAdminId() . "\" reset the account of user \"{$id}\""
				);
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
			$healthPersonnels = $this->healthPersonnelsModel->find($id);
			$success = $this->healthPersonnelsAccountModel
				->where('id_no', $id)
				->set([
					'password' => hash('sha256', str_replace(' ', '', strtoupper($healthPersonnels['last_name']))),
					'locked' => 0
				])->update();

			if ($success and $healthPersonnels) {
				// Create flashdata for database query status
				session()->setFlashdata('success', 'Successfully reset.');

				// CREATE ACTIVITY LOG
				createLog(
					getAdminId(),
					'ADMIN',
					'User Accounts',
					'Reset HP Account',
					"User \"" . getAdminId() . "\" reset the account of user \"{$id}\""
				);
			} else {
			}

			return redirect()->to('useraccounts/healthpersonnel');
		}
	}


	// RESET ALL ACCOUNT
	// ---------------------------------------------------------
	private function resetAllLyceanAccount($role)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$lyceans = $this->lyceansModel->where('role', $role)->findAll();

			foreach ($lyceans as $lycean) {
				$success = $this->lyceansAccountModel
					->where('id_no', $lycean['id_no'])
					->set([
						'password' => hash('sha256', str_replace(' ', '', strtoupper($lycean['last_name']))),
						'locked' => 0
					])->update();

				if ($success and $lycean) {
					// Create flashdata for database query status
					session()->setFlashdata('success', 'Successfully resetted.');

					// CREATE ACTIVITY LOG
					createLog(
						getAdminId(),
						'ADMIN',
						'User Accounts',
						'Reset All LY User',
						"User \"" . getAdminId() . "\" reset all the accounts"
					);
				} else {
					break;
					session()->setFlashdata('success', 'ERROR ON RESET');
				}
			}
		}
	}

	public function resetAllStudentAccount()
	{
		$this->resetAllLyceanAccount('student');
		return redirect()->to('useraccounts/student');
	}

	public function resetAllFacultyAccount()
	{
		$this->resetAllLyceanAccount('faculty');
		return redirect()->to('useraccounts/faculty');
	}

	public function resetAllStaffAccount()
	{
		$this->resetAllLyceanAccount('staff');
		return redirect()->to('useraccounts/staff');
	}

	public function resetAllHealthPersonnelAccount()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$healthPersonnels = $this->healthPersonnelsModel->findAll();

			foreach ($healthPersonnels as $healthPersonnel) {
				$success = $this->healthPersonnelsAccountModel
					->where('id_no', $healthPersonnel['id_no'])
					->set([
						'password' => hash('sha256', str_replace(' ', '', strtoupper($healthPersonnel['last_name']))),
						'locked' => 0
					])->update();

				if ($success and $healthPersonnel) {
					// Create flashdata for database query status
					session()->setFlashdata('success', 'Successfully resetted.');

					// CREATE ACTIVITY LOG
					createLog(
						getAdminId(),
						'ADMIN',
						'User Accounts',
						'Reset All HP User',
						"User \"" . getAdminId() . "\" reset all the accounts"
					);
				} else {
					break;
					session()->setFlashdata('success', 'ERROR ON RESET');
				}
			}

			return redirect()->to('useraccounts/healthpersonnel');
		}
	}
}
