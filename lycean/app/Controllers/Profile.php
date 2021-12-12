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
        // User fullname
        $this->data['fullname'] = getUserFullname();
        // User ID No.
        $this->data['idNo'] = getIdNo();
    }


    // VALIDATION RULES
    // -----------------------------------------------------------------
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


    // RETURN VIEWS
    // -----------------------------------------------------------------
    public function index()
    {
        // User email
        $this->data['username'] = getUserEmail();
        // User info
        $this->data['userInfo'] = getUserInfo();
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

            if ($this->validate($this->getPasswordRules())) {
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

                        // CREATE ACTIVITY LOG
                        createLog(
                            getIdNo(),
                            'LYCEAN',
                            'Password',
                            'Change Password',
                            "User \"" . getIdNo() . "\" changed the password"
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
