<?php

function createLog($enduser_id, $enduser_type, $type, $action, $description)
{
    $systemLogsModel = model('App\Models\SystemLogsModel');

    $data = [
        'enduser_id' => $enduser_id,
        'enduser_type' => $enduser_type,
        'type' => $type,
        'action' => $action,
        'description' => $description,
        'user_agent' => $_SERVER['HTTP_USER_AGENT'],
        'remote_address' => $_SERVER['REMOTE_ADDR'],
        'server_address' => $_SERVER['SERVER_ADDR'],
    ];

    $success = $systemLogsModel->save($data);
    if ($success) return TRUE;
    else return FALSE;
}

function defineUser($admin, $healthPersonnel, $lycean)
{
}
