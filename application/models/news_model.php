<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_model {

    public function getnewslist() {
        $query = $this->db->query("select * from news_master");
        return $query->result();
    }
    
      public function insert($title,$description,$image) {
        $data = array('title' => $title,
            'description' => $description,
            'image' => $image
            ); //1= active //0-deactive
        $this->db->insert('news_master', $data);
    }
    
     public function check_data($title,$description,$image) {
        $query = $this->db->query("select * from news_master where title='$title' AND description='$description' AND image='$image' ");
        return $query->row_array();
    }
    public function delete($news_id) {
        $this->db->where('news_id', $news_id);
        $this->db->delete('news_master');
    }

    public function update_active($news_id, $status) {
        $data = array(
            'news_id' => $news_id,
            'status' => 1
        );
        $this->db->where('news_id', $news_id);
        $this->db->update('news_master', $data);
    }

    public function update_deactive($news_id, $status) {
        $data = array(
            'news_id' => $news_id,
            'status' => 0
        );
        $this->db->where('news_id', $news_id);
        $this->db->update('news_master', $data);
    }

}
