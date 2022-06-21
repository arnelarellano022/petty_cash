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



        /* main menu */
        $this->db->order_by("pri", "asc");
        $this->db->where('act', 1);
        $main_menu = $this->db->get("admin_menu_main");
        if($main_menu->num_rows()>0){
            foreach($main_menu->result() as $data){
                $rs_main_menu[] = $data;
            }
        }

        /* sub menu */
        $this->db->order_by("pri", "asc");
        $this->db->where('act', 1);
        $sub_menu = $this->db->get("admin_menu_sub");
        if($sub_menu->num_rows()>0){
            foreach($sub_menu->result() as $data){
                $rs_sub_menu[] = $data;
            }
        }

        /* user roles */
        $this->db->where('user_role', $this->session->user_role);
        $user_roles = $this->db->get("user_roles");
        if($user_roles->num_rows()>0){
            foreach($user_roles->result() as $data){
                $rs_user_roles[] = $data;
            }
        }

        return array(
            'main_menu'          =>	 $rs_main_menu,
            'sub_menu'	         =>	 $rs_sub_menu,
            'index_user_roles'   =>	 $rs_user_roles
        );
    }
    public function validate_login(){

        $result 	  = array();
        $user_id      = array();
        $user_role 	  = array();
        $user_name   = array();

        $password = md5($this->input->post("password",TRUE));

        /* ADMIN LOGIN VALIDATION */

        $this->db->where('user_name',$this->input->post("username",TRUE));
        $this->db->where('user_password', $password);

        $admin_account = $this->db->get("user_info");

        if ($admin_account->num_rows() == 1) {

            $rs = $admin_account->row();
            $result = true;
            $user_id = $rs->user_id;
            $user_role = $rs->user_roles;
            $user_name = $rs->user_name;
        }

        return array(
            'success'       => $result,
            'user_id'       => $user_id,
            'user_role'     => $user_role,
            'user_name'    => $user_name
        );
    }


    public function check_permission($main_id, $sub_id, $roles)
    {
        $this->db->from('user_roles');
        $this->db->where('user_role',$roles);
        $this->db->where('main_menu_id', $main_id);
        $this->db->where('sub_menu_id', $sub_id);
        $query = $this->db->get()->num_rows();

        if($query > 0){return true;}
        else{return false;}
    }


}