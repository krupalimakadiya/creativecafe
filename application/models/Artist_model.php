<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Artist_model extends CI_model {

    public function getartistlist() {
        $query = $this->db->query("select * from artist_master  as a, country_master as c, state_master as s, city_master as city  where a.country_id=c.country_id and a.state_id=s.state_id and a.city_id=city.city_id");
        return $query->result();
    }

    public function getcountryid($country_name) {
        $query = $this->db->query("select * from country_master where country_name='$country_name'");
        return $query->row_array();
    }

    public function getstateid($state_name) {
        $query = $this->db->query("select * from state_master where state_name='$state_name'");
        return $query->row_array();
    }

    public function getcityid($city_name) {
        $query = $this->db->query("select * from city_master where city_name='$city_name'");
        return $query->row_array();
    }

    public function insert($artist_data) {
        $this->db->insert('artist_master', $artist_data);
        return $this->db->insert_id();
    }

    //chk if record exists in database  or not 
    public function check_data($email, $password) {
        $query = $this->db->query("select * from artist_master where  email='$email'  AND password='$password'  ");
        return $query->row_array();
    }

    public function drop_state($country_id) {
        $query = $this->db->query("select * from  state_master where country_id='$country_id' ");
        return $query->result();
    }

    public function drop_city($state_id) {
        $query = $this->db->query("select * from  city_master where state_id='$state_id' ");
        return $query->result();
    }

    public function edit_data($artist_id) {
        $query = $this->db->query("select * from  artist_master  where artist_id='$artist_id' ");
        return $query->row_array();
    }

    /*  public function update_data($artist_data) {
      $this->db->update('artist_master',$artist_data);
      return $this->db->insert_id();
      } */

    public function update_data($artist_id, $first_name, $last_name, $mobile, $email, $password, $newfilename, $country_id, $state_id, $city_id, $pincode,$user_type) {

        $data = array(
            //         'artist_id' => $artist_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'mobile' => $mobile,
            'email' => $email,
            'password' => $password,
            'artist_profile' => $newfilename,
            'country_id' => $country_id,
            'state_id' => $state_id,
            'city_id' => $city_id,
            'pincode' => $pincode,
            'user_type' => $user_type
        );
    
        $this->db->where('artist_id', $artist_id);
        $this->db->update('artist_master', $data);
    }

    public function delete($artist_id) {
        $this->db->where('artist_id', $artist_id);
        if ($this->db->delete('artist_master')) {
            return true;
        } else {
            return false;
        }
    }

    public function update_active($artist_id, $artist_status) {
        $data = array(
            'artist_id' => $artist_id,
            'artist_status' => 1
        );
        $this->db->where('artist_id', $artist_id);
      
        if ($this->db->update('artist_master', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function update_deactive($artist_id, $artist_status) {
        $data = array(
            'artist_id' => $artist_id,
            'artist_status' => 0
        );
        $this->db->where('artist_id', $artist_id);
        if ($this->db->update('artist_master', $data)) {
            return true;
        } else {
            return false;
        }
    }

}
