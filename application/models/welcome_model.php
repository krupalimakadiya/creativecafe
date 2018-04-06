<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class welcome_model extends CI_model {

    public function get_total_artist() {
        $query = $this->db->query("select count(*) from artist_master where user_type= 'artist' ");
        return $query->result();
    }

    public function get_total_user() {
        $query = $this->db->query("select count(*) from artist_master where user_type= 'user' ");
        return $query->result();
    }
    
    public function get_total_post() {
        $query = $this->db->query("select count(*) total  from post_master ");
        return $query->result();
    }
    
    
    
}
