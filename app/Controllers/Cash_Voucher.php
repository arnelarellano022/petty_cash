<?php
namespace App\Controllers;

class Cash_Voucher extends BaseController
{
    function __construct(){
        $this->Cash_Voucher_Model = model('Cash_Voucher_Model');
        $this->session = \Config\Services::session();
        $this->session->start();
        helper(['form']);
    }

    //cash_voucher
    public function cash_voucher_index(){

        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};
        if(check_module_access(get_class(), 'add') == true) {$data['add_access'] = true;};
        if(check_module_access(get_class(), 'view') == true) {$data['view_access'] = true;};
        if(check_module_access(get_class(), 'edit') == true) {$data['edit_access'] = true;};
        if(check_module_access(get_class(), 'delete') == true) {$data['delete_access'] = true;};

        $data['fetch_data'] = $this->Cash_Voucher_Model->cash_voucher_list();
        $data['title']='MANAGEMENT TRANSACTION LIST';

            echo view('partial/header',$data);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('cash_voucher/list',$data);
            echo view('partial/footer');
    }

    public function add_cash_voucher(){

        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit'])
            {
                $this->Cash_Voucher_Model->insert_cash_voucher();
                $this->session->setFlashdata("success", "Record Added Successfully");
                return redirect()->to('/cash_voucher_index');
            }

            $module['title'] = 'ADD NEW TRANSACTION';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('cash_voucher/add', $module);
            echo view('partial/footer');
    }

    public function view_cash_voucher($id)
    {
        if(check_module_access(get_class(), 'view') == false) {return redirect()->to('/error_404');};



        $module['fetch_data'] = $this->Cash_Voucher_Model->get_cash_voucher_by_id($id);
        $module['title'] = 'VIEW TRANSACTION';

        echo view('partial/header', $module);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('cash_voucher/view', $module);
        echo view('partial/footer');
    }

    public function edit_cash_voucher($id)
    {
        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit']) {
                $this->Cash_Voucher_Model->update_cash_voucher($id);
                //check value from model Y/N
                $this->session->setFlashdata("success", "Record Updated Successfully");
                return redirect()->to('/cash_voucher_index');
            }


            $module['fetch_data'] = $this->Cash_Voucher_Model->get_cash_voucher_by_id($id);
            $module['title'] = 'EDIT TRANSACTION';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('cash_voucher/edit', $module);
            echo view('partial/footer');
    }

    public function delete_cash_voucher($delete_ID)
    {
        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};
            $this->Cash_Voucher_Model->delete_cash_voucher($delete_ID);

            $this->session->setFlashdata("success", "Record Deleted Successfully");
            return redirect()->to('/cash_voucher_index');
    }

}