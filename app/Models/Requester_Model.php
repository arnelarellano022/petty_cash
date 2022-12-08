<?php

namespace App\Models;
use CodeIgniter\Model;


class Requester_Model extends Model
{
    public function __construct() {
        $db      = \Config\Database::connect();
        $this->requester = $db->table('requester');
        date_default_timezone_set('Asia/Manila');
    }

    public function requester_list()
    {
        return $this->requester->orderBy('requester_id', 'asc')
            ->get()->getResult();
    }

    public function insert_requester()
    {
        $data = array(
            'requester_name'      => $_POST['requester_name'] ,
            'requester_type'      => $_POST['requester_type'] ,
            'department'      => $_POST['department'] ,
        );

        $this->requester->insert($data);
    }

    public function update_requester($requester_id)
    {
        $data = array(
            'requester_name'      => $_POST['requester_name'],
            'requester_type'      => $_POST['requester_type'] ,
            'department'      => $_POST['department'] ,
        );

        $this->requester->update($data, 'requester_id =' . $requester_id);
        $result = ($this->requester->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }
    public function delete_requester($requester_id)
    {
        $this->requester->delete(['requester_id' => $requester_id]);
    }

    public function get_requester_by_id($requester_id)
    {
        return $this->requester->where('requester_id', $requester_id)
            ->get()->getResult();
    }

}