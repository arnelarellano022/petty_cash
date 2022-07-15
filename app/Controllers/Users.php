<?php
namespace App\Controllers;


class users extends BaseController

{    var $system_menu = array();

    function __construct(){

        $this->Users_Model = model('Users_Model');
        $this->Roles_Model = model('Roles_Model');
        $this->Login_Model = model('Login_Model');

        $result = $this->Login_Model->load_index_data();
        $this->system_menu['main_menu'] = $result['main_menu'];
        $this->system_menu['sub_menu'] = $result['sub_menu'];
        $this->system_menu['index_user_roles'] = $result['index_user_roles'];

    }

    public function users_index(){
        if (!isset($_SESSION['user_role'])) {
            return redirect()->to('/index');
        } else {
            $result = $this->Login_Model->check_permission(1, 1, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_data'] = $this->Users_Model->users_fetch_data();
                return view('users/_form', $data);
            } else {

                return redirect()->to('/error_403');
            }
        }


//        if (!isset($_SESSION['user_role'])) {
//            return redirect()->to('/index');
//        } else {
//            $module = $this->system_menu;
//            return view('dashboard_view/dashboard', $module);
//        }
    }

    public function add_new_system_user(){

        $result = $this->Users_Model->add_system_user_data();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }
        redirect("users_index", "refresh");

    }


    public function create_user(){
        if (!isset($_SESSION['user_role'])) {
            return redirect()->to('/index');
        } else {
            $result = $this->Login_Model->check_permission(1, 1, $_SESSION['user_role']);
            if ($result == true) {
                $data = $this->system_menu;
                $data['fetch_roles'] = $this->Roles_Model->get_roles();
                return view('users/create', $data);

            } else {
                return redirect()->to('/error_403');
            }
        }
    }
    public function insert_user(){

        $this->form_validation->set_rules('user_password', 'Password', 'required');
        $this->form_validation->set_rules('user_cpassword', 'Confirm Password', 'required|matches[user_password]');


        if ($this->form_validation->run() == TRUE) {

            $result = $this->Users_Model->insert_user_model();

            //check value from model Y/N
            if ($result['result'] == true) {

                $this->session->set_flashdata("success", "Data successfully added to the database.");
                redirect("users_index", "refresh");

            } else {
                $this->session->set_flashdata("error", "Error on saving data to the database.");
                redirect("create_user", "refresh");
            }
        }else
        {   $data =  $this->system_menu;
            $data['fetch_roles'] = $this->Roles_Model->get_roles();
            $this->load->view('users/create',$data );
        }
    }
    public function remove_user($delete_ID){

        $result = $this->Users_Model->delete_users_Model($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }
        redirect("users_index", "refresh");
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


}