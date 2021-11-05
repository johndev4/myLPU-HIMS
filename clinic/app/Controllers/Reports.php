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

            for ($i = 0; $i < 4; $i += 1) {
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
            for ($i = 1; $i <= 12; $i += 1) {
                $consultations['accepted'][$i - 1] = $this->consultationsModel
                    ->where('status', 'done')
                    ->where('created_at >=', date_create("{$_GET['year']}-{$i}-01")->format('Y-m-d'))
                    ->where('created_at <=', date_create("{$_GET['year']}-{$i}-31")->format('Y-m-d'))
                    ->find();
            }

            for ($i = 1; $i <= 12; $i += 1) {
                $consultations['rejected'][$i - 1] = $this->consultationsModel
                    ->where('status', 'rejected')
                    ->where('created_at >=', date_create("{$_GET['year']}-{$i}-01")->format('Y-m-d'))
                    ->where('created_at <=', date_create("{$_GET['year']}-{$i}-31")->format('Y-m-d'))
                    ->find();
            }

            for ($i = 0; $i < 12; $i += 1) {
                $monthNum = $i + 1;
                $result['data'][$i] = array(
                    count($consultations['accepted'][$i]),
                    count($consultations['rejected'][$i]),
                    date('F', mktime(0, 0, 0, $monthNum, 10))
                );
            }
        }

        return json_encode($result);
    }

    public function fetchYearlyReport()
    {
        $result = array('data' => array());

        $consultations = $this->consultationsModel
            ->where('status', 'done')->orwhere('status', 'rejected')
            ->findAll();

        $years = [];
        foreach ($consultations as $key => $value) {
            if (!in_array(date_create($value['created_at'])->format('Y'), $years)) {
                $years[$key] = date_create($value['created_at'])->format('Y');
            }
        }

        foreach ($years as $key => $value) {
            $consultations['accepted'][$key] = $this->consultationsModel
                ->where('status', 'done')
                ->where('created_at >=', date_create("{$value}-01-01")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$value}-12-31")->format('Y-m-d'))
                ->find();
        }

        foreach ($years as $key => $value) {
            $consultations['rejected'][$key] = $this->consultationsModel
                ->where('status', 'rejected')
                ->where('created_at >=', date_create("{$value}-01-01")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$value}-12-31")->format('Y-m-d'))
                ->find();
        }

        foreach ($years as $key => $value) {
            $result['data'][$key] = array(
                count($consultations['accepted'][$key]),
                count($consultations['rejected'][$key]),
                $value
            );
        }

        return json_encode($result);
    }
}
