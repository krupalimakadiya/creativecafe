<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_model {

    public function index() {
       
        $this->load->view('v_user_view');
    }

    public function getuserlist() {
        $query = $this->db->query("select * from user_master");
        return $query->result();
    }
    
     public function update_active($user_id, $status) {
        $data = array(
            'user_id' => $user_id,
            'status' => 1
        );
        $this->db->where('user_id', $user_id);
        $this->db->update('user_master', $data);
    }

    public function update_deactive($user_id, $status) {
        $data = array(
            'user_id' => $user_id,
            'status' => 0
        );
        $this->db->where('user_id', $user_id);
        $this->db->update('user_master', $data);
    }

    public function delete($user_id)
    {
            $this->db->where('user_id', $user_id);
        $this->db->delete('user_master');
        
    }      
 
}
