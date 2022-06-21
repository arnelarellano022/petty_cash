<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class roles extends CI_Controller

{
    var $system_menu = array();

    function __construct(){
        parent::__construct();
        $this->load->model('Roles_Model');
        $this->load->model('Login_Model');
        $result = $this->Login_Model->load_index_data();
        $this->system_menu['main_menu'] = $result['main_menu'];
        $this->system_menu['sub_menu'] = $result['sub_menu'];
        $this->system_menu['index_user_roles'] = $result['index_user_roles'];
    }

    //Roles
    public function roles_index(){
        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(1, 2, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_data'] = $this->Roles_Model->roles_fetch_data();
                $this->load->view('roles/_form', $data);
            } else {
                redirect('error_403', 'refresh');
            }
        }
    }

    public function create_roles(){
        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(1, 2, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $this->load->view('roles/create', $data);
            } else {
                redirect('error_403', 'refresh');
            }
        }
    }

    public function insert_roles(){
        $result= $this->Roles_Model->insert_roles_model();
        //check value from model Y/N
        if($result['result']==true ){

            $this->session->set_flashdata("success", "Data successfully added to the database.");
            redirect("roles_index", "refresh");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
            $this->load->view('roles/create');
        }
    }
    public function delete_roles($delete_ID){

        $result = $this->Roles_Model->delete_roles_Model($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }
        redirect("roles_index", "refresh");
    }

    public function updating_roles($ID)
    {
        $result = $this->Roles_Model->updating_roles_model($ID);

        //check value from model Y/N
        if($result['result']==true ){
            $this->session->set_flashdata("success", "Data successfully updated to the database.");
            redirect("roles_index", "refresh");

        } else {
            $this->session->set_flashdata("error", "Error on updating data to the database.");
            redirect("update_roles", "refresh");
        }
    }
    public function update_roles($id)
    {
        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(1, 2, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_data'] = $this->Roles_Model->roles_updating($id);
                $this->load->view('roles/update', $data);
            } else {
                redirect('error_403', 'refresh');
            }
        }
    }


}