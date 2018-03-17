<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bid_model extends CI_model {

    public function getbidlist() {
        $query = $this->db->query("select * from bid_master b , artist_master as a , exhibition_master as e where b.exhibition_id=e.exhibition_id and a.artist_id=b.artist_id");
        return $query->result();
    }
    
     
      
    public function delete($bid_id) {
        $this->db->where('bid_id', $bid_id);
      
		 if ($this->db->delete('bid_master')) {
            return true;
        } else {
            return false;
        }
    }
  
    public function update_active($bid_id, $bid_status) {
        $data = array(
            'bid_id' => $bid_id,
            'bid_status' => 1
        );
        $this->db->where('bid_id', $bid_id);
       if($this->db->update('bid_master', $data))
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function update_deactive($bid_id, $bid_status) {
        $data = array(
            'bid_id' => $bid_id,
            'bid_status' => 0
        );
        $this->db->where('bid_id', $bid_id);
        $this->db->update('bid_master', $data);
    }

}
