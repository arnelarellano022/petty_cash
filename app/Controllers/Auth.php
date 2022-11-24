<?php
namespace App\Controllers;

class Auth extends BaseController{
    var $system_menu = array();
    protected $session;

    function __construct(){

        $this->Auth_Model = model('Auth_Model');

        $this->session = \Config\Services::session();
        $this->session->start();

        helper(['form']);
    }

    function index(){
        return view('auth/login');
    }

    public function validate_login(){

        helper(['form']);


            if($this->request->getMethod() == "post"){

                $rules = [
                    'username' => 'required|max_length[225]',
                    'password' => 'required|max_length[225]'
                ];

                if ( $this->validate($rules)) {

                    $username = $this->request->getVar('username');
                    $password = $this->request->getVar('password');

                    $result = $this->Auth_Model->validate_Auth_login($username, $password);
                }

                    if($result['success']==TRUE){

                        if($result['is_verify'] == 0){
                            $this->session->setFlashdata("error", 'Account is not yet verified by the Admin!');
                            return redirect()->to('/index');

                        }

                        if($result['status'] == 0){
                            $this->session->setFlashdata("error", 'Account is disabled by the Admin!');
                            return redirect()->to('/index');

                        }

                        if($result['user_role'] == "-"){
                            $this->session->setFlashdata("error", 'Account role is not yet set by the Admin!');
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

                        $this->session->set($account_data);
                        $this->session->setFlashdata("success","login success");
                        return redirect()->to('/dashboard');
                    }


                    else{

                        $this->session->setFlashdata("error","invalid username/password.");
                    }

                        if($result['success']==FALSE){
                            return redirect()->to('/index');
                        }
                    }

    }

    public function error_404(){
        $data =  $this->system_menu;
         return view('errors/error_404', $data);
    }

    public function dashboard()
    {

        if (!isset($_SESSION['user_role'])) {
            return redirect()->to('/index');
        } else {
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

    public function add_register(){

        if($_POST['submit'])
        {
            $this->Auth_Model->insert_register_user();
            $this->session->setFlashdata("success", "Account created successfully");
            return redirect()->to('/index');
        }

        $module['title'] = 'REGISTER';
        echo view('auth/register', $module);


    }

}
