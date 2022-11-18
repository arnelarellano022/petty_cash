<?php
namespace App\Controllers;

class users extends BaseController
{
    var $system_menu = array();

    function __construct(){

        $this->Users_Model = model('Users_Model');
        $this->Module_Model = model('Module_Model');
        $this->Auth_Model = model('Auth_Model');

        $this->session = \Config\Services::session();
        $this->session->start();

        $result = $this->Auth_Model->load_index_data();
        $this->system_menu['main_menu'] = $result['main_menu'];
        $this->system_menu['sub_menu'] = $result['sub_menu'];
        $this->system_menu['index_user_role'] = $result['index_user_role'];
        helper(['form']);
    }

    public function users_index(){

        if (!isset($_SESSION['user_role'])) {
            return redirect()->to('/index');
        } else {
            $module = $this->system_menu;
            $module['fetch_data'] = $this->Users_Model->users_list();
            $module['title']='USER LIST';

            echo view('partial/header',$module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('users/list',$module);
            echo view('partial/footer');
        }
    }

    public function add_user(){

        $session = session();

        if($_POST['submit'])
        {
            $this->Users_Model->insert_user();
            $session->setFlashdata("success", "User Added Successfully");
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
        $session = session();

        if($_POST['submit']) {
            $this->Users_Model->update_user($id);
            //check value from model Y/N
            $session->setFlashdata("success", "Record Updated Successfully");
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

        $session->setFlashdata("success", "Record Deleted Successfully");
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
        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(1, 1, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_roles'] = $this->Roles_Model->get_roles();
                $data['fetch_data'] = $this->Users_Model->users_updating($id);
                $this->load->view('users/update', $data);
            } else {
                redirect('error_403', 'refresh');
            }
        }
    }

    public function change_status(){
        $this->Users_Model->change_status();
    }


}