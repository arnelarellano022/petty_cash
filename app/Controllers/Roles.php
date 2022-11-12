<?php
namespace App\Controllers;

class Roles extends BaseController
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
        helper(['form']);

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
    }

    public function add_roles(){

        $session = session();

        if($_POST['submit'])
        {
            $this->Roles_Model->insert_roles();
            $session->setFlashdata("success", "Record Added Successfully");
            return redirect()->to('/roles_index');
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

    public function edit_roles($id)
    {
        $session = session();

        if($_POST['submit']) {
            $this->Roles_Model->update_roles($id);
            //check value from model Y/N
            $session->setFlashdata("success", "Record Updated Successfully");
            return redirect()->to('/roles_index');
        }

        $module = $this->system_menu;
        $module['fetch_data'] = $this->Roles_Model->get_role_by_id($id);
        $module['title'] = 'EDIT ROLES';

        echo view('partial/header', $module);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('roles/edit', $module);
        echo view('partial/footer');
    }

    public function delete_roles($delete_ID)
    {
        $session = session();
        $this->Roles_Model->delete_roles($delete_ID);

        $session->setFlashdata("success", "Record Deleted Successfully");
        return redirect()->to('/roles_index');
    }

    public function access_roles($id)
    {
        $module = $this->system_menu;
        $module['fetch_data'] = $this->Roles_Model->get_modules($id);
        $module['title'] = 'EDIT ROLES';

        $module['roles']= $this->Roles_Model->get_roles($id);
        $module['roles_id'] = $id;
        $module['module_access']= $this->Roles_Model->get_module_access($id);
        $module['sub_modules']= $this->Roles_Model->get_sub_modules();



        echo view('partial/header', $module);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('roles/access', $module);
        echo view('partial/footer');
    }

    public function set_access(){
        $this->Roles_Model->set_access();
    }
}