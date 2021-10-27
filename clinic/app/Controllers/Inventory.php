<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Inventory extends BaseController
{
	public function __construct()
	{
		helper('useraccount');
		// Page title
		$this->data['page_title'] = 'Inventory';
		// User firstname
		$this->data['firstname'] = getUserFirstname();
		// User ID No.
		$this->data['idNo'] = getIdNo();
		// User designation
		$this->data['designation'] = getUserDesignation();
	}


	// VALIDATION RULES
	// -----------------------------------------------------------------
	private function getMedicineRules($id = null)
	{
		if ($id !== null) {
			$medicine = $this->medicinesModel->find($id);
			$optional_idUnq = ',product_id,' . $medicine['product_id'];
		} else {
			$optional_idUnq = "";
		}

		return  [
			'product_id' => [
				'rules' => 'required|max_length[45]|is_unique[medicines.product_id' . $optional_idUnq . ']',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
					'is_unique' => 'Product ID already exists.'
				]
			],
			'manufacturer' => [
				'rules' => 'required|max_length[45]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.'
				]
			],
			'generic_name' => [
				'rules' => 'required|max_length[45]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.'
				]
			],
			'drug_class' => [
				'rules' => 'required|max_length[45]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.'
				]
			],
			'dosage' => [
				'rules' => 'required|max_length[45]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.'
				]
			],
		];
	}


	// RETURN VIEWS
	// -----------------------------------------------------------------
	public function medicines($sub)
	{
		if ($sub == 'items') {
			// Display page view
			return view('components/inventory/medicines/item_management', $this->data);
		} else if ($sub == 'batches') {
			// Display page view
			return view('components/inventory/medicines/batch_management', $this->data);
		} else if ($sub == 'stocks') {
			// Display page view
			return view('components/inventory/medicines/stocks', $this->data);
		}
	}

	public function equipments()
	{
		// Display page view
		return view('components/inventory/equipments/item_management', $this->data);
	}


	// FETCH ALL DATA
	// ---------------------------------------------------------
	public function fetchAllMedicines()
	{
		$result = array('data' => array());
		$medicines = $this->medicinesModel->findAll();

		foreach ($medicines as $key => $value) {
			$result['data'][$key] = array(
				$value['product_id'],
				$value['manufacturer'],
				$value['generic_name'],
				$value['drug_class'],
				$value['dosage'],
				"<div align=\"center\">
					<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $value['product_id'] . "')\" data-target=\"#modifyModal\" data-toggle=\"modal\">Modify</button>
					<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $value['product_id'] . "')\" data-target=\"#deleteModal\" data-toggle=\"modal\">Delete</button>
				</div>"
			);
		}

		return json_encode($result);
	}

	public function fetchAllBatches()
	{
		$result = array('data' => array());
		$batches = $this->batchesModel->findAll();

		foreach ($batches as $key => $value) {
			$medicine = $this->medicinesModel->find($value['product_id']);
			$product_name = "{$medicine['manufacturer']} - {$medicine['generic_name']} {$medicine['dosage']}";

			$result['data'][$key] = array(
				$value['batch_id'],
				$product_name,
				$value['stock_in'],
				date_create($value['expiration_date'])->format('M d, Y'),
				"<div align=\"center\">
					<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $value['product_id'] . "')\" data-target=\"#modifyModal\" data-toggle=\"modal\">Modify</button>
					<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $value['product_id'] . "')\" data-target=\"#deleteModal\" data-toggle=\"modal\">Delete</button>
				</div>"
			);
		}

		return json_encode($result);
	}

	public function fetchStockManagement()
	{
	}


	// FETCH DATA BY ID
	// ---------------------------------------------------------
	public function fetchMedicineById($id)
	{
		$medicine = $this->medicinesModel->find($id);
		$result = [];

		if ($medicine) {
			$result = [
				'product_id' => $medicine['product_id'],
				'manufacturer' => $medicine['manufacturer'],
				'generic_name' => $medicine['generic_name'],
				'drug_class' => $medicine['drug_class'],
				'dosage' => $medicine['dosage'],
			];
		}

		return json_encode($result);
	}

	public function fetchBatchById($id)
	{
		$batch = $this->batchesModel->find($id);
		$result = [];

		if ($batch) {
			$medicine = $this->medicinesModel->find($batch['product_id']);
			$product_name = "{$medicine['manufacturer']} - {$medicine['generic_name']} {$medicine['dosage']}";
			$result = [
				'batch_id' => $batch['batch_id'],
				'product_name' => $product_name,
				'stock_in' => $batch['stock_in'],
				'expiration' => $batch['expiration'],
			];
		}

		return json_encode($result);
	}


	// INSERT DATA
	// ---------------------------------------------------------
	public function addMedicine()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getMedicineRules())) {
				$data = [
					'product_id' => htmlspecialchars($_GET['product_id']),
					'manufacturer' => htmlspecialchars($_GET['manufacturer']),
					'generic_name' => htmlspecialchars($_GET['generic_name']),
					'drug_class' => htmlspecialchars($_GET['drug_class']),
					'dosage' => htmlspecialchars($_GET['dosage'])
				];

				$success = $this->medicinessModel->save($data);

				if ($success) {
					// Create flashdata for database query status
					session()->setFlashdata('success', 'Successfully added.');
				} else {
				}
			} else {
				session()->setFlashdata('add_validation', $this->validator);
				session()->setFlashdata('getData', json_encode($_GET));
			}
		}

		return redirect()->to('inventory/medicines/items');
	}


	// UPDATE DATA
	// ---------------------------------------------------------
	public function modifyMedicine($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getMedicineRules($id))) {
				$data = [
					'manufacturer' => htmlspecialchars($_GET['manufacturer']),
					'generic_name' => htmlspecialchars($_GET['generic_name']),
					'drug_class' => htmlspecialchars($_GET['drug_class']),
					'dosage' => htmlspecialchars($_GET['dosage'])
				];

				$success = $this->medicinesModel->where('product_id', $id)
					->set($data)->update();

				if ($success) {
					// Create flashdata for database query status
					session()->setFlashdata('success', 'Successfully updated.');
				} else {
				}
			} else {
				session()->setFlashdata('mod_validation', $this->validator);
				session()->setFlashdata('getData', json_encode($_GET));
				session()->setFlashdata('product_id', $id);
			}
		}

		return redirect()->to('inventory/medicines/items');
	}
}
