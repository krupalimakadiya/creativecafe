<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_model {

    public function getnewslist() {
        $query = $this->db->query("select * from news_master");
        return $query->result();
    }
    
      public function insert($data) {
            $this->db->insert('news_master',$data);
            return $this->db->insert_id();
  }
        function update_filename($news_id,$filename) {
                 $this->db->set('image', $filename);
                 $this->db->where('news_id', $news_id);
                 $this->db->update('news_master');
    }
     public function check_data($title,$date,$image,$description) {
        $query = $this->db->query("select * from news_master where title='$title' AND date='$date' AND image='$image'AND description='$description' ");
        return $query->row_array();
    }
    public function delete($news_id) {
        $this->db->where('news_id', $news_id);
      
		 if ($this->db->delete('news_master')) {
            return true;
        } else {
            return false;
        }
    }
    public function edit_data($news_id) {
        $query = $this->db->query("select * from news_master where news_id='$news_id'");
        return $query->row_array();
    }

    public function update_data($news_id,$title,$date,$newfilename,$description) 
            {
        $data = array(
            'news_id' => $news_id,
            'title' => $title,
            'date' => $date,
             'image'=>$newfilename,  
            'description' => $description
        );
        $this->db->where('news_id',$news_id );
       if($this->db->update('news_master', $data))
        {
            return true;
        }
        else{
            return false;
        }
    }
    public function update_active($news_id, $news_status) {
        $data = array(
            'news_id' => $news_id,
            'news_status' => 1
        );
        $this->db->where('news_id', $news_id);
       if($this->db->update('news_master', $data))
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function update_deactive($news_id, $news_status) {
        $data = array(
            'news_id' => $news_id,
            'news_status' => 0
        );
        $this->db->where('news_id', $news_id);
        $this->db->update('news_master', $data);
    }

}
