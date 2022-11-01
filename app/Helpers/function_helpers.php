<?php

use App\Models\Module_Model as Module_Model;

//function isLogged($ci,$e,$c){
//    $ci->login = new Module_Model;
//    $ci->login->Like('paassword',$c);
//    $id=$ci->login->select('id')->where('username',$e)->findAll();
//    return $id;
//}

// Generate Admin Sidebar Menu
if (!function_exists('get_sidebar_menu')) {
    function get_sidebar_menu()
    {
        $this->module = new Module_Model;
        $this->module->db->select('*');
        $this->module->db->order_by('sort_order','asc');
        return $this->module->db->get('module')->result_array();
    }
}