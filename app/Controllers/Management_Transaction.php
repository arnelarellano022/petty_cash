<?php
namespace App\Controllers;

class Management_Transaction extends BaseController
{
    function __construct(){
        $this->Management_Transaction_Model = model('Management_Transaction_Model');
        $this->session = \Config\Services::session();
        $this->session->start();

        helper(['form']);

        $this->module_id     = 11 ;
        $this->sub_module_id = 13 ;
    }

    //management_transaction
    public function management_transaction_index(){

        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'add') == true) {$data['add_access'] = true;};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'view') == true) {$data['view_access'] = true;};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'edit') == true) {$data['edit_access'] = true;};
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'delete') == true) {$data['delete_access'] = true;};

        $data['fetch_data'] = $this->Management_Transaction_Model->management_transaction_list();
        $data['title']='MANAGEMENT TRANSACTION LIST';

            echo view('partial/header',$data);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('management_transaction/list',$data);
            echo view('partial/footer');
    }

    public function add_management_transaction(){

        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit'])
            {
                $this->Management_Transaction_Model->insert_management_transaction();
                $this->session->setFlashdata("success", "Record Added Successfully");
                return redirect()->to('/management_transaction_index');
            }

            $module['title'] = 'ADD NEW TRANSACTION';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('management_transaction/add', $module);
            echo view('partial/footer');
    }

    public function view_management_transaction($id)
    {
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'view') == false) {return redirect()->to('/error_404');};



        $module['fetch_data'] = $this->Management_Transaction_Model->get_management_transaction_by_id($id);
        $module['title'] = 'VIEW TRANSACTION';

        echo view('partial/header', $module);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('management_transaction/view', $module);
        echo view('partial/footer');
    }

    public function edit_management_transaction($id)
    {
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit']) {
                $this->Management_Transaction_Model->update_management_transaction($id);
                //check value from model Y/N
                $this->session->setFlashdata("success", "Record Updated Successfully");
                return redirect()->to('/management_transaction_index');
            }


            $module['fetch_data'] = $this->Management_Transaction_Model->get_management_transaction_by_id($id);
            $module['title'] = 'EDIT TRANSACTION';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('management_transaction/edit', $module);
            echo view('partial/footer');
    }

    public function delete_management_transaction($delete_ID)
    {
        if(check_module_access($this->module_id, $this->sub_module_id, $_SESSION['user_role'],'access') == false) {return redirect()->to('/error_404');};
            $this->Management_Transaction_Model->delete_management_transaction($delete_ID);

            $this->session->setFlashdata("success", "Record Deleted Successfully");
            return redirect()->to('/management_transaction_index');
    }

}