<?php
namespace App\Controllers;

class Module extends BaseController
{
    var $system_menu = array();
    protected $session;

    function __construct(){

        $this->Users_Model = model('Users_Model');
        $this->Module_Model = model('Module_Model');
        $this->Auth_Model = model('Auth_Model');

        $this->session = \Config\Services::session();
        $this->session->start();

        $result = $this->Auth_Model->load_index_data();
        $this->system_menu['main_menu'] = $result['main_menu'];
        $this->system_menu['sub_menu'] = $result['sub_menu'];
        $this->system_menu['index_user_roles'] = $result['index_user_roles'];
        helper(['form']);
    }

    //Module
    public function module_index(){
        if (!isset($_SESSION['user_role'])) {
            return redirect()->to('/index');
        } else {
            $module = $this->system_menu;
            $module['fetch_data'] = $this->Module_Model->Module_fetch_data();
            $module['title']='MODULE SETTING';
            echo view('partial/header',$module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('module/list',$module);
            echo view('partial/footer');
        }
    }

    public function add_module(){

        $session = session();

        if($_POST['submit'])
        {
            $this->Module_Model->insert_module();
            $session->setFlashdata("success", "Record Added Successfully");
            return redirect()->to('/module_index');
        }
        $module = $this->system_menu;
        $module['title'] = 'ADD NEW MODULE';

        echo view('partial/header', $module);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('module/add', $module);
        echo view('partial/footer');
    }

    public function edit_module($id)
    {
        $session = session();

        if($_POST['submit']) {
            $this->Module_Model->update_module($id);
            //check value from model Y/N
            $session->setFlashdata("success", "Record Updated Successfully");
            return redirect()->to('/module_index');
        }

        $module = $this->system_menu;
        $module['fetch_data'] = $this->Module_Model->get_role_by_module_id($id);
        $module['title'] = 'EDIT MODULE';

        echo view('partial/header', $module);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('module/edit', $module);
        echo view('partial/footer');
    }

    public function delete_module($delete_ID)
    {
        $session = session();
        $this->Module_Model->delete_module($delete_ID);

        $session->setFlashdata("success", "Record Deleted Successfully");
        return redirect()->to('/module_index');
    }

    //Sub Module
    public function sub_module_index($module_id){
        if (!isset($_SESSION['user_role'])) {
            return redirect()->to('/index');
        } else {
            $module = $this->system_menu;
            $module['fetch_data'] = $this->Module_Model->sub_module_fetch_data($module_id);
            $module['title']='SUB MODULE SETTING';
            $module['module_id'] = $module_id;

            echo view('partial/header',$module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('module/sub_module_list',$module);
            echo view('partial/footer');
        }
    }


    public function add_sub_module($module_id){

        $session = session();

        if($_POST['submit'])
        {
            $this->Module_Model->insert_sub_module($module_id);
            $session->setFlashdata("success", "Sub Module Added Successfully") ;
            return redirect()->to('/module_index');
        }
        $module = $this->system_menu;
        $module['title'] = 'ADD NEW SUB MODULE';
        $module['module_id'] = $module_id;

        echo view('partial/header', $module);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('module/sub_module_add', $module);
        echo view('partial/footer');
    }

    public function edit_sub_module($id)
    {
        $session = session();

        if($_POST['submit']) {
            $this->Module_Model->update_sub_module($id);
            //check value from model Y/N
            $session->setFlashdata("success", "Record Updated Successfully");
            return redirect()->to('/module_index');
        }

        $module = $this->system_menu;
        $module['fetch_data'] = $this->Module_Model->get_role_by_sub_module_id($id);
        $module['title'] = 'EDIT SUB MODULE';

        echo view('partial/header', $module);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('module/sub_module_edit', $module);
        echo view('partial/footer');
    }


}






