<?php

namespace App\Models;
use CodeIgniter\Model;


class Auth_Model extends Model {
    protected $table = "ci_users";
//    protected $primaryKey = "id";
//    protected $allowedFields = [
//        "username",
//        "firstname",
//        "lastname",
//        "password",
//        "role",
//        "is_active",
//        "is_verify",
//        "token",
//        "password_reset_code",
//        "last_ip",
//        "created_at",
//        "updated_at"
//    ];
    public function load_index_data(){

        $rs_main_menu  = array();
        $rs_sub_menu   = array();
        $rs_user_roles = array();


//        $db = db_connect();
//        $db = \Config\Database::connect();
//        $db      = \Config\Database::connect();
//        $builder = $db->table('users');


        /* main menu */
//        $query = $db->query('Select * FROM admin_menu_main where act = 1 ORDER BY pri ASC ');
//        $count = $query->getNumRows();
//        if($count > 0){
//            foreach($query->getResult() as $data){
//                $rs_main_menu[] = $data;
//            }
//        }

        /* sub menu */
//        $query = $db->query('Select * FROM admin_menu_sub where act = 1 ORDER BY pri ASC ');
//        $count = $query->getNumRows();
//        if($count > 0){
//            foreach($query->getResult() as $data){
//                $rs_sub_menu[] = $data;
//            }
//        }

        /* user roles */

//        $query = $db->query("Select * FROM user_roles where user_role = '" . session()->get('user_role') . "'");
//
//        $count = $query->getNumRows();
//
//        if($count > 0){
//            foreach($query->getResult() as $data){
//                $rs_user_roles[] = $data;
//            }
//        }
//
//        return array(
//            'main_menu'          =>	 $rs_main_menu,
//            'sub_menu'	         =>	 $rs_sub_menu,
//            'index_user_roles'   =>	 $rs_user_roles
//        );
    }
    public function validate_auth_model($username, $password){
        $db = \Config\Database::connect();

        $result 	  = array();
        $user_id      = array();
        $user_role 	  = array();
        $user_name   = array();
        $is_verify   = array();
        $is_active   = array();

        $password = md5($password);

        /* ADMIN LOGIN VALIDATION */

        $query = $db->query("Select * FROM ci_users where username = '" . $username . "'and password = '". $password . "'");
//        $query = $db->query("Select * FROM user_info where user_name = 'try' and user_password = 'try'");


//        $this->db->where('user_name',$this->input->post("username",TRUE));
//        $this->db->where('user_password', $password);

//        $admin_account = $this->db->get("user_info");

        if ($query->getNumRows() == 1) {
            foreach ($query->getResult() as $rs){
                $result = true;
                $user_id = $rs->user_id;
                $user_role = $rs->user_role;
                $user_name = $rs->username;
                $is_verify = $rs->is_verify;
                $is_active = $rs->is_active;
                $firstname = $rs->firstname;
                $lastname = $rs->lastname;
            }
            return array(
                'success'       => $result,
                'user_id'            => $user_id,
                'user_role'          => $user_role,
                'username'      => $user_name,
                'is_verify'      => $is_verify,
                'is_active'      => $is_active,
                'firstname'      => $firstname,
                'lastname'      => $lastname
            );

        }




    }





}