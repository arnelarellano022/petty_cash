<?php

namespace App\Models;
use CodeIgniter\Model;


class Petty_Cash_Model extends Model
{
    public function __construct() {
        $db      = \Config\Database::connect();
        $this->petty_cash = $db->table('petty_cash');
        date_default_timezone_set('Asia/Manila');
    }

    public function petty_cash_list()
    {
        return $this->petty_cash->orderBy('petty_cash_id', 'asc')
            ->get()->getResult();
    }

    public function insert_petty_cash()
    {
        $data = array(
            'reference_code'        => $_POST['reference_code'] ,
            'date'                  => $_POST['date'] ,
            'transaction_type'      => $_POST['transaction_type'] ,
            'amount'                => $_POST['amount'] ,
            'record_type'                => $_POST['record_type'] ,
        );

        $this->petty_cash->insert($data);
    }

    public function update_petty_cash($petty_cash_id)
    {
        $data = array(
            'reference_code'        => $_POST['reference_code'] ,
            'date'                  => $_POST['date'] ,
            'transaction_type'      => $_POST['transaction_type'] ,
            'amount'                => $_POST['amount'] ,
            'record_type'                => $_POST['record_type'] ,
        );

        $this->petty_cash->update($data, 'petty_cash_id =' . $petty_cash_id);
        $result = ($this->petty_cash->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }
    public function delete_petty_cash($petty_cash_id)
    {
        $this->petty_cash->delete(['petty_cash_id' => $petty_cash_id]);
    }

    public function get_petty_cash_by_id($petty_cash_id)
    {
        return $this->petty_cash->where('petty_cash_id', $petty_cash_id)
            ->get()->getResult();
    }

}