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
        $credentials = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
        if ($credentials == []) {
            return redirect()->to('login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $userAccountModel = model('App\Models\HealthPersonnelsAccountModel');
        $credentials = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();

        if ($credentials != []) {
            $userModel = model('App\Models\HealthPersonnelsModel');
            $user = $userModel->find($credentials['id_no']);
            // Change "!==" to "==="
            if ($credentials['password'] !== hash('sha256', strtoupper($user['last_name']))) {
                return redirect()->to('changepassword');
            }
        }
    }
}
