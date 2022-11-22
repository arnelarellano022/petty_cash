<?php
namespace App\Controllers;

class users extends BaseController
{
    var $Module_ID = 1;
    var $Sub_Module_ID = 1;

    function __construct(){
        $this->Users_Model = model('Users_Model');
        $this->session = \Config\Services::session();
        $this->session->start();
        helper(['form']);

        $router = service('router');
        $this->controller  = $router->controllerName();
        $this->module_id     = 1 ;
        $this->sub_module_id = 1 ;
    }

    public function users_index(){


            if(check_module_permission($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_403');};

            $data['fetch_data'] = $this->Users_Model->users_list();
            $data['title']='USER LIST';
            $data['controller_name']= $this->controller;

            echo view('partial/header',$data);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('users/list',$data);
            echo view('partial/footer');

    }

    public function add_user(){

        if($_POST['submit'])
        {
            $this->Users_Model->insert_user();
            $this->session->setFlashdata("success", "User Added Successfully");
            return redirect()->to('/users_index');
        }
        $module = $this->system_menu;
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

        if($_POST['submit']) {
            $this->Users_Model->update_user($id);
            //check value from model Y/N
            $this->session->setFlashdata("success", "Record Updated Successfully");
            return redirect()->to('/users_index');
        }

        $module = $this->system_menu;
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
        $session = session();
        $this->Users_Model->delete_user($delete_ID);

        $this->session->setFlashdata("success", "Record Deleted Successfully");
        return redirect()->to('/users_index');
    }

    public function updating_users($ID)
    {
        $this->form_validation->set_rules('user_password', 'Password', 'required');
        $this->form_validation->set_rules('user_cpassword', 'Confirm Password', 'required|matches[user_password]');

        if ($this->form_validation->run() == TRUE) {

            $result = $this->Users_Model->updating_users_model($ID);

            //check value from model Y/N
            if ($result['result'] == true) {
                $this->session->set_flashdata("success", "Data successfully updated to the database.");
                redirect("users_index", "refresh");

            } else {
                $this->session->set_flashdata("error", "Error on updating data to the database.");
                $data =  $this->system_menu;
                $data['fetch_data'] = $this->Users_Model->users_updating($ID);
                $this->load->view('users/update', $data);
            }
        }
        else
        {   $data =  $this->system_menu;
            $data['fetch_data'] = $this->Users_Model->users_updating($ID);
            $this->load->view('users/update', $data);
        }
    }
    public function update_user($id)
    {

            $result = $this->Login_Model->check_module_permission(1, 1, $_SESSION['user_role'],'access');
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_roles'] = $this->Roles_Model->get_roles();
                $data['fetch_data'] = $this->Users_Model->users_updating($id);
                $this->load->view('users/update', $data);
            } else {
                return redirect()->to('/error_403');
            }

    }

    public function change_status(){
        $this->Users_Model->change_status();
    }


}