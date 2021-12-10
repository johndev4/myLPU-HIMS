<?php

function getAdminName()
{
    $userAccountModel = model('App\Models\AdministratorsModel');

    $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();

    return $user['admin_name'];
}

function getAdminEmail()
{
    $userAccountModel = model('App\Models\AdministratorsModel');

    $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();

    return $user['username'];
}

function getAdminId()
{
    $userAccountModel = model('App\Models\AdministratorsModel');

    $user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();

    return $user['admin_id'];
}
