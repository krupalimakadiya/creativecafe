<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Art_subcategory2_model extends CI_model {

    public function getart_categoryid($art_category_name) {
      $query = $this->db->query("select * from art_category_master where art_category_name='$art_category_name'");
      return $query->row_array();
      }
  
      public function getart_subcategoryid($art_subcategory_name) {
      $query = $this->db->query("select * from art_subcategory_master where art_subcategory_name='$art_subcategory_name'");
      return $query->row_array();
      }
  
    public function getart_subcategory2list() {
        $query = $this->db->query("select * from art_category_master as c, art_subcategory_master as s, art_subcategory2_master as art_subcategory2 where art_subcategory2.art_category_id=c.art_category_id and art_subcategory2.art_subcategory_id=s.art_subcategory_id ");
        return $query->result();
    }

    public function insert($art_category_id, $art_subcategory_id, $art_subcategory2_name) {
        $data = array('art_category_id' => $art_category_id,
            'art_subcategory_id' => $art_subcategory_id,
            'art_subcategory2_name' => $art_subcategory2_name);
        $this->db->insert('art_subcategory2_master', $data);
    }

    //chk if record exists or not
    public function check_data($art_category_id, $art_subcategory_id, $art_subcategory2_name) {
        $query = $this->db->query("select * from art_subcategory2_master where art_category_id='$art_category_id' AND art_subcategory_id='$art_subcategory_id' AND art_subcategory2_name='$art_subcategory2_name' ");
        return $query->row_array();
    }

    public function edit_data($art_subcategory2_id) {
        $query = $this->db->query("select * from  art_subcategory2_master  where art_subcategory2_id='$art_subcategory2_id' ");
        return $query->row_array();
    }

    public function update_data($art_subcategory2_id, $art_category_id, $art_subcategory_id, $art_subcategory2_name) {
        $data = array(
            'art_subcategory2_id' => $art_subcategory2_id,
            'art_category_id' => $art_category_id,
            'art_subcategory_id' => $art_subcategory_id,
            'art_subcategory2_name' => $art_subcategory2_name,
        );
        $this->db->where('art_subcategory2_id', $art_subcategory2_id);
        $this->db->update('art_subcategory2_master', $data);
    }

    public function delete($art_subcategory2_id) {
        $this->db->where('art_subcategory2_id', $art_subcategory2_id);
        $this->db->delete('art_subcategory2_master');
    }

    public function drop_art_subcategory($art_category_id) {
        $query = $this->db->query("select * from  art_subcategory_master where art_category_id='$art_category_id' ");
        return $query->result();
    }

    public function update_active($art_subcategory2_id, $art_subcategory2_art_subcategory2_status) {
        $data = array(
            'art_subcategory2_id' => $art_subcategory2_id,
            'art_subcategory2_status' => 1
        );
        $this->db->where('art_subcategory2_id', $art_subcategory2_id);
        $this->db->update('art_subcategory2_master', $data);
    }

    public function update_deactive($art_subcategory2_id, $art_subcategory2_status) {
        $data = array(
            'art_subcategory2_id' => $art_subcategory2_id,
            'art_subcategory2_status' => 0
        );
        $this->db->where('art_subcategory2_id', $art_subcategory2_id);
        $this->db->update('art_subcategory2_master', $data);
    }

}
