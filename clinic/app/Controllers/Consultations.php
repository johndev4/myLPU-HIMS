<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Consultations extends BaseController
{
	public function __construct()
	{
		helper('useraccount');
		// Page title
		$this->data['page_title'] = 'Consultations';
		// User firstname
		$this->data['firstname'] = getUserFirstname();
		// User designation
		$this->data['designation'] = getUserDesignation();

		// Base Directory of medical files
		$this->baseDir = './uploaded/medical_files/';
	}


	// VALIDATION RULES
	// -----------------------------------------------------------------
	private function getAcceptRules()
	{
		return  [
			'meeting_date' => [
				'rules' => 'required',
				'errors' => [
					'required' => '- Required',
				]
			],
			'meeting_time' => [
				'rules' => 'required',
				'errors' => [
					'required' => '- Required',
				]
			],
			'meeting_link' => [
				'rules' => 'required|valid_url',
				'errors' => [
					'required' => '- Required',
					'valid_url' => 'Invalid URL.',
				]
			]
		];
	}

	private function getRejectRules()
	{
		return  [
			'rejection_message' => [
				'rules' => 'required|max_length[300]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Maximum length exceeds',
				]
			]
		];
	}

	private function getUploadRules()
	{
		return  [
			'medicalfiles' => [
				'rules' => 'uploaded[medicalfiles.0]|max_size[medicalfiles,2048]',
				'errors' => [
					'uploaded' => 'No file attached.',
					'max_size' => 'File is too large.'
				]
			]
		];
	}


	// RETURN VIEWS
	// -----------------------------------------------------------------
	public function index()
	{
		$user = $this->userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
		$userInfo = $this->userModel->find($user['id_no']);
		$this->data['firstname'] = $userInfo['first_name'];
		// For guidance counselor permission on sidebar
		$this->data['designation'] = $userInfo['designation'];

		// Display page view
		return view('components/consultations', $this->data);
	}


	// FETCH ALL NEW REQUEST CONSULTATIONS
	// -----------------------------------------------------------------
	public function fetchAllRequestConsultations()
	{
		$user = $this->userAccountModel
			->where('username', session()->get('uid'))->where('password', session()->get('pwd'))
			->first();
		$userInfo = $this->userModel->find($user['id_no']);

		$category = $userInfo['designation'] == 'Guidance Counselor' ? 'Mental Wellness' : 'Consultation';

		$pendingConsultations = $this->consultationsModel
			->where('status', 'pending')
			->where('category', $category)
			->findAll();
		$result = "";

		foreach ($pendingConsultations as $key => $value) {
			$lycean = $this->lyceansModel->find($value['lycean_id_no']);
			$middle_init = $lycean['middle_name'];

			$data = "
			<div class=\"col-12 d-flex justify-content-center\">
				<div class=\"card\" style=\"width: 20rem;\">
					<div class=\"card-body\">
						<div>
							<span class=\"card-title mb-2\" style=\"font-size: 10pt;\"> " . date('F d, Y h:m A', strtotime($value['created_at'])) . " </span>
							<span class=\"d-inline float-right text-primary request-type\"> {$value['category']} </span>
						</div>
						<div class=\"card-text\"><span class=\"font-weight-bold\"> {$lycean['first_name']} {$middle_init}. {$lycean['last_name']} </span></div>
						<div class=\"card-text\"><span> {$lycean['id_no']} </span></div>
						<p class=\"card-text text-justify\"> {$value['message']} </p>
						<a href=\"#\" class=\"btn text-primary d-block accept-button\" data-target=\"#acceptModal\" data-toggle=\"modal\" onclick=\"accept('{$value['consultation_no']}')\">Accept</a>
						<a href=\"#\" class=\"btn d-block text-secondary font-weight-bold reject-button\" data-target=\"#rejectModal\" data-toggle=\"modal\" onclick=\"reject('{$value['consultation_no']}')\">Reject</a>
					</div>
				</div>
			</div>
			";

			$result .= $data;
		}

		return json_encode(['result' => $result, 'count' => count($pendingConsultations)]);
	}


	// FETCH ALL SCHEDULED CONSULTATIONS
	// -----------------------------------------------------------------
	public function fetchAllScheduledConsultations()
	{
		$user = $this->userAccountModel
			->where('username', session()->get('uid'))->where('password', session()->get('pwd'))
			->first();
		$scheduledConsultations = $this->consultationsModel
			->where('status', 'active')
			->where('personnel_id_no', $user['id_no'])
			->orderBy('queue_no', 'asc')->findAll();
		$result = "";

		foreach ($scheduledConsultations as $key => $value) {
			$lycean = $this->lyceansModel->find($value['lycean_id_no']);
			$middle_init = $lycean['middle_name'];

			$data = "
			<div class=\"px-2\">
				<div class=\"card\">
					<!-- <div class=\"card-header bg-danger\"></div> -->
					<div class=\"card-body sched\">
						<h4 class=\"d-inline float-left text-secondary font-weight-light\">#{$value['queue_no']}</h4>
						<span class=\"d-inline float-right text-primary request-type\"> {$value['category']} </span>
						<br><br>
						<div>
							<h5 class=\"d-inline font-weight-bold\" style=\"font-size: 15pt;\"> {$lycean['first_name']} {$middle_init}. {$lycean['last_name']} </h5>
						</div>
						<div class=\"text-secondary mb-2\"> {$lycean['id_no']} </div>
						<span class=\"mb-2 text-secondary d-inline\" style=\"font-size: 12pt;\">
							<span class=\"font-weight-bold d-inline\">Schedule:</span> " . date('F d, Y h:m A', strtotime($value['meeting_schedule'])) . "
						</span>

						<a href=\"#\" class=\"btn text-primary d-block mt-3 accept-button\" data-target=\"#doneModal\" data-toggle=\"modal\" onclick=\"done('{$value['consultation_no']}')\">Done</a>
					</div>
				</div>
			</div>
			";

			$result .= $data;
		}

		return json_encode(['result' => $result, 'count' => count($scheduledConsultations)]);
	}


	// ACCEPT NEW REQUEST BY ID
	// -----------------------------------------------------------------
	public function acceptRequestById($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getAcceptRules())) {
				$user = $this->userAccountModel
					->where('username', session()->get('uid'))->where('password', session()->get('pwd'))
					->first();

				$scheduledConsultations = $this->consultationsModel
					->where('status', 'active')->where('personnel_id_no', $user['id_no'])
					->orderBy('queue_no', 'asc')->findAll();

				$data = [
					'queue_no' => count($scheduledConsultations) + 1,
					'status' => 'active',
					'personnel_id_no' => $user['id_no'],
					'meeting_schedule' => $_GET['meeting_date'] . " " . $_GET['meeting_time'],
					'meeting_link' => $_GET['meeting_link']
				];

				$success = $this->consultationsModel
					->where('consultation_no', $id)
					->set($data)->update();

				if ($success) {
					session()->setFlashdata('success', 'Ok!');
				}
			}
		}

		return redirect()->to('consultations');
	}


	// REJECT NEW REQUEST BY ID
	// -----------------------------------------------------------------
	public function rejectRequestById($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getRejectRules())) {
				$user = $this->userAccountModel
					->where('username', session()->get('uid'))->where('password', session()->get('pwd'))
					->first();

				// $scheduledConsultations = $this->consultationsModel
				// 	->where('status', 'active')->where('personnel_id_no', $user['id_no'])
				// 	->orderBy('queue_no', 'asc')->findAll();

				$data = [
					'status' => 'rejected',
					'personnel_id_no' => $user['id_no'],
					'rejection_message' => $_GET['rejection_message']
				];

				$success = $this->consultationsModel
					->where('consultation_no', $id)
					->set($data)->update();

				if ($success) {
					session()->setFlashdata('success', 'Ok!');
				}
			}

			print_r($_GET);
		}

		return redirect()->to('consultations');
	}


	// SEND MEDICAL FILES BY ID
	// -----------------------------------------------------------------
	public function sendMedicalFilesById($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			if ($this->validate($this->getUploadRules())) {
				$files = $this->request->getFiles();
				$consultation = $this->consultationsModel->find($id);

				foreach ($files['medicalfiles'] as $file) {
					$fileName = $file->getName();
					$fileDirectory = $this->baseDir . $consultation['lycean_id_no'];

					if ($file->isValid() && !$file->hasMoved()) {
						for ($i = 0; true; $i += 1) {
							if (!file_exists($fileDirectory . '/' . $fileName)) {
								$success1 = $file->move($fileDirectory, $fileName);

								$success2 = $this->medicalFilesModel->save([
									'consultation_no' => $id,
									'file_path' => $fileDirectory . '/' . $fileName
								]);

								$success3 = $this->consultationsModel
									->where('consultation_no', $id)
									->set([
										'status' => 'done'
									])->update();

								if ($success1 && $success2 && $success3) {
									session()->setFlashdata('success', "Successfully uploaded.");
								} else {
								}
								break;
							} else {
								$fileName = explode('.', $file->getName())[0] . ' (' . $i . ').' . $file->getExtension();
							}
						}
					}
				}
			} else {
				session()->setFlashdata('upload_validation', $this->validator->getErrors());
				session()->setFlashdata('consultationNo', $id);
			}
		}

		return redirect()->to('consultations');
	}


	// AVAILABLE TOGGLE
	// -----------------------------------------------------------------
	public function availableToggle()
	{
	}
}
