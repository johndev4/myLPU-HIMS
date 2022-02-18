<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LoggedIn implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $userAccountsModel = model('App\Models\AdministratorsModel');
        
        $user = $userAccountsModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
        if ($user == []) {
            return redirect()->to('login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $userAccountModel = model('App\Models\AdministratorsModel');
        
        $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
        if ($user != []) {
            $default_password = hash('sha256', "123456");
            if ($user['password'] === $default_password && session()->get('logged_in') == FALSE) {
                return redirect()->to('changepassword');
            }
        }
        if ($user != [] && $user['locked'] >= 2) {
            // Delete login session on client
            session()->destroy();
            // Redirect to login page
            return redirect()->to('login');
        }
        session()->set('logged_in', TRUE);
    }
}
