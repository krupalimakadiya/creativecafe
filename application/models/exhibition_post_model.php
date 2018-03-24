<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Exhibition_post_model extends CI_model {

    public function geteexhibitionpostlist() {
        $query = $this->db->query("select * from exhibition_post_master as ep,  exhibition_master as e , post_master as p where ep.exhibition_id=e.exhibition_id and p.post_id=ep.post_id");

        return $query->result();
    }

    public function delete($exhibition_post_id) {
        $this->db->where('exhibition_post_id', $exhibition_post_id);
        if ($this->db->delete('exhibition_post_master')) {
            return true;
        } else {
            return false;
        }
    }

    public function update_active($exhibition_post_id) {
        $data = array(
            'exhibition_post_id' => $exhibition_post_id,
            'exhibition_post_status' => 1
        );
        $this->db->where('exhibition_post_id', $exhibition_post_id);
        if ($this->db->update('exhibition_post_master', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function update_deactive($exhibition_post_id) {
        $data = array(
            'exhibition_post_id' => $exhibition_post_id,
            'exhibition_post_status' => 0
        );
        $this->db->where('exhibition_post_id', $exhibition_post_id);
        $this->db->update('exhibition_post_master', $data);
    }
}
