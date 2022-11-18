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

    public function update_user($user_id)
    {

        $data = array(
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'user_role'    => $_POST['user_role']
        );
        $password = $_POST['password'];

        if($password != ''){
            $data = array(
            'password' => md5($_POST['password'])
        );
        }

        $this->users->update($data, 'user_id =' . $user_id);
        $result = ($this->users->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }
    public function delete_user($user_id)
    {
        $this->users->delete(['user_id' => $user_id]);
    }

    public function get_user_by_user_id($user_id)
    {
        return $this->users->where('user_id', $user_id)
            ->get()->getResult();
    }

    function change_status()
    {
        $data = array( 'status' => $_POST['status'] );
        $this->users->update($data,'user_id =' . $_POST['user_id']);

    }
}