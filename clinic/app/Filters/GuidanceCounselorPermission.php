<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class GuidanceCounselorPermission implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // 
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $userAccountModel = model('App\Models\HealthPersonnelsAccountModel');
        $userModel = model('App\Models\HealthPersonnelsModel');

        $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
        $userInfo = $userModel->find($user['id_no']);
        if ($userInfo['designation'] === 'Guidance Counselor') {
            return redirect()->to('dashboard');
        }
    }
}
