<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Changepassword extends BaseController
{
    public function __construct()
    {
        helper(['useraccount', 'activitylogs']);
        // Page title
        $this->data['page_title'] = 'Change Password';
    }


    // VALIDATION RULES
    // -----------------------------------------------------------------
    private function getPasswordRules()
    {
        return [
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
        // Change Password Filter
        $user = $this->userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
        if ($user != []) {
            $userInfo = $this->userModel->find($user['id_no']);
            if (
                $user['password'] !== str_replace(' ', '', strtoupper($userInfo['last_name'])) &&
                session()->get('logged_in') == TRUE
            ) {
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
                        // Set logged_in status to TRUE
                        session()->set('logged_in', TRUE);

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
                }
            } else {
                session()->setFlashdata('p_validation', $this->validator);
                session()->setFlashdata('postData', $_POST);
            }


            return redirect()->to('changepassword');
        }
    }
}
