<?php

namespace App\Models;
use CodeIgniter\Model;

class Auth_Model extends Model {

    public function __construct() {
        $db      = \Config\Database::connect();
        $this->users = $db->table('ci_users');
        $this->roles = $db->table('user_roles');
        date_default_timezone_set('Asia/Manila');
    }

    public function validate_Auth_login($username, $password){


        $password = md5($password);

        $query = $this->users->where('username', $username)
            ->where('password', $password)
            ->get();

        if ($query->getNumRows() == 1) {
            foreach ($query->getResult() as $rs) {


                if ($rs->user_role != "-")
                {
                $query_roles = $this->roles->where('roles', $rs->user_role)->get()->getResult();
                    foreach ($query_roles as $row){
                        $user_role_id = $row->id;
                    }
                }else { $user_role_id = $rs->user_role;}


                $user_id = $rs->user_id;
                $user_name = $rs->username;
                $is_verify = $rs->is_verify;
                $status = $rs->status;
                $firstname = $rs->firstname;
                $lastname = $rs->lastname;
            }



            return array(
                'success'       => true,
                'user_id'       => $user_id,
                'user_role'     => $user_role_id,
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
            'sec_question'  => $_POST['sec_question'] ,
            'sec_answer'    => $_POST['sec_answer'] ,
            'is_verify'     => 0,
            'status'        => 0,
            'last_ip'       => $this->getUserIpAddr(),
            'created_at'    => $date,
            'updated_at'    => $date
        );

        $this->users->insert($data);
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