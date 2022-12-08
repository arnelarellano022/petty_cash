<?php

namespace App\Models;
use CodeIgniter\Model;


class Employee_Model extends  Model
{   protected $helpers = ['form'];
    public function __construct() {
        $db      = \Config\Database::connect();
        $this->employee = $db->table('employee');
        $this->company = $db->table('company');
        $this->department = $db->table('department');
        date_default_timezone_set('Asia/Manila');

    }

    public function employee_list()
    {
        return $this->employee->select('*')
            ->join('company', 'employee.company = company.company_id')
            ->orderBy('employee.last_name', 'asc')
            ->get()->getResult();
    }

    public function get_Company_List()
    {
        return $this->company->orderBy('company_id', 'asc')
            ->get()->getResult();
    }
    
    public function get_Department_List()
    {
        return $this->department->orderBy('dept_id', 'asc')
            ->get()->getResult();
    }

    public function insert_employee($filename)
    {

        $date = date('Y-m-d H:i:s');
        $user_id = $_SESSION['user_id'];

        $data = array(
            'id_no'                         => $_POST['id_no'],
            'last_name'                     => $_POST['last_name'],
            'first_name'                    => $_POST['first_name'],
            'middle_name'                   => $_POST['middle_name'],
            'present_address'               => $_POST['present_address'],
            'permanent_address'            => $_POST['permanent_address'],
            'birthday'                      => $_POST['birthday'],
            'gender'                        => $_POST['gender'],
            'civil_status'                  => $_POST['civil_status'],
            'contact_number'                => $_POST['contact_number'],
            'sss'                           => $_POST['sss'],
            'phic'                          => $_POST['phic'],
            'hdmf'                          => $_POST['hdmf'],
            'tin'                           => $_POST['tin'],
            'educational_attainment'        => $_POST['educational_attainment'],
            'e_contact_person'              => $_POST['e_contact_person'],
            'e_address'                     => $_POST['e_address'],
            'e_contact_no'                  => $_POST['e_contact_no'],
            'company'                       => $_POST['company'],
            'position'                      => $_POST['position'],
            'department'                    => $_POST['department'],
            'date_hired'                    => $_POST['date_hired'],
            'employment_status'             => $_POST['employment_status'],
            'employee_rank'                 => $_POST['employee_rank'],
            'date_of_separation'            => $_POST['date_of_separation'],
            'created_by'                    => $user_id,
            'created_at'                    => $date,
            'updated_by'                    => $user_id,
            'updated_at'                    => $date,
            'image_src_filename'            => $filename
        );

        $this->employee->insert($data);

    }

    public function update_employee($data_pass)
    {
        $date = date('Y-m-d H:i:s');
        $user_id = $_SESSION['user_id'];



        $data = array(
            'id_no'                         => $_POST['id_no'],
            'last_name'                     => $_POST['last_name'],
            'first_name'                    => $_POST['first_name'],
            'middle_name'                   => $_POST['middle_name'],
            'present_address'               => $_POST['present_address'],
            'permanent_address'            => $_POST['permanent_address'],
            'birthday'                      => $_POST['birthday'],
            'gender'                        => $_POST['gender'],
            'civil_status'                  => $_POST['civil_status'],
            'contact_number'                => $_POST['contact_number'],
            'sss'                           => $_POST['sss'],
            'phic'                          => $_POST['phic'],
            'hdmf'                          => $_POST['hdmf'],
            'tin'                           => $_POST['tin'],
            'educational_attainment'        => $_POST['educational_attainment'],
            'e_contact_person'              => $_POST['e_contact_person'],
            'e_address'                     => $_POST['e_address'],
            'e_contact_no'                  => $_POST['e_contact_no'],
            'company'                       => $_POST['company'],
            'position'                      => $_POST['position'],
            'department'                    => $_POST['department'],
            'date_hired'                    => $_POST['date_hired'],
            'employment_status'             => $_POST['employment_status'],
            'employee_rank'                 => $_POST['employee_rank'],
            'date_of_separation'            => $_POST['date_of_separation'],
            'updated_by'                    => $user_id,
            'updated_at'                    => $date,

        );

        if(!empty($_FILES['file']['name'])){ $data = array_merge($data, array( 'image_src_filename' => $data_pass['filename']));}

        $this->employee->update($data, 'employee_id =' . $data_pass['employee_id']);
        $result = ($this->employee->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }
    public function delete_employee($employee_id)
    {
//        unlink( "./uploads/" . $row->photo_filename );
        $this->employee->delete(['employee_id' => $employee_id]);
    }

    public function get_employee_by_id($employee_id)
    {
            return $this->employee->select('*')
            ->join('department', 'employee.department = department.dept_id')
            ->join('company', 'employee.company = company.company_id')
            ->where('employee.employee_id', $employee_id)
            ->get()->getResult();
    }


    public function check_id_no_exist($id_no)
    {
        $result = $this->employee->where('id_no', $id_no)
            ->countAllResults();
        return($result > 0) ? 1 : 0;
    }

}