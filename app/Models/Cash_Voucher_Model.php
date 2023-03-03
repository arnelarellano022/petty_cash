<?php

namespace App\Models;
use CodeIgniter\Model;


class Cash_Voucher_Model extends Model
{
    public function __construct() {
        $db      = \Config\Database::connect();
        $this->cash_voucher = $db->table('cash_voucher');
        $this->account = $db->table('account');
        date_default_timezone_set('Asia/Manila');
    }

    public function cash_voucher_list()
    {
        return $this->cash_voucher->orderBy('cv_id', 'asc')
            ->get()->getResult();
    }

    public function insert_cash_voucher()
    {
        $date = date('Y-m-d H:i:s');
        $user_id = $_SESSION['user_id'];

        $data = array(
            'voucher_no'            => $_POST['voucher_no'] ,
            'requester'             => $_POST['requester'] ,
            'date'                  => $_POST['date'] ,
            'status'                => $_POST['status'] ,

            'created_by'            => $user_id,
            'created_at'            => $date,
            'updated_by'            => $user_id,
            'updated_at'            => $date,
        );
        //add record to Cash Voucher
        $this->cash_voucher->insert($data);

        $data = array(
            'voucher_no'            => $_POST['voucher_no'] ,
            'requester'             => $_POST['requester'] ,
            'date'                  => $_POST['date'] ,
            'status'                => $_POST['status'] ,

            'created_by'            => $user_id,
            'created_at'            => $date,
            'updated_by'            => $user_id,
            'updated_at'            => $date,
        );
        //add record to Cash Voucher Items
        $this->cash_voucher->insert($data);



    }

    public function update_cash_voucher($cv_id)
    {
        $date = date('Y-m-d H:i:s');
        $user_id = $_SESSION['user_id'];

        $data = array(
            'voucher_no'            => $_POST['voucher_no'] ,
            'requester'             => $_POST['requester'] ,
            'date'                  => $_POST['date'] ,
            'status'                => $_POST['status'] ,

            'updated_by'            => $user_id ,
            'updated_at'            => $date ,
        );

        $this->cash_voucher->update($data, 'cv_id =' . $cv_id);
        $result = ($this->cash_voucher->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }
    public function delete_cash_voucher($cv_id)
    {
        $this->cash_voucher->delete(['cv_id' => $cv_id]);
    }

    public function get_cash_voucher_by_id($cv_id)
    {
        return $this->cash_voucher->where('cv_id', $cv_id)
            ->get()->getResult();
    }
    public function get_account_title()
    {
        return $this->account->orderBy('account_id', 'asc')
            ->get()->getResult();
    }


}