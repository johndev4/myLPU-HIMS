<?php

function getUserFirstname()
{
    $userModel = model('App\Models\LyceansModel');
    $userAccountModel = model('App\Models\LyceansAccountModel');

    $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
    $userInfo = $userModel->find($user['id_no']);

    return $userInfo['first_name'];
}

function getUserFullname()
{
    $userModel = model('App\Models\LyceansModel');
    $userAccountModel = model('App\Models\LyceansAccountModel');

    $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
    $userInfo = $userModel->find($user['id_no']);
    $middleInit = $userInfo['middle_name'] != "" ? substr($userInfo['middle_name'], 0, 1) . '.' : "";

    return "{$userInfo['first_name']} {$middleInit} {$userInfo['last_name']}";
}

function getUserEmail()
{
    $userAccountModel = model('App\Models\LyceansAccountModel');

    $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();

    return $user['username'];
}

function getIdNo()
{
    $userAccountModel = model('App\Models\LyceansAccountModel');

    $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();

    return $user['id_no'];
}

function getUserInfo()
{
    $userModel = model('App\Models\LyceansModel');

    $userInfo = $userModel->where('id_no', getIdNo())->first();

    return $userInfo;
}
