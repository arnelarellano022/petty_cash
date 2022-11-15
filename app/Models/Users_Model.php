<?php

namespace App\Models;
use CodeIgniter\Model;


class Users_Model extends  Model
{
    //Table
    public $users, $roles;

    public function __construct() {
        $db      = \Config\Database::connect();
        $this->users = $db->table('ci_users');
        $this->roles = $db->table('user_roles');
    }

    public function users_list()
    {
        return $this->users->select('*')
            ->join('user_roles', 'ci_users.user_role = user_roles.id')
            ->orderBy('ci_users.user_id', 'asc')
            ->get()->getResult();
    }

    public function get_Roles_List()
    {
        return $this->roles->orderBy('id', 'asc')
            ->get()->getResult();
    }
    public function insert_user()
    {
        $date = date('Y-m-d H:i:s');

        $data = array(
            'username'      => $_POST['username'] ,
            'firstname'     => $_POST['firstname'] ,
            'lastname'      => $_POST['lastname'] ,
            'password'      => md5($_POST['password']),
            'user_role'    => $_POST['user_role'],
            'created_at'    => $date,
            'updated_at'    => $date
        );

        $this->users->insert($data);

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
        $this->db->set('user_role',             $this->input->post("user_role", TRUE));
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

    function change_status()
    {
        $data = array( 'status' => $_POST['status'] );
        $this->users->update($data,'user_id =' . $_POST['user_id']);

    }
}