<?php

namespace App\Controllers;

class login extends BaseController{
    var $system_menu = array();
    protected $session;

    function __construct(){
//        $this->Login_Model = new \App\Models\Login_Model();
        $this->Login_Model = model('Login_Model');

        $this->session = \Config\Services::session();
        $this->session->start();

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


        helper(['form']);
        $session = session();

            if($this->request->getMethod() == "post"){

                $rules = [
                    'username' => 'required|max_length[225]',
                    'password' => 'required|max_length[225]'
                ];

                if ( $this->validate($rules)) {

                    $username = $this->request->getVar('username');
                    $password = $this->request->getVar('password');

                    $result = $this->Login_Model->validate_login_model($username, $password);
                }

            if($result['success']==TRUE){

                $account_data = array(
                    'user_id'         => $username,
                    'user_role'  	  => $result['user_role'],
                    'username'        => $result['user_name'],
                    'logged_in' 	  => TRUE
                );

                $session->set($account_data);
                $session->setFlashdata("success","login success");
                return redirect()->to('/dashboard');
            }
            else{

                $session->setFlashdata("error","invalid username/password.");
            }

                if($result['success']==FALSE){
                    return redirect()->to('/index');
                }
            }

    }

    public function error_403(){
        $data =  $this->system_menu;
         return view('errors/error_403', $data);
    }

    public function dashboard()
    {

        if (!isset($_SESSION['user_role'])) {
            return redirect()->to('/index');
        } else {
            $module = $this->system_menu;
            return view('dashboard_view/dashboard', $module);
        }
    }

    public function logout()
    {   $session = session();
        $session->destroy();
        return redirect()->to('/index');
    }

    function login(){
        return view('login');
    }


}
