<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Consultations extends BaseController
{
	public function __construct()
	{
		helper(['useraccount', 'activitylogs']);
		// Page title
		$this->data['page_title'] = 'Consultations';
		// User fullname
		$this->data['fullname'] = getUserFullname();
		// User ID No.
		$this->data['idNo'] = getIdNo();
		// User designation
		$this->data['designation'] = getUserDesignation();
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
				'rules' => 'required|is_future_datetime|is_unique_datetime',
				'errors' => [
					'required' => '- Required',
					'is_future_datetime' => 'The schedule must be ahead from the date today.',
					'is_unique_datetime' => 'This schedule is already occupied.'
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
				'rules' => 'uploaded[medicalfiles.0]|max_size[medicalfiles,2048]|ext_in[medicalfiles,pdf]',
				'errors' => [
					'uploaded' => 'No file attached.',
					'max_size' => 'File is too large.',
					'ext_in' => 'Invalid file extension.'
				]
			]
		];
	}

	private function getClearHistoryRules()
	{
		return  [
			'from_date_range' => [
				'rules' => 'required|valid_date[Y-m-d]|differs[to_date_range]',
				'errors' => [
					'required' => '- Required',
					'valid_date' => 'Invalid date.',
					'differs' => '"From" and "To" should not be the same.',
					'date_less_than' => '"From" should less than "To".',
				]
			],
			'to_date_range' => [
				'rules' => 'required|valid_date[Y-m-d]|differs[from_date_range]',
				'errors' => [
					'required' => '- Required',
					'valid_date' => 'Invalid date.',
					'differs' => '"From" and "To" should not be the same.',
					'date_greater_than' => '"To" should greater than "From".',
				]
			]
		];
	}


	// RETURN VIEWS
	// -----------------------------------------------------------------
	public function index()
	{
		$userInfo = $this->userModel->find(getIdNo());
		$this->data['firstname'] = $userInfo['first_name'];
		// For guidance counselor permission on sidebar
		$this->data['designation'] = $userInfo['designation'];

		// Display page view
		return view('components/consultation/consultations', $this->data);
	}


	// FETCH ALL DATA
	// -----------------------------------------------------------------
	public function fetchAllRequestConsultations()
	{
		$pendingConsultations = $this->consultationsModel
			->where('status', 'pending')
			->where('personnel_id_no', getIdNo())
			->orderBy('created_at', 'asc')->findAll();

		$result = "";
		foreach ($pendingConsultations as $key => $value) {
			$lycean = $this->lyceansModel->find($value['lycean_id_no']);
			$middle_init = substr($lycean['middle_name'], 0, 1);

			$data = "
			<div class=\"col-12 d-flex justify-content-center\">
				<div class=\"card\" style=\"width: 20rem;\">
					<div class=\"card-body\">
						<div>
							<span class=\"card-title mb-2\" style=\"font-size: 10pt;\"> " . date('F d, Y h:i A', strtotime($value['created_at'])) . " </span>
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

	public function fetchAllScheduledConsultations()
	{
		$scheduledConsultations = $this->consultationsModel
			->where('status', 'active')
			->where('personnel_id_no', getIdNo())
			->orderBy('updated_at', 'asc')->findAll();

		$result = "";
		foreach ($scheduledConsultations as $key => $value) {
			$lycean = $this->lyceansModel->find($value['lycean_id_no']);
			$middle_init = substr($lycean['middle_name'], 0, 1);
			$key += 1;

			$data = "
			<div class=\"px-2\">
				<div class=\"card\">
					<!-- <div class=\"card-header bg-danger\"></div> -->
					<div class=\"card-body sched\">
						<h4 class=\"d-inline float-left text-secondary font-weight-light\">#{$key}</h4>
						<span class=\"d-inline float-right text-primary request-type\"> {$value['category']} </span>
						<br><br>
						<div>
							<h5 class=\"d-inline font-weight-bold\" style=\"font-size: 15pt;\"> {$lycean['first_name']} {$middle_init}. {$lycean['last_name']} </h5>
						</div>
						<div class=\"text-secondary mb-2\"> {$lycean['id_no']} </div>
						<span class=\"mb-2 text-secondary d-inline\" style=\"font-size: 12pt;\">
							<span class=\"font-weight-bold d-inline\">Schedule:</span> " . date('F d, Y h:i A', strtotime($value['meeting_schedule'])) . "
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


	// ACCEPT NEW REQUEST CONSULTATION BY ID
	// -----------------------------------------------------------------
	public function acceptConsultationById($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getAcceptRules())) {
				$data = [
					'status' => 'active',
					'meeting_schedule' => $_GET['meeting_date'] . " " . $_GET['meeting_time'],
					'meeting_link' => $_GET['meeting_link']
				];

				$success1 = $this->consultationsModel
					->where('consultation_no', $id)
					->set($data)->update();

				$consultation = $this->consultationsModel->find($id);
				$success2 = $this->setNotification($consultation, 'accept');

				if ($success1 && $success2) {
					session()->setFlashdata('success', 'Ok');

					// CREATE ACTIVITY LOG
					createLog(
						getIdNo(),
						'CLINIC',
						'Consultations',
						'Accept Consultation',
						"User \"" . getIdNo() . "\" accepted the consultation \"{$id}\""
					);
				} else {
				}
			} else {
				session()->setFlashdata('timeschedule_validation', $this->validator);
			}
		}

		return redirect()->to('consultations');
	}


	// REJECT NEW REQUEST CONSULTATION BY ID
	// -----------------------------------------------------------------
	public function rejectConsultationById($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getRejectRules())) {
				$data = [
					'status' => 'rejected',
					'rejection_message' => $_GET['rejection_message']
				];

				$success1 = $this->consultationsModel
					->where('consultation_no', $id)
					->set($data)->update();

				$consultation = $this->consultationsModel->find($id);
				$success2 = $this->setNotification($consultation, 'reject');

				if ($success1 && $success2) {
					session()->setFlashdata('success', 'Ok');

					// CREATE ACTIVITY LOG
					createLog(
						getIdNo(),
						'CLINIC',
						'Consultations',
						'Reject Consultation',
						"User \"" . getIdNo() . "\" rejected the consultation \"{$id}\""
					);
				} else {
				}
			} else {
			}
		}

		return redirect()->to('consultations');
	}


	// CONSULTATION DONE WITH/WITHOUT FILE UPLOAD
	// -----------------------------------------------------------------
	public function setConsultationToDone($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$success1 = $this->consultationsModel
				->where('consultation_no', $id)
				->set([
					'status' => 'done'
				])->update();

			if ($success1) {
				$consultation = $this->consultationsModel->find($id);
				$success2 = $this->setNotification($consultation, 'consultationDone');
				if ($success2) {
					session()->setFlashdata('success', 'Done');
				}

				// CREATE ACTIVITY LOG
				createLog(
					getIdNo(),
					'CLINIC',
					'Consultations',
					'Done Consultation',
					"User \"" . getIdNo() . "\" set consultation \"{$id}\" to done"
				);
			}
		}

		return redirect()->to('consultations');
	}

	public function uploadMedicalFilesById($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			if ($this->validate($this->getUploadRules())) {
				$success1 = [];
				$success2 = [];
				$files = $this->request->getFiles();
				$consultation = $this->consultationsModel->find($id);

				foreach ($files['medicalfiles'] as $key => $file) {
					$fileName = $file->getName();
					$fileDirectory = $this->baseDir['medical_files'] . $consultation['lycean_id_no'] . '/';

					if ($file->isValid() && !$file->hasMoved()) {
						for ($i = 0; true; $i += 1) {
							if (!file_exists($fileDirectory . $fileName)) {
								$success1[$key] = $file->move($fileDirectory, $fileName);

								$success2[$key] = $this->medicalFilesModel->save([
									'consultation_no' => $id,
									'file_path' => $fileDirectory . $fileName
								]);

								// CREATE ACTIVITY LOG
								createLog(
									getIdNo(),
									'CLINIC',
									'Consultations',
									'Upload File',
									"User \"" . getIdNo() . "\" uploaded a file: \"{$fileName}\" for consultation \"{$id}\""
								);
								break;
							} else {
								$fileName = explode('.', $file->getName())[0] . ' (' . $i . ').' . $file->getExtension();
							}
						}
					}
				}

				$success3 = $this->consultationsModel
					->where('consultation_no', $id)
					->set([
						'status' => 'done'
					])->update();

				if ($this->isSuccess($success1) && $this->isSuccess($success2) && $success3) {
					$consultation = $this->consultationsModel->find($id);
					$success4 = $this->setNotification($consultation, 'consultationDone');
					$success5 = $this->setNotification($consultation, 'consultationSendFile');
					if ($success4 && $success5) {
						session()->setFlashdata('success', 'Done');
					}
				}
			} else {
				session()->setFlashdata('upload_validation', $this->validator->getErrors());
				session()->setFlashdata('consultationNo', $id);
			}
		}

		return redirect()->to('consultations');
	}

	private function isSuccess($success)
	{
		foreach ($success as $succ) {
			if (!$succ) {
				return false;
			}
		}
		return true;
	}


	// SET NOTIFICATION
	// -----------------------------------------------------------------
	private function setNotification($data, $type)
	{
		if ($data['category'] == 'Consultation') {
			$personnel = 'doctor';
			$icon = '<i class="fas fa-comment-medical fa-lg noti-icon" style="color: #7687CD"></i>';
		} else if ($data['category'] == 'Mental Wellness') {
			$personnel = 'guidance counselor';
			$icon = '<i class="fas fa-brain fa-lg noti-icon" style="color: #CC6699"></i>';
		}

		if ($type == 'accept') {
			$info = "The {$personnel} accepted your request";
			$link = $this->lyceanBaseUrl . '/consultation/details/' . $data['consultation_no'];
		} else if ($type == 'reject') {
			$info = "The {$personnel} rejected your request";
			$link = $this->lyceanBaseUrl . '/consultation/details/' . $data['consultation_no'];
		} else if ($type == 'consultationSendFile') {
			$info = 'The documents are ready to view';
			$link = $this->lyceanBaseUrl . '/consultation/details/' . $data['consultation_no'] . '?documents=1';
		} else if ($type == 'consultationDone') {
			$info = 'Your consultation was done';
			$link = $this->lyceanBaseUrl . '/consultation/details/' . $data['consultation_no'];
		}

		return $this->lyceansNotificationModel->save([
			'id_no' => $data['lycean_id_no'],
			'icon' => $icon,
			'info' => $info,
			'status' => 'unread',
			'link' => $link
		]);
	}


	// SET USER ONLINE STATUS STATE
	// -----------------------------------------------------------------
	public function setOnlineStatusState($state)
	{
		if ($state == 'true') {
			session()->set('available', TRUE);
		} else {
			session()->set('available', FALSE);
			// Clear last activity
			$this->userAccountModel
				->where('id_no', getIdNo())
				->set([
					'last_activity' => ''
				])->update();
		}
	}


	// RUN ONLINE STATE
	// -----------------------------------------------------------------
	public function runOnlineState()
	{
		if (session()->get('available') === TRUE) {
			$success = $this->userAccountModel
				->where('id_no', getIdNo())
				->set([
					'last_activity' => date('Y-m-d h:i')
				])->update();

			if ($success) {
			}
		}
	}


	// -----------------------------------------------------------------------------------------


	// RETURN HISTORY VIEWS
	// -----------------------------------------------------------------
	public function history()
	{
		$userInfo = $this->userModel->find(getIdNo());
		$this->data['firstname'] = $userInfo['first_name'];
		// For guidance counselor permission on sidebar
		$this->data['designation'] = $userInfo['designation'];

		// Display page view
		return view('components/consultation/history', $this->data);
	}


	// FETCH ALL HISTORY DATA
	// -----------------------------------------------------------------
	public function fetchAllDoneConsultations()
	{
		$result = array('data' => array());
		$consultations = $this->consultationsModel
			->where('status', 'done')
			->orderBy('created_at', 'desc')->findAll();

		if ($consultations) {
			foreach ($consultations as $key => $value) {
				$lycean = $this->lyceansModel->find($value['lycean_id_no']);
				$health_personnel = $this->userModel->find($value['personnel_id_no']);

				$result['data'][$key] = array(
					$value['consultation_no'],
					date_create($value['created_at'])->format('d-M-Y H:i'),
					"{$health_personnel['first_name']} {$health_personnel['last_name']}",
					"{$lycean['first_name']} {$lycean['last_name']}",
					$lycean['department'],
					"<div align=\"center\">
						<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $value['consultation_no'] . "')\" data-toggle=\"modal\" data-target=\"#viewModal\">View Details</button>
					</div>"
				);
			}
		}

		return json_encode($result);
	}

	public function fetchAllRejectedConsultations()
	{
		$result = array('data' => array());
		$consultations = $this->consultationsModel
			->where('status', 'rejected')
			->orderBy('created_at', 'desc')->findAll();

		if ($consultations) {
			foreach ($consultations as $key => $value) {
				$lycean = $this->lyceansModel->find($value['lycean_id_no']);
				$health_personnel = $this->userModel->find($value['personnel_id_no']);

				$result['data'][$key] = array(
					$value['consultation_no'],
					date_create($value['created_at'])->format('d-M-Y H:i'),
					"{$health_personnel['first_name']} {$health_personnel['last_name']}",
					"{$lycean['first_name']} {$lycean['last_name']}",
					$lycean['department'],
					"<div align=\"center\">
						<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $value['consultation_no'] . "')\" data-toggle=\"modal\" data-target=\"#viewModal\">View Details</button>
					</div>"
				);
			}
		}

		return json_encode($result);
	}

	public function fetchAllCancelledConsultations()
	{
		$result = array('data' => array());
		$consultations = $this->consultationsModel
			->where('status', 'cancelled')
			->orderBy('created_at', 'desc')->findAll();

		if ($consultations) {
			foreach ($consultations as $key => $value) {
				$lycean = $this->lyceansModel->find($value['lycean_id_no']);
				$health_personnel = $this->userModel->find($value['personnel_id_no']);

				$result['data'][$key] = array(
					$value['consultation_no'],
					date_create($value['created_at'])->format('d-M-Y H:i'),
					"{$health_personnel['first_name']} {$health_personnel['last_name']}",
					"{$lycean['first_name']} {$lycean['last_name']}",
					$lycean['department'],
					"<div align=\"center\">
						<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $value['consultation_no'] . "')\" data-toggle=\"modal\" data-target=\"#viewModal\">View Details</button>
					</div>"
				);
			}
		}

		return json_encode($result);
	}


	// CLEAR CONSULTATION HISTORY
	// -----------------------------------------------------------------
	public function clearConsultationHistory()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			if (!isset($_GET['clear_all_history'])) {
				if ($this->validate($this->getClearHistoryRules())) {
					$fromDateRange = $_GET['from_date_range'];
					$toDateRange = $_GET['to_date_range'];

					$toDeleteConsultations = $this->consultationsModel
						->where('created_at >=', $fromDateRange)->where('created_at <=', $toDateRange)
						->where('status', 'done')->orwhere('status', 'cancelled')
						->find();
					if ($toDeleteConsultations) {
						foreach ($toDeleteConsultations as $consultation) {
							$success1 = $this->medicalFilesModel->where('consultation_no', $consultation['consultation_no'])->delete();
							// Delete directory
							if (file_exists($this->baseDir['medical_files'] . $consultation['lycean_id_no'])) {
								$files = glob($this->baseDir['medical_files'] . $consultation['lycean_id_no'] . '/*');

								foreach ($files as $file) {
									unlink($file);
								}

								$success2 =  rmdir($this->baseDir['medical_files'] . $consultation['lycean_id_no']);
							} else {
								$success2 = TRUE;
							}
						}
					} else {
						$success1 = FALSE;
						$success2 = FALSE;
					}

					$success3 = $this->consultationsModel
						->where('created_at >=', $fromDateRange)->where('created_at <=', $toDateRange)
						->where('status', 'done')
						->delete();
					$success3 = $this->consultationsModel
						->where('created_at >=', $fromDateRange)->where('created_at <=', $toDateRange)
						->where('status', 'rejected')
						->delete();
					$success3 = $this->consultationsModel
						->where('created_at >=', $fromDateRange)->where('created_at <=', $toDateRange)
						->where('status', 'cancelled')
						->delete();

					if ($success1 && $success2 && $success3) {
						session()->setFlashdata('success', 'Successfully deleted.');

						// CREATE ACTIVITY LOG
						createLog(
							getIdNo(),
							'CLINIC',
							'Consultations',
							'Clear History',
							"User \"" . getIdNo() . "\" cleared the consultation history from \"{$fromDateRange}\" to \"{$toDateRange}\""
						);
					} else {
						session()->setFlashdata('success', 'No data was changed.');
					}
				} else {
					session()->setFlashdata('clear_validation', $this->validator);
					session()->setFlashdata('getData', json_encode($_GET));
				}
			} else {
				$toDeleteConsultation = $this->consultationsModel
					->where('status', 'done')->orwhere('status', 'rejected')->orwhere('status', 'cancelled')
					->find();
				if ($toDeleteConsultation) {
					foreach ($toDeleteConsultation as $consultation) {
						$success1 = $this->medicalFilesModel
							->where('consultation_no', $consultation['consultation_no'])
							->delete();

						// Delete directory
						if (file_exists($this->baseDir['medical_files'] . $consultation['lycean_id_no'])) {
							$files = glob($this->baseDir['medical_files'] . $consultation['lycean_id_no'] . '/*');

							foreach ($files as $file) {
								unlink($file);
							}

							$success2 =  rmdir($this->baseDir['medical_files'] . $consultation['lycean_id_no']);
						} else {
							$success2 = TRUE;
						}
					}
				} else {
					$success1 = FALSE;
					$success2 = FALSE;
				}

				$success3 = $this->consultationsModel
					->where('status', 'done')->orwhere('status', 'rejected')->orwhere('status', 'cancelled')
					->delete();

				if ($success1 && $success2 && $success3) {
					session()->setFlashdata('success', 'Successfully deleted.');

					// CREATE ACTIVITY LOG
					createLog(
						getIdNo(),
						'CLINIC',
						'Consultations',
						'Clear History',
						"User \"" . getIdNo() . "\" cleared all the consultation history"
					);
				} else {
					session()->setFlashdata('success', 'No data was changed.');
				}
			}
		}

		return redirect()->to('consultations/history');
	}

	// CONSULTATION DETAILS MODEL
	// -----------------------------------------------------------------
	public function details($id)
	{
		$consultation = $this->consultationsModel->find($id);

		if ($consultation) {
			$data = [
				'consultation_id' => $id,
				'date_of_request' => date_create($consultation['created_at'])->format('d-M-Y H:i'),
				'time' => $consultation['meeting_schedule'] != '' ? date_create($consultation['meeting_schedule'])->format('h:i a') : '---',
				'date' => $consultation['meeting_schedule'] != '' ? date_create($consultation['meeting_schedule'])->format('F d, Y') : '---',
				'meeting_link' => [
					'href' => $consultation['meeting_link'] != '' ? "href=\"{$consultation['meeting_link']}\"" : '',
					'text' => $consultation['meeting_link'] != '' ? "<u>{$consultation['meeting_link']}</u>" : '---'
				],
				'concern_message' => $consultation['message'] != '' ? $consultation['message'] : '---',
				'rejection_message' => $consultation['rejection_message'] != '' ? $consultation['rejection_message'] : '---',
				'category' => $consultation['category']
			];
		} else {
		}

		return json_encode($data);
	}


	// -----------------------------------------------------------------------------------------


	// RETURN REPORT VIEWS
	// -----------------------------------------------------------------
	public function report()
	{
		// $userInfo = $this->userModel->find(getIdNo());
		// // For guidance counselor permission on sidebar
		// $this->data['designation'] = $userInfo['designation'];

		// Display page view
		return view('components/consultation/report', $this->data);
	}


	// FETCH YEAR ON CONSULTATIONS
	// -----------------------------------------------------------------
	public function fetchYearOnConsultations()
	{
		$result = "<option selected value=\"\"> --- </option>";
		$consultations = $this->consultationsModel
			->where('status', 'done')->orwhere('status', 'rejected')->orwhere('status', 'cancelled')
			->findAll();

		foreach ($consultations as $consultation) {
			if (!str_contains($result, "value=\"" . date_create($consultation['created_at'])->format('Y') . "\"")) {
				$result .= "<option value=\"" . date_create($consultation['created_at'])->format('Y') . "\"> " . date_create($consultation['created_at'])->format('Y') . " </option>";
			}
		}

		return $result;
	}


	// FETCH MONTH ON CONSULTATIONS
	// -----------------------------------------------------------------
	public function fetchMonthOnConsultations()
	{
		$result = "<option selected value=\"\"> --- </option>";
		$consultations = $this->consultationsModel
			->where('status', 'done')->orwhere('status', 'rejected')->orwhere('status', 'cancelled')
			->findAll();

		foreach ($consultations as $consultation) {
			if (!str_contains($result, "value=\"" . date_create($consultation['created_at'])->format('m') . "\"")) {
				$result .= "<option value=\"" . date_create($consultation['created_at'])->format('m') . "\"> " . date_create($consultation['created_at'])->format('M') . " </option>";
			}
		}

		return $result;
	}
}
