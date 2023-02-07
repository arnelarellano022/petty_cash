<?php
namespace App\Controllers;

class Petty_Cash extends BaseController
{
    function __construct(){
        $this->Petty_Cash_Model = model('Petty_Cash_Model');
        $this->session = \Config\Services::session();
        $this->session->start();

        helper(['form']);

        $this->module_id     = 12 ;
        $this->sub_module_id = 14 ;
    }

    //Petty Cash
    public function petty_cash_index(){

        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};
        if(check_module_access(get_class(), 'view') == true) {$data['view_access'] = true;};
        if(check_module_access(get_class(), 'add') == true) {$data['add_access'] = true;};
        if(check_module_access(get_class(), 'edit') == true) {$data['edit_access'] = true;};
        if(check_module_access(get_class(), 'delete') == true) {$data['delete_access'] = true;};

        $data['fetch_data'] = $this->Petty_Cash_Model->petty_cash_list();
        $data['title']='PETTY CASH TRANSACTION LIST';

            echo view('partial/header',$data);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('petty_cash/list',$data);
            echo view('partial/footer');
    }

    public function add_petty_cash(){

        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit'])
            {
                $this->Petty_Cash_Model->insert_petty_cash();
                $this->session->setFlashdata("success", "Record Added Successfully");
                return redirect()->to('/petty_cash_index');
            }

            $module['title'] = 'ADD NEW TRANSACTION';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('petty_cash/add', $module);
            echo view('partial/footer');
    }

    public function view_petty_cash($id)
    {
        if(check_module_access(get_class(), 'view') == false) {return redirect()->to('/error_404');};



        $module['fetch_data'] = $this->Petty_Cash_Model->get_petty_cash_by_id($id);
        $module['title'] = 'VIEW TRANSACTION';

        echo view('partial/header', $module);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('petty_cash/view', $module);
        echo view('partial/footer');
    }


    public function edit_petty_cash($id)
    {
        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit']) {
                $this->Petty_Cash_Model->update_petty_cash($id);
                //check value from model Y/N
                $this->session->setFlashdata("success", "Record Updated Successfully");
                return redirect()->to('/petty_cash_index');
            }


            $module['fetch_data'] = $this->Petty_Cash_Model->get_petty_cash_by_id($id);
            $module['title'] = 'EDIT TRANSACTION';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('petty_cash/edit', $module);
            echo view('partial/footer');
    }

    public function delete_petty_cash($delete_ID)
    {
        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};
            $this->Petty_Cash_Model->delete_petty_cash($delete_ID);

            $this->session->setFlashdata("success", "Record Deleted Successfully");
            return redirect()->to('/petty_cash_index');
    }

}