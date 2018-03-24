<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_model {

    public function geteventlist() {
        $query = $this->db->query("select * from event_master");
        return $query->result();
    }

    public function insert($data) {
        $this->db->insert('event_master', $data);
        return $this->db->insert_id();
    }

    function update_filename($event_id, $filename) {
        $this->db->set('image', $filename);
        $this->db->where('event_id', $event_id);
        $this->db->update('event_master');
    }

    function update_filename1($event_id, $filename1) {
        $this->db->set('file', $filename1);
        $this->db->where('event_id', $event_id);
        $this->db->update('event_master');
    }

    public function check_data($title, $file, $date, $image, $description) {
        $query = $this->db->query("select * from event_master where title='$title' AND file='$file' AND date='$date' AND image='$image'AND description='$description' ");
        return $query->row_array();
    }

    public function delete($event_id) {
        $this->db->where('event_id', $event_id);
        if ($this->db->delete('event_master')) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_data($event_id) {
        $query = $this->db->query("select * from event_master where event_id='$event_id'");
        return $query->row_array();
    }

    public function update_data($data) {
        $data = array(
            'event_id' => $data['event_id'],
            'title' => $data['title'],
            'file' => $data['file'],
            'date' => $data['date'],
            'image' => $data['image'],
            'description' => $data['description']
        );
        $this->db->where('event_id', $data['event_id']);
        $this->db->update('event_master', $data);
    }

    public function update_active($event_id) {
        $data = array(
            'event_id' => $event_id,
            'event_status' => 1
        );
        $this->db->where('event_id', $event_id);
        if ($this->db->update('event_master', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function update_deactive($event_id) {
        $data = array(
            'event_id' => $event_id,
            'event_status' => 0
        );
        $this->db->where('event_id', $event_id);
        if ($this->db->update('event_master', $data)) {
            return true;
        } else {
            return false;
        }
    }

}
