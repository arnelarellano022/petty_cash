<?php
namespace App\Controllers;

class Module extends BaseController
{
    function __construct(){
        $this->Module_Model = model('Module_Model');
        $this->session = \Config\Services::session();
        $this->session->start();
        helper(['form']);
    }

    public function module_index(){

        if(check_module_access(get_class(), $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            $module['fetch_data'] = $this->Module_Model->module_list();
            $module['title']='MODULE SETTING';

            echo view('partial/header',$module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('module/list',$module);
            echo view('partial/footer');

    }

    public function add_module(){

        if(check_module_access(get_class(), $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit'])
            {
                $this->Module_Model->insert_module();
                $this->session->setFlashdata("success", "Record Added Successfully");
                return redirect()->to('/module_index');
            }
            $module['title'] = 'ADD NEW MODULE';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('module/add', $module);
            echo view('partial/footer');
    }

    public function edit_module($id)
    {
        if(check_module_access(get_class(), $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit']) {
                $this->Module_Model->update_module($id);
                //check value from model Y/N
                $this->session->setFlashdata("success", "Record Updated Successfully");
                return redirect()->to('/module_index');
            }

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
        if(check_module_access(get_class(), $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            $this->Module_Model->delete_module($delete_ID);

            $this->session->setFlashdata("success", "Record Deleted Successfully");
            return redirect()->to('/module_index');
    }

    //Sub Module
    public function sub_module_index($module_id){

        if(check_module_access(get_class(), $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

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

        if(check_module_access(get_class(), $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit'])
            {
                $this->Module_Model->insert_sub_module($module_id);
                $this->session->setFlashdata("success", "Sub Module Added Successfully") ;
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
        if(check_module_access(get_class(), $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit']) {
                $this->Module_Model->update_sub_module($id);
                //check value from model Y/N
                $this->session->setFlashdata("success", "Record Updated Successfully");
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

    public function delete_sub_module($delete_ID)
    {
        if(check_module_access(get_class(), $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            $this->Module_Model->delete_sub_module($delete_ID);

            $this->session->setFlashdata("success", "Record Deleted Successfully");
            return redirect()->to('/module_index');
    }

}






