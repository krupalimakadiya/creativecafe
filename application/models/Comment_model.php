<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_model {

    public function getcommentlist() {
        $query = $this->db->query("select * from comment_master as c , artist_master as a where c.artist_id=a.artist_id");
        return $query->result();
    }
    
    public function delete($comment_id) {
        $this->db->where('comment_id', $comment_id);
         if ($this->db->delete('comment_master')) {
            return true;
        } else {
            return false;
        }
    }

    public function update_active($comment_id, $status) {
        $data = array(
            'comment_id' => $comment_id,
            'status' => 1
        );
        $this->db->where('comment_id', $comment_id);
        if($this->db->update('comment_master', $data))
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function update_deactive($comment_id, $status) {
        $data = array(
            'comment_id' => $comment_id,
            'status' => 0
        );
        $this->db->where('comment_id', $comment_id);
        if($this->db->update('comment_master', $data))
        {
            return true;
        }
        else{
            return false;
        }
    }

}
