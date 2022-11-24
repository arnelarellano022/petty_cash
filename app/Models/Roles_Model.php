<?php

namespace App\Models;
use CodeIgniter\Model;

class Roles_Model extends  Model
{


    public function __construct() {
        $db      = \Config\Database::connect();
        $this->builder = $db->table('user_roles');
        $this->module = $db->table('module');
        $this->sub_module = $db->table('sub_module');
        $this->module_access = $db->table('module_access');
        date_default_timezone_set('Asia/Manila');
    }

    //Roles
    public function roles_fetch_data()
    {
        return $this->builder->orderBy('id', 'asc')
        ->get()->getResult();
    }

    public function insert_roles()
    {
        $data = array( 'roles' => $_POST['roles'] );

        $this->builder->insert($data);
        $result = ($this->builder->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }

    public function update_roles($id)
    {

        $data = array(
            'roles' => $_POST['roles']
        );

        $this->builder->update($data, 'id =' . $id);
        $result = ($this->builder->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }
    public function delete_roles($id)
    {
        $this->builder->delete(['id' => $id]);
    }

    public function get_roles($id){
        $query =  $this->builder->where('id', $id)->get();
        foreach ($query->getResult() as $row) {
            return $row->roles;
        }
    }

    public function get_role_by_id($id)
    {
        return $this->builder->where('id', $id)
            ->get()->getResult();
    }

    public function get_modules()
    {
        return $this->module->orderBy('sort_order', 'asc')
            ->get()->getResult();
    }
    public function get_sub_modules()
    {
        return $this->sub_module->orderBy('sort_order', 'asc')
            ->get()->getResult();
    }

    public function get_module_access($user_role_id)
    {
        $records = $this->module_access->where('user_role', $user_role_id)
            ->get()->getResult();


        $data = array();
        foreach($records as $row)
        {
            $data[] = $row->module_id .'/'. $row->sub_module_id .'/'. $row->operation;
        }
        return $data;
    }

    function set_access()
    {
        if($_POST['status']==1)
        {
            $data = array(
                'user_role' => $_POST['user_role'],
                'module_id' => $_POST['module_id'],
                'sub_module_id' => $_POST['sub_module_id'],
                'operation' => $_POST['operation'],
            );
            $this->module_access->insert($data);

        }
        else
        {
            $data = array(
                'user_role' => $_POST['user_role'],
                'module_id' => $_POST['module_id'],
                'sub_module_id' => $_POST['sub_module_id'],
                'operation' => $_POST['operation'],
            );
            $this->module_access->delete($data);
        }
    }
}