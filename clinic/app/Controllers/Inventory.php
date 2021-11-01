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

	private function getBatchRules($id = null)
	{
		if ($id !== null) {
			$batch = $this->batchesModel->find($id);
			$optional_idUnq = ',product_id,' . $batch['product_id'];
		} else {
			$optional_idUnq = "";
		}

		return  [
			'batch_id' => [
				'rules' => 'required|max_length[45]|is_unique[batches.batch_id' . $optional_idUnq . ']',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.',
					'is_unique' => 'Product ID already exists.'
				]
			],
			'product_name' => [
				'rules' => 'required|max_length[45]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.'
				]
			],
			'stock_in' => [
				'rules' => 'required|max_length[45]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.'
				]
			],
			'expiration_date' => [
				'rules' => 'required|valid_date[Y-m-d]',
				'errors' => [
					'required' => '- Required',
					'valid_date' => 'Invalid date format.'
				]
			]
		];
	}

	private function getStockManagementRules()
	{
		return  [
			'stock_in' => [
				'rules' => 'required|max_length[45]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.'
				]
				],
			'batch_id' => [
				'rules' => 'required|max_length[45]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.'
				]
			],
			'product_name' => [
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
					<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $value['batch_id'] . "')\" data-target=\"#modifyModal\" data-toggle=\"modal\">Modify</button>
					<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $value['batch_id'] . "')\" data-target=\"#deleteModal\" data-toggle=\"modal\">Delete</button>
				</div>"
			);
		}

		return json_encode($result);
	}

	public function fetchStockManagementByBatch()
	{
		$result = array('data' => array());
		$batches = $this->batchesModel->findAll();

		foreach ($batches as $key => $value) {
			$medicines = $this->medicinesModel->find($value['product_id']);
			$product_name = "{$medicines['manufacturer']} - {$medicines['generic_name']} {$medicines['dosage']}";
			$is_expired = $value['expiration_date'] < date('Y-m-d') ? 'YES' : 'NO';

			$result['data'][$key] = array(
				$value['batch_id'],
				$product_name,
				$value['stock_in'],
				$value['stock_out'],
				$is_expired,
				$value['stock_in'] - $value['stock_out']
			);
		}

		return json_encode($result);
	}

	public function fetchStockManagement()
	{
		$result = array('data' => array());
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
				$stock_available = $batch['stock_in'] - $batch['stock_out'];

				if ($batch['expiration_date'] < date('Y-m-d')) {
					$expired_count += $stock_available > 0 ? $stock_available : 0;
				}
			}

			$result['data'][$key] = array(
				$product_name,
				$stock_in,
				$stock_out,
				$expired_count,
				$stock_in - ($stock_out + $expired_count)

				// "<div align=\"center\">
				// 	<button type=\"button\" class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#stockoutModal\">Stock Out</button>
				// </div>"
			);
		}

		return json_encode($result);
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
			$result = [
				'batch_id' => $batch['batch_id'],
				'product_name' => $batch['product_id'],
				'stock_in' => $batch['stock_in'],
				'expiration_date' => $batch['expiration_date'],
			];
		}

		return json_encode($result);
	}


	// FETCH ALL MEDICINE'S PRODUCT NAME
	// ---------------------------------------------------------
	public function fetchAllMedicineProductName()
	{
		$medicines = $this->medicinesModel->findAll();
		$result = "<option value=\"\" selected=\"selected\">---Select---</option>";

		if ($medicines) {
			foreach ($medicines as $medicine) {
				$product_name = "{$medicine['manufacturer']} - {$medicine['generic_name']} {$medicine['dosage']}";
				$result .= "<option value=\"{$medicine['product_id']}\"> {$product_name} </option>";
			}
		}

		return json_encode($result);
	}


	// FETCH BATCH BY PRODUCT ID
	// ---------------------------------------------------------
	public function fetchBatchByProductID($id='')
	{
		$batches = $this->batchesModel->where('product_id', $id)->findAll();
		$result = "<option value=\"\" selected=\"selected\">---Select---</option>";

		if ($batches) {
			foreach ($batches as $batch) {
				$result .= "<option value=\"{$batch['batch_id']}\"> {$batch['batch_id']} </option>";
			}
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

				$success = $this->medicinesModel->save($data);

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

	public function addBatch()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getBatchRules())) {
				$data = [
					'batch_id' => htmlspecialchars($_GET['batch_id']),
					'product_id' => htmlspecialchars($_GET['product_name']),
					'stock_in' => htmlspecialchars($_GET['stock_in']),
					'expiration_date' => htmlspecialchars($_GET['expiration_date'])
				];

				$success = $this->batchesModel->save($data);

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

		return redirect()->to('inventory/medicines/batches');
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

	public function modifyBatch($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getBatchRules($id))) {
				$data = [
					'product_id' => htmlspecialchars($_GET['product_name']),
					'stock_in' => htmlspecialchars($_GET['stock_in']),
					'expiration_date' => htmlspecialchars($_GET['expiration_date'])
				];

				$success = $this->batchesModel->where('batch_id', $id)
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

		return redirect()->to('inventory/medicines/batches');
	}


	// DELETE DATA
	// ---------------------------------------------------------
	public function deleteMedicine($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$success1 = $this->batchesModel->where('product_id', $id)->delete();
			$success2 = $this->medicinesModel->delete($id);

			if ($success1 && $success2) {
				// Create flashdata for database query status
				session()->setFlashdata('success', 'Successfully deleted.');
			} else {
			}
		}

		return redirect()->to('inventory/medicines/items');
	}

	public function deleteBatch($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$success = $this->batchesModel->delete($id);

			if ($success) {
				// Create flashdata for database query status
				session()->setFlashdata('success', 'Successfully deleted.');
			} else {
			}
		}

		return redirect()->to('inventory/medicines/batches');
	}

	// STOCK OUT PRODUCT
	// ---------------------------------------------------------
	public function stockOut()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getStockManagementRules())) {
				$data = [
					'batch_id' => htmlspecialchars($_GET['batch_id']),
					'product_id' => htmlspecialchars($_GET['product_name']),
					'stock_out' => htmlspecialchars($_GET['stock_out'])
				];

				$success = $this->batchesModel->save($data);

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

		return redirect()->to('inventory/medicines/stocks');
	}
}
