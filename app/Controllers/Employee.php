<?php
namespace App\Controllers;

class Employee extends BaseController
{
    function __construct(){
        $this->Employee_Model = model('Employee_Model');
        $this->session = \Config\Services::session();
        $this->session->start();

        helper(['form']);

        $this->module_id     = 7 ;
        $this->sub_module_id = 9 ;
    }

    public function employee_index(){

        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'add') == true) {$data['add_access'] = true;};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'view') == true) {$data['view_access'] = true;};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'edit') == true) {$data['edit_access'] = true;};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'delete') == true) {$data['delete_access'] = true;};

            $data['fetch_data'] = $this->Employee_Model->employee_list();
            $data['title']='EMPLOYEE LIST';

            echo view('partial/header',$data);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('employee/list',$data);
            echo view('partial/footer');

    }

    public function add_employee(){

        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'add') == false) {return redirect()->to('/error_404');};

            if($_POST['submit'])
            {
                $this->Employee_Model->insert_employee();
                $this->session->setFlashdata("success", "Employee Added Successfully");
                return redirect()->to('/employee_index');
            }

            $module['employee_role_list'] = $this->Employee_Model->get_Roles_List();
            $module['title'] = 'ADD NEW EMPLOYEE';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('employee/add', $module);
            echo view('partial/footer');
    }


    public function view_employee($id)
    {
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'view') == false) {return redirect()->to('/error_404');};



            $module['fetch_data'] = $this->Employee_Model->get_employee_by_id($id);
            $module['title'] = 'VIEW EMPLOYEE';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('employee/view', $module);
            echo view('partial/footer');
    }

    public function edit_employee($id)
    {
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'edit') == false) {return redirect()->to('/error_404');};

            if($_POST['submit']) {
                $this->Employee_Model->update_employee($id);
                //check value from model Y/N
                $this->session->setFlashdata("success", "Record Updated Successfully");
                return redirect()->to('/employee_index');
            }

            $module['fetch_data'] = $this->Employee_Model->get_employee_by_employee_id($id);
            $module['employee_role_list'] = $this->Employee_Model->get_Roles_List();
            $module['title'] = 'EDIT EMPLOYEE';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('employee/edit', $module);
            echo view('partial/footer');
    }


    public function delete_employee($delete_ID)
    {
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'delete') == false) {return redirect()->to('/error_404');};

            $this->Employee_Model->delete_employee($delete_ID);

            $this->session->setFlashdata("success", "Record Deleted Successfully");
            return redirect()->to('/employee_index');
    }
    
}