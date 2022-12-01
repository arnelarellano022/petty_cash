<?php

namespace App\Models;
use CodeIgniter\Model;

class Department_Model extends Model
{
    public function __construct() {
        $db      = \Config\Database::connect();
        $this->department = $db->table('department');
        date_default_timezone_set('Asia/Manila');
    }

    public function department_list()
    {
        return $this->department->orderBy('id', 'asc')
            ->get()->getResult();
    }

    public function insert_department()
    {
        $data = array(
            'dept_name'      => $_POST['dept_name'] ,
        );

        $this->department->insert($data);
    }

    public function update_department($id)
    {
        $data = array(
            'dept_name'      => $_POST['dept_name'] 
        );
        
        $this->department->update($data, 'id =' . $id);
        $result = ($this->department->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }
    public function delete_department($id)
    {
        $this->department->delete(['id' => $id]);
    }

    public function get_department_by_id($id)
    {
        return $this->department->where('id', $id)
            ->get()->getResult();
    }

}