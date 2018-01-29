<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_model {

    public function geteventlist() {
        $query = $this->db->query("select * from event_master");
        return $query->result();
    }
    
      public function insert($data) {
       // $data = array('title' => $title,'date' => $date,'image' => $image,
           // 'description' => $description ); //1= active //0-deactive
            $this->db->insert('event_master',$data);
           // print_r($data);
           // die();
            return $this->db->insert_id();
  
    }
        function update_filename($event_id,$filename) {
                 $this->db->set('image', $filename);
                 $this->db->where('event_id', $event_id);
                 $this->db->update('event_master');
    }
     public function check_data($title,$file,$date,$image,$description) {
        $query = $this->db->query("select * from event_master where title='$title' AND file='$file' AND date='$date' AND image='$image'AND description='$description' ");
        return $query->row_array();
    }
    public function delete($event_id) {
        $this->db->where('event_id', $event_id);
        $this->db->delete('event_master');
    }
    public function edit_data($event_id) {
        $query = $this->db->query("select * from event_master where event_id='$event_id'");
        return $query->row_array();
    }

    public function update_data($event_id,$title,$file,$date,$image,$description) {
        $data = array(
            'title' => $title, 'file' => $file, 'date' => $date, 'image' => $image, 'description' => $description  );
        $this->db->where('event_id', $event_id);
        $this->db->update('event_master', $data);
    }

    public function update_active($event_id, $event_status) {
        $data = array(
            'news_id' => $event_id,
            'news_status' => 1
        );
        $this->db->where('event_id', $event_id);
        $this->db->update('event_master', $data);
    }

    public function update_deactive($event_id, $event_status) {
        $data = array(
            'event_id' => $event_id,
            'event_status' => 0
        );
        $this->db->where('event_id', $event_id);
        $this->db->update('event_master', $data);
    }

}
