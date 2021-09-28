<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MentalWellness extends BaseController
{
    public function __construct()
    {
        // Page title
        $this->data['page_title'] = 'Mental Wellness';
    }

    public function index()
    {
        // Display page view
        return view('components/mental_wellness', $this->data);
    }
}
