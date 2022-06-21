<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class products extends CI_Controller

{
    var $system_menu = array();

    function __construct(){
        parent::__construct();
        $this->load->model('Products_Model');
        $this->load->model('Login_Model');
        $result = $this->Login_Model->load_index_data();
        $this->system_menu['main_menu'] = $result['main_menu'];
        $this->system_menu['sub_menu'] = $result['sub_menu'];
        $this->system_menu['index_user_roles'] = $result['index_user_roles'];
    }

    //products
    public function products_index(){
        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(4, 7, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_data'] = $this->Products_Model->products_fetch_data();
                $this->load->view('products/_form', $data);
            } else {
                redirect('error_403', 'refresh');
            }
        }
    }

    public function create_products(){
        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(4, 7, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $this->load->view('products/create', $data);
            } else {
                redirect('error_403', 'refresh');
            }
        }
    }

    public function view_products($id){

        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(4, 7, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_data'] = $this->Products_Model->fetch_data_product_view($id);

                $this->load->view('products/view', $data);
            } else {
                redirect('error_403', 'refresh');
            }
        }
    }

    public function insert_products()
    {
        $sku = $this->input->post("sku", TRUE);
        $result= $this->Products_Model->insert_products();

        if($result['result']==true ){
            $this->session->set_flashdata("success", "Data successfully added to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(4, 7, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_data'] = $this->Products_Model->fetch_data_product_view($sku);

                $this->load->view('products/view', $data);
            } else {
                redirect('error_403', 'refresh');
            }
        }
    }
    public function delete_products($delete_ID){

        $result = $this->Products_Model->delete_Products_Model($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("delete", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }
        redirect("products_index", "refresh");
    }

    public function updating_products($ID)
    {
        $new_sku = $this->input->post("sku", TRUE);

        $result = $this->Products_Model->updating_products($ID);

        if($result['result']==true ){
            $this->session->set_flashdata("success", "Data successfully updated to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on updating data to the database.");
        }

        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(4, 7, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_data'] = $this->Products_Model->fetch_data_product_view($new_sku);

                $this->load->view('products/view', $data);
            } else {
                redirect('error_403', 'refresh');
            }
        }


    }
    public function update_products($id)
    {
        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(4, 7, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_data'] = $this->Products_Model->products_updating($id);
                $this->load->view('products/update', $data);
            } else {
                redirect('error_403', 'refresh');
            }
        }
    }


}