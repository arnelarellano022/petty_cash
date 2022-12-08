<?php
namespace App\Controllers;

class Planta extends BaseController
{
    function __construct(){
        $this->Planta_Model = model('Planta_Model');
        $this->session = \Config\Services::session();
        $this->session->start();

        helper(['form']);

        $this->module_id     = 9 ;
        $this->sub_module_id = 11 ;
    }

    //planta
    public function planta_index(){

        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'add') == true) {$data['add_access'] = true;};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'edit') == true) {$data['edit_access'] = true;};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'delete') == true) {$data['delete_access'] = true;};

        $data['fetch_data'] = $this->Planta_Model->planta_list();
        $data['title']='PLANTA LIST';

            echo view('partial/header',$data);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('planta/list',$data);
            echo view('partial/footer');

    }

    public function add_planta(){

        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit'])
            {
                $this->Planta_Model->insert_planta();
                $this->session->setFlashdata("success", "Record Added Successfully");
                return redirect()->to('/planta_index');
            }

            $module['title'] = 'ADD NEW PLANTA';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('planta/add', $module);
            echo view('partial/footer');
    }

    public function edit_planta($id)
    {
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit']) {
                $this->Planta_Model->update_planta($id);
                //check value from model Y/N
                $this->session->setFlashdata("success", "Record Updated Successfully");
                return redirect()->to('/planta_index');
            }


            $module['fetch_data'] = $this->Planta_Model->get_planta_by_id($id);
            $module['title'] = 'EDIT PLANTA';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('planta/edit', $module);
            echo view('partial/footer');
    }

    public function delete_planta($delete_ID)
    {
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};
            $this->Planta_Model->delete_planta($delete_ID);

            $this->session->setFlashdata("success", "Record Deleted Successfully");
            return redirect()->to('/planta_index');
    }

}