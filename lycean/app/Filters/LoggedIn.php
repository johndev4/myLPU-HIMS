<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LoggedIn implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $userAccountsModel = model('App\Models\LyceansAccountModel');
        $credentials = $userAccountsModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
        if ($credentials == []) {
            return redirect()->to('login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // 
    }
}
