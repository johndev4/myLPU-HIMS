<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserInformations extends BaseController
{
    public function __construct()
    {
        // Page title
        $this->data['page_title'] = 'User Accounts';
    }


    // RETURN VIEWS
    // -----------------------------------------------------------------
    public function student()
    {
        // Display page view
        return view('components/user_informations/student', $this->data);
    }

    public function faculty()
    {
        // Display page view
        return view('components/user_informations/faculty', $this->data);
    }

    public function staff()
    {
        // Display page view
        return view('components/user_informations/staff', $this->data);
    }

    public function healthPersonnel()
    {
        // Display page view
        return view('components/user_informations/health_personnel', $this->data);
    }
}
