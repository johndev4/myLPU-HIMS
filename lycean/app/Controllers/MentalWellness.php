<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MentalWellness extends BaseController
{
    public function __construct()
    {
        helper('useraccount');
        // Page title
        $this->data['page_title'] = 'Dashboard';
        // User fullname
        $this->data['fullname'] = getUserFullname();
    }

    public function index()
    {
        // Display page view
        return view('components/mental_wellness', $this->data);
    }
}
