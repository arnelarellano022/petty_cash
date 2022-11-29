<?php
namespace App\Controllers;

class Company extends BaseController
{
    function __construct(){
        $this->Company_Model = model('Company_Model');
        $this->session = \Config\Services::session();
        $this->session->start();

        helper(['form']);

        $this->module_id     = 2 ;
        $this->sub_module_id = 3 ;
    }

    //Roles
    public function roles_index(){

        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            $module['fetch_data'] = $this->Company_Model->roles_fetch_data();
            $module['title']='ROLES MANAGEMENT';

            echo view('partial/header',$module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('roles/list',$module);
            echo view('partial/footer');

    }

    public function add_roles(){

        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit'])
            {
                $this->Company_Model->insert_roles();
                $this->session->setFlashdata("success", "Record Added Successfully");
                return redirect()->to('/roles_index');
            }

            $module['fetch_data'] = $this->Company_Model->roles_fetch_data();
            $module['title'] = 'ADD NEW ROLES';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('roles/add', $module);
            echo view('partial/footer');
    }

    public function edit_roles($id)
    {
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit']) {
                $this->Company_Model->update_roles($id);
                //check value from model Y/N
                $this->session->setFlashdata("success", "Record Updated Successfully");
                return redirect()->to('/roles_index');
            }


            $module['fetch_data'] = $this->Company_Model->get_role_by_id($id);
            $module['title'] = 'EDIT ROLES';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('roles/edit', $module);
            echo view('partial/footer');
    }

    public function delete_roles($delete_ID)
    {
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};
            $this->Company_Model->delete_roles($delete_ID);

            $this->session->setFlashdata("success", "Record Deleted Successfully");
            return redirect()->to('/roles_index');
    }

    public function access_roles($id)
    {
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            $module['fetch_data'] = $this->Company_Model->get_modules($id);
            $module['title'] = 'EDIT ROLES';

            $module['roles']= $this->Company_Model->get_roles($id);
            $module['roles_id'] = $id;
            $module['module_access']= $this->Company_Model->get_module_access($id);
            $module['sub_modules']= $this->Company_Model->get_sub_modules();



            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('roles/access', $module);
            echo view('partial/footer');
    }

    public function set_access(){
        $this->Company_Model->set_access();
    }
}