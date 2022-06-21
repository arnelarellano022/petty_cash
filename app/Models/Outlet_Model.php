<?php
class Outlet_Model extends  CI_Model
{
    public function outlet_fetch_data()
    {
        $role = $this->session->user_role;

        $this->db->select('*');
        if($role == "Marketing"){
            $this->db->where("cust_type", 1 ); // Marketing
        }elseif ($role == "Supermarket"){
            $this->db->where("cust_type", 2 ); // Supermarket
        }
        $this->db->from('outlet_info');

        $query = $this->db->get();
        return $query->result();
    }

    public  function get_c_sku($outlet_id){
        $this->db->select('*');
        $this->db->from('outlet_carried_sku');
        $this->db->where("outlet_id", $outlet_id );
        $query = $this->db->get();
        return $query->result();
    }

    public function  get_rating_list($acct_name){
        $this->db->select('date_taken, acct_name, rating');
        $this->db->from('best_photos');
        $this->db->where("acct_name", $acct_name );
        $this->db->group_by("date_taken");
        $this->db->order_by('date_taken', 'DESC');
        $this->db->limit(3);
        $data  = $this->db->get()->result();
        return $data;
    }

//    public function  get_best_rate($acct_name){
//        $highest_rating = "";
//        $this->db->select('date_taken, acct_name, rating');
//        $this->db->from('best_photos');
//        $this->db->where("acct_name", $acct_name );
//        $this->db->order_by('rating', 'DESC');
//        $this->db->limit(1);
//        $data  = $this->db->get()->result();
//        foreach ($data as $row){
//            $highest_rating = $row->rating;
//        }
//        if(!empty($highest_rating)) {
//            $this->db->select('*');
//            $this->db->from('best_photos');
//            $this->db->where("rating", $highest_rating);
//            $this->db->where("acct_name", $acct_name);
//            $get_rowCount = $this->db->get()->num_rows();
//
//            if ($get_rowCount > 10) {
//                $this->db->select('date_taken, acct_name, rating');
//                $this->db->from('best_photos');
//                $this->db->where("acct_name", $acct_name);
//                $this->db->where("rating", $highest_rating);
//                $this->db->order_by('date_taken', 'DESC');
//                $this->db->limit(1);
//                $data2 = $this->db->get()->result();
//                foreach ($data2 as $row2) {
//                    $latest_date = $row2->date_taken;
//                }
//                $this->db->select('*');
//                $this->db->from('best_photos');
//                $this->db->where("date_taken", $latest_date);
//                $this->db->where("acct_name", $acct_name);
//                $this->db->where("rating", $highest_rating);
//                $this->db->group_by("rating");
//                $query = $this->db->get();
//                return $query->result();
//            } else {
//                $this->db->select('*');
//                $this->db->from('best_photos');
//                $this->db->where("acct_name", $acct_name);
//                $this->db->where("rating", $highest_rating);
//                $this->db->group_by("rating");
//                $query = $this->db->get();
//                return $query->result();
//            }
//        }
//    }

    public function get_Best_Photos($outlet_id){

        $this->db->select('*');
        $this->db->from('best_photos');
        $this->db->where("outlet_id", $outlet_id );
        $query  = $this->db->get();
        return $query->result();
    }

