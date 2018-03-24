<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email_sc_model extends CI_model {

    public function getemaillist() {
        $query = $this->db->query("select * from email_sc_master as e ");
        return $query->result();
    }

    public function check_data($country_name) {
        $query = $this->db->query("select * from email_sc_master where email_id='$email_id'");
        return $query->row_array();
    }

    public function delete($sc_id) {
        $this->db->where('sc_id', $sc_id);
        if ($this->db->delete('email_sc_master')) {
            return true;
        } else {
            return false;
        }
    }

}
