<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Reports extends BaseController
{
    public function __construct()
    {
        helper(['useraccount']);
    }

    
    // GET CONSULTATION CATEGORY
    // -----------------------------------------------------------------
    private function getConsultationCategory()
    {
        if (getDesignation() == "Guidance Counselor") {
            return "Mental Wellness";
        } else {
            return "Consultation";
        }
    }


    // FETCH REPORT DATA
    // -----------------------------------------------------------------
    public function fetchWeeklyReport()
    {
        $result = array('data' => array());

        if ($_GET['year'] !== '' && $_GET['month'] !== '') {

            // Accepted
            // ----------------------------------

            $consultations['accepted'][0] = $this->consultationsModel
                ->where('category', $this->getConsultationCategory())
                ->where('status', 'done')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-01")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-08")->format('Y-m-d'))
                ->find();

            $consultations['accepted'][1] = $this->consultationsModel
                ->where('category', $this->getConsultationCategory())
                ->where('status', 'done')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-08")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-15")->format('Y-m-d'))
                ->find();

            $consultations['accepted'][2] = $this->consultationsModel
                ->where('category', $this->getConsultationCategory())
                ->where('status', 'done')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-15")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-23")->format('Y-m-d'))
                ->find();

            $consultations['accepted'][3] = $this->consultationsModel
                ->where('category', $this->getConsultationCategory())
                ->where('status', 'done')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-23")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-31 23:59")->format('Y-m-d H:i'))
                ->find();

            // Rejected
            // ----------------------------------

            $consultations['rejected'][0] = $this->consultationsModel
                ->where('category', $this->getConsultationCategory())
                ->where('status', 'rejected')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-01")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-08")->format('Y-m-d'))
                ->find();

            $consultations['rejected'][1] = $this->consultationsModel
                ->where('category', $this->getConsultationCategory())
                ->where('status', 'rejected')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-08")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-15")->format('Y-m-d'))
                ->find();

            $consultations['rejected'][2] = $this->consultationsModel
                ->where('category', $this->getConsultationCategory())
                ->where('status', 'rejected')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-15")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-23")->format('Y-m-d'))
                ->find();

            $consultations['rejected'][3] = $this->consultationsModel
                ->where('category', $this->getConsultationCategory())
                ->where('status', 'rejected')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-23")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-31 23:59")->format('Y-m-d H:i'))
                ->find();

            // Cancelled
            // ----------------------------------

            $consultations['cancelled'][0] = $this->consultationsModel
                ->where('category', $this->getConsultationCategory())
                ->where('status', 'cancelled')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-01")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-08")->format('Y-m-d'))
                ->find();

            $consultations['cancelled'][1] = $this->consultationsModel
                ->where('category', $this->getConsultationCategory())
                ->where('status', 'cancelled')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-08")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-15")->format('Y-m-d'))
                ->find();

            $consultations['cancelled'][2] = $this->consultationsModel
                ->where('category', $this->getConsultationCategory())
                ->where('status', 'cancelled')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-15")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-23")->format('Y-m-d'))
                ->find();

            $consultations['cancelled'][3] = $this->consultationsModel
                ->where('category', $this->getConsultationCategory())
                ->where('status', 'cancelled')
                ->where('created_at >=', date_create("{$_GET['year']}-{$_GET['month']}-23")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$_GET['year']}-{$_GET['month']}-31 23:59")->format('Y-m-d H:i'))
                ->find();


            // -----------------------------------------------------------------------------
            for ($i = 0; $i < 4; $i += 1) {
                $result['data'][$i] = array(
                    count($consultations['accepted'][$i]),
                    count($consultations['rejected'][$i]),
                    count($consultations['cancelled'][$i]),
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

            // Accepted
            // ----------------------------------
            for ($i = 1; $i <= 12; $i += 1) {
                $consultations['accepted'][$i - 1] = $this->consultationsModel
                    ->where('category', $this->getConsultationCategory())
                    ->where('status', 'done')
                    ->where('created_at >=', date_create("{$_GET['year']}-{$i}-01")->format('Y-m-d'))
                    ->where('created_at <=', date_create("{$_GET['year']}-{$i}-31")->format('Y-m-d'))
                    ->find();
            }

            // Rejected
            // ----------------------------------
            for ($i = 1; $i <= 12; $i += 1) {
                $consultations['rejected'][$i - 1] = $this->consultationsModel
                    ->where('category', $this->getConsultationCategory())
                    ->where('status', 'rejected')
                    ->where('created_at >=', date_create("{$_GET['year']}-{$i}-01")->format('Y-m-d'))
                    ->where('created_at <=', date_create("{$_GET['year']}-{$i}-31")->format('Y-m-d'))
                    ->find();
            }

            // Cancelled
            // ----------------------------------
            for ($i = 1; $i <= 12; $i += 1) {
                $consultations['cancelled'][$i - 1] = $this->consultationsModel
                    ->where('category', $this->getConsultationCategory())
                    ->where('status', 'cancelled')
                    ->where('created_at >=', date_create("{$_GET['year']}-{$i}-01")->format('Y-m-d'))
                    ->where('created_at <=', date_create("{$_GET['year']}-{$i}-31")->format('Y-m-d'))
                    ->find();
            }


            // -----------------------------------------------------------------------------
            for ($i = 0; $i < 12; $i += 1) {
                $monthNum = $i + 1;
                $result['data'][$i] = array(
                    count($consultations['accepted'][$i]),
                    count($consultations['rejected'][$i]),
                    count($consultations['cancelled'][$i]),
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
            ->where('category', $this->getConsultationCategory())
            ->where('status', 'done')->orwhere('status', 'rejected')->orwhere('status', 'cancelled')
            ->findAll();

        $years = [];
        foreach ($consultations as $key => $value) {
            if (!in_array(date_create($value['created_at'])->format('Y'), $years)) {
                $years[$key] = date_create($value['created_at'])->format('Y');
            }
        }
        // -----------------------------------------------------------------------------


        // Accepted
        // ----------------------------------
        foreach ($years as $key => $value) {
            $consultations['accepted'][$key] = $this->consultationsModel
                ->where('category', $this->getConsultationCategory())
                ->where('status', 'done')
                ->where('created_at >=', date_create("{$value}-01-01")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$value}-12-31")->format('Y-m-d'))
                ->find();
        }

        // Rejected
        // ----------------------------------
        foreach ($years as $key => $value) {
            $consultations['rejected'][$key] = $this->consultationsModel
                ->where('category', $this->getConsultationCategory())
                ->where('status', 'rejected')
                ->where('created_at >=', date_create("{$value}-01-01")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$value}-12-31")->format('Y-m-d'))
                ->find();
        }

        // Cancelled
        // ----------------------------------
        foreach ($years as $key => $value) {
            $consultations['cancelled'][$key] = $this->consultationsModel
                ->where('category', $this->getConsultationCategory())
                ->where('status', 'cancelled')
                ->where('created_at >=', date_create("{$value}-01-01")->format('Y-m-d'))
                ->where('created_at <=', date_create("{$value}-12-31")->format('Y-m-d'))
                ->find();
        }


        // -----------------------------------------------------------------------------
        foreach ($years as $key => $value) {
            $result['data'][$key] = array(
                count($consultations['accepted'][$key]),
                count($consultations['rejected'][$key]),
                count($consultations['cancelled'][$key]),
                $value
            );
        }

        return json_encode($result);
    }
}
