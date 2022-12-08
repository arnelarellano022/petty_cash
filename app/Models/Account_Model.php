<?php

namespace App\Models;
use CodeIgniter\Model;


class Account_Model extends Model
{
    public function __construct() {
        $db      = \Config\Database::connect();
        $this->account = $db->table('account');
        date_default_timezone_set('Asia/Manila');
    }

    public function account_list()
    {
        return $this->account->orderBy('account_id', 'asc')
            ->get()->getResult();
    }

    public function insert_account()
    {
        $data = array(
            'title'      => $_POST['title'] ,
        );

        $this->account->insert($data);
    }

    public function update_account($account_id)
    {
        $data = array(
            'title'      => $_POST['title'] 
        );
        
        $this->account->update($data, 'account_id =' . $account_id);
        $result = ($this->account->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }
    public function delete_account($account_id)
    {
        $this->account->delete(['account_id' => $account_id]);
    }

    public function get_account_by_id($account_id)
    {
        return $this->account->where('account_id', $account_id)
            ->get()->getResult();
    }

}