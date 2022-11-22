<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class permission extends CI_Controller

{
    var $system_menu = array();

    function __construct()
    {
        parent::__construct();
        $this->load->model('Permission_Model');
        $this->load->model('Roles_Model');
        $this->load->model('Auth_Model');
        $result = $this->Login_Model->load_index_data();
        $this->system_menu['main_menu'] = $result['main_menu'];
        $this->system_menu['sub_menu'] = $result['sub_menu'];
        $this->system_menu['index_user_roles'] = $result['index_user_roles'];
    }

    public function permission_index(){
        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(1, 3, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_roles'] = $this->Roles_Model->roles_fetch_data()->result();
                $data['fetch_main'] = $this->Permission_Model->getMain_Menu()->result();
                $data['fetch_data'] = $this->Permission_Model->permission_fetch_data()->result();
                $this->load->view('permission/_form', $data);
            } else {
                redirect('error_404', 'refresh');
            }
        }
    }

    public function get_sub_category(){
      if($this->input->post('sub_id')){
        echo  $this->Permission_Model->getSub_Menu($this->input->post('sub_id'));
      }
    }

    public function insert_permission(){
        if ($this->input->post("sub_menu") == "Select Sub Menu" ){
            $this->session->set_flashdata("error", "Error on saving data to the database.");
            redirect("permission_index", "refresh");
        }

        $result = $this->Permission_Model->insert_permission_model();
        //check value from model Y/N
        if ($result['result'] == true) {
            $this->session->set_flashdata("success", "Data successfully added to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }
        redirect("permission_index", "refresh");

    }
    public function delete_permission($delete_ID){

        $result = $this->Permission_Model->delete_permission_Model($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }
        redirect("permission_index", "refresh");
    }











}

