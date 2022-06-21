<?php

class Products_Model extends  CI_Model
{
    public function products_fetch_data()
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->order_by("sku", "asc");
        $query = $this->db->get();
        return $query;
    }


    public function products_updating($id)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('sku', $id);
        $query = $this->db->get();
        return $query;
    }

    public function updating_products($id)
    {


        $this->db->set('sku',                   $this->input->post("sku", TRUE));
        $this->db->set('category',              $this->input->post("category", TRUE));
        $this->db->set('sub_category',          $this->input->post("sub_category", TRUE));
        $this->db->set('description',           $this->input->post("description", TRUE));

        $this->db->where('sku', $id);
        $this->db->update('products');
        $result = ($this->db->affected_rows() != 1) ? false : true;
        return array(
            'result' => $result
        );
    }

    public  function  fetch_data_product_view($id){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('sku', $id);
        $query = $this->db->get();
        return $query;
    }

    public function insert_products()
    {
            $data = array(
                'sku'           => $this->input->post("sku", TRUE),
                'category'      => $this->input->post("category", TRUE),
                'sub_category'  => $this->input->post("sub_category", TRUE),
                'description'   => $this->input->post("description", TRUE)
            );

            $this->db->insert('products', $data);
            $result = ($this->db->affected_rows() != 1) ? false : true;
            return array(
                'result' => $result,
            );
    }

    public function delete_Products_Model($delete_ID){
        $this->db->where('sku', $delete_ID);
        $this->db->delete('products');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

}
