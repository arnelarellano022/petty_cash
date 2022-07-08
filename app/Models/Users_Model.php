<?php

namespace App\Models;

use CodeIgniter\Model;

$db = db_connect();
class Users_Model extends  Model
{
    public function users_fetch_data()
    {
        $db = db_connect();
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
            $date = date('Y-m-d H:i:s');
            $data = array(

                'user_name' => $this->input->post("user_name", TRUE),
                'user_password' => md5($this->input->post("user_password", TRUE)),
                'user_roles' => $this->input->post("user_roles", TRUE),
                'created_at' => $date,
                'updated_at' => $date
            );

            $this->db->insert('user_info', $data);
            $result = ($this->db->affected_rows() != 1) ? false : true;

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