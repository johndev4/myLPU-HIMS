<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function __construct()
    {
        helper(['useraccount', 'activitylogs']);
        // Page title
        $this->data['page_title'] = 'Profile';
        // User admin name
        $this->data['adminName'] = getAdminName();
    }


    // VALIDATION RULES
    // -----------------------------------------------------------------
    private function getUsernameRules()
    {
        return [
            'username' => [
                'rules' => 'required|alpha_dash|min_length[5]|max_length[45]|is_unique[administrators.username,username,' . session()->get('uid') . ']',
                'errors' => [
                    'required'   => '- Required',
                    'alpha_dash' => 'Username may only contain alphanumeric, underscore, and dash characters.',
                    'min_length' => 'Username must be at least 5 characters long.',
                    'max_length' => 'Username max length exceeded.',
                    'is_unique'  => 'Username is already exists.'
                ]
            ]
        ];
    }

    private function getPasswordRules()
    {
        return [
            'current_password' => [
                'rules' => 'required',
                'errors' => [
                    'required'       => '- Required'
                ]
            ],
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


    // RETURN VIEW
    // -----------------------------------------------------------------
    public function index()
    {
        // Admin email
        $this->data['username'] = getAdminEmail();

        // Display page view
        return view('components/profile', $this->data);
    }


    // UPDATE USERNAME
    // -----------------------------------------------------------------
    public function updateUsername()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->userAccountModel
                ->where('username', session()->get('uid'))
                ->where('password', session()->get('pwd'))
                ->first();

            if ($this->validate($this->getUsernameRules())) {
                $data = [
                    'username' => htmlspecialchars($_POST['username'])
                ];
                $success = $this->userAccountModel->update($user['admin_id'], $data);

                if ($success) {
                    // Update username in login session
                    session()->set([
                        'uid' => $data['username']
                    ]);
                    // Create flashdata for database query status
                    session()->setFlashdata('success', "Successfully updated.");

                    // CREATE ACTIVITY LOG
                    createLog(
                        getAdminId(),
                        'ADMIN',
                        'Username',
                        'Change Username',
                        "User \"" . getAdminId() . "\" changed the username"
                    );
                }
            } else {
                session()->setFlashdata('u_validation', $this->validator);
                session()->setFlashdata('postData', $_POST);
            }

            return redirect()->to('profile');
        }
    }


    // UPDATE PASSWORD
    // -----------------------------------------------------------------
    public function updatePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->userAccountModel
                ->where('username', session()->get('uid'))
                ->where('password', hash("sha256", $_POST['current_password']))
                ->first();

            if (!$user) {
                // Create flashdata for invalid password
                session()->setFlashdata('invalid_password', 'Invalid password, please try again.');
                session()->setFlashdata('postData', $_POST);
            }

            if ($this->validate($this->getPasswordRules())) {
                if ($user) {
                    $data = [
                        'password' => hash("sha256", $_POST['password'])
                    ];

                    $success = $this->userAccountModel->update($user['admin_id'], $data);

                    if ($success) {
                        // Update username in login session
                        session()->set([
                            'pwd' => $data['password']
                        ]);
                        // Create flashdata for database query status
                        session()->setFlashdata('password_changed', TRUE);

                        // CREATE ACTIVITY LOG
                        createLog(
                            getAdminId(),
                            'ADMIN',
                            'Password',
                            'Change Password',
                            "User \"" . getAdminId() . "\" changed the password"
                        );
                    } else {
                    }
                } else {
                    // Create flashdata for invalid password
                    session()->setFlashdata('invalid_password', 'Invalid password, please try again.');
                    session()->setFlashdata('postData', $_POST);
                }
            } else {
                session()->setFlashdata('p_validation', $this->validator);
                session()->setFlashdata('postData', $_POST);
            }


            return redirect()->to('profile');
        }
    }
}
