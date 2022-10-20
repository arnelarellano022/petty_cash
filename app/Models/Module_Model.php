<?php

namespace App\Models;
use CodeIgniter\Model;

class Module_Model extends  Model
{
    public $builder;

    public function __construct() {
        $db      = \Config\Database::connect();
        $this->builder = $db->table('module');
    }

    //Module
    public function module_fetch_data()
    {
        return $this->builder->orderBy('module_id', 'asc')
        ->get()->getResult();
    }

    public function insert_module()
    {
        $data = array(
            'module_name' => $_POST['module_name'],
            'fa_icon' => $_POST['fa_icon'],
            'sort_order' => $_POST['sort_order'],

            );

        $this->builder->insert($data);
        $result = ($this->builder->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }

    public function get_role_by_module_id($module_id)
    {
        return $this->builder->where('module_id', $module_id)
            ->get()->getResult();
    }

    public function update_module($module_id)
    {

        $data = array(
            'module_name' => $_POST['module_name'],
            'fa_icon' => $_POST['fa_icon'],
            'sort_order' => $_POST['sort_order'],
        );

        $this->builder->update($data, 'module_id =' . $module_id);
        $result = ($this->builder->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }
    public function delete_module($module_id)
    {
        $this->builder->delete(['module_id' => $module_id]);
    }

    public function get_module(){
        $db = db_connect();
        $query = $db->query('Select * FROM module ORDER BY module_id ASC ');
        return $query->getResult();
    }
}