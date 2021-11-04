<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Reports extends BaseController
{
    // FETCH REPORT DATA
    // -----------------------------------------------------------------
    public function fetchWeeklyReport()
    {
        $result = array('data' => array());

        if ($_GET['year'] !== '' && $_GET['month'] !== '') {

            $consultations['accepted'][0] = $this->consultationsModel
                ->where('status', 'done')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-01")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-07")->format('Y-m-d'))
                ->find();

            $consultations['accepted'][1] = $this->consultationsModel
                ->where('status', 'done')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-08")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-14")->format('Y-m-d'))
                ->find();

            $consultations['accepted'][2] = $this->consultationsModel
                ->where('status', 'done')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-15")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-22")->format('Y-m-d'))
                ->find();

            $consultations['accepted'][3] = $this->consultationsModel
                ->where('status', 'done')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-23")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-31")->format('Y-m-d'))
                ->find();


            $consultations['rejected'][0] = $this->consultationsModel
                ->where('status', 'rejected')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-01")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-07")->format('Y-m-d'))
                ->find();

            $consultations['rejected'][1] = $this->consultationsModel
                ->where('status', 'rejected')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-08")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-14")->format('Y-m-d'))
                ->find();

            $consultations['rejected'][2] = $this->consultationsModel
                ->where('status', 'rejected')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-15")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-22")->format('Y-m-d'))
                ->find();

            $consultations['rejected'][3] = $this->consultationsModel
                ->where('status', 'rejected')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-23")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-31")->format('Y-m-d'))
                ->find();

            for ($i = 0; $i < count($consultations['accepted']); $i += 1) {
                $result['data'][$i] = array(
                    count($consultations['accepted'][$i]),
                    count($consultations['rejected'][$i]),
                    'Week ' . $i + 1
                );
            }
        }

        return json_encode($result);
    }

    public function fetchMonthlyReport()
    {
        $result = array('data' => array());

        if ($_GET['year'] !== '') {
        }
        
        return json_encode($result);
    }
}
