<?php

namespace App\Models;
use CodeIgniter\Model;


class Management_Transaction_Model extends Model
{
    public function __construct() {
        $db      = \Config\Database::connect();
        $this->management_transaction = $db->table('management_transaction');
        date_default_timezone_set('Asia/Manila');
    }

    public function management_transaction_list()
    {
        return $this->management_transaction->orderBy('transaction_id', 'asc')
            ->get()->getResult();
    }

    public function insert_management_transaction()
    {
        $date = date('Y-m-d H:i:s');
        $user_id = $_SESSION['user_id'];

        $data = array(
            'reference_code'        => $_POST['reference_code'] ,
            'date'                  => $_POST['date'] ,
            'transaction_type'      => $_POST['transaction_type'] ,
            'amount'                => $_POST['amount'] ,
            'created_by'            => $user_id,
            'created_at'            => $date,
            'updated_by'            => $user_id,
            'updated_at'            => $date,
        );

        $this->management_transaction->insert($data);
    }

    public function update_management_transaction($transaction_id)
    {
        $date = date('Y-m-d H:i:s');
        $user_id = $_SESSION['user_id'];

        $data = array(
            'reference_code'        => $_POST['reference_code'] ,
            'date'                  => $_POST['date'] ,
            'transaction_type'      => $_POST['transaction_type'] ,
            'amount'                => $_POST['amount'] ,
            'updated_by'            => $user_id ,
            'updated_at'            => $date ,
        );

        $this->management_transaction->update($data, 'transaction_id =' . $transaction_id);
        $result = ($this->management_transaction->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }
    public function delete_management_transaction($transaction_id)
    {
        $this->management_transaction->delete(['transaction_id' => $transaction_id]);
    }

    public function get_management_transaction_by_id($transaction_id)
    {
        return $this->management_transaction->where('transaction_id', $transaction_id)
            ->get()->getResult();
    }


}