<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Userinformations extends BaseController
{
    public function __construct()
    {
        helper('useraccount');
        // Page title
        $this->data['page_title'] = 'User Informations';
        // User admin name
        $this->data['adminName'] = getAdminName();
    }


    // RETURN VIEWS
    // -----------------------------------------------------------------
    public function student()
    {
        // Display page view
        return view('components/user_informations/student', $this->data);
    }

    public function faculty()
    {
        // Display page view
        return view('components/user_informations/faculty', $this->data);
    }

    public function staff()
    {
        // Display page view
        return view('components/user_informations/staff', $this->data);
    }

    public function healthPersonnel()
    {
        // Display page view
        return view('components/user_informations/health_personnel', $this->data);
    }


    // FETCH DATA
    // ---------------------------------------------------------
    public function fetchAllStudent()
    {
        $result = array('data' => array());
        $lyceans = $this->lyceansModel
            ->where('role', 'student')
            ->findAll();

        $count = 0;
        foreach ($lyceans as $value) {
            $lyceansAccount = $this->lyceansAccountModel->find($value['id_no']);
            if (!$lyceansAccount) {
                $result['data'][$count] = array(
                    $value['id_no'],
                    $value['first_name'],
                    $value['last_name'],
                    $value['department'],
                    "<div align=\"center\">
					<button type=\"button\" class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#deleteModal\" onclick=\"retrieveData('" . $value['id_no'] . "')\">Delete</button>
					</div>"
                );
                $count += 1;
            }
        }

        echo json_encode($result);
    }

    public function fetchAllFaculty()
    {
        $result = array('data' => array());
        $lyceans = $this->lyceansModel
            ->where('role', 'faculty')
            ->findAll();

        $count = 0;
        foreach ($lyceans as $value) {
            $lyceansAccount = $this->lyceansAccountModel->find($value['id_no']);
            if (!$lyceansAccount) {
                $result['data'][$count] = array(
                    $value['id_no'],
                    $value['first_name'],
                    $value['last_name'],
                    $value['department'],
                    "<div align=\"center\">
					<button type=\"button\" class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#deleteModal\" onclick=\"retrieveData('" . $value['id_no'] . "')\">Delete</button>
					</div>"
                );
                $count += 1;
            }
        }

        echo json_encode($result);
    }

    public function fetchAllStaff()
    {
        $result = array('data' => array());
        $lyceans = $this->lyceansModel
            ->where('role', 'staff')
            ->findAll();

        $count = 0;
        foreach ($lyceans as $value) {
            $lyceansAccount = $this->lyceansAccountModel->find($value['id_no']);
            if (!$lyceansAccount) {
                $result['data'][$count] = array(
                    $value['id_no'],
                    $value['first_name'],
                    $value['last_name'],
                    $value['department'],
                    "<div align=\"center\">
					<button type=\"button\" class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#deleteModal\" onclick=\"retrieveData('" . $value['id_no'] . "')\">Delete</button>
					</div>"
                );
                $count += 1;
            }
        }

        echo json_encode($result);
    }

    public function fetchAllHealthPersonnel()
    {
        $result = array('data' => array());
        $healthPersonnels = $this->healthPersonnelsModel->findAll();

        $count = 0;
        foreach ($healthPersonnels as $value) {
            $healthPersonnelsAccount = $this->healthPersonnelsAccountModel->find($value['id_no']);
            if (!$healthPersonnelsAccount) {
                $result['data'][$count] = array(
                    $value['id_no'],
                    $value['first_name'],
                    $value['last_name'],
                    $value['designation'],
                    "<div align=\"center\">
                    <button type=\"button\" class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#deleteModal\" onclick=\"retrieveData('" . $value['id_no'] . "')\">Delete</button>
					</div>"
                );
                $count += 1;
            }
        }

        echo json_encode($result);
    }


    // DELETE DATA
    // ---------------------------------------------------------
    private function deleteLyceanInformation($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $success1 = $this->healthRecordsModel->delete($id);

            // Delete directory
            if (file_exists($this->medicalRecordsDir . $id)) {
                $files = glob($this->medicalRecordsDir . $id . '/*');

                foreach ($files as $file) {
                    unlink($file);
                }

                $success2 =  rmdir($this->medicalRecordsDir . $id);
            } else {
                $success2 = TRUE;
            }

            $success3 = $this->lyceansNotificationModel->where('id_no', $id)->delete();
            $success4 = $this->deleteConsultationsById($id);
            $success5 = $this->lyceansModel->delete($id);

            if ($success1 && $success2 && $success3 && $success4 && $success5) {
                // Create flashdata for database query status
                session()->setFlashdata('success', 'Successfully deleted.');
            } else {
            }
        }
    }

    private function deleteConsultationsById($id)
    {
        $consultations = $this->consultationsModel->where('lycean_id_no', $id)->findAll();

        foreach ($consultations as $consultation) {
            $success1 = $this->medicalFilesModel
                ->where('consultation_no', $consultation['consultation_no'])
                ->delete();

            // Delete directory
            if (file_exists($this->medicalFilesDir . $id)) {
                $files = glob($this->medicalFilesDir . $id . '/*');

                foreach ($files as $file) {
                    unlink($file);
                }

                $success2 =  rmdir($this->medicalFilesDir . $id);
            } else {
                $success2 = TRUE;
            }

            if (!$success1 || !$success2) {
                return false;
            }
        }
        $success3 = $this->consultationsModel->where('lycean_id_no', $id)->delete();
        if (!$success3) {
            return false;
        }
        return true;
    }

    public function deleteStudentInformation($id)
    {
        $this->deleteLyceanInformation($id);
        return redirect()->to('userinformations/student');
    }

    public function deleteFacultyInformation($id)
    {
        $this->deleteLyceanInformation($id);
        return redirect()->to('userinformations/faculty');
    }

    public function deleteStaffInformation($id)
    {
        $this->deleteLyceanInformation($id);
        return redirect()->to('userinformations/staff');
    }

    public function deleteHealthPersonnelInformation($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $success1 = $this->healthPersonnelsNotificationModel->where('id_no', $id)->delete();
            $success2 = $this->consultationsModel
                ->where('personnel_id_no', $id)
                ->set([
                    'personnel_id_no' => null
                ])->update();
            $success3 = $this->healthPersonnelsModel->delete($id);

            if ($success1 && $success2 && $success3) {
                // Create flashdata for database query status
                session()->setFlashdata('success', 'Successfully deleted.');
            } else {
            }
        }

        return redirect()->to('userinformations/healthpersonnel');
    }


    // DELETE ALL ACCOUNT
    // ---------------------------------------------------------
    public function deleteAllInformations()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $lyceans = $this->lyceansModel->where('role', $_GET['role'])->findAll();
            $lyceansId = [];

            foreach ($lyceans as $key => $value) {
                $lyceansAccount = $this->lyceansAccountModel->find($value['id_no']);
                if (!$lyceansAccount) {
                    $lyceansId[$key] = $value['id_no'];
                }
            }

            if ($lyceansId != []) {
                $success1 = $this->healthRecordsModel->delete($lyceansId);

                // Delete directories
                foreach ($lyceansId as $id) {
                    if (file_exists($this->medicalRecordsDir . $id)) {
                        $files = glob($this->medicalRecordsDir . $id . '/*');

                        foreach ($files as $file) {
                            unlink($file);
                        }

                        $success2 =  rmdir($this->medicalRecordsDir . $id);
                    } else {
                        $success2 = TRUE;
                    }
                }

                $success3 = $this->lyceansNotificationModel->whereIn('id_no', $lyceansId)->delete();
                $success4 = $this->deleteConsultationsByIds($lyceansId);
                $success5 = $this->lyceansModel->delete($lyceansId);

                if ($success1 && $success2 && $success3 && $success4 && $success5) {
                    // Create flashdata for database query status
                    session()->setFlashdata('success', 'Successfully deleted.');
                } else {
                }
            }
        }
    }

    private function deleteConsultationsByIds($lyceansId)
    {
        $consultations = $this->consultationsModel->whereIn('lycean_id_no', $lyceansId)->findAll();

        foreach ($consultations as $consultation) {
            $success1 = $this->medicalFilesModel
                ->where('consultation_no', $consultation['consultation_no'])
                ->delete();

            // Delete directory
            if (file_exists($this->medicalFilesDir . $consultation['lycean_id_no'])) {
                $files = glob($this->medicalFilesDir . $consultation['lycean_id_no'] . '/*');
                
                foreach ($files as $file) {
                    unlink($file);
                }

                $success2 =  rmdir($this->medicalFilesDir . $consultation['lycean_id_no']);
            } else {
                $success2 = TRUE;
            }

            if (!$success1 || !$success2) {
                return false;
            }
        }
        $success3 = $this->consultationsModel->whereIn('lycean_id_no', $lyceansId)->delete();
        if (!$success3) {
            return false;
        }
        return true;
    }

    public function deleteAllStudentInformations()
    {
        $this->deleteAllInformations();
        return redirect()->to('userinformations/student');
    }

    public function deleteAllFacultyInformations()
    {
        $this->deleteAllInformations();
        return redirect()->to('userinformations/faculty');
    }

    public function deleteAllStaffInformations()
    {
        $this->deleteAllInformations();
        return redirect()->to('userinformations/staff');
    }

    public function deleteAllHealthPersonnelInformations()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $healthPersonnels = $this->healthPersonnelsModel->findAll();
            $ids = [];

            foreach ($healthPersonnels as $key => $value) {
                $healthPersonnelsAccount = $this->healthPersonnelsAccountModel->find($value['id_no']);
                if (!$healthPersonnelsAccount) {
                    $ids[$key] = $value['id_no'];
                }
            }
            $success1 = $this->healthPersonnelsNotificationModel->whereIn('id_no', $ids)->delete();
            $success2 = $this->consultationsModel
                ->whereIn('personnel_id_no', $ids)
                ->set([
                    'personnel_id_no' => null
                ])->update();
            $success3 = $this->healthPersonnelsModel->delete($ids);

            if ($success1 && $success2 && $success3) {
                // Create flashdata for database query status
                session()->setFlashdata('success', 'Successfully deleted.');
            } else {
            }
        }

        return redirect()->to('userinformations/healthpersonnel');
    }
}
