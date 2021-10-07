<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LoggedIn implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $userAccountModel = model('App\Models\LyceansAccountModel');

        $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
        if ($user == []) {
            return redirect()->to('login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $userAccountModel = model('App\Models\LyceansAccountModel');
        $userModel = model('App\Models\LyceansModel');

        $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
        if ($user != []) {
            $userInfo = $userModel->find($user['id_no']);
            // Change "!==" to "==="
            if ($user['password'] !== hash('sha256', strtoupper($userInfo['last_name']))) {
                return redirect()->to('changepassword');
            }
        }
    }
}
