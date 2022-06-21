<?php

class Permission_Model extends  CI_Model
{
    public function permission_fetch_data()
    {
        $this->db->select('*');
        $this->db->from('user_roles');
        $this->db->order_by("id", "asc");
        $query = $this->db->get();
        return $query;
    }

    public function getMain_Menu()
    {
        $this->db->order_by("id", "asc");
        $query = $this->db->get('admin_menu_main');
        return $query;
    }

    public function getSub_Menu($sub_id)
    {
        $this->db->where('main_menu_id',$sub_id);
        $this->db->order_by("main_menu_id", "asc");
        $query = $this->db->get('admin_menu_sub');

        $output = '<option selected hidden>Select Sub Menu</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value ="'.$row->id.'">'.$row->title.'</option>';
        }
        return $output;
    }

    public function getMain_Name($_id)
    {
        $this->db->order_by("id", "asc");
        $this->db->where('id',$_id);
        $query = $this->db->get('admin_menu_main');
        return $query;
    }
    public function getSub_Name($_id)
    {
        $this->db->order_by("id", "asc");
        $this->db->where('id',$_id);
        $query = $this->db->get('admin_menu_sub');
        return $query;
    }

    public function insert_permission_model()
    {
            $data = array(
                'user_role' => $this->input->post("user_role", TRUE),
                'main_menu_id' => $this->input->post("main_menu", TRUE),
                'sub_menu_id' => $this->input->post("sub_menu", TRUE)
            );

            $this->db->insert('user_roles', $data);
            $result = ($this->db->affected_rows() != 1) ? false : true;
            return array(
                'result' => $result,
            );
    }

    public function delete_permission_Model($delete_ID){
        $this->db->where('id', $delete_ID);
        $this->db->delete('user_roles');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }


}
