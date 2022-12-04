<?php

namespace App\Models;
use CodeIgniter\Model;


class Company_Model extends Model
{
    public function __construct() {
        $db      = \Config\Database::connect();
        $this->company = $db->table('company');
        date_default_timezone_set('Asia/Manila');
    }

    public function company_list()
    {
        return $this->company->orderBy('company_id', 'asc')
            ->get()->getResult();
    }

    public function insert_company()
    {
        $data = array(
            'company_name'      => $_POST['company_name'] ,
        );

        $this->company->insert($data);
    }

    public function update_company($company_id)
    {
        $data = array(
            'company_name'      => $_POST['company_name'] 
        );
        
        $this->company->update($data, 'company_id =' . $company_id);
        $result = ($this->company->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }
    public function delete_company($company_id)
    {
        $this->company->delete(['company_id' => $company_id]);
    }

    public function get_company_by_id($company_id)
    {
        return $this->company->where('company_id', $company_id)
            ->get()->getResult();
    }

}