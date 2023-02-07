<?php
namespace App\Controllers;

class Requester extends BaseController
{
    function __construct(){
        $this->Requester_Model = model('Requester_Model');
        $this->session = \Config\Services::session();
        $this->session->start();
        helper(['form']);

    }

    //REQUESTER
    public function requester_index(){

        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};
        if(check_module_access(get_class(), 'add') == true) {$data['add_access'] = true;};
        if(check_module_access(get_class(), 'edit') == true) {$data['edit_access'] = true;};
        if(check_module_access(get_class(), 'delete') == true) {$data['delete_access'] = true;};

        $data['fetch_data'] = $this->Requester_Model->requester_list();
        $data['title']='REQUESTER LIST';

            echo view('partial/header',$data);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('requester/list',$data);
            echo view('partial/footer');
    }

    public function add_requester(){

        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit'])
            {
                $this->Requester_Model->insert_requester();
                $this->session->setFlashdata("success", "Record Added Successfully");
                return redirect()->to('/requester_index');
            }

            $module['title'] = 'ADD NEW REQUESTER';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('requester/add', $module);
            echo view('partial/footer');
    }

    public function edit_requester($id)
    {
        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};

            if($_POST['submit']) {
                $this->Requester_Model->update_requester($id);
                //check value from model Y/N
                $this->session->setFlashdata("success", "Record Updated Successfully");
                return redirect()->to('/requester_index');
            }


            $module['fetch_data'] = $this->Requester_Model->get_requester_by_id($id);
            $module['title'] = 'EDIT REQUESTER';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('requester/edit', $module);
            echo view('partial/footer');
    }

    public function delete_requester($delete_ID)
    {
        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};
            $this->Requester_Model->delete_requester($delete_ID);

            $this->session->setFlashdata("success", "Record Deleted Successfully");
            return redirect()->to('/requester_index');
    }

}