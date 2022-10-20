<?php

namespace App\Models;
use CodeIgniter\Model;

class Roles_Model extends  Model
{
    public $builder;

    public function __construct() {
        $db      = \Config\Database::connect();
        $this->builder = $db->table('user_roles');
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

    public function get_role_by_id($id)
    {
        return $this->builder->where('id', $id)
            ->get()->getResult();
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

    public function get_roles(){
        $db = db_connect();
        $query = $db->query('Select * FROM roles ORDER BY id ASC ');
        return $query->getResult();
    }
}