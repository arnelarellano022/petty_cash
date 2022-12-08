<?php

namespace App\Models;
use CodeIgniter\Model;


class Planta_Model extends Model
{
    public function __construct() {
        $db      = \Config\Database::connect();
        $this->planta = $db->table('planta');
        date_default_timezone_set('Asia/Manila');
    }

    public function planta_list()
    {
        return $this->planta->orderBy('planta_id', 'asc')
            ->get()->getResult();
    }

    public function insert_planta()
    {
        $data = array(
            'planta'      => $_POST['planta'] ,
        );

        $this->planta->insert($data);
    }

    public function update_planta($planta_id)
    {
        $data = array(
            'planta'      => $_POST['planta'] 
        );
        
        $this->planta->update($data, 'planta_id =' . $planta_id);
        $result = ($this->planta->updateBatch() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }
    public function delete_planta($planta_id)
    {
        $this->planta->delete(['planta_id' => $planta_id]);
    }

    public function get_planta_by_id($planta_id)
    {
        return $this->planta->where('planta_id', $planta_id)
            ->get()->getResult();
    }

}