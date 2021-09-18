<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function __construct()
    {
        // Page title
        $this->data['page_title'] = 'Profile';

        // Array of Validation Rules
        $this->rules1 = [
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

        // Array of Validation Rules
        $this->rules2 = [
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

    public function index()
    {
        $user = $this->userAccountsModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
        $this->data['username'] = $user['username'];

        // Display page view
        return view('components/profile', $this->data);
    }

    public function getFirstname()
    {
        $user = $this->userAccountsModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
        return $user['admin_name'];
    }

    public function updateUsername()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->userAccountsModel
                ->where('username', session()->get('uid'))
                ->where('password', session()->get('pwd'))
                ->first();

            if ($this->validate($this->rules1)) {
                $data = [
                    'username' => htmlspecialchars($_POST['username'])
                ];
                $success = $this->userAccountsModel->update($user['admin_id'], $data);

                if ($success) {
                    // Update username in login session
                    session()->set([
                        'uid' => $data['username']
                    ]);
                    // Create flashdata for database query status
                    session()->setFlashdata('success', "Successfully updated.");
                }
            } else {
                session()->setFlashdata('u_validation', $this->validator);
                session()->setFlashdata('postData', $_POST);
            }

            return redirect()->to('profile');
        }
    }

    public function updatePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->userAccountsModel
                ->where('username', session()->get('uid'))
                ->where('password', hash("sha256", $_POST['current_password']))
                ->first();

            if (!$user) {
                // Create flashdata for invalid password
                session()->setFlashdata('invalid_password', 'Invalid password, please try again.');
                session()->setFlashdata('postData', $_POST);
            }

            if ($this->validate($this->rules2)) {
                if ($user) {
                    $data = [
                        'password' => hash("sha256", $_POST['password'])
                    ];

                    $success = $this->userAccountsModel->update($user['admin_id'], $data);

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
