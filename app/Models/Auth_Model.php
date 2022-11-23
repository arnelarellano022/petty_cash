<?php

namespace App\Models;
use CodeIgniter\Model;

class Auth_Model extends Model {

    public function __construct() {
        $db      = \Config\Database::connect();
        $this->users = $db->table('ci_users');
    }

    public function validate_Auth_login($username, $password){


        $password = md5($password);

        $query = $this->users->where('username', $username)
            ->where('password', $password)
            ->get();

        if ($query->getNumRows() == 1) {
            foreach ($query->getResult() as $rs){

                $user_id = $rs->user_id;
                $user_role = $rs->user_role;
                $user_name = $rs->username;
                $is_verify = $rs->is_verify;
                $status = $rs->status;
                $firstname = $rs->firstname;
                $lastname = $rs->lastname;
            }
            return array(
                'success'       => true,
                'user_id'       => $user_id,
                'user_role'     => $user_role,
                'username'      => $user_name,
                'is_verify'     => $is_verify,
                'status'        => $status,
                'firstname'     => $firstname,
                'lastname'      => $lastname
            );

        }
    }

    public function  insert_register_user(){

        $date = date('Y-m-d H:i:s');

        $data = array(
            'username'      => $_POST['username'] ,
            'firstname'     => $_POST['firstname'] ,
            'lastname'      => $_POST['lastname'] ,
            'password'      => md5($_POST['password']),
            'sec_question'    => $_POST['sec_question'] ,
            'sec_answer'    => $_POST['sec_answer'] ,
            'is_verify'     => 0,
            'status'        => 0,
            'created_at'    => $date,
            'updated_at'    => $date
        );

        $this->users->insert($data);
    }



}