<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class distributors extends CI_Controller

{
    var $system_menu = array();

    function __construct(){
        parent::__construct();
        $this->load->model('Distributors_Model');
        $this->load->model('Auth_Model');
        $result = $this->Login_Model->load_index_data();
        $this->system_menu['main_menu'] = $result['main_menu'];
        $this->system_menu['sub_menu'] = $result['sub_menu'];
        $this->system_menu['index_user_roles'] = $result['index_user_roles'];
    }

    //distributors
    public function distributors_index(){
        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(3, 5, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_data'] = $this->Distributors_Model->distributors_fetch_data();
                $this->load->view('distributors/_form', $data);
            } else {
                redirect('error_404', 'refresh');
            }
        }
    }

    public function create_distributors(){
        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(3, 5, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $this->load->view('distributors/create', $data);
            } else {
                redirect('error_404', 'refresh');
            }
        }
    }

    public function insert_distributors(){
        $result= $this->Distributors_Model->insert_distributors();
        //check value from model Y/N
        if($result['result']==true ){

            $this->session->set_flashdata("success", "Data successfully added to the database.");
            redirect("distributors_index", "refresh");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
            $this->load->view('distributors/create');
        }
    }
    public function delete_distributors($delete_ID){

        $result = $this->Distributors_Model->delete_Distributors_Model($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }
        redirect("distributors_index", "refresh");
    }

    public function updating_distributors($ID)
    {
        $result = $this->Distributors_Model->updating_distributors($ID);

        //check value from model Y/N
        if($result['result']==true ){
            $this->session->set_flashdata("success", "Data successfully updated to the database.");
            redirect("distributors_index", "refresh");

        } else {
            $this->session->set_flashdata("error", "Error on updating data to the database.");
            redirect("update_distributors", "refresh");
        }
    }
    public function update_distributors($id)
    {
        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(3, 5, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_data'] = $this->Distributors_Model->distributors_updating($id);
                $this->load->view('distributors/update', $data);
            } else {
                redirect('error_404', 'refresh');
            }
        }
    }


}