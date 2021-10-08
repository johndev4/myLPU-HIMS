<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserInformations extends BaseController
{
    public function __construct()
    {
        helper('useraccount');
        // Page title
        $this->data['page_title'] = 'Dashboard';
        // User firstname
        $this->data['adminName'] = getAdminName();

        // Medical Records Directory
        $this->medicalRecordsDir = $_SERVER['DOCUMENT_ROOT'] . 'myLPU-HIMS/clinic/public/uploaded/medical_records/';
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
            }

            $success3 = $this->lyceansModel->delete($id);

            if ($success1 && $success2 && $success3) {
                // Create flashdata for database query status
                session()->setFlashdata('success', 'Successfully deleted.');
            } else {
            }
        }
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
            $success = $this->healthPersonnelsModel->delete($id);

            if ($success) {
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
                    }
                }

                $success3 = $this->lyceansModel->delete($lyceansId);

                if ($success1 && $success2 && $success3) {
                    // Create flashdata for database query status
                    session()->setFlashdata('success', 'Successfully deleted.');
                } else {
                }
            }
        }
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
            $id = [];

            foreach ($healthPersonnels as $key => $value) {
                $healthPersonnelsAccount = $this->healthPersonnelsAccountModel->find($value['id_no']);
                if (!$healthPersonnelsAccount) {
                    $id[$key] = $value['id_no'];
                }
            }

            $success = $this->healthPersonnelsModel->delete($id);

            if ($success) {
                // Create flashdata for database query status
                session()->setFlashdata('success', 'Successfully deleted.');
            } else {
            }
        }

        return redirect()->to('userinformations/healthpersonnel');
    }
}
