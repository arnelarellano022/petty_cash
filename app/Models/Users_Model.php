<?php

namespace App\Models;
use CodeIgniter\Model;


class Users_Model extends  Model
{

    protected $table = "user_info";
    protected $primaryKey = "user_id";
    protected $allowedFields = [
        "user_name",
        "user_password",
        "user_roles",
        "created_at",
        "updated_at"
    ];

    public function users_fetch_data()
    {
        $db = \Config\Database::connect();
//        $try = $db->query("select * from user_info");
//        echo var_dump($try->getResult());
        $query = $db->query('Select * FROM user_info  ORDER BY user_id ASC ');
        return $query->getResult();

//        $this->db->select('*');
//        $this->db->from('user_info');
//        $this->db->order_by("user_id", "asc");
//        $query = $this->db->get();
//        return $query;
    }
    public function insert_user_model()
    {

//        $query = $db->query("Select * FROM user_roles where user_role = '" . $roles . "'and main_menu_id = '". $main_id . "'and sub_menu_id = '". $sub_id . "'");
//        $count = $query->getNumRows();
//
//        if($count > 0){return true;}
//        else{return false;}
//try
//        $db = \Config\Database::connect();
            $user_model =  new Users_Model();

//            $request = \Config\Services::request();
            $date = date('Y-m-d H:i:s');
            $data = array(

                'user_name' => $_POST['user_name'] ,
                'user_password' => md5($_POST['user_password']),
                'user_roles' => $_POST['user_roles'],
                'created_at' => $date,
                'updated_at' => $date
            );


            $user_model->table('user_info')
                ->insert($data);

            $result = ($user_model->affectedRows() != 1) ? false : true;

            return array(
                'result' => $result
            );
    }

    public function users_updating($id){
        $this->db->select('*');
        $this->db->from('user_info');
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        return $query;
    }

    public function updating_users_model($id_no)
    {
        $date = date('Y-m-d H:i:s');
        $this->db->set('user_name',              $this->input->post("user_name", TRUE));
        $this->db->set('user_password',          md5($this->input->post("user_password", TRUE)));
        $this->db->set('user_roles',             $this->input->post("user_roles", TRUE));
        $this->db->set('updated_at',            $date ) ;

        $this->db->where('user_id', $id_no);
        $this->db->update('user_info');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }
    public function delete_users_Model($delete_ID)
    {
        $this->db->where('user_id', $delete_ID);
        $this->db->delete('user_info');
        $result = ($this->db->affected_rows() != 1) ? false : true;
        return array(
            'result'    => $result
        );
    }
    public function get_users(){
        $this->db->select('*');
        $this->db->from('user_info');
        $this->db->order_by("user_id", "asc");
        $query = $this->db->get();
        return $query;

    }


}