    public function get_Recent_Photos($outlet_id){
        $this->db->select('*');
        $this->db->from('latest_photos');
        $this->db->where("outlet_id", $outlet_id );
        $this->db->order_by('date_taken', 'desc');
        $this->db->limit(30);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_image_modem($batch_no){

        if (isset($_POST['check_photo'])) {

            $this->db->set('photo_type', 0);
            $this->db->where('batch_no', $batch_no);
            $this->db->update('best_photos');

            $result = ($this->db->affected_rows() != 1) ? false : true;
            return array(
                'result' => $result,
            );
        } else {
            $result = false;
            return array(
                'result' => $result,
            );
        }
    }

    public function update_image_modem2($batch_no){

        if (isset($_POST['mark_photo'])) {

            $this->db->set('photo_type', 1);
            $this->db->where('batch_no', $batch_no);
            $this->db->update('best_photos');

            $result = ($this->db->affected_rows() != 1) ? false : true;

        }
        else
        {
            $result = false;
        }
        return array(
            'result' => $result,
        );
    }



    public function  fetch_data_outlet_view($id){
        $this->db->select('*');
        $this->db->from('outlet_info');
        $this->db->where("outlet_id", $id );
        $query = $this->db->get();
        return $query->result();
    }

    public function  fetch_data_sku($outlet_id){
        $this->db->select('*');
        $this->db->from('outlet_carried_sku');
        $this->db->where("outlet_id", $outlet_id );
        $this->db->order_by("year", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    public  function  batch_num(){

        return $batch_no = date('YmdHis');
    }

    public function insert_outlet_datum()
    {
        ///get island group
        $island_grp  = $this->input->post("island_grp", TRUE);
        $island_no = "";
        if($island_grp =="Luzon"){$island_no = 1;}
        else if($island_grp =="Visayas"){$island_no = 2;}
        else if($island_grp =="Mindanao"){$island_no = 3;}


        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');

        $batch_no = $this->batch_num();
        $user = $this->session->user_id;

        $profpic_filename="";

        if (!empty($_FILES['prof_photo']['name']))
        {
            $config['upload_path'] = 'D:/uploads/outlet_profile_pic';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = hash ( "sha256", uniqid() );;
            $config['overwrite'] = true;
            $this->upload->initialize($config);
            $this->upload->do_upload('prof_photo');

            $path_parts = pathinfo($_FILES["prof_photo"]["name"]);
            $extension = $path_parts['extension'];
            $profpic_filename = $config['file_name'] . "." . $extension;
        }

        $data = array(
            'distributor'                       => $this->input->post("distributor", TRUE),
            'cust_type'                         => $this->input->post("cust_type", TRUE),
            'outlet_code'                        => $this->input->post("outlet_code", TRUE),
            'account'                           => $this->input->post("account", TRUE),
            'outlet'                            => $this->input->post("outlet", TRUE),
            's_address'                         => $this->input->post("s_address", TRUE),
            'city'                              => $this->input->post("city", TRUE),
            'province'                          => $this->input->post("province", TRUE),
            'region'                            => $this->input->post("region", TRUE),
            'island_grp'                        => $island_no,
            's_type'                            => $this->input->post("s_type", TRUE),
            'discount'                          => $this->input->post("discount", TRUE),
            'dc_fee'                            => $this->input->post("dc_fee", TRUE),
            'samp_fee'                          => $this->input->post("samp_fee", TRUE),
            'list_fee'                          => $this->input->post("list_fee", TRUE),
            'pay_terms'                         => $this->input->post("pay_terms", TRUE),
            'col_day'                           => $this->input->post("col_day", TRUE),
            'po_acct'                           => $this->input->post("col_day", TRUE),
            'no_coc'                            => $this->input->post("no_coc", TRUE),
            'd_status'                          => $this->input->post("d_status", TRUE),
            's_hours'                           => $this->input->post("s_hours", TRUE),
            'tel_no'                            => $this->input->post("tel_no", TRUE),
            's_manager'                         => $this->input->post("s_manager", TRUE),
            's_supervisor'                      => $this->input->post("s_supervisor", TRUE),
            'purch_name'                        => $this->input->post("purch_name", TRUE),
            'profpic_filename'                  => $profpic_filename,
            'created_by'                        => $user,
            'created_at'                        => $date,
            'updated_by'                        => $user,
            'updated_at'                        => $date
        );

        $this->db->insert('outlet_info', $data);

        $outlet_id = $this->db->insert_id();

//        $outlet_id = $this->get_outlet_id($this->input->post("outlet_code", TRUE),$this->input->post("account", TRUE), $this->input->post("outlet", TRUE) );

        $json = $_POST['pass_data'];
        $row_count = json_decode($json,true);

        if( is_array($row_count) and count($row_count) != 0) {
            for($x = 0; $x < count($row_count); $x++)
            {
                $data = array(
                    'outlet_id'                    => $outlet_id,
                    'year'                              => $row_count[$x]['YEAR'],
                    'sku_confec'                        => $row_count[$x]['CONFECTIONARY'],
                    'sku_biscuit'                       => $row_count[$x]['BISCUIT'],
                    'sku_choco'                         => $row_count[$x]['CHOCOLATE'],
                    'created_by'                        => $user,
                    'created_at'                        => $date,
                    'updated_by'                        => $user,
                    'updated_at'                        => $date
                );

                $this->db->insert('outlet_carried_sku', $data);
            }
        }

        //BEST PHOTOS
        $cpt = count(array_filter($_FILES['best_photos']['name']));
        for($x = 0; $x < $cpt; $x++)
        {
            unset($config1);
            $config1 = array();
            $config1['upload_path'] = 'D:/uploads/best_photos';
            $config1['allowed_types'] = 'gif|jpg|png|jpeg';
            $config1['overwrite'] = true;
            $config1['remove_spaces'] = FALSE;
            $config1['file_name']= hash ( "sha256", uniqid());

            $_FILES['f']['name'] =  $_FILES['best_photos']['name'][$x];
            $_FILES['f']['type'] = $_FILES['best_photos']['type'][$x];
            $_FILES['f']['tmp_name'] = $_FILES['best_photos']['tmp_name'][$x];
            $_FILES['f']['error'] = $_FILES['best_photos']['error'][$x];
            $_FILES['f']['size'] = $_FILES['best_photos']['size'][$x];
            $_FILES['f']['file_name'] =  hash ( "sha256", uniqid())[$x];

            $this->upload->initialize($config1);
            $this->upload->do_upload('f');

            $path_parts = pathinfo($_FILES["best_photos"]["name"][$x]);
            $extension = $path_parts['extension'];
            $file_extension =  $config1['file_name'] . "." . $extension;

            $data = array(
                'outlet_id'                        => $outlet_id,
                'photo_filename'                     => $file_extension,
                'date_taken'                         => $this->input->post("dtp_best", TRUE),
                'created_by'                         => $user,
                'created_at'                         => $date,
                'updated_by'                         => $user,
                'updated_at'                         => $date
            );

            $this->db->insert('best_photos', $data);
        }
        // LATEST PHOTOS
        $cpt2 = count(array_filter($_FILES['latest_photos']['name']));
        for($x = 0; $x < $cpt2; $x++)
        {
            unset($config2);
            $config2 = array();
            $config2['upload_path'] = 'D:/uploads/latest_photos';
            $config2['allowed_types'] = 'gif|jpg|png|jpeg';
            $config2['overwrite'] = true;
            $config2['remove_spaces'] = FALSE;
            $config2['file_name']= hash ( "sha256", uniqid());

            $_FILES['f']['name'] =  $_FILES['latest_photos']['name'][$x];
            $_FILES['f']['type'] = $_FILES['latest_photos']['type'][$x];
            $_FILES['f']['tmp_name'] = $_FILES['latest_photos']['tmp_name'][$x];
            $_FILES['f']['error'] = $_FILES['latest_photos']['error'][$x];
            $_FILES['f']['size'] = $_FILES['latest_photos']['size'][$x];
            $_FILES['f']['file_name'] =  hash ( "sha256", uniqid())[$x];

            $this->upload->initialize($config2);
            $this->upload->do_upload('f');

            $path_parts = pathinfo($_FILES["latest_photos"]["name"][$x]);
            $extension = $path_parts['extension'];
            $file_extension =  $config2['file_name'] . "." . $extension;

            $data = array(
                'outlet_id'                          => $outlet_id,
                'photo_filename'                     => $file_extension,
                'date_taken'                         => $this->input->post("dtp_latest", TRUE),
                'created_by'                         => $user,
                'created_at'                         => $date,
                'updated_by'                         => $user,
                'updated_at'                         => $date
            );

            $this->db->insert('latest_photos', $data);
        }

        $result = ($this->db->affected_rows() != 1) ? false : true;
        return array(
            'result' => $result
        );

    }

    public function  get_outlet_id($outlet_code, $account, $outlet){
        $this->db->select('outlet_id');
        $this->db->from('outlet_info');
        $this->db->where('outlet_code',$outlet_code);
        $this->db->where('account',$account);
        $this->db->where('outlet',$outlet);
        $query = $this->db->get();
        foreach ($query->result() as $row){
           return $row->outlet_id;
        }
    }

    public function update_outlet_datum($id_no)
    {
        ///get island group
        $island_grp  = $this->input->post("island_grp", TRUE);
        $island_no = "";
        if($island_grp =="Luzon"){$island_no = 1;}
        else if($island_grp =="Visayas"){$island_no = 2;}
        else if($island_grp =="Mindanao"){$island_no = 3;}

        $profpic_filename = $_POST['profpic_filename'];

//        $this->db->where('acct_name', $_POST['pass_acct_name']);
//        $this->db->delete('outlet_info');

//        $this->db->set('acct_name', $this->input->post("acct_name", TRUE));
//        $this->db->where('acct_name', $_POST['pass_acct_name']);
//        $this->db->update('best_photos');


        if (!empty($_FILES['prof_photo']['name']))
        {
            $config['upload_path'] = 'D:/uploads/outlet_profile_pic';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = hash ( "sha256", uniqid() );;
            $config['overwrite'] = true;
            $this->upload->initialize($config);
            $this->upload->do_upload('prof_photo');

            $path_parts = pathinfo($_FILES["prof_photo"]["name"]);
            $extension = $path_parts['extension'];
            $profpic_filename = $config['file_name'] . "." . $extension;

            //delete existing profile photos in directory
            $this->db->select('profpic_filename');
            $this->db->from('outlet_info');
            $this->db->where('outlet_id', $id_no);
            $query = $this->db->get();
            foreach ($query->result() as $row){
                unlink( "D:/uploads/outlet_profile_pic/" . $row->profpic_filename );
            }

        }

        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');

        $user = $this->session->user_id;

        $this->db->set('outlet_code',           $this->input->post("outlet_code", TRUE));
        $this->db->set('cust_type',             $this->input->post("cust_type", TRUE));
        $this->db->set('distributor',           $this->input->post("distributor", TRUE));
        $this->db->set('account',               $this->input->post("account", TRUE));
        $this->db->set('outlet',                $this->input->post("outlet", TRUE));
        $this->db->set('s_address',             $this->input->post("s_address", TRUE));
        $this->db->set('city',                  $this->input->post("city", TRUE));
        $this->db->set('province',              $this->input->post("province", TRUE));
        $this->db->set('region',                $this->input->post("region", TRUE));
        $this->db->set('island_grp',            $island_no);
        $this->db->set('s_type',                $this->input->post("s_type", TRUE));
        $this->db->set('discount',              $this->input->post("discount", TRUE));
        $this->db->set('dc_fee',                $this->input->post("dc_fee", TRUE));
        $this->db->set('samp_fee',              $this->input->post("samp_fee", TRUE));
        $this->db->set('list_fee',              $this->input->post("list_fee", TRUE));
        $this->db->set('pay_terms',             $this->input->post("pay_terms", TRUE));
        $this->db->set('col_day',               $this->input->post("col_day", TRUE));
        $this->db->set('po_acct',               $this->input->post("po_acct", TRUE));
        $this->db->set('no_coc',                $this->input->post("no_coc", TRUE));
        $this->db->set('d_status',              $this->input->post("d_status", TRUE));
        $this->db->set('s_hours',               $this->input->post("s_hours", TRUE));
        $this->db->set('s_manager',             $this->input->post("s_manager", TRUE));
        $this->db->set('s_supervisor',          $this->input->post("s_supervisor", TRUE));
        $this->db->set('purch_name',            $this->input->post("purch_name", TRUE));
        $this->db->set('tel_no',                $this->input->post("tel_no", TRUE));
        $this->db->set('updated_by',             $user);
        $this->db->set('updated_at',             $date);
        $this->db->set('profpic_filename',       $profpic_filename);

        $this->db->where('outlet_id', $id_no);
        $this->db->update('outlet_info');

        $outlet_id = $this->get_outlet_id($this->input->post("outlet_code", TRUE),$this->input->post("account", TRUE), $this->input->post("outlet", TRUE) );

        $json = $_POST['pass_data'];
        $row_count = json_decode($json,true);

        if( is_array($row_count) and count($row_count) != 0)
        {

            $this->db->where('outlet_id', $outlet_id);
            $this->db->delete('outlet_carried_sku');

            for($x = 0; $x < count($row_count); $x++)
            {
                    $data = array(
                    'outlet_id'                         => $outlet_id,
                    'year'                              =>  $row_count[$x]['YEAR'],
                    'sku_confec'                        =>  $row_count[$x]['CONFECTIONARY'],
                    'sku_biscuit'                       =>  $row_count[$x]['BISCUIT'],
                    'sku_choco'                         =>  $row_count[$x]['CHOCOLATE'],
                    'created_by'                        => $user,
                    'created_at'                        => $date,
                    'updated_by'                        => $user,
                    'updated_at'                        => $date
                    );
                    $this->db->insert('outlet_carried_sku', $data);
            }
        }



        //BEST PHOTOS
        $cpt = count(array_filter($_FILES['best_photos']['name']));

        if ($cpt != 0)
        {
            //delete existing best photos in directory
            $this->db->select('photo_filename');
            $this->db->from('best_photos');
            $this->db->where('outlet_id', $outlet_id);
            $query = $this->db->get();
            foreach ($query->result() as $row){
                unlink( "D:/uploads/best_photos/" . $row->photo_filename );
            }

            //delete existing best photos in database
            $this->db->where('outlet_id', $outlet_id);
            $this->db->delete('best_photos');
        }

        for($x = 0; $x < $cpt; $x++)
        {
            unset($config1);
            $config1 = array();
            $config1['upload_path'] = 'D:/uploads/best_photos';
            $config1['allowed_types'] = 'gif|jpg|png|jpeg';
            $config1['overwrite'] = true;
            $config1['remove_spaces'] = FALSE;
            $config1['file_name']= hash ( "sha256", uniqid());

            $_FILES['f']['name'] =  $_FILES['best_photos']['name'][$x];
            $_FILES['f']['type'] = $_FILES['best_photos']['type'][$x];
            $_FILES['f']['tmp_name'] = $_FILES['best_photos']['tmp_name'][$x];
            $_FILES['f']['error'] = $_FILES['best_photos']['error'][$x];
            $_FILES['f']['size'] = $_FILES['best_photos']['size'][$x];
            $_FILES['f']['file_name'] =  hash ( "sha256", uniqid())[$x];

            $this->upload->initialize($config1);
            $this->upload->do_upload('f');

            $path_parts = pathinfo($_FILES["best_photos"]["name"][$x]);
            $extension = $path_parts['extension'];
            $file_extension =  $config1['file_name'] . "." . $extension;

            $data = array(
                'outlet_id'                          => $outlet_id,
                'photo_filename'                     => $file_extension,
                'date_taken'                         => $this->input->post("dtp_best", TRUE),
                'created_by'                         => $user,
                'created_at'                         => $date,
                'updated_by'                         => $user,
                'updated_at'                         => $date
            );

            $this->db->insert('best_photos', $data);
        }
        // LATEST PHOTOS
        $cpt2 = count(array_filter($_FILES['latest_photos']['name']));
        for($x = 0; $x < $cpt2; $x++)
        {
            unset($config2);
            $config2 = array();
            $config2['upload_path'] = 'D:/uploads/latest_photos';
            $config2['allowed_types'] = 'gif|jpg|png|jpeg';
            $config2['overwrite'] = true;
            $config2['remove_spaces'] = FALSE;
            $config2['file_name']= hash ( "sha256", uniqid());

            $_FILES['f']['name'] =  $_FILES['latest_photos']['name'][$x];
            $_FILES['f']['type'] = $_FILES['latest_photos']['type'][$x];
            $_FILES['f']['tmp_name'] = $_FILES['latest_photos']['tmp_name'][$x];
            $_FILES['f']['error'] = $_FILES['latest_photos']['error'][$x];
            $_FILES['f']['size'] = $_FILES['latest_photos']['size'][$x];
            $_FILES['f']['file_name'] =  hash ( "sha256", uniqid())[$x];

            $this->upload->initialize($config2);
            $this->upload->do_upload('f');

            $path_parts = pathinfo($_FILES["latest_photos"]["name"][$x]);
            $extension = $path_parts['extension'];
            $file_extension =  $config2['file_name'] . "." . $extension;

            $data = array(
                'outlet_id'                          => $outlet_id,
                'photo_filename'                     => $file_extension,
                'date_taken'                         => $this->input->post("dtp_latest", TRUE),
                'created_by'                         => $user,
                'created_at'                         => $date,
                'updated_by'                         => $user,
                'updated_at'                         => $date
            );

            $this->db->insert('latest_photos', $data);
        }

        $result = ($this->db->affected_rows() != 1) ? false : true;
        return array(
            'result' => $result
        );

    }

    public function update_photo_information($batch_no)
    {
        $updated_by = $this->session->user_id;
        $date = date('Y-m-d H:i:s');

        $this->db->set('date_taken', $this->input->post("date_taken", TRUE));
        $this->db->set('taken_by', $this->input->post("taken_by", TRUE));
        $this->db->set('rating', $this->input->post("rating", TRUE));
        $this->db->set('updated_by', $updated_by);
        $this->db->set('updated_at', $date);

        $this->db->where('batch_no', $batch_no);
        $this->db->update('best_photos');

        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result' => $result,
        );
    }

    public function Created_Updated_model($ID)
    {
        $this->db->select('user_name');
        $this->db->from('user_info');
        $this->db->where('user_id', $ID);
        $query = $this->db->get();
        return $query;
    }

    public function fetch_distributor()
    {
        $this->db->select('*');
        $this->db->from('distributors');
        $query = $this->db->get();
        return $query;
    }

    public function fetch_distributor_name($id)
    {
        $this->db->select('name');
        $this->db->from('distributors');
        $this->db->where('distributor_id', $id);
        $query = $this->db->get();
        foreach ($query->result() as $row){
            return $row->name;
        }
    }




    //

    public function insert_add_photo_model()
    {
        $acct_name = $_POST['$acct_name'];
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');

        $batch_no = $this->batch_num();
        $user = $this->session->user_id;

        $cpt = count(array_filter($_FILES['best_photos']['name']));
        for($x = 0; $x < $cpt; $x++)
        {
            unset($config1);
            $config1 = array();
            $config1['upload_path'] = './uploads/';
            $config1['allowed_types'] = 'gif|jpg|png|jpeg';
            $config1['overwrite'] = true;
            $config1['remove_spaces'] = FALSE;
            $config1['file_name']= hash ( "sha256", uniqid());

            $_FILES['f']['name'] =  $_FILES['best_photos']['name'][$x];
            $_FILES['f']['type'] = $_FILES['best_photos']['type'][$x];
            $_FILES['f']['tmp_name'] = $_FILES['best_photos']['tmp_name'][$x];
            $_FILES['f']['error'] = $_FILES['best_photos']['error'][$x];
            $_FILES['f']['size'] = $_FILES['best_photos']['size'][$x];
            $_FILES['f']['file_name'] =  hash ( "sha256", uniqid())[$x];

            $this->upload->initialize($config1);
            $this->upload->do_upload('f');

            $path_parts = pathinfo($_FILES["best_photos"]["name"][$x]);
            $extension = $path_parts['extension'];
            $file_extension =  $config1['file_name'] . "." . $extension;

            $data = array(
                'acct_name'                          => $acct_name,
                'batch_no'                           => $batch_no,
                'photo_filename'                     => $file_extension,
                'date_taken'                         => $this->input->post("dtp_best", TRUE),
                'taken_by'                           => $this->input->post("taken_best", TRUE),
                'rating'                             => $this->input->post("rating_best", TRUE),
                'created_by'                         => $user,
                'created_at'                         => $date,
                'updated_by'                         => $user,
                'updated_at'                         => $date
            );

            $this->db->insert('best_photos', $data);
        }

        $result = ($this->db->affected_rows() != 1) ? false : true;
        return array(
            'result' => $result
        );
    }

    public  function  delete_Outlet_Model($id)
    {
        //delete existing best photos in directory
        $this->db->select('photo_filename');
        $this->db->from('best_photos');
        $this->db->where('outlet_id', $id);
        $query = $this->db->get();
        foreach ($query->result() as $row){
            unlink( "D:/uploads/best_photos/" . $row->photo_filename );
        }

        $this->db->where('outlet_id', $id);
        $this->db->delete('best_photos');

        //delete existing latest photos in directory
        $this->db->select('photo_filename');
        $this->db->from('latest_photos');
        $this->db->where('outlet_id', $id);
        $query = $this->db->get();
        foreach ($query->result() as $row){
            unlink( "D:/uploads/latest_photos/" . $row->photo_filename );
        }

        $this->db->where('outlet_id', $id);
        $this->db->delete('latest_photos');


        //delete existing profile photos in directory
        $this->db->select('profpic_filename');
        $this->db->from('outlet_info');
        $this->db->where('outlet_id', $id);
        $query = $this->db->get();
        foreach ($query->result() as $row){
            unlink( "D:/uploads/outlet_profile_pic/" . $row->profpic_filename );
        }

        //delete all outlet information
        $this->db->where('outlet_id', $id);
        $this->db->delete('outlet_info');

        $result = ($this->db->affected_rows() != 1) ? false : true;
        return array(
            'result' => $result
        );
    }

    public  function  fetch_data_outlet_invoice_items($outlet_id){
        $invoices = '';
        $this->db->select('*');
        $this->db->from('db_outlet_invoices');
        $this->db->where('outlet', $outlet_id);
        $query = $this->db->get();
     foreach ( $query->result() as $row){
         $invoices = $row->invoice_no;
     }

        $this->db->select('*');
        $this->db->from('db_outlet_invoice_items');
        $this->db->where('doi_invoice_no', $invoices);
        $query = $this->db->get();
        return $query;
    }

    public  function  get_inv_desc($sku){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('sku', $sku);
        $query = $this->db->get();
        return $query->row()->description;
    }


    function get_invoice($outlet_id)
    {
        $data = array();

        $year = date("Y");
        $date_from  = $year . "-01-01 00:00:01";
        $date_to = $year . "-12-31 11:59:59";

        //get list Prod code ascending base on warehouse/plant
        $this->db->select('db_outlet_invoices.invoice_no, db_outlet_invoices.invoice_date, db_outlet_invoices.outlet, db_outlet_invoice_items.doi_invoice_no, db_outlet_invoice_items.sku, db_outlet_invoice_items.quantity');
        $this->db->from('db_outlet_invoices');
        $this->db->join('db_outlet_invoice_items', 'db_outlet_invoices.invoice_no = db_outlet_invoice_items.doi_invoice_no');
        $this->db->where('db_outlet_invoices.outlet', $outlet_id);
        $this->db->where('db_outlet_invoices.invoice_date >=', $date_from);
        $this->db->where('db_outlet_invoices.invoice_date <=', $date_to);
//        $this->db->group_by('purchase_order_item.product_code');
//        $this->db->order_by('purchase_order_item.product_code', "asc");
        $query2 = $this->db->get();

        foreach ($query2->result() as $row2)
        {
            $sku =  $row2->sku;
//            if($uom == null or  empty($uom)){$uom = "-";}
            $get_desc = $this->get_inv_desc($sku);
            $datatemp1 = array( $sku, $get_desc);
            $datatemp2 = array();
            $total_count = 0;

            for ( $month_count = 1; $month_count <= 12; $month_count++)
            {
                $month = str_pad($month_count, 2, '0', STR_PAD_LEFT);

                $first_date  = $year . "-" . $month . "-01 00:00:01";
                $second_date = $year . "-" . $month . "-31 11:59:59";

                $this->db->select('db_outlet_invoices.invoice_no, db_outlet_invoices.invoice_date, db_outlet_invoices.outlet, db_outlet_invoice_items.doi_invoice_no, db_outlet_invoice_items.sku, db_outlet_invoice_items.quantity');
                $this->db->from('db_outlet_invoices');
                $this->db->join('db_outlet_invoice_items', 'db_outlet_invoices.invoice_no = db_outlet_invoice_items.doi_invoice_no');
                $this->db->where('db_outlet_invoices.outlet', $outlet_id);
                $this->db->where('db_outlet_invoice_items.sku', $sku);
                $this->db->where('db_outlet_invoices.invoice_date >=', $first_date);
                $this->db->where('db_outlet_invoices.invoice_date <=', $second_date);

                $query3 = $this->db->get();
                $count_quantity = 0;
                foreach ($query3->result() as $row3) {
                    $quantity = $row3->quantity;
                    $count_quantity = $count_quantity + $quantity;
                }

                $total_count = $total_count + $count_quantity;
                $data2 = array($count_quantity);

                if($month_count == 12){
                    $total_count_array = array($total_count);
                    $datatemp2 = array_merge($datatemp2, $data2, $total_count_array);
                }
                else{
                    $datatemp2 = array_merge($datatemp2, $data2);
                }
            }

            $data[] = array_merge($datatemp1, $datatemp2);
        }
        return $data;
    }


    public function file_get_content($path){
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        return $src = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }

    public function getNo_Image($filename){
        $path = 'file://D:/uploads/'. $filename;
        return $src = $this->file_get_content($path);
    }
    public function getProfilePic($filename){
        $path = 'file://D:/uploads/outlet_profile_pic/'. $filename;
        return $src = $this->file_get_content($path);
    }
    public function getBestPic($filename){
        $path = 'file://D:/uploads/best_photos/'. $filename;
        return $src = $this->file_get_content($path);
    }
    public function getLatestPic($filename){
        $path = 'file://D:/uploads/latest_photos/'. $filename;
        return $src = $this->file_get_content($path);
    }

}