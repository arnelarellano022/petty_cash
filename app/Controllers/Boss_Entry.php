<?php
namespace App\Controllers;

class Boss_Entry extends BaseController
{
    function __construct(){
        $this->Boss_Entry_Model = model('Boss_Entry_Model');
        $this->session = \Config\Services::session();
        $this->session->start();

        helper(['form']);

        $this->module_id     = 10 ;
        $this->sub_module_id = 12 ;
    }

    //boss_entry
    public function boss_entry_index(){

        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'add') == true) {$data['add_access'] = true;};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'edit') == true) {$data['edit_access'] = true;};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'delete') == true) {$data['delete_access'] = true;};

        $data['fetch_data'] = $this->Boss_Entry_Model->boss_entry_list();
        $data['title']='BOSS ENTRY LIST';

            echo view('partial/header',$data);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('boss_entry/list',$data);
            echo view('partial/footer');
    }

    public function add_boss_entry(){

        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit'])
            {
                $this->Boss_Entry_Model->insert_boss_entry();
                $this->session->setFlashdata("success", "Record Added Successfully");
                return redirect()->to('/boss_entry_index');
            }

            $module['title'] = 'ADD NEW BOSS ENTRY';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('boss_entry/add', $module);
            echo view('partial/footer');
    }

    public function edit_boss_entry($id)
    {
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit']) {
                $this->Boss_Entry_Model->update_boss_entry($id);
                //check value from model Y/N
                $this->session->setFlashdata("success", "Record Updated Successfully");
                return redirect()->to('/boss_entry_index');
            }


            $module['fetch_data'] = $this->Boss_Entry_Model->get_boss_entry_by_id($id);
            $module['title'] = 'EDIT BOSS ENTRY';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('boss_entry/edit', $module);
            echo view('partial/footer');
    }

    public function delete_boss_entry($delete_ID)
    {
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};
            $this->Boss_Entry_Model->delete_boss_entry($delete_ID);

            $this->session->setFlashdata("success", "Record Deleted Successfully");
            return redirect()->to('/boss_entry_index');
    }

}