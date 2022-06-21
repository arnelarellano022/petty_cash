<?php

class Distributors_Model extends  CI_Model
{
    public function distributors_fetch_data()
    {
        $this->db->select('*');
        $this->db->from('distributors');
        $this->db->order_by("distributor_id", "asc");
        $query = $this->db->get();
        return $query;
    }


    public function distributors_updating($id)
    {
        $this->db->select('*');
        $this->db->from('distributors');
        $this->db->where('distributor_id', $id);
        $query = $this->db->get();
        return $query;
    }

    public function updating_distributors($id)
    {
        $this->db->set('name',            $this->input->post("name", TRUE));
        $this->db->where('distributor_id', $id);
        $this->db->update('distributors');
        $result = ($this->db->affected_rows() != 1) ? false : true;
        return array(
            'result' => $result
        );
    }



    public function insert_distributors()
    {
            $data = array('name' => $this->input->post("name", TRUE));

            $this->db->insert('distributors', $data);
            $result = ($this->db->affected_rows() != 1) ? false : true;
            return array(
                'result' => $result,
            );
    }

    public function delete_Distributors_Model($delete_ID){
        $this->db->where('distributor_id', $delete_ID);
        $this->db->delete('distributors');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }


}
