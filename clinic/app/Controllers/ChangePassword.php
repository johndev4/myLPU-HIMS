<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ChangePassword extends BaseController
{
    public function __construct()
    {
        // Page title
        $this->data['page_title'] = 'Change Password';

        // Array of Validation Rules
        $this->rules2 = [
            'password' => [
                'rules' => 'required|matches[confirm_password]|valid_password[{field}]|differs[current_password]',
                'errors' => [
                    'required'       => '- Required',
                    'matches'        => 'Passwords do not match.',
                    'valid_password' => 'Passwords must have 8 or more characters with a mix of letters, numbers & symbols.',
                    'differs'        => 'New password must be different than the current one.'
                ]
            ],
            'confirm_password' => [
                'rules' => 'required|matches[password]|valid_password[{field}]|differs[current_password]',
                'errors' => [
                    'required'       => '- Required',
                    'matches'        => 'Passwords do not match.',
                    'valid_password' => 'Passwords must have 8 or more characters with a mix of letters, numbers & symbols.',
                    'differs'        => 'New password must be different than the current one.'
                ]
            ]
        ];
    }

    public function index()
    {
        // Display page view
        return view('change_password', $this->data);
    }
}
