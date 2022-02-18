<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Activitylogs extends BaseController
{
    public function __construct()
    {
        helper(['useraccount', 'activitylogs']);
        // Page title
        $this->data['page_title'] = 'Activity Logs';
        // User admin name
        $this->data['adminName'] = getAdminName();
        // Admin ID
        $this->data['adminId'] = getAdminId();
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
        $logs = $this->activityLogsModel
            ->orderBy('created_at', 'DESC')
            ->findAll();

        foreach ($logs as $key => $log) {
            $result['data'][$key] = array(
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


    // CREATE LOG FROM AJAX REQUEST
    // -----------------------------------------------------------------
    public function createLogGetRequest($enduser_id, $enduser_type, $type, $action, $description)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // CREATE ACTIVITY LOG
            createLog(
                $enduser_id,
                $enduser_type,
                $type,
                $action,
                $description
            );
        }
    }
}
