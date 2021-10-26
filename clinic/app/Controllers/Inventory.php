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


	// RETURN VIEWS
	// -----------------------------------------------------------------
	public function medicines()
	{
		// Display page view
		return view('components/inventory/medicines/items', $this->data);
	}

	public function batch_management()
	{
		// Display page view
		return view('components/inventory/medicines/batch_management', $this->data);
	}

	public function stocks()
	{
		// Display page view
		return view('components/inventory/medicines/stocks', $this->data);
	}

	public function equipments()
	{
		// Display page view
		return view('components/inventory/equipments/items', $this->data);
	}


	// FETCH ALL MEDICINE DATA
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


	// FETCH ALL BATCH DATA
	// ---------------------------------------------------------
	public function fetchAllBatches()
	{
	}


	// FETCH STOCK MANAGEMENT
	// ---------------------------------------------------------
	public function fetchStockManagement()
	{
	}
}
