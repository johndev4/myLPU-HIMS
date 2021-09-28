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
        $this->rules = [
            'password' => [
                'rules' => 'required|matches[confirm_password]|valid_password[{field}]',
                'errors' => [
                    'required'       => '- Required',
                    'matches'        => 'Passwords do not match.',
                    'valid_password' => 'Passwords must have 8 or more characters with a mix of letters, numbers & symbols.',
                    'differs'        => 'New password must be different than the current one.'
                ]
            ],
            'confirm_password' => [
                'rules' => 'required|matches[password]|valid_password[{field}]',
                'errors' => [
                    'required'       => '- Required',
                    'matches'        => 'Passwords do not match.',
                    'valid_password' => 'Passwords must have 8 or more characters with a mix of letters, numbers & symbols.',
                    'differs'        => 'New password must be different than the current one.'
                ]
            ]
        ];
    }


    // RETURN VIEWS
    // -----------------------------------------------------------------
    public function index()
    {
        $credentials = $this->userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();

        if ($credentials != []) {
            $user = $this->userModel->find($credentials['id_no']);
            if ($credentials['password'] !== hash('sha256', strtoupper($user['last_name']))) {
                return redirect()->to('dashboard');
            }
        }

        // Display page view
        return view('change_password', $this->data);
    }


    // UPDATE PASSWORD
    // -----------------------------------------------------------------
    public function updatePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->userAccountModel
                ->where('username', session()->get('uid'))
                ->where('password', session()->get('pwd'))
                ->first();

            if ($this->validate($this->rules)) {
                if ($user) {
                    $data = [
                        'password' => hash("sha256", $_POST['password'])
                    ];

                    $success = $this->userAccountModel->update($user['id_no'], $data);

                    if ($success) {
                        // Update username in login session
                        session()->set([
                            'pwd' => $data['password']
                        ]);
                        // Create flashdata for database query status
                        session()->setFlashdata('password_changed', TRUE);
                    } else {
                    }
                } else {
                }
            } else {
                session()->setFlashdata('p_validation', $this->validator);
                session()->setFlashdata('postData', $_POST);
            }


            return redirect()->to('changepassword');
        }
    }
}
