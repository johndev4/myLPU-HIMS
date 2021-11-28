<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function __construct()
	{
		helper('useraccount');
		// Page title
		$this->data['page_title'] = 'Dashboard';
		// User firstname
		$this->data['firstname'] = getUserFirstname();
		// User ID No.
		$this->data['idNo'] = getIdNo();
		// User designation
		$this->data['designation'] = getUserDesignation();
	}


	// RETURN VIEWS
	// -----------------------------------------------------------------
	public function index()
	{
		// Display page view
		return view('components/dashboard', $this->data);
	}


	// COUNT DATA FOR DASHBOARD
	// ---------------------------------------------------------
	public function countNewRequestConsultations()
	{
		if (getDesignation() == 'Guidance Counselor') {
			$consultations = $this->consultationsModel
				->where('status', 'pending')
				->where('personnel_id_no', getIdNo())
				->where('category', 'Mental Wellness')
				->find();
		} else {
			$consultations = $this->consultationsModel
				->where('status', 'pending')
				->where('personnel_id_no', getIdNo())
				->where('category', 'Consultation')
				->find();
		}

		echo count($consultations);
	}

	public function countScheduledConsultations()
	{
		if (getDesignation() == 'Guidance Counselor') {
			$consultations = $this->consultationsModel
				->where('status', 'active')
				->where('personnel_id_no', getIdNo())
				->where('category', 'Mental Wellness')
				->find();
		} else {
			$consultations = $this->consultationsModel
				->where('status', 'active')
				->where('personnel_id_no', getIdNo())
				->where('category', 'Consultation')
				->find();
		}

		echo count($consultations);
	}


	// FETCH DATA FOR DASHBOARD
	// ---------------------------------------------------------
	public function fetchExpiredMedicine()
	{
		$result = "";
		$medicines = $this->medicinesModel->findAll();

		foreach ($medicines as $key => $value) {
			$batches = $this->batchesModel->where('product_id', $value['product_id'])->findAll();
			$product_name = "{$value['manufacturer']} - {$value['generic_name']} {$value['dosage']}";
			$stock_in = 0;
			$stock_out = 0;
			$expired_count = 0;

			foreach ($batches as $batch) {
				$stock_in += $batch['stock_in'];
				$stock_out += $batch['stock_out'];
				$stock_available = ($batch['stock_in'] - $batch['stock_out']);

				if ($batch['expiration_date'] < date('Y-m-d')) {
					$expired_count += $stock_available > 0 ? $stock_available : 0;
				}
			}

			if ($expired_count !== 0) {
				$result = "<li>
							<div class=\"row\">
								<div class=\"col-9\">
									<p>{$product_name}</p>
								</div>
								<div class=\"col-3 text-center\">
									<span class=\"badge badge-danger\">{$expired_count}</span>
								</div>
							</div>
						</li>
						<hr>";
			}
		}

		return $result;
	}

	public function fetchLowStockMedicine()
	{
		$result = "";
		$medicines = $this->medicinesModel->findAll();

		foreach ($medicines as $key => $value) {
			$batches = $this->batchesModel->where('product_id', $value['product_id'])->findAll();
			$product_name = "{$value['manufacturer']} - {$value['generic_name']} {$value['dosage']}";
			$stock_in = 0;
			$stock_out = 0;
			$expired_count = 0;

			foreach ($batches as $batch) {
				$stock_in += $batch['stock_in'];
				$stock_out += $batch['stock_out'];
			}

			$stock_available = ($stock_in - ($stock_out + $expired_count));
			if ($stock_available < ($stock_in * 0.15)) {
				$result = "<li>
							<div class=\"row\">
								<div class=\"col-9\">
									<p>{$product_name}</p>
								</div>
								<div class=\"col-3 text-center\">
									<span class=\"badge badge-warning\">{$stock_available}</span>
								</div>
							</div>
						</li>
						<hr>";
			}
		}

		return $result;
	}

	// public function fetchActiveConsultations()
	// {
	// 	$consultations = $this->consultationsModel
	// 		->where('status', 'done')->where('personnel_id_no', getIdNo())
	// 		->findAll();

	// 	foreach ($consultations as $consultation) {
	// 		$scheduleDate = date_create($consultation['meeting_schedule'])->format('d-M-Y');
	// 		$scheduleTimeFrom = date_create($consultation['meeting_schedule'])->format('H:i');
	// 		$scheduleTimeTo = date('H:i', strtotime($consultation['meeting_schedule']) + 1800);
	// 	}
	// }











	// public function countLyceanRecords(){echo $this->lyceansModel->countAll();}
}
