<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ChangePassword extends BaseController
{
    public function __construct()
    {
        // Page title
        $this->data['page_title'] = 'Change Password';
    }

    public function index()
    {
        // Display page view
        return view('change_password', $this->data);
    }
}
