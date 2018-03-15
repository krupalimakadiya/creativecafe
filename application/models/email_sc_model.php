<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email_sc_model extends CI_model {

    public function get_email_list() {
        $query = $this->db->query("select * from email_sc_master ");
        return $query->result();
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
