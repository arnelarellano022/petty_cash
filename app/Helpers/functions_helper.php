<?php

use App\Models\Module_Model as Module_Model;



//$db      = \Config\Database::connect();
//$module = $db->table('module');
//$sub_module = $db->table('sub_module');


// -----------------------------------------------------------------------------
// Generate Admin Sidebar Sub Menu
if (!function_exists('get_sidebar_sub_menu')) {
    function get_sidebar_sub_menu( $module_id)
    {
        $db      = \Config\Database::connect();
        $sub_module = $db->table('sub_module');
        return $sub_module->orderBy('sort_order', 'asc')
            ->where('module_id',$module_id)
            ->get()->getResult();
    }
}


// -----------------------------------------------------------------------------
// Generate Admin Sidebar Menu
if (!function_exists('get_sidebar_menu')) {
    function get_sidebar_menu()
    {
        $db      = \Config\Database::connect();
        $module = $db->table('module');
        return $module->orderBy('sort_order', 'asc')
            ->get()->getResult();
    }
}

// -----------------------------------------------------------------------------
// CHECK MODULE PERMISSION
if (!function_exists('check_module_permission')) {
    function check_module_permission($user_role, $module_id)
    {
        $db      = \Config\Database::connect();
        $module = $db->table('module_access');
        $result = $module->where('user_role', $user_role)
            ->where('module_id', $module_id)
            ->countAllResults();
       return($result > 0) ? true : false;
    }
}
// -----------------------------------------------------------------------------
// CHECK SUB MODULE PERMISSION
if (!function_exists('check_sub_module_permission')) {
    function check_sub_module_permission($user_role, $module_id, $sub_module_id)
    {
        $db      = \Config\Database::connect();
        $module = $db->table('module_access');
        $result = $module->where('user_role', $user_role)
            ->where('module_id', $module_id)
            ->where('sub_module_id', $sub_module_id)
            ->countAllResults();
       return($result > 0) ? true : false;
    }
}
