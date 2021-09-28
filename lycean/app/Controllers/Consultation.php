<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Consultation extends BaseController
{
    public function __construct()
    {
        // Page title
        $this->data['page_title'] = 'Consultation';
    }

    public function index()
    {
        // Display page view
        return view('components/consultation', $this->data);
    }
}
