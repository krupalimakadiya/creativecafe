<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class State_model extends CI_model {

    public function getcountrylist() {
        $query = $this->db->query("select * from country_master");
        return $query->result();
    }

    public function getstatelist() {
        $query = $this->db->query("select * from country_master as c,state_master as s where s.country_id=c.country_id");
        return $query->result();
    }


    public function insert($country_id, $state_name) {
        $data = array('country_id' => $country_id,
            'state_name' => $state_name);
        $this->db->insert('state_master', $data);
    }

    public function check_data($country_id, $state_name) {
        $query = $this->db->query("select * from state_master where country_id='$country_id' AND state_name='$state_name' ");
        return $query->row_array();
    }

    public function edit_data($state_id) {
        $query = $this->db->query("select * from country_master as c, state_master as s where state_id='$state_id'");
        return $query->row_array();
    }

    public function update_data($state_id, $country_id, $state_name) {
        $data = array(
            'country_id' => $country_id,
            'state_name' => $state_name,
        );
        $this->db->where('state_id', $state_id);
        $this->db->update('state_master', $data);
    }

    public function delete($state_id) {
        $this->db->where('state_id', $state_id);
        if($this->db->delete('state_master'))
        {
                  return true;
        } else {
            return false;        
        }
    }

    public function update_active($state_id) {
        $data = array(
            'state_id' => $state_id,
            'state_status' => 1
        );
        $this->db->where('state_id', $state_id);
        if($this->db->update('state_master', $data))
        {            return true;
        } else {
            return false;
        }
    }

    public function update_deactive($state_id) {
        $data = array(
            'state_id' => $state_id,
            'state_status' => 0
        );
        $this->db->where('state_id', $state_id);
        if($this->db->update('state_master', $data))
        {
                  return true;
        } else {
            return false;        
        }
    }

    //used in importp method for get country id from coutry name
     public function getcountryid($country_name) {
      $query = $this->db->query("select * from country_master where country_name='$country_name'");
      return $query->row_array();
      } 
}
