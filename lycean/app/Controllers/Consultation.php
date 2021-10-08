<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Consultation extends BaseController
{
    public function __construct()
    {
        helper('useraccount');
        // Page title
        $this->data['page_title'] = 'Dashboard';
        // User fullname
        $this->data['fullname'] = getUserFullname();
    }


    // RETURN VIEWS
	// -----------------------------------------------------------------
    public function index()
    {
        // Display page view
        return view('components/consultation', $this->data);
    }

    public function details($id)
    {
        $consultation = $this->consultationsModel->find($id);
        $healthPersonnel = $this->healthPersonnelsModel->find($consultation['personnel_id_no']);
        $lycean = $this->userModel->find($consultation['lycean_id_no']);

        // Display page view
        return view('components/consultation_details', $this->data);
    }
}
