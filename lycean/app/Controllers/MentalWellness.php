<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MentalWellness extends BaseController
{
    public function __construct()
    {
        helper(['useraccount', 'consultation']);
        // Page title
        $this->data['page_title'] = 'Mental Wellness';
        // User fullname
        $this->data['fullname'] = getUserFullname();
    }


    // VALIDATION RULES
    // -----------------------------------------------------------------
    public function getMessageRules()
    {
        return [
            'consultation_message' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => '- Required',
                    'max_length' => 'Too many characters.',
                ]
            ],
        ];
    }


    // RETURN VIEWS
    // -----------------------------------------------------------------
    public function index()
    {
        if (hasActive() || hasPending()) {
            session()->setFlashdata('sendBtn_disabled', "$('#sendBtn_consultation').prop('disabled', 'disabled');");
            session()->setFlashdata('message_disabled', "$('#message_consultation').prop('disabled', 'disabled');");
        }

        // Display page view
        return view('components/mental_wellness', $this->data);
    }


    // RETURN CONSULTATION DETAILS VIEW
    // -----------------------------------------------------------------
    public function details($id)
    {
        $consultation = $this->consultationsModel->find($id);
        $healthPersonnel = $this->healthPersonnelsModel->find($consultation['personnel_id_no']);
        $lycean = $this->userModel->find($consultation['lycean_id_no']);

        // Display page view
        return view('components/consultation_details', $this->data);
    }


    // FETCH CONSULTATION
    // -----------------------------------------------------------------
    public function fetchActiveConsultation()
    {
        $consultations = $this->consultationsModel
            ->where('lycean_id_no', getIdNo())->where('status', 'active')->where('category', 'Mental Wellness')
            ->findAll();

        $result = "";
        foreach ($consultations as $consultation) {
            $schedule_time = date('h:m A', strtotime($consultation['meeting_schedule']));
            $schedule_date = date('F d, Y', strtotime($consultation['meeting_schedule']));


            $data = "
            <div class=\"col-md-12\" style=\"border:1px solid none\">
                <div class=\"float-left\">
                    <label class=\"d-block text-secondary mt-n1\">Schedule</label>
                    <div class=\"mt-n2 mb-2\">
                        <span class=\"text-dark\">Time: </span><span> {$schedule_time} </span>
                        <span class=\"text-dark ml-5\">Date: </span><span> {$schedule_date} </span>
                    </div>
                    <label class=\"d-block text-secondary\">Meeting Link</label>
                    <div class=\"mt-n2\">
                        <a href=\"{$consultation['meeting_link']}\"> {$consultation['meeting_link']} </a>
                    </div>
                </div>
                </div>
                <div class=\"col-lg-12\" style=\"border:1px solid none\">
                    <div class=\"float-right\">
                        <a href=\"" . base_url('consultation/details/' . $consultation['consultation_no']) . "\" class=\"btn btn-default p-2\">View all</a>
                    </div>
                </div>

                <hr class=\"text-danger\" width=\"100%\">
            </div>
            ";

            $result .= $data;
        }

        return json_encode(['result' => $result, 'count' => count($consultations)]);
    }

    public function fetchPendingConsultation()
    {
        $consultations = $this->consultationsModel
            ->where('lycean_id_no', getIdNo())->where('status', 'pending')->where('category', 'Mental Wellness')
            ->findAll();

        $result = "";
        foreach ($consultations as $consultation) {
            $data = "
            <div class=\"col-md-12\" style=\"border:1px solid none\">
                <div class=\"float-left\">
                    <label class=\"d-block text-secondary mt-n1\">Schedule</label>
                    <div class=\"mt-n2 mb-2\">
                        <span class=\"text-dark\">Time: </span><span> --- </span>
                        <span class=\"text-dark ml-5\">Date: </span><span> --- </span>
                    </div>
                    <label class=\"d-block text-secondary\">Meeting Link</label>
                    <div class=\"mt-n2\">
                        <a> --- </a>
                    </div>
                </div>
                </div>
                <div class=\"col-lg-12\" style=\"border:1px solid none\">
                    <div class=\"float-right\">
                        <a href=\"" . base_url('mentalwellness/details/' . $consultation['consultation_no']) . "\" class=\"btn btn-default p-2\">View all</a>
                    </div>
                </div>

                <hr class=\"text-danger\" width=\"100%\">
            </div>
            ";

            $result .= $data;
        }

        return json_encode(['result' => $result, 'count' => count($consultations)]);
    }

    public function fetchRejectedConsultation()
    {
        $consultations = $this->consultationsModel
            ->where('lycean_id_no', getIdNo())->where('status', 'rejected')->where('category', 'Mental Wellness')
            ->findAll();

        $result = "";
        foreach ($consultations as $consultation) {
            $data = "<div class=\"col-md-12\" style=\"border:1px solid none\">
            <div class=\"float-left\">
                    <label class=\"d-block text-secondary mt-n1\">Schedule</label>
                    <div class=\"mt-n2 mb-2\">
                        <span class=\"text-dark\">Time: </span><span> --- </span>
                        <span class=\"text-dark ml-5\">Date: </span><span> --- </span>
                    </div>
                    <label class=\"d-block text-secondary\">Meeting Link</label>
                    <div class=\"mt-n2\">
                        <a> --- </a>
                    </div>
                </div>
            </div>
            <div class=\"col-lg-12\" style=\"border:1px solid none\">
                <div class=\"float-right\">
                <a href=\"" . base_url('consultation/details/' . $consultation['consultation_no']) . "\" class=\"btn btn-default p-2\">View all</a>
                </div>
            </div>

            <hr class=\"text-danger\" width=\"100%\">";

            $result .= $data;
        }

        return json_encode(['result' => $result, 'count' => count($consultations)]);
    }

    public function fetchDoneConsultation()
    {
        $consultations = $this->consultationsModel
            ->where('lycean_id_no', getIdNo())->where('status', 'done')->where('category', 'Mental Wellness')
            ->findAll();

        $result = "";
        foreach ($consultations as $consultation) {
            $schedule_time = date('h:m A', strtotime($consultation['meeting_schedule']));
            $schedule_date = date('F d, Y', strtotime($consultation['meeting_schedule']));


            $data = "
            <div class=\"col-md-12\" style=\"border:1px solid none\">
                <div class=\"float-left\">
                    <label class=\"d-block text-secondary mt-n1\">Schedule</label>
                    <div class=\"mt-n2 mb-2\">
                        <span class=\"text-dark\">Time: </span><span> {$schedule_time} </span>
                        <span class=\"text-dark ml-5\">Date: </span><span> {$schedule_date} </span>
                    </div>
                    <label class=\"d-block text-secondary\">Meeting Link</label>
                    <div class=\"mt-n2\">
                        <a href=\"{$consultation['meeting_link']}\"> {$consultation['meeting_link']} </a>
                    </div>
                </div>
                </div>
                <div class=\"col-lg-12\" style=\"border:1px solid none\">
                    <div class=\"float-right\">
                        <a href=\"" . base_url('consultation/details/' . $consultation['consultation_no']) . "\" class=\"btn btn-default p-2\">View all</a>
                    </div>
                </div>

                <hr class=\"text-danger\" width=\"100%\">
            </div>
            ";

            $result .= $data;
        }

        return json_encode(['result' => $result, 'count' => count($consultations)]);
    }


    // SEND CONSULTATION TO CLINIC
    // -----------------------------------------------------------------
    public function sendConsultation()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->validate($this->getMessageRules())) {
                if (!hasActive() && !hasPending()) {
                    while (true) {
                        $consultation_no = random_string('alnum', 16);
                        if (!$this->consultationsModel->find($consultation_no)) {
                            break;
                        }
                    }

                    // print_r($data);
                    $data = [
                        'consultation_no' => $consultation_no,
                        'status' => 'pending',
                        'category' => 'Consultation',
                        'message' => $_POST['consultation_message'],
                        'lycean_id_no' => getIdNo(),
                    ];

                    $success = $this->consultationsModel->save($data);

                    if ($success) {
                        session()->setFlashdata('success', 'Sent');
                    }
                } else {
                }
            } else {
            }
        }

        return redirect()->to('mentalwellness');
    }
}
