<?php

namespace App\Models;
use CodeIgniter\Model;


class Users_Model extends  Model
{
    public function __construct() {
        $db      = \Config\Database::connect();
        $this->users = $db->table('ci_users');
        $this->roles = $db->table('user_roles');
        date_default_timezone_set('Asia/Manila');
    }

    public function users_list()
    {
//        return $this->users->select('*')
//        ->join('user_roles', 'ci_users.user_role = user_roles.id')
        return $this->users->orderBy('user_id', 'asc')
            ->get()->getResult();
    }

    public function get_Roles_List()
    {
        return $this->roles->orderBy('user_roles_id', 'asc')
            ->get()->getResult();
    }

    public function insert_user()
    {
        $date = date('Y-m-d H:i:s');

        $password = hash('sha512', $_POST['password']);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $data = array(
            'username'      => $_POST['username'] ,
            'firstname'     => $_POST['firstname'] ,
            'lastname'      => $_POST['lastname'] ,
            'password'      => $password,
            'sec_question'  =>  $_POST['sec_question'] ,
            'sec_answer'    =>  $_POST['sec_answer'] ,
            'user_role'     => $_POST['user_role'],
            'last_ip'       => $this->getUserIpAddr(),
            'created_at'    => $date,
            'updated_at'    => $date
        );

        $this->users->insert($data);

    }

    public function update_user($user_id)
    {
        $date = date('Y-m-d H:i:s');

        $data = array(
            'firstname'         => $_POST['firstname'],
            'lastname'          => $_POST['lastname'],
            'user_role'         => $_POST['user_role'],
            'sec_question'      => $_POST['sec_question'],
            'sec_answer'        => $_POST['sec_answer'] ,
            'last_ip'           => $this->getUserIpAddr(),
            'updated_at'        => $date,
        );

        $password = $_POST['password'];

        if($password != ''){
            $password = hash('sha512', $_POST['password']);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $data = array_merge($data, array('password' =>$password));
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

    function change_verify_status()
    {
        $data = array( 'is_verify' => $_POST['is_verify'] );
        $this->users->update($data,'user_id =' . $_POST['user_id']);

    }

    public function check_username_exist($username)
    {
        $result = $this->users->where('username', $username)
            ->countAllResults();
        return($result > 0) ? true : false;
    }


    function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}