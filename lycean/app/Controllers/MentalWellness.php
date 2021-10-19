<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MentalWellness extends BaseController
{
    public function __construct()
    {
        helper(['useraccount', 'consultation']);
        // Page title
        $this->data['page_title'] = 'Consultation';
        // User fullname
        $this->data['fullname'] = getUserFullname();
        // User ID No.
        $this->data['idNo'] = getIdNo();
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
        // Display page view
        return view('components/mental_wellness', $this->data);
    }


    // RETURN CONSULTATION DETAILS VIEW
    // -----------------------------------------------------------------
    public function details($id)
    {
        $consultation = $this->consultationsModel->find($id);

        $this->data['details'] = [
            'consultation_id' => $id,
            'date_of_request' => date_create($consultation['created_at'])->format('d-m-Y H:i'),
            'time' => $consultation['meeting_schedule'] != '' ? date_create($consultation['meeting_schedule'])->format('h:i a') : '---',
            'date' => $consultation['meeting_schedule'] != '' ? date_create($consultation['meeting_schedule'])->format('F d, Y') : '---',
            'meeting_link' => [
                'href' => $consultation['meeting_link'] != '' ? "href=\"{$consultation['meeting_link']}\"" : '',
                'text' => $consultation['meeting_link'] != '' ? "<u>{$consultation['meeting_link']}</u>" : '---'
            ],
            'concern_message' => $consultation['message'] != '' ? $consultation['message'] : '---',
            'rejection_message' => $consultation['rejection_message'] != '' ? $consultation['rejection_message'] : '---',
        ];

        $medical_files = $this->medicalFilesModel->where('consultation_no', $id)->findAll();

        $this->data['files'] = "";
        if ($medical_files) {
            foreach ($medical_files as $key => $medical_file) {
                $filename = explode('/', $medical_file['file_path'])[4];
                $key += 1;
                $href = str_replace('lycean/public', 'clinic/public', site_url($medical_file['file_path']));
                $this->data['files'] .= "
                    <tr>
                        <td> {$key} </td>
                        <td><a href=\"{$href}\" target=\"_blank\"> {$filename} </a></td>
                    </tr>
                    ";
            }
        }

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
                <div class=\"\">
                    <label class=\"d-block text-secondary mt-n1\">Schedule</label>
                    <div class=\"mt-n2 mb-2\">
                        <span class=\"text-dark time\">Time: {$schedule_time}</span>
                        <span class=\"text-dark date float-right\">Date: {$schedule_date}</span>
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
                <div class=\"\">
                    <label class=\"d-block text-secondary mt-n1\">Schedule</label>
                    <div class=\"mt-n2 mb-2\">
                        <span class=\"text-dark time\">Time: ---</span>
                        <span class=\"text-dark date float-right\">Date: ---</span>
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
            <div class=\"\">
                    <label class=\"d-block text-secondary mt-n1\">Schedule</label>
                    <div class=\"mt-n2 mb-2\">
                        <span class=\"text-dark time\">Time: ---</span>
                        <span class=\"text-dark date float-right\">Date: ---</span>
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
                <div class=\"\">
                    <label class=\"d-block text-secondary mt-n1\">Schedule</label>
                    <div class=\"mt-n2 mb-2\">
                        <span class=\"text-dark time\">Time: {$schedule_time}</span>
                        <span class=\"text-dark date float-right\">Date: {$schedule_date}</span>
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

                    $data = [
                        'consultation_no' => $consultation_no,
                        'status' => 'pending',
                        'category' => 'Mental Wellness',
                        'message' => $_POST['consultation_message'],
                        'personnel_id_no' => $_POST['consultation_doctor'],
                        'lycean_id_no' => getIdNo(),
                    ];

                    $success = $this->consultationsModel->save($data);

                    if ($success) {
                        // $this->setNotification($data);
                        session()->setFlashdata('success', 'Sent');
                    }
                } else {
                    session()->setFlashdata('error', 'You have unfinished consultation request.');
                }
            } else {
            }
        }

        return redirect()->to('mentalwellness');
    }

    private function setNotification($data)
    {
        $success = $this->healthPersonnelsNotificationModel->save([
            '' => '',
        ]);
    }


    // FETCH ONLINE HEALTH PERSONNELS
    // -----------------------------------------------------------------
    public function fetchOnlineHealthPersonnels()
    {
        $healthPersonnels = $this->healthPersonnelsAccountModel
            ->where('last_activity', date('Y-m-d h:i'))
            ->findAll();

        $result = "<option value=\"\" selected=\"selected\">---Choose from the available guidance counselors---</option>";
        $count = 0;
        if ($healthPersonnels) {
            foreach ($healthPersonnels as $healthPersonnel) {
                $healthPersonnelsInfo = $this->healthPersonnelsModel->find($healthPersonnel['id_no']);
                if ($healthPersonnelsInfo['designation'] == "Guidance Counselor") {
                    $result .= "<option value=\"{$healthPersonnel['id_no']}\">Dr. {$healthPersonnelsInfo['first_name']} {$healthPersonnelsInfo['last_name']}</option>";
                    $count += 1;
                }
            }
        }

        if ($count == 0) {
            $result = "<option value=\"\" selected=\"selected\">---No available guidance counselor---</option>";
        }

        return json_encode(['result' => $result, 'count' => $count]);
    }
}
