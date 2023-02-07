<?php
namespace App\Controllers;

class Company extends BaseController
{
    function __construct(){
        $this->Company_Model = model('Company_Model');
        $this->session = \Config\Services::session();
        $this->session->start();
        helper(['form']);
    }

    //Company
    public function company_index(){

        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};
        if(check_module_access(get_class(), 'add') == true) {$data['add_access'] = true;};
        if(check_module_access(get_class(), 'edit') == true) {$data['edit_access'] = true;};
        if(check_module_access(get_class(), 'delete') == true) {$data['delete_access'] = true;};

        $data['fetch_data'] = $this->Company_Model->company_list();
        $data['title']= "COMPANY LIST";

            echo view('partial/header',$data);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('company/list',$data);
            echo view('partial/footer');

    }

    public function add_company(){

        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit'])
            {
                $this->Company_Model->insert_company();
                $this->session->setFlashdata("success", "Record Added Successfully");
                return redirect()->to('/company_index');
            }

            $module['title'] = 'ADD NEW COMPANY';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('company/add', $module);
            echo view('partial/footer');
    }

    public function edit_company($id)
    {
        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit']) {
                $this->Company_Model->update_company($id);
                //check value from model Y/N
                $this->session->setFlashdata("success", "Record Updated Successfully");
                return redirect()->to('/company_index');
            }


            $module['fetch_data'] = $this->Company_Model->get_company_by_id($id);
            $module['title'] = 'EDIT COMPANY';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('company/edit', $module);
            echo view('partial/footer');
    }

    public function delete_company($delete_ID)
    {
        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};
            $this->Company_Model->delete_company($delete_ID);

            $this->session->setFlashdata("success", "Record Deleted Successfully");
            return redirect()->to('/company_index');
    }

}