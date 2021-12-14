<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Inventory extends BaseController
{
	public function __construct()
	{
		helper(['useraccount', 'activitylogs']);
		// Page title
		$this->data['page_title'] = 'Inventory';
		// User fullname
		$this->data['fullname'] = getUserFullname();
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
				'rules' => 'required|max_length[100]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.'
				]
			],
			'brand_name' => [
				'rules' => 'required|max_length[45]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.'
				]
			],
			'drug_class' => [
				'rules' => 'required|max_length[100]',
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
				'rules' => 'required|numeric',
				'errors' => [
					'required' => '- Required',
					'numeric' => 'Must only contain numeric values.'
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
			'stock_out' => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => '- Required',
					'numeric' => 'Must only contain numeric values.'
				]
			],
			'product_name' => [
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
		];
	}

	private function getEquipmentRules($id = null)
	{
		if ($id !== null) {
			$equipment = $this->equipmentsModel->find($id);
			$optional_idUnq = ',product_id,' . $equipment['product_id'];
		} else {
			$optional_idUnq = "";
		}

		return  [
			'product_id' => [
				'rules' => 'required|max_length[45]|is_unique[equipments.product_id' . $optional_idUnq . ']',
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
			'qty' => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => '- Required',
					'numeric' => 'Must only contain numeric values.'
				]
			]
		];
	}

	private function getReturnRules()
	{
		return  [
			'product_name' => [
				'rules' => 'required|max_length[45]',
				'errors' => [
					'required' => '- Required',
					'max_length' => 'Max length exceeded.'
				]
			],
			'qty' => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => '- Required',
					'numeric' => 'Must only contain numeric values.'
				]
			]
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
				$value['brand_name'],
				$value['drug_class'],
				$value['dosage'],
				"<div align=\"center\">
					<button type=\"button\" class=\"btn btn-default mb-1\" onclick=\"retrieveData('" . $value['product_id'] . "')\" data-target=\"#modifyModal\" data-toggle=\"modal\">Modify</button>
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
			$product_name = "{$medicine['manufacturer']} - {$medicine['generic_name']} {$medicine['brand_name']} ({$medicine['dosage']})";

			$result['data'][$key] = array(
				$value['batch_id'],
				$product_name,
				date_create($value['expiration_date'])->format('d-M-Y'),
				date_create($value['created_at'])->format('d-M-Y'),
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

		foreach ($batches as $key => $batch) {
			$medicine = $this->medicinesModel->find($batch['product_id']);
			$product_name = "{$medicine['manufacturer']} - {$medicine['generic_name']} {$medicine['brand_name']} ({$medicine['dosage']})";

			$is_expired = strtotime($batch['expiration_date']) <= strtotime('now') ? TRUE : FALSE;
			$stock_available = ($batch['stock_in'] - $batch['stock_out']);

			// Check low stock
			if ($is_expired) {
				$stockBadge = " <span class=\"badge badge-danger\">EXPIRED!</span>";
			} else if ($stock_available <= ($batch['stock_in'] * $this->lowStockPercentage)) {
				$stockBadge = " <span class=\"badge badge-warning\">LOW!</span>";
			} else {
				$stockBadge = "";
			}

			$result['data'][$key] = array(
				$batch['batch_id'],
				$product_name,
				$batch['stock_in'],
				$batch['stock_out'],
				$stock_available . $stockBadge
			);
		}

		return json_encode($result);
	}

	public function fetchStockManagement()
	{
		$result = array('data' => array());
		$medicines = $this->medicinesModel->findAll();

		foreach ($medicines as $key => $medicine) {
			$product_name = "{$medicine['manufacturer']} - {$medicine['generic_name']} {$medicine['brand_name']} ({$medicine['dosage']})";

			$batches = $this->batchesModel->where('product_id', $medicine['product_id'])->findAll();
			$stock_in = 0;
			$stock_out = 0;
			$expired_count = 0;
			foreach ($batches as $batch) {
				$stock_in += $batch['stock_in'];
				$stock_out += $batch['stock_out'];

				if ($batch['expiration_date'] < date('Y-m-d')) {
					$expired_count += ($batch['stock_in'] - $batch['stock_out']);
				}
			}

			$stock_available = ($stock_in - ($stock_out + $expired_count));

			// Check low stock
			if ($stock_available <= ($stock_in * $this->lowStockPercentage)) {
				$stockBadge = " <span class=\"badge badge-warning\">LOW!</span>";
			} else {
				$stockBadge = "";
			}

			$result['data'][$key] = array(
				$product_name,
				$stock_in,
				$stock_out,
				$expired_count,
				$stock_in - ($stock_out + $expired_count) . $stockBadge
			);
		}

		return json_encode($result);
	}

	public function fetchAllEquipments()
	{
		$result = array('data' => array());
		$equipments = $this->equipmentsModel->findAll();

		foreach ($equipments as $key => $value) {
			$result['data'][$key] = array(
				$value['product_id'],
				$value['product_name'],
				$value['qty'],
				date_create($value['created_at'])->format('d-M-Y'),
				"<div align=\"center\">
					<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $value['product_id'] . "')\" data-target=\"#modifyModal\" data-toggle=\"modal\">Modify</button>
					<button type=\"button\" class=\"btn btn-default\" onclick=\"retrieveData('" . $value['product_id'] . "')\" data-target=\"#deleteModal\" data-toggle=\"modal\">Delete</button>
				</div>"
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
				'brand_name' => $medicine['brand_name'],
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
			// $medicine = $this->medicinesModel->find($batch['product_id']);
			$result = [
				'batch_id' => $batch['batch_id'],
				'product_name' => $batch['product_id'],
				'stock_in' => $batch['stock_in'],
				'expiration_date' => $batch['expiration_date'],
			];
		}

		return json_encode($result);
	}

	public function fetchEquipmentById($id)
	{
		$equipment = $this->equipmentsModel->find($id);
		$result = [];

		if ($equipment) {
			$result = [
				'product_id' => $equipment['product_id'],
				'product_name' => $equipment['product_name'],
				'qty' => $equipment['qty']
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
				$batches = $this->batchesModel->where('product_id', $medicine['product_id'])->findAll();
				$stock_in = 0;
				$stock_out = 0;
				$expired_count = 0;
				foreach ($batches as $batch) {
					$stock_in += $batch['stock_in'];
					$stock_out += $batch['stock_out'];

					if ($batch['expiration_date'] < date('Y-m-d')) {
						$expired_count += ($batch['stock_in'] - $batch['stock_out']);
					}
				}

				$stock_available = ($stock_in - ($stock_out + $expired_count));

				$product_name = "{$medicine['manufacturer']} - {$medicine['generic_name']} {$medicine['brand_name']} ({$medicine['dosage']})";
				$result .= "<option value=\"{$medicine['product_id']}\"> {$product_name} - ({$stock_available}) </option>";
			}
		}

		return json_encode($result);
	}


	// FETCH BATCH BY PRODUCT ID
	// ---------------------------------------------------------
	public function fetchBatchByProductID($id = '')
	{
		$batches = $this->batchesModel->where('product_id', $id)->findAll();
		$result = "<option value=\"\" selected=\"selected\">---Select---</option>";

		if ($batches) {
			foreach ($batches as $batch) {
				$stock_available = ($batch['stock_in'] - $batch['stock_out']);
				$is_expired = strtotime($batch['expiration_date']) <= strtotime('now') ? TRUE : FALSE;

				if (!$is_expired) {
					$result .= "<option value=\"{$batch['batch_id']}\"> {$batch['batch_id']} - ({$stock_available}) </option>";
				}
			}
		}

		return json_encode($result);
	}


	// FETCH ALL EQUIPMENT'S PRODUCT NAME
	// ---------------------------------------------------------
	public function fetchAllEquipmentProductName()
	{
		$equipments = $this->equipmentsModel->findAll();
		$result = "<option value=\"\" selected=\"selected\">---Select---</option>";

		if ($equipments) {
			foreach ($equipments as $equipment) {
				$result .= "<option value=\"{$equipment['product_id']}\"> {$equipment['product_name']} - ({$equipment['qty']}) </option>";
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
					'brand_name' => htmlspecialchars($_GET['brand_name']),
					'drug_class' => htmlspecialchars($_GET['drug_class']),
					'dosage' => htmlspecialchars($_GET['dosage'])
				];

				$success = $this->medicinesModel->save($data);

				if ($success) {
					// Create flashdata for database query status
					session()->setFlashdata('success', 'Successfully added.');

					// CREATE ACTIVITY LOG
					createLog(
						getIdNo(),
						'CLINIC',
						'Inventory',
						'Add Medicine',
						"User \"" . getIdNo() . "\" added a medicine with product_id: \"{$data['product_id']}\""
					);
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

					// CREATE ACTIVITY LOG
					createLog(
						getIdNo(),
						'CLINIC',
						'Inventory',
						'Add Batch',
						"User \"" . getIdNo() . "\" added a batch of medicine \"{$data['product_id']}\" with batch_id: \"{$data['batch_id']}\""
					);
				} else {
				}
			} else {
				session()->setFlashdata('add_validation', $this->validator);
				session()->setFlashdata('getData', json_encode($_GET));
			}
		}

		return redirect()->to('inventory/medicines/batches');
	}

	public function addEquipment()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getEquipmentRules())) {
				$data = [
					'product_id' => htmlspecialchars($_GET['product_id']),
					'product_name' => htmlspecialchars($_GET['product_name']),
					'qty' => htmlspecialchars($_GET['qty'])
				];

				$success = $this->equipmentsModel->save($data);

				if ($success) {
					// Create flashdata for database query status
					session()->setFlashdata('success', 'Successfully added.');

					// CREATE ACTIVITY LOG
					createLog(
						getIdNo(),
						'CLINIC',
						'Inventory',
						'Add Equipment',
						"User \"" . getIdNo() . "\" added an equipment with product_id: \"{$data['product_id']}\""
					);
				} else {
				}
			} else {
				session()->setFlashdata('add_validation', $this->validator);
				session()->setFlashdata('getData', json_encode($_GET));
			}
		}

		return redirect()->to('inventory/equipments');
	}


	// UPDATE DATA
	// ---------------------------------------------------------
	public function modifyMedicine($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getMedicineRules($id))) {
				// TEMP DATA FOR ACTIVITY LOG
				$tempData = $this->medicinesModel->find($id);

				$data = [
					'manufacturer' => htmlspecialchars($_GET['manufacturer']),
					'generic_name' => htmlspecialchars($_GET['generic_name']),
					'brand_name' => htmlspecialchars($_GET['brand_name']),
					'drug_class' => htmlspecialchars($_GET['drug_class']),
					'dosage' => htmlspecialchars($_GET['dosage'])
				];

				$success = $this->medicinesModel->where('product_id', $id)
					->set($data)->update();

				if ($success) {
					// Create flashdata for database query status
					session()->setFlashdata('success', 'Successfully updated.');

					// CREATE ACTIVITY LOG
					foreach ($data as $key => $value) {
						if ($tempData[$key] != $value) {
							createLog(
								getIdNo(),
								'CLINIC',
								'Inventory',
								'Modify Medicine',
								"User \"" . getIdNo() . "\" set {$key} field to \"{$value}\" of medicine \"{$id}\""
							);
						}
					}
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
				// TEMP DATA FOR ACTIVITY LOG
				$tempData = $this->batchesModel->find($id);

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

					// CREATE ACTIVITY LOG
					foreach ($data as $key => $value) {
						if ($tempData[$key] != $value) {
							createLog(
								getIdNo(),
								'CLINIC',
								'Inventory',
								'Modify Batch',
								"User \"" . getIdNo() . "\" set {$key} field to \"{$value}\" of batch \"{$id}\" of medicine \"{$data['product_id']}\""
							);
						}
					}
				} else {
				}
			} else {
				session()->setFlashdata('mod_validation', $this->validator);
				session()->setFlashdata('getData', json_encode($_GET));
				session()->setFlashdata('batch_id', $id);
			}
		}

		return redirect()->to('inventory/medicines/batches');
	}

	public function modifyEquipment($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getEquipmentRules($id))) {
				// TEMP DATA FOR ACTIVITY LOG
				$tempData = $this->equipmentsModel->find($id);

				$data = [
					'product_name' => htmlspecialchars($_GET['product_name']),
					'qty' => htmlspecialchars($_GET['qty'])
				];

				$success = $this->equipmentsModel->where('product_id', $id)
					->set($data)->update();

				if ($success) {
					// Create flashdata for database query status
					session()->setFlashdata('success', 'Successfully updated.');

					// CREATE ACTIVITY LOG
					foreach ($data as $key => $value) {
						if ($tempData[$key] != $value) {
							createLog(
								getIdNo(),
								'CLINIC',
								'Inventory',
								'Modify Equipment',
								"User \"" . getIdNo() . "\" set {$key} field to \"{$value}\" of equipment \"{$id}\""
							);
						}
					}
				} else {
				}
			} else {
				session()->setFlashdata('mod_validation', $this->validator);
				session()->setFlashdata('getData', json_encode($_GET));
				session()->setFlashdata('product_id', $id);
			}
		}

		return redirect()->to('inventory/equipments');
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

				createLog(
					getIdNo(),
					'CLINIC',
					'Inventory',
					'Delete Medicine',
					"User \"" . getIdNo() . "\" deleted the medicine \"{$id}\""
				);
			} else {
			}
		}

		return redirect()->to('inventory/medicines/items');
	}

	public function deleteBatch($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$batch = $this->batchesModel->find($id); // FOR ACTIVITY LOGS
			$success = $this->batchesModel->delete($id);

			if ($success) {
				// Create flashdata for database query status
				session()->setFlashdata('success', 'Successfully deleted.');

				createLog(
					getIdNo(),
					'CLINIC',
					'Inventory',
					'Delete Batch',
					"User \"" . getIdNo() . "\" deleted the batch \"{$id}\" of medicine \"{$batch['product_id']}\""
				);
			} else {
			}
		}

		return redirect()->to('inventory/medicines/batches');
	}

	public function deleteEquipment($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$success = $this->equipmentsModel->delete($id);

			if ($success) {
				// Create flashdata for database query status
				session()->setFlashdata('success', 'Successfully deleted.');

				createLog(
					getIdNo(),
					'CLINIC',
					'Inventory',
					'Delete Equipment',
					"User \"" . getIdNo() . "\" deleted the equipment \"{$id}\""
				);
			} else {
			}
		}

		return redirect()->to('inventory/equipments');
	}


	// STOCK OUT THE MEDICINE
	// ---------------------------------------------------------
	public function stockOut()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getStockManagementRules())) {
				$batch = $this->batchesModel->find($_GET['batch_id']);
				$stock_available = ($batch['stock_in'] - $batch['stock_out']);

				if ($stock_available >= $_GET['stock_out']) {
					$data = [
						'stock_out' => ($batch['stock_out'] + $_GET['stock_out']),
						'batch_id' => htmlspecialchars($_GET['batch_id']),
						'product_id' => htmlspecialchars($_GET['product_name'])
					];

					$success = $this->batchesModel->save($data);

					if ($success) {
						// Create flashdata for database query status
						session()->setFlashdata('success', 'Done!');

						createLog(
							getIdNo(),
							'CLINIC',
							'Inventory',
							'Stock Out',
							"User \"" . getIdNo() . "\" stocked out {$_GET['stock_out']} from batch \"{$batch['batch_id']}\" of medicine \"{$data['product_id']}\""
						);
					} else {
					}
				} else {
					session()->setFlashdata('insufficient_stock', TRUE);
					session()->setFlashdata('getData', json_encode($_GET));
				}
			} else {
				session()->setFlashdata('out_validation', $this->validator);
				session()->setFlashdata('getData', json_encode($_GET));
			}
		}

		return redirect()->to('inventory/medicines/stocks');
	}


	// RETURN EQUIPMENT
	// ---------------------------------------------------------
	public function returnEquipment()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			if ($this->validate($this->getReturnRules())) {
				$equipment = $this->equipmentsModel->find($_GET['product_name']);

				if ($equipment['qty'] >= $_GET['qty']) {
					$success = $this->equipmentsModel->where('product_id', $_GET['product_name'])
						->set([
							'qty' => $equipment['qty'] - $_GET['qty']
						])->update();

					if ($success) {
						// Create flashdata for database query status
						session()->setFlashdata('success', 'Done!');

						createLog(
							getIdNo(),
							'CLINIC',
							'Inventory',
							'Return Equipment',
							"User \"" . getIdNo() . "\" returned {$_GET['qty']} from equipment \"{$equipment['product_id']}\""
						);
					} else {
					}
				} else {
					session()->setFlashdata('insufficient_quantity', TRUE);
					session()->setFlashdata('getData', json_encode($_GET));
				}
			} else {
				session()->setFlashdata('return_validation', $this->validator);
				session()->setFlashdata('getData', json_encode($_GET));
			}
		}

		return redirect()->to('inventory/equipments');
	}
}
