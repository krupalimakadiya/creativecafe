<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class City_model extends CI_model {

    public function getcitylist() {
        $query = $this->db->query("select * from country_master as c, state_master as s, city_master as city where city.country_id=c.country_id and city.state_id=s.state_id ");
        return $query->result();
    }

   public function getcityid($city_name) {//for active and deactive record
        $query = $this->db->query("select * from city_master where city_name='$city_name'");
        return $query->row_array();
    }

    public function update_active($city_id, $status) {
        $data = array(
            'city_id' => $city_id,
            'status' => 1
        );
        $this->db->where('city_id', $city_id);
        $this->db->update('city_master', $data);
    }

    public function update_deactive($city_id, $status) {
        $data = array(
            'city_id' => $city_id,
            'status' => 0
        );
        $this->db->where('city_id', $city_id);
        $this->db->update('city_master', $data);
    }
}
