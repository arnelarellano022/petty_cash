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

    public function validate_Auth_login($username, $_password){

        $result = $this->users->where('username', $username)->get()->getResult();
        foreach ($result as $row){
            $hash_password = $row->password;
        }

        $verify = (password_verify(hash('sha512', $_password), $hash_password));

        if ($verify == true) {
            foreach ($result as $rs) {


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

        $_password = hash('sha512', $_POST['password']);
        $password = password_hash($_password, PASSWORD_DEFAULT);


        $data = array(
            'username'      => $_POST['username'] ,
            'firstname'     => $_POST['firstname'] ,
            'lastname'      => $_POST['lastname'] ,
            'password'      => $password,
            'sec_question'  => $_POST['sec_question'] ,
            'sec_answer'    => md5($_POST['sec_answer']) ,
            'is_verify'     => 0,
            'status'        => 0,
            'last_ip'       => $this->getUserIpAddr(),
            'created_at'    => $date,
            'updated_at'    => $date
        );

        $this->users->insert($data);
    }

    public function get_sec_question($username)
    {
        $result = $this->users->where('username', $username)
            ->get()->getResult();
        foreach ($result as $row){
            return $row->sec_question;
        }
    }

    public function check_username_exist($username)
    {
        $result = $this->users->where('username', $username)
            ->countAllResults();
        return($result == 0) ? true : false;
    }

    public function check_account_sec($username, $sec_answer)
    {
        $result = $this->users->where('username', $username)
            ->where('sec_answer', $sec_answer)
            ->countAllResults();
        return($result > 0) ? true : false;
    }

    public function validate_acct_security()
    {

        $date = date('Y-m-d H:i:s');

        $result = $this->users->where('username', $_POST['username2'])
            ->get()->getResult();
        foreach ($result as $row){
            $user_id = $row->user_id;
        }

        $_password = hash('sha512', $_POST['password']);
        $password = password_hash($_password, PASSWORD_DEFAULT);

        $data = array(
            'password'      => $password,
            'last_ip'       => $this->getUserIpAddr(),
            'updated_at'    => $date
        );

        $this->users->update($data, 'user_id ='. $user_id );

        return ($this->users->updateBatch() != 1) ? false : true;

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