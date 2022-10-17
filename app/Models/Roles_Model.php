<?php

namespace App\Models;
use CodeIgniter\Model;

class Roles_Model extends  Model
{
    protected $table = "ci_admin_roles";
    protected $primaryKey = "ADMIN_ROLE_ID";
    protected $allowedFields = [
        "admin_role_title",
    ];

    //Roles
    public function roles_fetch_data()
    {
        $db = \Config\Database::connect();
        $query = $db->query('Select * FROM ci_admin_roles ORDER BY admin_role_id ASC ');
        return $query->getResult();
    }

    public function insert_roles_model()
    {
        $roles_model =  new Roles_Model();

        $data = array(
            'admin_role_title' => $_POST['admin_role_title'] ,
        );

        $roles_model->table('ci_admin_roles')->insert($data);

        $result = ($roles_model->affectedRows() != 1) ? false : true;

        return array(
            'result' => $result
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