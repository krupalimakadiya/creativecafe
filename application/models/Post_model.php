<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_model {

    public function getpostlist() {
        $query = $this->db->query("select * from 
                post_master as p,
                artist_master as artist,
                art_category_master as art_category, 
                art_subcategory_master as art_subcategory, 
                art_subcategory2_master as art_subcategory2 
                where 
                p.artist_id=artist.artist_id AND 
                p.art_category_id=art_category.art_category_id AND 
                p.art_subcategory_id=art_subcategory.art_subcategory_id AND
                p.art_subcategory2_id=art_subcategory2.art_subcategory2_id");
        return $query->result();
    }

    public function getartistlist() {
        $query = $this->db->query("select * from artist_master  as a, country_master as c, state_master as s, city_master as city  where a.country_id=c.country_id and a.state_id=s.state_id and a.city_id=city.city_id");
        return $query->result();
    }

    public function getartcategoryid($art_category_name) {
        $query = $this->db->query("select * from art_category_master where country_name='$art_category_name'");
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
        $this->db->delete('post_master');
    }

    public function update_active($post_id, $post_status) {
        $data = array(
            'post_id' => $post_id,
            'post_status' => 1
        );
        $this->db->where('post_id', $post_id);
        $this->db->update('post_master', $data);
    }

    public function update_deactive($post_id, $post_status) {
        $data = array(
            'post_id' => $post_id,
            'post_status' => 0
        );
        $this->db->where('post_id', $post_id);
        $this->db->update('post_master', $data);
    }

}
