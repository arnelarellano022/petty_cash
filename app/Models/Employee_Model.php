<?php

namespace App\Models;
use CodeIgniter\Model;


class Employee_Model extends  Model
{
    public function __construct() {
        $db      = \Config\Database::connect();
        $this->employee = $db->table('employee');
        $this->company = $db->table('company');
        $this->department = $db->table('department');
        date_default_timezone_set('Asia/Manila');
    }

    public function employee_list()
    {
        return $this->employee->orderBy('last_name', 'asc')
            ->get()->getResult();
    }

    public function get_Company_List()
    {
        return $this->company->orderBy('id', 'asc')
            ->get()->getResult();
    }
    
    public function get_Department_List()
    {
        return $this->department->orderBy('id', 'asc')
            ->get()->getResult();
    }

    public function insert_employee($image_name)
    {
        $attach_filename = "";
        $full_name =  $_SESSION['last_name'] . ", " . $_SESSION['first_name'];

        if (!empty($_FILES['Filename']['name'])) {

            $path_parts = pathinfo($_FILES["Filename"]["name"]);
            $extension = $path_parts['extension'];

            $attach_filename = $image_name['img_name'] . "." . $extension;
        }

        $date = date('Y-m-d H:i:s');
        $created_by = $_SESSION['user_id'];

        $data = array(
            'id_no'                         => $_SESSION['id_no'],
            'last_name'                     => $_SESSION['last_name'],
            'first_name'                    => $_SESSION['first_name'],
            'middle_name'                   => $_SESSION['middle_name'],
            'present_address'               => $_SESSION['present_address'],
            'provincial_address'            => $_SESSION['provincial_address'],
            'birthday'                      => $_SESSION['birthday'],
            'gender'                        => $_SESSION['gender'],
            'civil_status'                  => $_SESSION['civil_status'],
            'contact_number'                => $_SESSION['contact_number'],
            'sss'                           => $_SESSION['sss'],
            'phic'                          => $_SESSION['phic'],
            'hdmf'                          => $_SESSION['hdmf'],
            'tin'                           => $_SESSION['tin'],
            'educational_attainment'        => $_SESSION['educational_attainment'],
            'e_contact_person'              => $_SESSION['e_contact_person'],
            'e_address'                     => $_SESSION['e_address'],
            'e_contact_no'                  => $_SESSION['e_contact_no'],
            'company'                       => $_SESSION['company'],
            'position'                      => $_SESSION['position'],
            'department'                    => $_SESSION['department'],
            'date_hired'                    => $_SESSION['date_hired'],
            'employment_status'             => $_SESSION['employment_status'],
            'employee_rank'                 => $_SESSION['employee_rank'],
            'date_of_separation'            => $_SESSION['date_of_separation'],
            'created_by'                    => $created_by,
            'created_at'                    => $date,
            'updated_by'                    => $created_by,
            'updated_at'                    => $date,
            'image_src_filename'            => $attach_filename,
            'full_name'                     => $full_name

        );

        $this->employee->insert($data);

    }

    public function update_employee($employee_id)
    {
        $date = date('Y-m-d H:i:s');

        $data = array(
            'firstname'         => $_POST['firstname'],
            'lastname'          => $_POST['lastname'],
            'employee_role'         => $_POST['employee_role'],
            'sec_question'      => $_POST['sec_question'],
            'sec_answer'        => md5($_POST['sec_answer']) ,
            'last_ip'           => $this->getemployeeIpAddr(),
            'updated_at'        => $date,
        );

        $password = $_POST['password'];

        if($password != ''){
            $password = hash('sha512', $_POST['password']);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $data = array_merge($data, array('password' =>$password));
        }

        $this->employee->update($data, 'employee_id =' . $employee_id);
        $result = ($this->employee->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }
    public function delete_employee($employee_id)
    {
        $this->employee->delete(['employee_id' => $employee_id]);
    }

    public function get_employee_by_id($employee_id)
    {
        return $this->employee->where('id', $employee_id)
            ->get()->getResult();
    }


    public function check_employeename_exist($employeename)
    {
        $result = $this->employee->where('employeename', $employeename)
            ->countAllResults();
        return($result > 0) ? true : false;
    }

}