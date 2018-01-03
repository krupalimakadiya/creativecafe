<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Changepwd_model extends CI_Model {

   public function getidpass($admin_id,$oldpwd)
    {
        $query=$this->db->query("select * from admin_master where admin_id='$admin_id' and password='$oldpwd'");
        return $query->row_array();
    }
   
    public function change_data($admin_id,$newpwd)
    {
        $data=array(
        'password'=>$newpwd,
    );
   $this->db->where('admin_id',$admin_id);
   $this->db->update('admin_master',$data);
}
}
