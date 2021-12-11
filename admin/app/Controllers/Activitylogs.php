<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Activitylogs extends BaseController
{
    public function __construct()
    {
        helper(['useraccount']);
        // Page title
        $this->data['page_title'] = 'Activity Logs';
        // User admin name
        $this->data['adminName'] = getAdminName();
    }


    // RETURN VIEW
    // -----------------------------------------------------------------
    public function index()
    {
        // Display page view
        return view('components/activity_logs', $this->data);
    }


    // FETCH ALL DATA
    // -----------------------------------------------------------------
    public function fetchAllLogs()
    {
        $result = array('data' => array());
        $logs = $this->systemLogsModel->findAll();

        foreach ($logs as $key => $log) {
            $result['data'][$key] = array(
                $log['log_id'],
                $log['enduser_id'],
                $log['enduser_type'],
                $log['type'],
                $log['action'],
                $log['description'],
                $log['user_agent'],
                $log['remote_address'],
                $log['server_address'],
                date_create($log['created_at'])->format('d-M-Y H:i')
            );
        }

        return json_encode($result);
    }
}
