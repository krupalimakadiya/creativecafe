<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Country_model extends CI_model {

    public function getcountrylist() {
        $query = $this->db->query("select * from country_master");
        return $query->result();
    }

    public function insert($country_data) {
        $data = array('country_name' => $country_data); //1= active //0-deactive
      
        $this->db->insert('country_master', $data);
    }

    public function check_data($country_name) {
        $query = $this->db->query("select * from country_master where country_name='$country_name'");
        return $query->row_array();
    }

    public function edit_data($country_id) {
        $query = $this->db->query("select * from country_master where country_id='$country_id'");
        return $query->row_array();
    }

    public function update_data($country_id, $country_name) {
        $data = array(
            'country_name' => $country_name,
        );
        $this->db->where('country_id', $country_id);
        $this->db->update('country_master', $data);
    }

    public function delete($country_id) {
        $this->db->where('country_id', $country_id);
        if ($this->db->delete('country_master')) {
            return true;
        } else {
            return false;
        }
    }

    public function update_active($country_id, $country_status) {
        $data = array(
            'country_id' => $country_id,
            'country_status' => 1
        );
        $this->db->where('country_id', $country_id);
       if($this->db->update('country_master', $data))
       {
           return true;
       }else {
     return false;
       }
    }

    public function update_deactive($country_id, $country_status) {
        $data = array(
            'country_id' => $country_id,
            'country_status' => 0
        );
        $this->db->where('country_id', $country_id);
        if($this->db->update('country_master', $data))
        {
            return true;
        }
        else{
            return false;
        }
    }

}
