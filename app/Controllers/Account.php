<?php
namespace App\Controllers;

class Account extends BaseController
{
    function __construct(){
        $this->Account_Model = model('Account_Model');
        $this->session = \Config\Services::session();
        $this->session->start();

        helper(['form']);

    }

    //ACCOUNT
    public function account_index(){

        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};
        if(check_module_access(get_class(), 'add') == true) {$data['add_access'] = true;};
        if(check_module_access(get_class(), 'edit') == true) {$data['edit_access'] = true;};
        if(check_module_access(get_class(), 'delete') == true) {$data['delete_access'] = true;};

        $data['fetch_data'] = $this->Account_Model->account_list();
        $data['title']='ACCOUNT LIST';

            echo view('partial/header',$data);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('account/list',$data);
            echo view('partial/footer');

    }

    public function add_account(){

        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit'])
            {
                $this->Account_Model->insert_account();
                $this->session->setFlashdata("success", "Record Added Successfully");
                return redirect()->to('/account_index');
            }

            $module['title'] = 'ADD NEW ACCOUNT';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('account/add', $module);
            echo view('partial/footer');
    }

    public function edit_account($id)
    {
        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit']) {
                $this->Account_Model->update_account($id);
                //check value from model Y/N
                $this->session->setFlashdata("success", "Record Updated Successfully");
                return redirect()->to('/account_index');
            }


            $module['fetch_data'] = $this->Account_Model->get_account_by_id($id);
            $module['title'] = 'EDIT ACCOUNT';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('account/edit', $module);
            echo view('partial/footer');
    }

    public function delete_account($delete_ID)
    {
        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};
            $this->Account_Model->delete_account($delete_ID);

            $this->session->setFlashdata("success", "Record Deleted Successfully");
            return redirect()->to('/account_index');
    }

}