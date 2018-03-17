<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_model {

    public function getpostlist() {
        $query = $this->db->query("select * from 
                post_master as p,
                artist_master as artist,
                art_category_master as ac 
                where 
                p.artist_id=artist.artist_id AND 
                p.art_category_id=ac.art_category_id ");
      return $query->result();
    }

    public function getartistlist() {
        $query = $this->db->query("select * from artist_master");
                
                        return $query->result();
    }

    public function getartcategoryid($art_category_name) {
        $query = $this->db->query("select * from art_category_master where art_category_name='$art_category_name'");
        return $query->row_array();
    }

    public function insert($post_data) {
        $this->db->insert('post_master', $post_data);
        return $this->db->insert_id();
    }

    //chk if record exists in database  or not 
    /* public function check_data($email, $password) {
      $query = $this->db->query("select * from artist_master where  email='$email'  AND password='$password'  ");
      return $query->row_array();
      } */



    public function delete($post_id) {
        $this->db->where('post_id', $post_id);
     if ($this->db->delete('post_master')) {
            return true;
        } else {
            return false;
        }
    }

    public function update_active($post_id, $post_status) {
        $data = array(
            'post_id' => $post_id,
            'post_status' => 1
        );
        $this->db->where('post_id', $post_id);
       
		 if($this->db->update('post_master', $data))
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function update_deactive($post_id, $post_status) {
        $data = array(
            'post_id' => $post_id,
            'post_status' => 0
        );
        $this->db->where('post_id', $post_id);
        if($this->db->update('post_master', $data))
        {
                  return true;
        } else {
            return false;        
        }
    }

    public function update_ispublished($post_id, $ispublished) {
        $data = array(
            'post_id' => $post_id,
            'ispublished' => 1
        );
        $this->db->where('post_id', $post_id);
        if($this->db->update('post_master', $data))
        {
              return true;
        } else {
            return false;
        }            
    }
    public function update_isnotpublished($post_id, $ispublished) {
        $data = array(
            'post_id' => $post_id,
            'ispublished' => 0
        );
        $this->db->where('post_id', $post_id);
        if($this->db->update('post_master', $data))
        {
                  return true;
        } else {
            return false;        
        }
    }
}
