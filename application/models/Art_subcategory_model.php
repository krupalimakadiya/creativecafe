<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Art_subcategory_model extends CI_model {

    public function getart_categorylist() {
        $query = $this->db->query("select * from art_category_master");
        return $query->result();
    }

    public function getart_subcategorylist() {
        $query = $this->db->query("select * from art_category_master as c,art_subcategory_master as s where s.art_category_id=c.art_category_id");
        return $query->result();
    }


    public function insert($art_category_id, $art_subcategory_name) {
        $data = array('art_category_id' => $art_category_id,
            'art_subcategory_name' => $art_subcategory_name);
        $this->db->insert('art_subcategory_master', $data);
    }

    public function check_data($art_category_id, $art_subcategory_name) {
        $query = $this->db->query("select * from art_subcategory_master where art_category_id='$art_category_id' AND art_subcategory_name='$art_subcategory_name' ");
        return $query->row_array();
    }

    public function edit_data($art_subcategory_id) {
        $query = $this->db->query("select * from art_category_master as c, art_subcategory_master as s where art_subcategory_id='$art_subcategory_id'");
        return $query->row_array();
    }

    public function update_data($art_subcategory_id, $art_category_id, $art_subcategory_name) {
        $data = array(
            'art_category_id' => $art_category_id,
            'art_subcategory_name' => $art_subcategory_name,
        );
        $this->db->where('art_subcategory_id', $art_subcategory_id);
        $this->db->update('art_subcategory_master', $data);
    }

    public function delete($art_subcategory_id) {
        $this->db->where('art_subcategory_id', $art_subcategory_id);
        $this->db->delete('art_subcategory_master');
    }

    public function update_active($art_subcategory_id, $art_subcategory_status) {
        $data = array(
            'art_subcategory_id' => $art_subcategory_id,
            'art_subcategory_status' => 1
        );
        $this->db->where('art_subcategory_id', $art_subcategory_id);
        $this->db->update('art_subcategory_master', $data);
    }

    public function update_deactive($art_subcategory_id, $art_subcategory_status) {
        $data = array(
            'art_subcategory_id' => $art_subcategory_id,
            'art_subcategory_status' => 0
        );
        $this->db->where('art_subcategory_id', $art_subcategory_id);
        $this->db->update('art_subcategory_master', $data);
    }

    //used in importp method for get art_category id from coutry name
     public function getart_categoryid($art_category_name) {
      $query = $this->db->query("select * from art_category_master where art_category_name='$art_category_name'");
      return $query->row_array();
      } 
}
