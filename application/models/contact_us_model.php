<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us_model extends CI_model {

    public function getcontactlist() {
        $query = $this->db->query("select * from contactus_master");
        return $query->result();
    }
 public function delete($contact_id) {
        $this->db->where('contact_id', $contact_id);
        if ($this->db->delete('contactus_master')) {
            return true;
        } else {
            return false;
        }
    }
   public function update_active($contact_id, $contact_status) {
        $data = array(
            'contact_id' => $contact_id,
            'contact_status' => 1
        );
        $this->db->where('contact_id', $contact_id);
       if($this->db->update('contactus_master', $data))
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function update_deactive($contact_id, $contact_status) {
        $data = array(
            'contact_id' => $contact_id,
            'contact_status' => 0
        );
        $this->db->where('contact_id', $contact_id);
       if($this->db->update('contactus_master', $data))
        {
            return true;
        }
        else{
            return false;
        }
    }

}
