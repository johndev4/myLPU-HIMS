<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Systemlogs extends BaseController
{
    public function __construct()
    {
        helper('useraccount');
        // Page title
        $this->data['page_title'] = 'User Accounts';
        // User admin name
        $this->data['adminName'] = getAdminName();
    }


    // RETURN VIEW
    // -----------------------------------------------------------------
    public function index()
    {
        // Display page view
        return view('components/system_logs', $this->data);
    }
}
