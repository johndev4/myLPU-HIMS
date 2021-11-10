<?php

function getUserFirstname()
{
    $userModel = model('App\Models\HealthPersonnelsModel');
    $userAccountModel = model('App\Models\HealthPersonnelsAccountModel');

    $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
    $userInfo = $userModel->find($user['id_no']);

    return $userInfo['first_name'];
}

function getUserFullname()
{
    $userModel = model('App\Models\HealthPersonnelsModel');
    $userAccountModel = model('App\Models\HealthPersonnelsAccountModel');

    $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
    $userInfo = $userModel->find($user['id_no']);
    $middleInit = $userInfo['middle_name'] != "" ? substr($userInfo['middle_name'], 0, 1) . '.' : "";

    return "{$userInfo['first_name']} {$middleInit} {$userInfo['last_name']}";
}

function getUserEmail()
{
    $userAccountModel = model('App\Models\HealthPersonnelsAccountModel');

    $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();

    return $user['username'];
}

function getUserDesignation()
{
    $userModel = model('App\Models\HealthPersonnelsModel');
    $userAccountModel = model('App\Models\HealthPersonnelsAccountModel');

    $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
    $userInfo = $userModel->find($user['id_no']);

    return $userInfo['designation'];
}

function getIdNo()
{
    $userAccountModel = model('App\Models\HealthPersonnelsAccountModel');

    $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();

    return $user['id_no'];
}

function getUserInfo()
{
    $userModel = model('App\Models\HealthPersonnelsModel');

    $userInfo = $userModel->where('id_no', getIdNo())->first();

    return $userInfo;
}

function getDesignation()
{
    $userAccountModel = model('App\Models\HealthPersonnelsAccountModel');
    $userModel = model('App\Models\HealthPersonnelsModel');

    $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
    $userInfo = $userModel->where('id_no', $user['id_no'])->first();

    return $userInfo['designation'];
}
