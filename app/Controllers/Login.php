<?php

namespace App\Controllers;

class login extends BaseController{
    var $system_menu = array();

    function __construct(){
//        $this->Login_Model = new \App\Models\Login_Model();
        $this->Login_Model = model('Login_Model');



        $result = $this->Login_Model->load_index_data();
        $this->system_menu['main_menu'] = $result['main_menu'];
        $this->system_menu['sub_menu'] = $result['sub_menu'];
        $this->system_menu['index_user_roles'] = $result['index_user_roles'];
    }

    function index(){
//        $this->load->view('login');
        return view('login');
    }

    public function validate_login(){

//        $data = [];
        helper(['form']);
        $session = \Config\Services::session();

        $rules = [
            'username' => 'required|max_length[225]',
            'password' => 'required|max_length[225]'
        ];

//        $this->form_validation->set_rules('username','Username','required|max_length[225]');
//        $this->form_validation->set_rules('password','Password','required|max_length[225]');

        $errors = [
            'password' => [
                'validateUser' => 'Email or Password don\'t match'
            ]
        ];

        if ( $this->validate($rules, $errors)) {

            if($this->request->getMethod() == "post"){

                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');


            $result = $this->Login_Model->validate_login_model($username, $password);
            }

            if($result['success']==TRUE){

                $account_data = array(
                    'user_id'         => $result['user_id'],
                    'user_role'  	  => $result['user_role'],
                    'username'        => $result['user_name'],
                    'logged_in' 	  => TRUE
                );

                $this->session->set_userdata($account_data);
                $session->set($account_data);
                $this->session->set_flashdata("success","login success");

                redirect("dashboard","refresh");

            }else{

                $this->session->set_flashdata("error","invalid username/password.");
            }

            if($result['success']==FALSE){
                redirect("index","refresh");
            }
        }
    }

    public function error_403(){
        $data =  $this->system_menu;
        $this->load->view('errors/error_403',$data);
    }

    public function dashboard()
    {
        if (!isset($_SESSION['user_role'])) {
            redirect('index', 'refresh');
        } else {
            $module = $this->system_menu;
            $this->load->view('dashboard_view/dashboard', $module);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

    function login(){
        $this->load->view('login');
    }


}
