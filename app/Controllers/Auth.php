<?php
namespace App\Controllers;

class Auth extends BaseController{
    var $system_menu = array();
    protected $session;

    function __construct(){

        $this->Auth_Model = model('Auth_Model');

        $this->session = \Config\Services::session();
        $this->session->start();

        $result = $this->Auth_Model->load_index_data();
        $this->system_menu['main_menu'] = $result['main_menu'];
        $this->system_menu['sub_menu'] = $result['sub_menu'];
        $this->system_menu['index_user_roles'] = $result['index_user_roles'];
    }

    function index(){
        return view('auth/login');
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

                    $result = $this->Auth_Model->validate_Auth_Model($username, $password);
                }

                    if($result['success']==TRUE){

                        if($result['is_verify'] == 0){
                            $session->setFlashdata("error", 'Account is not yet verified by the Admin!');
                            return redirect()->to('/index');

                        }

                        if($result['is_active'] == 0){
                            $session->setFlashdata("error", 'Account is disabled by Admin!');
                            return redirect()->to('/index');

                        }

                        $account_data = array(
                            'user_id'         => $result['user_id'],
                            'user_role'  	  => $result['user_role'],
                            'username'        => $result['username'],
                            'lastname'        => $result['lastname'],
                            'firstname'        => $result['firstname'],
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
//            return view('dashboard/general', $module);
            $module['title']='Dashboard';
            echo view('partial/header',$module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('dashboard/dashboard',$module);
            echo view('partial/footer');


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
