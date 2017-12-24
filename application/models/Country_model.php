<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Country_model extends CI_model {

    public function getcountrylist() {
        $query = $this->db->query("select * from country_master");
        return $query->result();
    }

    public function update_active($country_id, $status) {
        $data = array(
            'country_id' => $country_id,
            'status' => 1
        );
        $this->db->where('country_id', $country_id);
        $this->db->update('country_master', $data);
    }

    public function update_deactive($country_id, $status) {
        $data = array(
            'country_id' => $country_id,
            'status' => 0
        );
        $this->db->where('country_id', $country_id);
        $this->db->update('country_master', $data);
    }

}
