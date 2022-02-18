<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Activitylogs extends BaseController
{
    public function __construct()
    {
        helper(['activitylogs']);
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
