<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Exhibition_model extends CI_Model {

    public function getexhibitionlist   () {
        $query = $this->db->query("select * from exhibition_master");
        return $query->result();
    }
  public function insert($title,$description,$starting_time,$end_time,$date,$fees,$address) {
        $data = array(
            'title' => $title,
               'description' => $description,
               'starting_time' => $starting_time,
               'end_time' => $end_time, 
            'date' => $date,  
            'fees' => $fees,
               'address' => $address
             ); //1= active //0-deactive
        $this->db->insert('exhibition_master', $data);
    }

    public function edit_data($exhibition_id) {
        $query = $this->db->query("select * from exhibition_master where exhibition_id='$exhibition_id'");

        return $query->row_array();
    }

    public function update_data($exhibition_id,$title,$description,$starting_time,$end_time,$date,$fees,$address) {
        $data = array(
            'exhibition_id' => $exhibition_id,
             'title' => $title,
             'description' => $description,      
            'starting_time' => $starting_time,    
            'end_time' => $end_time,    
            'date' => $date,     
            'fees' => $fees,   
            'address' => $address,
         );
        $this->db->where('exhibition_id', $exhibition_id);
        $this->db->update('exhibition_master', $data);
    }

    public function delete($exhibition_id) {
        $this->db->where('exhibition_id', $exhibition_id);
        $this->db->delete('exhibition_master');
    }

    public function update_active($exhibition_id, $exhibition_status) {
        $data = array(
            'exhibition_id' => $exhibition_id,
            'exhibition_status' => 1
        );
        $this->db->where('exhibition_id', $exhibition_id);
        $this->db->update('exhibition_master', $data);
    }

    public function update_deactive($exhibition_id, $exhibition_status) {
        $data = array(
            'exhibition_id' => $exhibition_id,
            'exhibition_status' => 0
        );
        $this->db->where('exhibition_id', $exhibition_id);
        $this->db->update('exhibition_master', $data);
    }

}
