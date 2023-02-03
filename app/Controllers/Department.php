<?php
namespace App\Controllers;

class department extends BaseController
{
    function __construct(){
        $this->Department_Model = model('Department_Model');
        $this->session = \Config\Services::session();
        $this->session->start();
        helper(['form']);
    }

    //Department
    public function department_index(){

        if(check_module_access(get_class(), $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};
        if(check_module_access(get_class(), $_SESSION['user_role'],'add') == true) {$data['add_access'] = true;};
        if(check_module_access(get_class(), $_SESSION['user_role'],'edit') == true) {$data['edit_access'] = true;};
        if(check_module_access(get_class(), $_SESSION['user_role'],'delete') == true) {$data['delete_access'] = true;};

        $data['fetch_data'] = $this->Department_Model->department_list();
        $data['title']='DEPARTMENT LIST';

            echo view('partial/header',$data);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('department/list',$data);
            echo view('partial/footer');

    }

    public function add_department(){

        if(check_module_access(get_class(), $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit'])
            {
                $this->Department_Model->insert_department();
                $this->session->setFlashdata("success", "Record Added Successfully");
                return redirect()->to('/department_index');
            }

            $module['title'] = 'ADD NEW DEPARTMENT';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('department/add', $module);
            echo view('partial/footer');
    }

    public function edit_department($id)
    {
        if(check_module_access(get_class(), $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit']) {
                $this->Department_Model->update_department($id);
                //check value from model Y/N
                $this->session->setFlashdata("success", "Record Updated Successfully");
                return redirect()->to('/department_index');
            }


            $module['fetch_data'] = $this->Department_Model->get_department_by_id($id);
            $module['title'] = 'EDIT DEPARTMENT';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('department/edit', $module);
            echo view('partial/footer');
    }

    public function delete_department($delete_ID)
    {
        if(check_module_access(get_class(), $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};
            $this->Department_Model->delete_department($delete_ID);

            $this->session->setFlashdata("success", "Record Deleted Successfully");
            return redirect()->to('/department_index');
    }

}