<?php
namespace App\Controllers;

class Employee extends BaseController
{
    function __construct(){
        $this->Employee_Model = model('Employee_Model');
        $this->session = \Config\Services::session();
        $this->session->start();
        helper(['form']);

    }

    public function employee_index(){

        if(check_module_access(get_class(), 'access') == false) {return redirect()->to('/error_404');};
        if(check_module_access(get_class(), 'add') == true) {$data['add_access'] = true;};
        if(check_module_access(get_class(), 'view') == true) {$data['view_access'] = true;};
        if(check_module_access(get_class(), 'edit') == true) {$data['edit_access'] = true;};
        if(check_module_access(get_class(), 'delete') == true) {$data['delete_access'] = true;};

            $data['fetch_data'] = $this->Employee_Model->employee_list();
            $data['title']='EMPLOYEE LIST';

            echo view('partial/header',$data);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('employee/list',$data);
            echo view('partial/footer');

    }

    public function add_employee(){

        if(check_module_access(get_class(), 'add') == false) {return redirect()->to('/error_404');};

            if($_POST['submit'])
            {
                $filename = '';
                if(!empty($_FILES['file']['name'])){
                    helper(['form', 'url']);

                    $input = $this->validate([
                        'file' => [
                            'label' => 'Image File',
                            'rules' => 'uploaded[file]'
                                . '|is_image[file]'
                                . '|mime_in[file,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                                . '|max_size[file,10000]'
                        ],
                    ]);

                    if (!$input) {
                        $this->session->setFlashdata("error", "Invalid Picture");
                        return redirect()->to('add_employee');
                    }
                    else {
                        $img = $this->request->getFile('file');

                        if ($img->isValid() && !$img->hasMoved()) {
                            $filename = $img->getRandomName();
                            $img->move(  './uploads/', $filename );
                        }
                    }
                }

                    $this->Employee_Model->insert_employee($filename);
                    $this->session->setFlashdata("success", "Employee Added Successfully");
                    return redirect()->to('/employee_index');

            }

            $module['company_list'] = $this->Employee_Model->get_Company_List();
            $module['department_list'] = $this->Employee_Model->get_Department_List();
            $module['title'] = 'ADD NEW EMPLOYEE';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('employee/add', $module);
            echo view('partial/footer');
    }


    public function view_employee($id)
    {
        if(check_module_access(get_class(), 'view') == false) {return redirect()->to('/error_404');};



            $module['fetch_data'] = $this->Employee_Model->get_employee_by_id($id);
            $module['title'] = 'VIEW EMPLOYEE';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('employee/view', $module);
            echo view('partial/footer');
    }

    public function edit_employee($id)
    {
        if(check_module_access(get_class(), 'edit') == false) {return redirect()->to('/error_404');};

        if($_POST['submit'])
        {
            $filename = '';
            if(!empty($_FILES['file']['name'])){
                helper(['form', 'url']);

                $input = $this->validate([
                    'file' => [
                        'label' => 'Image File',
                        'rules' => 'uploaded[file]'
                            . '|is_image[file]'
                            . '|mime_in[file,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                            . '|max_size[file,10000]'
                    ],
                ]);

                if (!$input) {
                    $this->session->setFlashdata("error", "Invalid Picture");
                    return redirect()->to('edit_employee');
                }
                else {
                    $img = $this->request->getFile('file');

                    if ($img->isValid() && !$img->hasMoved()) {
                        $filename = $img->getRandomName();
                        $img->move(  './uploads/', $filename );
                    }
                }
            }
            $data_pass = array('employee_id' => $id, 'filename' => $filename);

            $this->Employee_Model->update_employee($data_pass);
            $this->session->setFlashdata("success", "Employee Updated Successfully");
            return redirect()->to('/employee_index');

        }

            $module['fetch_data'] = $this->Employee_Model->get_employee_by_id($id);
            $module['company_list'] = $this->Employee_Model->get_Company_List();
            $module['department_list'] = $this->Employee_Model->get_Department_List();
            $module['title'] = 'EDIT EMPLOYEE';

            echo view('partial/header', $module);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('employee/edit', $module);
            echo view('partial/footer');
    }


    public function delete_employee($delete_ID)
    {
        if(check_module_access(get_class(), 'delete') == false) {return redirect()->to('/error_404');};

            $this->Employee_Model->delete_employee($delete_ID);

            $this->session->setFlashdata("success", "Record Deleted Successfully");
            return redirect()->to('/employee_index');
    }

    function check_id_no_exist(){
        echo $this->Employee_Model->check_id_no_exist($_POST['id_no']);
    }
    
}