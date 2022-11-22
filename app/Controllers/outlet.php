<?php defined('BASEPATH') OR exit('No direct script access allowed');

class outlet extends CI_Controller
{
    var $system_menu = array();


    function __construct(){
        parent::__construct();
        $this->load->model('Outlet_Model');
        $this->load->model('Auth_Model');
        $result = $this->Login_Model->load_index_data();
        $this->system_menu['main_menu'] = $result['main_menu'];
        $this->system_menu['sub_menu'] = $result['sub_menu'];
        $this->system_menu['index_user_roles'] = $result['index_user_roles'];

    }

    //Roles
    public function outlet_index(){
        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(2, 4, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_data2'] = $this->Outlet_Model->outlet_fetch_data();
                $this->load->view('outlet/_form', $data);
            } else {
                redirect('error_404', 'refresh');
            }
        }
    }

    public function outlet_view($outlet_id){

        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(2, 4, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_data'] = $this->Outlet_Model->fetch_data_outlet_view($outlet_id);
                $data['fetch_distributor'] = $this->Outlet_Model->fetch_distributor();
                foreach ($data['fetch_data'] as $rw) {
                    $data['distributor'] = $this->Outlet_Model->fetch_distributor_name($rw->distributor);
                    $data['fetch_data_sku'] = $this->Outlet_Model->fetch_data_sku($rw->outlet_id);
                    $data['get_best_photos'] = $this->Outlet_Model->get_Best_Photos($rw->outlet_id);
                    $data['get_recent_photos'] = $this->Outlet_Model->get_Recent_Photos($rw->outlet_id);
                    $data['fetch_data_item'] = $this->Outlet_Model->fetch_data_outlet_invoice_items($rw->outlet_id);
                }
                    $data['created'] = $this->Outlet_Model->Created_Updated_model($rw->created_by)->row()->user_name;
                    $data['updated'] = $this->Outlet_Model->Created_Updated_model($rw->updated_by)->row()->user_name;
//                }


                $this->load->view('outlet/view', $data);
            } else {
                redirect('error_404', 'refresh');
            }
        }
    }

    public function outlet_update($outlet_id){

        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(2, 4, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_data'] = $this->Outlet_Model->fetch_data_outlet_view($outlet_id);
                $data['fetch_distributor'] = $this->Outlet_Model->fetch_distributor();
                foreach ($data['fetch_data'] as $rw) {

                $data['carried_sku'] = $this->Outlet_Model->get_c_sku($rw->outlet_id);
//                $data['get_best_photos'] = $this->Outlet_Model->get_Best_Photos($rw->acct_name);
//                $data['get_recent_photos'] = $this->Outlet_Model->get_Recent_Photos($rw->acct_name);
//                    $data['created'] = $this->Outlet_Model->Created_Updated_model($rw->created_by)->row()->user_name;
//                    $data['updated'] = $this->Outlet_Model->Created_Updated_model($rw->updated_by)->row()->user_name;
                }


                $this->load->view('outlet/update', $data);
            } else {
                redirect('error_404', 'refresh');
            }
        }
    }

    public function update_photo_info($batch_no){
        $result = $this->Outlet_Model->update_photo_information($batch_no);

        if($result['result']==false){
            $this->session->set_flashdata("success", "Data successfully updated to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on updating data to the database.");
        }
        $outlet_id = $_POST['get_outlet_id'];
        $data = $this->system_menu;

        $data['fetch_data'] = $this->Outlet_Model->fetch_data_outlet_view($outlet_id);
        foreach ($data['fetch_data'] as $rw)
        {
            $data['listing_fee'] = $this->Outlet_Model->get_listing_fee($rw->acct_name);
            $data['get_best_photos'] = $this->Outlet_Model->get_Best_Photos($rw->acct_name);
            $data['get_recent_photos'] = $this->Outlet_Model->get_Recent_Photos($rw->acct_name);
            $data['created'] = $this->Outlet_Model->Created_Updated_model($rw->created_by)->row()->user_name;
            $data['updated'] = $this->Outlet_Model->Created_Updated_model($rw->updated_by)->row()->user_name;
        }

        $this->load->view('outlet/view', $data);
    }

    public function create_outlet(){
        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(2, 4, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_distributor'] = $this->Outlet_Model->fetch_distributor();
                $this->load->view('outlet/create', $data);
            } else {
                redirect('error_404', 'refresh');
            }
        }
    }

    public function add_photo($id){
        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $result = $this->Login_Model->check_permission(2, 4, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_data'] = $this->Outlet_Model->fetch_data_outlet_view($id);
                $this->load->view('outlet/add_photo', $data);
            } else {
                redirect('error_404', 'refresh');
            }
        }
    }

    public function insert_outlet_data()
    {
        $result = $this->Outlet_Model->insert_outlet_datum();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }
        redirect("outlet_index", "refresh");
    }

    public function insert_add_photo()
    {
        $result = $this->Outlet_Model->insert_add_photo_model();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }
        redirect("outlet_index", "refresh");
    }

    public function update_outlet_data($id)
{
    $result = $this->Outlet_Model->update_outlet_datum($id);

    if($result['result']==true){
        $this->session->set_flashdata("success", "Data successfully updated to the database.");
    } else {
        $this->session->set_flashdata("error", "Error on updating data to the database.");
    }
    redirect("outlet_index", "refresh");
}

    public function delete_outlet($id)
    {
        $result = $this->Outlet_Model->delete_Outlet_Model($id);

        if($result['result']==true){
            $this->session->set_flashdata("success", "outlet is successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting outlet to the database.");
        }
        redirect("outlet_index", "refresh");
    }

    function get_invoice()
    {
        $data = $this->Outlet_Model->get_invoice($this->input->post('outlet_id'));
        echo json_encode($data);
    }

}