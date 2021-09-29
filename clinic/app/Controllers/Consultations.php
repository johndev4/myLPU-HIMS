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
							<span class=\"card-title mb-2\" style=\"font-size: 12pt;\"> {$value['created_at']} </span>
							<span class=\"d-inline float-right text-primary request-type\">Consultation</span>
						</div>
						<div class=\"card-text\"><span class=\"font-weight-bold\"> {$lycean['first_name']} {$middle_init}. {$lycean['last_name']} </span></div>
						<div class=\"card-text\"><span> {$lycean['id_no']} </span></div>
						<p class=\"card-text text-justify\"> {$value['message']} </p>
						<a href=\"#\" class=\"btn text-primary d-block accept-button\">Accept</a>
						<a href=\"#\" class=\"btn d-block text-secondary font-weight-bold reject-button\">Reject</a>
					</div>
				</div>
			</div>
			";

			$result .= $data;
		}

		// print_r($pendingConsultations);
		return $result;
	}


	// FETCH ALL SCHEDULED CONSULTATIONS
	// -----------------------------------------------------------------
	public function fetchAllScheduledConsultations()
	{
		$scheduledConsultations = $this->consultationsModel->where('status', 'active')->findAll();
		$result = "";

		foreach ($scheduledConsultations as $key => $value) {
			$lycean = $this->lyceansModel->find($value['lycean_id_no']);
			$middle_init = $lycean['middle_name'];

			$data = "
			<div class=\"col-12 d-flex justify-content-center\">
				<div class=\"card\" style=\"width: 20rem;\">
					<div class=\"card-body\">
						<div>
							<span class=\"card-title mb-2\" style=\"font-size: 12pt;\"> {$value['created_at']} </span>
							<span class=\"d-inline float-right text-primary request-type\">Consultation</span>
						</div>
						<div class=\"card-text\"><span class=\"font-weight-bold\"> {$lycean['first_name']} {$middle_init}. {$lycean['last_name']} </span></div>
						<div class=\"card-text\"><span> {$lycean['id_no']} </span></div>
						<p class=\"card-text text-justify\"> {$value['message']} </p>
						<a href=\"#\" class=\"btn text-primary d-block accept-button\">Accept</a>
						<a href=\"#\" class=\"btn d-block text-secondary font-weight-bold reject-button\">Reject</a>
					</div>
				</div>
			</div>
			";

			$result .= $data;
		}

		// print_r($pendingConsultations);
		return $result;
	}
}
