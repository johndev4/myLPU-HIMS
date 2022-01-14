<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Consultation extends BaseController
{
    public function __construct()
    {
        helper(['useraccount', 'consultation', 'activitylogs']);
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
                'rules' => 'required|max_length[250]',
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
        return view('components/consultation', $this->data);
    }


    // RETURN CONSULTATION DETAILS VIEW
    // -----------------------------------------------------------------
    public function details($id)
    {
        $consultation = $this->consultationsModel->find($id);

        if ($consultation) {
            $this->data['details'] = [
                'consultation_id' => $id,
                'date_of_request' => date_create($consultation['created_at'])->format('d-M-Y H:i'),
                'time' => $consultation['meeting_schedule'] != '' ? date_create($consultation['meeting_schedule'])->format('h:i a') : '---',
                'date' => $consultation['meeting_schedule'] != '' ? date_create($consultation['meeting_schedule'])->format('F d, Y') : '---',
                'meeting_link' => [
                    'href' => $consultation['meeting_link'] != '' ? "href=\"{$consultation['meeting_link']}\"" : '',
                    'text' => $consultation['meeting_link'] != '' ? "<u>{$consultation['meeting_link']}</u>" : '---'
                ],
                'concern_message' => $consultation['message'] != '' ? $consultation['message'] : '---',
                'rejection_message' => $consultation['rejection_message'] != '' ? $consultation['rejection_message'] : '---',
                'category' => $consultation['category']
            ];

            $medical_files = $this->medicalFilesModel->where('consultation_no', $id)->findAll();

            $this->data['files'] = "";
            if ($medical_files) {
                foreach ($medical_files as $key => $medical_file) {
                    $filename = explode('/', $medical_file['file_path'])[4];
                    $key += 1;
                    $href = str_replace('lycean/public', 'clinic/public', base_url($medical_file['file_path']));
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
        } else {
            echo view('errors/html/error_404');
        }
    }


    // FETCH CONSULTATION
    // -----------------------------------------------------------------
    public function fetchActiveConsultation()
    {
        $consultations = $this->consultationsModel
            ->where('lycean_id_no', getIdNo())->where('status', 'active')->where('category', 'Consultation')
            ->orderBy('created_at', 'desc')->findAll();

        $result = "";
        foreach ($consultations as $consultation) {
            $schedule_time = date('h:i A', strtotime($consultation['meeting_schedule']));
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
                        <a href=\"{$consultation['meeting_link']}\" target=\"_blank\"> {$consultation['meeting_link']} </a>
                    </div>
                </div>
                </div>
                <div class=\"col-lg-12 mt-3\" style=\"border:1px solid none\">
                    <div class=\"float-right\">
                        <a href=\"" . site_url('consultation/details/' . $consultation['consultation_no']) . "\" class=\"btn btn-default p-2\">View Details</a>
                    </div>
                    <div class=\"float-right mr-1\">
                        <a href=\"#\" class=\"btn btn btn-outline-danger p-2\" onclick=\"$('#cancelYes').on('click', function() { cancelRequest('{$consultation['consultation_no']}') })\" data-target=\"#cancelrequestModal\" data-toggle=\"modal\">Cancel Request</a>
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
            ->where('lycean_id_no', getIdNo())->where('status', 'pending')->where('category', 'Consultation')
            ->orderBy('created_at', 'desc')->findAll();

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
                <div class=\"col-lg-12 mt-3\" style=\"border:1px solid none\">
                    <div class=\"float-right\">
                        <a href=\"" . site_url('consultation/details/' . $consultation['consultation_no']) . "\" class=\"btn btn-default p-2\">View Details</a>
                    </div>
                    <div class=\"float-right mr-1\">
                    <a href=\"#\" class=\"btn btn btn-outline-danger p-2\" onclick=\"$('#cancelYes').on('click', function() { cancelRequest('{$consultation['consultation_no']}') })\" data-target=\"#cancelrequestModal\" data-toggle=\"modal\">Cancel Request</a>
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
            ->where('lycean_id_no', getIdNo())->where('status', 'rejected')->where('category', 'Consultation')
            ->orderBy('created_at', 'desc')->findAll();

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
            <div class=\"col-lg-12 mt-3\" style=\"border:1px solid none\">
                <span class=\"float-left mb-n2 text-secondary\" style=\"margin-top:23px; margin\">" . date_create($consultation['created_at'])->format('d-M-Y H:i') . "</span>
                <div class=\"float-right\">
                <a href=\"" . site_url('consultation/details/' . $consultation['consultation_no']) . "\" class=\"btn btn-default p-2\">View Details</a>
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
            ->where('lycean_id_no', getIdNo())->where('status', 'done')->where('category', 'Consultation')
            ->orderBy('created_at', 'desc')->findAll();

        $result = "";
        foreach ($consultations as $consultation) {
            $schedule_time = date('h:i A', strtotime($consultation['meeting_schedule']));
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
                        <a href=\"{$consultation['meeting_link']}\" target=\"_blank\"> {$consultation['meeting_link']} </a>
                    </div>
                </div>
                </div>
                <div class=\"col-lg-12 mt-3\" style=\"border:1px solid none\">
                    <span class=\"float-left mb-n2 text-secondary\" style=\"margin-top:23px; margin\">" . date_create($consultation['created_at'])->format('d-M-Y H:i') . "</span>
                    <div class=\"float-right\">
                        <a href=\"" . site_url('consultation/details/' . $consultation['consultation_no']) . "\" class=\"btn btn-default p-2\">View Details</a>
                    </div>
                </div>

                <hr class=\"text-danger\" width=\"100%\">
            </div>
            ";

            $result .= $data;
        }

        return json_encode(['result' => $result, 'count' => count($consultations)]);
    }

    public function fetchCancelledConsultation()
    {
        $consultations = $this->consultationsModel
            ->where('lycean_id_no', getIdNo())->where('status', 'cancelled')->where('category', 'Consultation')
            ->orderBy('created_at', 'desc')->findAll();

        $result = "";
        foreach ($consultations as $consultation) {
            $schedule_time = $consultation['meeting_schedule'] != null ? date('h:i A', strtotime($consultation['meeting_schedule'])) : '---';
            $schedule_date = $consultation['meeting_schedule'] != null ? date('F d, Y', strtotime($consultation['meeting_schedule'])) : '---';
            $meeting_link = $consultation['meeting_link'] != null ? "<a href=\"{$consultation['meeting_link']}\" target=\"_blank\"> {$consultation['meeting_link']} </a>" : '---';

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
                        {$meeting_link}
                    </div>
                </div>
                </div>
                <div class=\"col-lg-12 mt-3\" style=\"border:1px solid none\">
                    <span class=\"float-left mb-n2 text-secondary\" style=\"margin-top:23px; margin\">" . date_create($consultation['created_at'])->format('d-M-Y H:i') . "</span>
                    <div class=\"float-right\">
                        <a href=\"" . site_url('consultation/details/' . $consultation['consultation_no']) . "\" class=\"btn btn-default p-2\">View Details</a>
                    </div>
                </div>

                <hr class=\"text-danger\" width=\"100%\">
            </div>
            ";

            $result .= $data;
        }

        return json_encode(['result' => $result, 'count' => count($consultations)]);
    }


    // FETCH ONLINE HEALTH PERSONNELS
    // -----------------------------------------------------------------
    public function fetchOnlineHealthPersonnels()
    {
        $healthPersonnels = $this->healthPersonnelsAccountModel
            ->where('last_activity', date('Y-m-d h:i'))
            ->findAll();

        $result = "<option value=\"\" selected=\"selected\">---Choose from the available doctors---</option>";
        $count = 0;
        if ($healthPersonnels) {
            foreach ($healthPersonnels as $healthPersonnel) {
                $healthPersonnelsInfo = $this->healthPersonnelsModel->find($healthPersonnel['id_no']);
                $title = 'Dr.';

                if ($healthPersonnelsInfo['designation'] == "Doctor") {
                    $result .= "<option value=\"{$healthPersonnel['id_no']}\">{$title} {$healthPersonnelsInfo['first_name']} {$healthPersonnelsInfo['last_name']}</option>";
                    $count += 1;
                }
            }
        }

        if ($count == 0) {
            $result = "<option value=\"\" selected=\"selected\">---No available doctor---</option>";
        }

        return json_encode(['result' => $result, 'count' => $count]);
    }


    // SEND CONSULTATION REQUEST TO CLINIC
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
                        'category' => 'Consultation',
                        'message' => $_POST['consultation_message'],
                        'personnel_id_no' => $_POST['consultation_doctor'],
                        'lycean_id_no' => getIdNo(),
                    ];

                    $success1 = $this->consultationsModel->save($data);
                    $success2 = $this->setNotification($data, 'sendConsultation');

                    if ($success1 && $success2) {
                        session()->setFlashdata('success', 'Sent');

                        // CREATE ACTIVITY LOG
                        createLog(
                            getIdNo(),
                            'LYCEAN',
                            'Consult',
                            'Request Consultation',
                            "User \"" . getIdNo() . "\" sent a consultation request to doctor \"{$data['personnel_id_no']}\" with consultation_no: \"{$data['consultation_no']}\""
                        );
                    } else {
                    }
                } else {
                    session()->setFlashdata('error', 'You have an active or pending request.');
                }
            } else {
            }
        }

        return redirect()->to('consultation');
    }


    // CANCEL CONSULTATION REQUEST
    // -----------------------------------------------------------------
    public function cancelRequest($id)
    {
        $data = $this->consultationsModel->find($id);

        $success1 = $this->consultationsModel
            ->where('consultation_no', $id)
            ->set([
                'status' => 'cancelled'
            ])->update();
        $success2 = $this->setNotification($data, 'cancelled');

        if ($success1 && $success2) {
            session()->setFlashdata('success', 'Cancelled');

            // CREATE ACTIVITY LOG
            createLog(
                getIdNo(),
                'LYCEAN',
                'Consult',
                'Cancel Consultation',
                "User \"" . getIdNo() . "\" cancelled consultation \"{$id}\""
            );
        }

        return redirect()->to('consultation');
    }


    // SET NOTIFICATION
    // -----------------------------------------------------------------
    private function setNotification($data, $type)
    {
        $icon = '<i class="fas fa-comment-medical fa-lg noti-icon" style="color: #7687CD"></i>';

        if ($type == 'sendConsultation') {
            $info = "You have new consultation requests";
            $link = $this->clinicBaseUrl . '/consultations';
        } else if ($type == 'cancelled') {
            $info = getUserFullname() . " cancelled the request";
            $link = $this->clinicBaseUrl . '/consultations/history?cID=' . $data['consultation_no'];
        }

        return $this->healthPersonnelsNotificationModel->save([
            'id_no' => $data['personnel_id_no'],
            'icon' => $icon,
            'info' => $info,
            'status' => 'unread',
            'link' => $link
        ]);
    }
}
