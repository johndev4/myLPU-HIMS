<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Userdata extends BaseController
{
    public function __construct()
    {
        helper(['useraccount', 'activitylogs']);
        // Page title
        $this->data['page_title'] = 'Deleted Accounts';
        // User admin name
        $this->data['adminName'] = getAdminName();
    }


    // RETURN VIEWS
    // -----------------------------------------------------------------
    public function student()
    {
        // Display page view
        return view('components/deleted_accounts/student', $this->data);
    }

    public function faculty()
    {
        // Display page view
        return view('components/deleted_accounts/faculty', $this->data);
    }

    public function staff()
    {
        // Display page view
        return view('components/deleted_accounts/staff', $this->data);
    }

    public function healthPersonnel()
    {
        // Display page view
        return view('components/deleted_accounts/health_personnel', $this->data);
    }


    // FETCH DATA
    // ---------------------------------------------------------
    public function fetchAllLycean($role)
    {
        $result = array('data' => array());
        $lyceans = $this->lyceansModel
            ->where('role', $role)
            ->findAll();

        $count = 0;
        foreach ($lyceans as $lycean) {
            $lyceansAccount = $this->lyceansAccountModel->find($lycean['id_no']);
            if (!$lyceansAccount) {
                $result['data'][$count] = array(
                    $lycean['id_no'],
                    $lycean['first_name'],
                    $lycean['last_name'],
                    $lycean['department'],
                    "<div align=\"center\">
					<button type=\"button\" class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#deleteModal\" onclick=\"retrieveData('" . $lycean['id_no'] . "')\">Delete</button>
					</div>"
                );
                $count += 1;
            }
        }

        return json_encode($result);
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

        return json_encode($result);
    }


    // DELETE DATA
    // ---------------------------------------------------------
    private function deleteLyceanData($id)
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

                // CREATE ACTIVITY LOG
                createLog(
                    getAdminId(),
                    'ADMIN',
                    'Deleted Accounts',
                    'Delete LY User',
                    "User \"" . getAdminId() . "\" deleted the data of user \"{$id}\""
                );
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

    public function deleteStudentData($id)
    {
        $this->deleteLyceanData($id);
        return redirect()->to('userdata/student');
    }

    public function deleteFacultyData($id)
    {
        $this->deleteLyceanData($id);
        return redirect()->to('userdata/faculty');
    }

    public function deleteStaffData($id)
    {
        $this->deleteLyceanData($id);
        return redirect()->to('userdata/staff');
    }

    public function deleteHealthPersonnelData($id)
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

                // CREATE ACTIVITY LOG
                createLog(
                    getAdminId(),
                    'ADMIN',
                    'Deleted Accounts',
                    'Delete HP User',
                    "User \"" . getAdminId() . "\" deleted the data of user \"{$id}\""
                );
            } else {
            }
        }

        return redirect()->to('userdata/healthpersonnel');
    }


    // DELETE ALL ACCOUNT
    // ---------------------------------------------------------
    private function deleteAllLyceanData()
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

                    // CREATE ACTIVITY LOG
                    createLog(
                        getAdminId(),
                        'ADMIN',
                        'Deleted Accounts',
                        'Delete ALl LY User',
                        "User \"" . getAdminId() . "\" deleted all the user data"
                    );
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

    public function deleteAllStudentData()
    {
        $this->deleteAllLyceanData();
        return redirect()->to('userdata/student');
    }

    public function deleteAllFacultyData()
    {
        $this->deleteAllLyceanData();
        return redirect()->to('userdata/faculty');
    }

    public function deleteAllStaffData()
    {
        $this->deleteAllLyceanData();
        return redirect()->to('userdata/staff');
    }

    public function deleteAllHealthPersonnelData()
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

                // CREATE ACTIVITY LOG
                createLog(
                    getAdminId(),
                    'ADMIN',
                    'Deleted Accounts',
                    'Delete All HP User',
                    "User \"" . getAdminId() . "\" deleted all the user data"
                );
            } else {
            }
        }

        return redirect()->to('userdata/healthpersonnel');
    }
}
