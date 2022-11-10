<?php

namespace App\Models;
use CodeIgniter\Model;

class Module_Model extends  Model
{
    //Table
    public $module, $sub_module;

    public function __construct() {
        $db      = \Config\Database::connect();
        $this->module = $db->table('module');
        $this->sub_module = $db->table('sub_module');
    }

    //Module
    public function module_fetch_data()
    {
        return $this->module->orderBy('module_id', 'asc')
        ->get()->getResult();
    }

    public function insert_module()
    {
        $data = array(
            'module_name' => $_POST['module_name'],
            'fa_icon' => $_POST['fa_icon'],
            'sort_order' => $_POST['sort_order'],
            );

        $this->module->insert($data);
        $result = ($this->module->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }

    public function get_role_by_module_id($module_id)
    {
        return $this->module->where('module_id', $module_id)
            ->get()->getResult();
    }

    public function update_module($module_id)
    {

        $data = array(
            'module_name' => $_POST['module_name'],
            'fa_icon' => $_POST['fa_icon'],
            'sort_order' => $_POST['sort_order'],
        );

        $this->module->update($data, 'module_id =' . $module_id);
        $result = ($this->module->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }

    public function delete_module($module_id)
    {
        $this->module->delete(['module_id' => $module_id]);
    }

    public function get_module(){
        $db = db_connect();
        $query = $db->query('Select * FROM module ORDER BY module_id ASC ');
        return $query->getResult();
    }

    //Sub Module
    public function sub_module_fetch_data($module_id)
    {
        return $this->sub_module->orderBy('sort_order', 'asc')
            ->where('module_id',$module_id)
            ->get()->getResult();
    }

    public function insert_sub_module($module_id)
    {

        $data = array(
            'module_id'         => $module_id,
            'sub_module_name'   => $_POST['sub_module_name'],
            'link'              => $_POST['link'],
            'sort_order'        => $_POST['sort_order'],
            'operation'         => $_POST['operation']
        );

        $this->sub_module->insert($data);
        $result = ($this->sub_module->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }

    public function update_sub_module($sub_module_id)
    {
        $data = array(
            'sub_module_name'   => $_POST['sub_module_name'],
            'link'              => $_POST['link'],
            'sort_order'        => $_POST['sort_order'],
            'operation'         => $_POST['operation']
        );

        $this->sub_module->update($data, 'sub_module_id =' . $sub_module_id);
        $result = ($this->sub_module->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }

    public function get_role_by_sub_module_id($sub_module_id)
    {
        return $this->sub_module->where('sub_module_id', $sub_module_id)
            ->get()->getResult();
    }
}