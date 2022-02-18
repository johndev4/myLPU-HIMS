<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LoggedIn implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $userAccountModel = model('App\Models\HealthPersonnelsAccountModel');

        $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
        if ($user == []) {
            return redirect()->to('login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $userAccountModel = model('App\Models\HealthPersonnelsAccountModel');
        $userModel = model('App\Models\HealthPersonnelsModel');

        $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
        if ($user != []) {
            $userInfo = $userModel->find($user['id_no']);
            $default_password = hash('sha256', str_replace(' ', '', strtoupper($userInfo['last_name'])));
            if ($user['password'] === $default_password && session()->get('logged_in') == FALSE) {
                return redirect()->to('changepassword');
            }
        }
        if ($user != [] && $user['locked'] >= 2) {
            helper('useraccount');
            // Clear last activity
            $userAccountModel
                ->where('id_no', getIdNo())
                ->set([
                    'last_activity' => null
                ])->update();

            // Delete login session on client
            session()->destroy();
            // Redirect to login page
            return redirect()->to('login');
        }
        session()->set('logged_in', TRUE);
    }
}
