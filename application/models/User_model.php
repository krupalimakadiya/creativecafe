<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_model {

    public function getuserlist() {
        $query = $this->db->query("select * from user_master  as user, country_master as c, state_master as s, city_master as city where user.country_id=c.country_id and user.state_id=s.state_id and user.city_id=city.city_id ");
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
  

    public function insert($first_name, $last_name, $country_id, $state_id, $city_id, $pincode, $email, $mobile,$password) {
        $data = array('first_name' => $first_name,
            'last_name' => $last_name,
            'country_id' => $country_id,
            'state_id' => $state_id,
            'city_id' => $city_id,
            'pincode' => $pincode,
            'email' => $email,
            'mobile' => $mobile,
            'password' => $password);
        $this->db->insert('user_master', $data);
    }

    //chk if record exists in database  or not 
    public function check_data($email, $mobile) {
        $query = $this->db->query("select * from user_master where 
                                                                              email='$email'  AND
                                                                                    mobile='$mobile' ");
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

    public function edit_data($user_id) {
        $query = $this->db->query("select * from  user_master  where user_id='$user_id' ");
        return $query->row_array();
    }

    public function update_data($user_id, $first_name, $last_name, $country_id, $state_id, $city_id, $pincode, $email, $mobile,$password) {
        $data = array(
            'user_id' => $user_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'country_id' => $country_id,
            'state_id' => $state_id,
            'city_id' => $city_id,
            'pincode' => $pincode,
            'email' => $email,
            'mobile' => $mobile,
            'password'=>$password
        );
        $this->db->where('user_id', $user_id);
        $this->db->update('user_master', $data);
    }

    public function delete($user_id) {
        $this->db->where('user_id', $user_id);
        if($this->db->delete('user_master'))
        {
              return true;
        } else {
            return false;
        }            
    }

    public function update_active($user_id, $user_status) {
        $data = array(
            'user_id' => $user_id,
            'user_status' => 1
        );
        $this->db->where('user_id', $user_id);
        if($this->db->update('user_master', $data))
        {            return true;
        } else {
            return false;
        }
    }

    public function update_deactive($user_id, $user_status) {
        $data = array(
            'user_id' => $user_id,
            'user_status' => 0
        );
        $this->db->where('user_id', $user_id);
        if($this->db->update('user_master', $data))
        {                     return true;
        } else {
            return false;
        }
    }

}
