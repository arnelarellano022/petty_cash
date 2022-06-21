<?php

class Outlet_Invoice_Model extends  CI_Model
{
    public function outlet_invoice_fetch_data()
    {
        $this->db->select('*');
        $this->db->from('db_outlet_invoices');
        $this->db->order_by("doi_id", "asc");
        $query = $this->db->get();
        return $query;
    }


    public function fetch_outlet_list()
    {
        $this->db->select('*');
        $this->db->from('outlet_info');
        $query = $this->db->get();
        return $query;
    }

    public function fetch_invoice_list()
    {
        $this->db->select('*');
        $this->db->from('db_outlet_invoice_items');
        $query = $this->db->get();
        return $query;
    }

    public function fetch_invoice($id)
    {
        $this->db->select('*');
        $this->db->from('db_outlet_invoice_items');
        $this->db->where('doi_invoice_no', $id);
        $query = $this->db->get();
        return $query;
    }

    public function fetch_sku()
    {
        $this->db->select('*');
        $this->db->from('products');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function load_address($outlet)
    {
        $this->db->select('s_address');
        $this->db->from('outlet_info');
        $this->db->where('outlet', $outlet);
        $query = $this->db->get();
        return $query->row()->s_address;
//        foreach ($query->result() as $row){
//            return $row->s_address;
//        }
    }

    public function updating_outlet_invoice($id)
    {

        $invoice_no = $this->input->post("invoice_no", TRUE);

        $this->db->set('invoice_no',                $invoice_no);
        $this->db->set('invoice_date',                  $this->input->post("invoice_date", TRUE));
        $this->db->set('outlet',                        $this->input->post("outlet", TRUE));

        $this->db->where('doi_id', $id);
        $this->db->update('db_outlet_invoices');

        //delete all items  base on invoice
        $this->db->where('doi_invoice_no', $invoice_no);
        $this->db->delete('db_outlet_invoice_items');

        $json = $_POST['pass_data'];
        $row_count = json_decode($json,true);

        if( is_array($row_count) and count($row_count) != 0) {
            for($x = 0; $x < count($row_count); $x++)
            {
                $data2 = array(
                    'doi_invoice_no'        => $invoice_no,
                    'sku'                   => $row_count[$x]['SKU'],
                    'quantity'              => $row_count[$x]['QUANTITY']
                );

                $this->db->insert('db_outlet_invoice_items', $data2);
            }
        }


        $result = ($this->db->affected_rows() != 1) ? false : true;
        return array(
            'result' => $result,
        );
    }

    public  function  fetch_data_outlet_invoice_view($id){
        $this->db->select('*');
        $this->db->from('db_outlet_invoices');
        $this->db->where('doi_id', $id);
        $query = $this->db->get();
        return $query;
    }

    public  function  outlet_invoice_record($id){
        $this->db->select('*');
        $this->db->from('db_outlet_invoices');
        $this->db->where('doi_id', $id);
        $query = $this->db->get();
        return $query;
    }

    public  function  fetch_data_outlet_invoice_items($invoice_no){
        $this->db->select('*');
        $this->db->from('db_outlet_invoice_items');
        $this->db->where('doi_invoice_no', $invoice_no);
        $query = $this->db->get();
        return $query;
    }

    public  function  get_inv_desc($sku){
        $this->db->select('description');
        $this->db->from('products');
        $this->db->where('sku', $sku);
        $query = $this->db->get();
        return $query->row()->description;
    }

    public  function  get_outletName($outlet){
        $this->db->select('outlet');
        $this->db->from('outlet_info');
        $this->db->where('outlet_id', $outlet);
        $query = $this->db->get();
        return $query->row()->outlet;
    }

    public function insert_outlet_invoice()
    {
        $invoice_no = $this->input->post("invoice_no", TRUE);

        $data = array(
            'invoice_no'    => $invoice_no,
            'invoice_date'  => $this->input->post("invoice_date", TRUE),
            'outlet'        => $this->input->post("outlet", TRUE)
        );

        $this->db->insert('db_outlet_invoices', $data);
        $doi_id = $this->db->insert_id();

        $json = $_POST['pass_data'];
        $row_count = json_decode($json,true);

        if( is_array($row_count) and count($row_count) != 0) {
            for($x = 0; $x < count($row_count); $x++)
            {
                $data2 = array(
                    'doi_invoice_no'        => $invoice_no,
                    'sku'          => $row_count[$x]['SKU'],
                    'quantity'          => $row_count[$x]['QUANTITY']
                );

                $this->db->insert('db_outlet_invoice_items', $data2);
            }
        }


        $result = ($this->db->affected_rows() != 1) ? false : true;
        return array(
            'result' => $result,
            'doi_id' => $doi_id,
        );
    }

    public function delete_outlet_invoice_Model($delete_ID){
        $this->db->where('doi_id', $delete_ID);
        $this->db->delete('db_outlet_invoices');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }
    public function getOutletName($outlet_id)
    {
        $this->db->select('outlet');
        $this->db->from('outlet_info');
        $this->db->where('outlet_id', $outlet_id);
        $query = $this->db->get();
        foreach ($query->result() as $row){
            return $row->outlet;
        }
    }

}
