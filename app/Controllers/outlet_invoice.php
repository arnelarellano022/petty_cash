<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class outlet_invoice extends CI_Controller

{
    var $system_menu = array();

    function __construct(){
        parent::__construct();
        $this->load->model('Outlet_Invoice_Model');
        $this->load->model('Login_Model');
        $result = $this->Login_Model->load_index_data();
        $this->system_menu['main_menu'] = $result['main_menu'];
        $this->system_menu['sub_menu'] = $result['sub_menu'];
        $this->system_menu['index_user_roles'] = $result['index_user_roles'];
    }

    //outlet_invoice
    public function outlet_invoice_index(){
        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(2, 6, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_data'] = $this->Outlet_Invoice_Model->outlet_invoice_fetch_data();
                $this->load->view('outlet_invoice/_form', $data);
            } else {
                redirect('error_403', 'refresh');
            }
        }
    }

    public function view_outlet_invoice($doi_id){

        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(2, 6, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_data'] = $this->Outlet_Invoice_Model->fetch_data_outlet_invoice_view($doi_id);
                foreach ( $data['fetch_data']->result() as $row){
                    $data['fetch_data_item'] = $this->Outlet_Invoice_Model->fetch_data_outlet_invoice_items($row->invoice_no);
                }


                $this->load->view('outlet_invoice/view', $data);
            } else {
                redirect('error_403', 'refresh');
            }
        }
    }

    public function create_outlet_invoice(){
        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(2, 6, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_outlet'] = $this->Outlet_Invoice_Model->fetch_outlet_list();
                $this->load->view('outlet_invoice/create', $data);
            } else {
                redirect('error_403', 'refresh');
            }
        }
    }

    public function insert_outlet_invoice(){

        $result= $this->Outlet_Invoice_Model->insert_outlet_invoice();

        $doi_id = $result['doi_id'];

        //check value from model Y/N
        if($result['result']==true ){

            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(2, 6, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_data'] = $this->Outlet_Invoice_Model->fetch_data_outlet_invoice_view($doi_id);
                foreach ( $data['fetch_data']->result() as $row){
                    $data['fetch_data_item'] = $this->Outlet_Invoice_Model->fetch_data_outlet_invoice_items($row->invoice_no);
                }
                $this->load->view('outlet_invoice/view', $data);
            } else {
                redirect('error_403', 'refresh');
            }
        }
    }
    public function delete_outlet_invoice($delete_ID){

        $result = $this->Outlet_Invoice_Model->delete_Outlet_Invoice_Model($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }
        redirect("outlet_invoice_index", "refresh");
    }

    public function updating_outlet_invoice($ID)
    {
        $result = $this->Outlet_Invoice_Model->updating_outlet_invoice($ID);

        //check value from model Y/N
        if($result['result']==true ){
            $this->session->set_flashdata("success", "Data successfully updated to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on updating data to the database.");
        }

        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(2, 6, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_data'] = $this->Outlet_Invoice_Model->fetch_data_outlet_invoice_view($ID);
                foreach ( $data['fetch_data']->result() as $row){
                    $data['fetch_data_item'] = $this->Outlet_Invoice_Model->fetch_data_outlet_invoice_items($row->invoice_no);
                }
                $this->load->view('outlet_invoice/view', $data);
            } else {
                redirect('error_403', 'refresh');
            }
        }
    }
    public function update_outlet_invoice($id)
    {
        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(2, 6, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;

                $data['fetch_outlet'] = $this->Outlet_Invoice_Model->fetch_outlet_list();
                $data['fetch_data'] = $this->Outlet_Invoice_Model->outlet_invoice_record($id);
                foreach (  $data['fetch_data']->result() as $row){
                    $data['fetch_invoice'] = $this->Outlet_Invoice_Model->fetch_invoice($row->invoice_no);
                }

                $this->load->view('outlet_invoice/update', $data);
            } else {
                redirect('error_403', 'refresh');
            }
        }
    }


    function load_address(){
        echo $data = $this->Outlet_Invoice_Model->load_address($this->input->post('outlet'));
    }

    function load_sku_list(){
        echo json_encode($this->Outlet_Invoice_Model->fetch_sku()) ;
    }


}