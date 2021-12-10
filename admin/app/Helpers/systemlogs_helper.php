<?php

function createLog($user, $app_type, $type, $sub_type, $action)
{
    $systemLogsModel = model('App\Models\SystemLogsModel');

    $data = [
        'admin_id' => isset($user['admin_id']) ? $user['admin_id'] : null,
        'healthpersonnel_id_no' => isset($user['healthpersonnel_id_no']) ? $user['healthpersonnel_id_no'] : null,
        'lycean_id_no' => isset($user['lycean_id_no']) ? $user['lycean_id_no'] : null,
        'app_type' => $app_type,
        'type' => $type,
        'sub_type' => $sub_type,
        'action' => $action,
        'user_agent' => $_SERVER['HTTP_USER_AGENT'],
        'remote_address' => $_SERVER['REMOTE_ADDR'],
        'server_address' => $_SERVER['SERVER_ADDR'],
    ];

    $success = $systemLogsModel->save($data);
    if ($success) return TRUE;
    else return FALSE;
}
