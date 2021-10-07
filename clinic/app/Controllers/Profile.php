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
        $this->rules = [
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


    // RETURN VIEWS
    // -----------------------------------------------------------------
    public function index()
    {
        $user = $this->userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
        $userInfo = $this->userModel->find($user['id_no']);
        $this->data['firstname'] = $userInfo['first_name'];
        // For guidance counselor permission on sidebar
        $this->data['designation'] = $userInfo['designation'];
        // For username in profile page
        $this->data['username'] = $user['username'];

        // Display page view
        return view('components/profile', $this->data);
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
