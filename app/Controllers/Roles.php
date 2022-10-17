<?php
namespace App\Controllers;

class roles extends BaseController
{

    var $system_menu = array();
    protected $session;

    function __construct(){

        $this->Users_Model = model('Users_Model');
        $this->Roles_Model = model('Roles_Model');
        $this->Auth_Model = model('Auth_Model');

        $this->session = \Config\Services::session();
        $this->session->start();

        $result = $this->Auth_Model->load_index_data();
        $this->system_menu['main_menu'] = $result['main_menu'];
        $this->system_menu['sub_menu'] = $result['sub_menu'];
        $this->system_menu['index_user_roles'] = $result['index_user_roles'];
    }


    //Roles
    public function roles_index(){
        if (!isset($_SESSION['user_role'])) {
            return redirect()->to('/index');
        } else {
            $module = $this->system_menu;
            $module['fetch_data'] = $this->Roles_Model->roles_fetch_data();
            $module['title']='ROLES MANAGEMENT';
            echo view('partial/header',$module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('roles/list',$module);
            echo view('partial/footer');
        }
//        if (!isset($_SESSION['user_role'])) {
//            redirect('index', 'refresh');
//        } else {
//            $result = $this->Login_Model->check_permission(1, 2, $_SESSION['user_role']);
//            if ($result == true) {
//                $data = $this->system_menu;
//                $data['fetch_data'] = $this->Roles_Model->roles_fetch_data();
//                $this->load->view('', $data);
//            } else {
//                redirect('error_403', 'refresh');
//            }
//        }


    }

    public function add_roles(){
        helper(['form']);
        $session = session();

        if($_POST['submit']) {
            $result = $this->Roles_Model->insert_roles_model();

            //check value from model Y/N
            if ($result['result'] == true) {
                $session->setFlashdata("success", "Data successfully added to the database.");
                return redirect()->to('/roles_index');

            } else {
                $session->setFlashdata("error", "Error on saving data to the database.");
                return redirect()->to('/add_roles');
            }

        }
            $module = $this->system_menu;
            $module['fetch_data'] = $this->Roles_Model->roles_fetch_data();
            $module['title'] = 'ADD NEW ROLES';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('roles/add', $module);
            echo view('partial/footer');

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
    public function edit_roles($id)
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