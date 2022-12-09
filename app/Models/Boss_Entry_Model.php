<?php

namespace App\Models;
use CodeIgniter\Model;


class Boss_Entry_Model extends Model
{
    public function __construct() {
        $db      = \Config\Database::connect();
        $this->boss_entry = $db->table('boss_entry');
        date_default_timezone_set('Asia/Manila');
    }

    public function boss_entry_list()
    {
        return $this->boss_entry->orderBy('boss_entry_id', 'asc')
            ->get()->getResult();
    }

    public function insert_boss_entry()
    {
        $data = array(
            'reference_code'        => $_POST['reference_code'] ,
            'date'                  => $_POST['date'] ,
            'transaction_type'      => $_POST['transaction_type'] ,
            'amount'                => $_POST['amount'] ,
        );

        $this->boss_entry->insert($data);
    }

    public function update_boss_entry($boss_entry_id)
    {
        $data = array(
            'reference_code'        => $_POST['reference_code'] ,
            'date'                  => $_POST['date'] ,
            'transaction_type'      => $_POST['transaction_type'] ,
            'amount'                => $_POST['amount'] ,
        );

        $this->boss_entry->update($data, 'boss_entry_id =' . $boss_entry_id);
        $result = ($this->boss_entry->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }
    public function delete_boss_entry($boss_entry_id)
    {
        $this->boss_entry->delete(['boss_entry_id' => $boss_entry_id]);
    }

    public function get_boss_entry_by_id($boss_entry_id)
    {
        return $this->boss_entry->where('boss_entry_id', $boss_entry_id)
            ->get()->getResult();
    }

}