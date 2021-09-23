<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Inventory extends BaseController
{
	public function __construct()
	{
		// Page title
		$this->data['page_title'] = 'Inventory';
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
