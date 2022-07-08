<?php

namespace App\Models;

use CodeIgniter\Model;

$db = db_connect();

class Login_Model extends Model {

    public function load_index_data(){

        $rs_main_menu  = array();
        $rs_sub_menu   = array();
        $rs_user_roles = array();


        $db = db_connect();
//        $db      = \Config\Database::connect();
//        $builder = $db->table('users');


        /* main menu */
        $query = $db->query('Select * FROM admin_menu_main where act = 1 ORDER BY pri ASC ');
        $count = $query->getNumRows();
        if($count > 0){
            foreach($query->getResult() as $data){
                $rs_main_menu[] = $data;
            }
        }

        /* sub menu */
        $query = $db->query('Select * FROM admin_menu_sub where act = 1 ORDER BY pri ASC ');
        $count = $query->getNumRows();
        if($count > 0){
            foreach($query->getResult() as $data){
                $rs_sub_menu[] = $data;
            }
        }

        /* user roles */

        $query = $db->query("Select * FROM user_roles where user_role = '" . session()->get('user_role') . "'");

        $count = $query->getNumRows();

        if($count > 0){
            foreach($query->getResult() as $data){
                $rs_user_roles[] = $data;
            }
        }

        return array(
            'main_menu'          =>	 $rs_main_menu,
            'sub_menu'	         =>	 $rs_sub_menu,
            'index_user_roles'   =>	 $rs_user_roles
        );
    }
    public function validate_login_model($username, $password){
        $db = db_connect();

        $result 	  = array();
        $user_id      = array();
        $user_role 	  = array();
        $user_name   = array();

        $password = md5($password);

        /* ADMIN LOGIN VALIDATION */

        $query = $db->query("Select * FROM user_info where user_name = '" . $username . "'and user_password = '". $password . "'");
//        $query = $db->query("Select * FROM user_info where user_name = 'try' and user_password = 'try'");


//        $this->db->where('user_name',$this->input->post("username",TRUE));
//        $this->db->where('user_password', $password);

//        $admin_account = $this->db->get("user_info");

        if ($query->getNumRows() == 1) {
            foreach ($query->getResult() as $rs){
                $result = true;
                $user_id = $rs->user_id;
                $user_role = $rs->user_roles;
                $user_name = $rs->user_name;
            }

        }

        return array(
            'success'       => $result,
            'user_id'       => $user_id,
            'user_role'     => $user_role,
            'user_name'     => $user_name
        );
    }


    public function check_permission($main_id, $sub_id, $roles)
    {
        $db = db_connect();
        $query = $db->query("Select * FROM user_roles where user_role = '" . $roles . "'and main_menu_id = '". $main_id . "'and sub_menu_id = '". $sub_id . "'");
        $count = $query->getNumRows();

//        $this->db->from('user_roles');
//        $this->db->where('user_role',$roles);
//        $this->db->where('main_menu_id', $main_id);
//        $this->db->where('sub_menu_id', $sub_id);
//        $query = $this->db->get()->num_rows();

        if($count > 0){return true;}
        else{return false;}
    }


}