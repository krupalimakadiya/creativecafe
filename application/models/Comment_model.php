<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_model {

    public function getcommentlist() {
        $query = $this->db->query("select * from comment_master");
        return $query->result();
    }

    
    public function delete($comment_id) {
        $this->db->where('comment_id', $comment_id);
        $this->db->delete('comment_master');
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
