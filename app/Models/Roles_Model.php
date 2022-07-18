<?php

namespace App\Models;

use CodeIgniter\Model;


class Roles_Model extends  Model
{

    //Roles
    public function roles_fetch_data()
    {
        $db = db_connect();
        $query = $db->query('Select * FROM roles ORDER BY id ASC ');
        return $query->getResult();
    }

    public function insert_roles_model()
    {
        $data = array(
            'roles'     => $this->input->post("roles", TRUE),
        );

        $this->db->insert('roles', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;
        return array(
            'result' => $result,
        );
    }
    public function roles_updating($id){
        $this->db->select('*');
        $this->db->from('roles');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query;
    }
    public function updating_roles_model($id_no)
    {
        $this->db->set('roles',         $this->input->post("roles", TRUE));

        $this->db->where('id', $id_no);
        $this->db->update('roles');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result' => $result,
        );
    }
    public function delete_roles_Model($delete_ID){
        $this->db->where('id', $delete_ID);
        $this->db->delete('roles');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }
    public function get_roles(){
        $db = db_connect();
        $query = $db->query('Select * FROM roles ORDER BY id ASC ');
        return $query->getResult();


    }
}