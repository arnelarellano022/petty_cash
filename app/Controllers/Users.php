<?php
namespace App\Controllers;

class users extends BaseController
{
    function __construct(){
        $this->Users_Model = model('Users_Model');
        $this->session = \Config\Services::session();
        $this->session->start();

        helper(['form']);

        $this->module_id     = 1 ;
        $this->sub_module_id = 1 ;
    }

    public function users_index(){

        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'add') == true) {$data['add_access'] = true;};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'edit') == true) {$data['edit_access'] = true;};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'delete') == true) {$data['delete_access'] = true;};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'change_status') == true) {$data['status_access'] = true;};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'verify_account') == true) {$data['verify_account_access'] = true;};

            $data['fetch_data'] = $this->Users_Model->users_list();
            $data['title']='USER LIST';

            echo view('partial/header',$data);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('users/list',$data);
            echo view('partial/footer');

    }

    public function add_user(){

        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'add') == false) {return redirect()->to('/error_404');};

            if($_POST['submit'])
            {
                $this->Users_Model->insert_user();
                $this->session->setFlashdata("success", "User Added Successfully");
                return redirect()->to('/users_index');
            }

            $module['user_role_list'] = $this->Users_Model->get_Roles_List();
            $module['title'] = 'ADD NEW USER';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('users/add', $module);
            echo view('partial/footer');
    }


    public function edit_user($id)
    {
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'edit') == false) {return redirect()->to('/error_404');};

            if($_POST['submit']) {
                $this->Users_Model->update_user($id);
                //check value from model Y/N
                $this->session->setFlashdata("success", "Record Updated Successfully");
                return redirect()->to('/users_index');
            }

            $module['fetch_data'] = $this->Users_Model->get_user_by_user_id($id);
            $module['user_role_list'] = $this->Users_Model->get_Roles_List();
            $module['title'] = 'EDIT USER';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('users/edit', $module);
            echo view('partial/footer');
    }


    public function delete_user($delete_ID)
    {
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'delete') == false) {return redirect()->to('/error_404');};

            $this->Users_Model->delete_user($delete_ID);

            $this->session->setFlashdata("success", "Record Deleted Successfully");
            return redirect()->to('/users_index');
    }

    public function change_status(){
        $this->Users_Model->change_status();
    }

    public function change_verify_status(){
        $this->Users_Model->change_verify_status();
    }

    function check_username_exist(){
        echo $this->Users_Model->check_username_exist($_POST['username']);
    }


}