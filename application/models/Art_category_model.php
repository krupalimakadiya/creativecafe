<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Art_category_model extends CI_model {

    public function getart_categorylist() {
        $query = $this->db->query("select * from art_category_master");
        return $query->result();
    }

    public function getart_categorylist_sub() {
        $query = $this->db->query("select * from art_category_master where art_sub_cat_id=0 and art_category_leval=1");
        return $query->result();
    }

    public function insert($art_category_data) {
        $this->db->insert('art_category_master', $art_category_data);
    }

    public function check_data($art_category_name, $id = "", $art_category_leval = '') {
        $this->db->select('*');
        $this->db->from('art_category_master');
        if ($id != '') {
            $this->db->where_not_in('art_category_id', $id);
        }
        $this->db->where('art_category_name', $art_category_name);
        $this->db->where('art_category_leval', $art_category_leval);
        return $this->db->get()->row_array();
    }

    public function edit_data($art_category_id) {
        $query = $this->db->query("select * from art_category_master where art_category_id='$art_category_id'");
        return $query->row_array();
    }

    public function update_data($art_category_id, $data) {
        $this->db->where('art_category_id', $art_category_id);
        $this->db->update('art_category_master', $data);
    }

    public function delete($art_category_id) {
        $this->db->where('art_category_id', $art_category_id);
        if($this->db->delete('art_category_master')){
              return true;
        } else {
            return false;
        }            
    }

    public function update_active($art_category_id, $art_category_status) {
        $data = array(
            'art_category_id' => $art_category_id,
            'art_category_status' => 1
        );
        $this->db->where('art_category_id', $art_category_id);
        if($this->db->update('art_category_master', $data))
        {
              return true;
        } else {
            return false;
        }    
        
    }

    public function update_deactive($art_category_id, $art_category_status) {
        $data = array(
            'art_category_id' => $art_category_id,
            'art_category_status' => 0
        );
        $this->db->where('art_category_id', $art_category_id);
        if($this->db->update('art_category_master', $data)){
              return true;
        } else {
            return false;
        }    
        
    }

}
