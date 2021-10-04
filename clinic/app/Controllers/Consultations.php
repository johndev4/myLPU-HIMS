<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Consultations extends BaseController
{
	public function __construct()
	{
		// Page title
		$this->data['page_title'] = 'Consultations';
	}


	// RETURN VIEWS
	// -----------------------------------------------------------------
	public function index()
	{
		// Display page view
		return view('components/consultations', $this->data);
	}


	// FETCH ALL NEW REQUEST CONSULTATIONS
	// -----------------------------------------------------------------
	public function fetchAllRequestConsultations()
	{
		$pendingConsultations = $this->consultationsModel->where('status', 'pending')->findAll();
		$result = "";

		foreach ($pendingConsultations as $key => $value) {
			$lycean = $this->lyceansModel->find($value['lycean_id_no']);
			$middle_init = $lycean['middle_name'];

			$data = "
			<div class=\"col-12 d-flex justify-content-center\">
				<div class=\"card\" style=\"width: 20rem;\">
					<div class=\"card-body\">
						<div>
							<span class=\"card-title mb-2\" style=\"font-size: 12pt;\"> ". date('F d, Y h:m A', strtotime($value['created_at'])) ." </span>
							<span class=\"d-inline float-right text-primary request-type\">Consultation</span>
						</div>
						<div class=\"card-text\"><span class=\"font-weight-bold\"> {$lycean['first_name']} {$middle_init}. {$lycean['last_name']} </span></div>
						<div class=\"card-text\"><span> {$lycean['id_no']} </span></div>
						<p class=\"card-text text-justify\"> {$value['message']} </p>
						<a href=\"#\" class=\"btn text-primary d-block accept-button\" data-target=\"#acceptModal\" data-toggle=\"modal\">Accept</a>
						<a href=\"#\" class=\"btn d-block text-secondary font-weight-bold reject-button\" data-target=\"#rejectModal\" data-toggle=\"modal\">Reject</a>
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
		->where('username', session()->get('uid'))
		->where('password', session()->get('pwd'))->find();
		$scheduledConsultations = $this->consultationsModel
			->where('status', 'active')
			->where('personnel_id_no', $user[0]['id_no'])
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
							<span class=\"font-weight-bold d-inline\">Schedule:</span> ". date('F d, Y h:m A', strtotime($value['schedule'])) ."
						</span>

						<a href=\"#\" class=\"btn text-primary d-block mt-3 accept-button\" data-target=\"#doneModal\" data-toggle=\"modal\">Done</a>
					</div>
				</div>
			</div>
			";

			$result .= $data;
		}

		return json_encode(['result' => $result, 'count' => count($scheduledConsultations)]);
	}
}
