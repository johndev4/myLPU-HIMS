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
		return view('components/inventory/medicines', $this->data);
	}

	public function equipments()
	{
		// Display page view
		return view('components/inventory/equipments', $this->data);
	}
}
