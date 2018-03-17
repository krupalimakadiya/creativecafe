<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_model extends CI_Model {

    public function validate($email) {
        $sql = "select email from artist_master where email='$email'";
        return $this->db->query($sql, array($email))->row_array();
    }
       public function getdata($email) {
        $sql = "select email,password from artist_master where email='$email'";
        return $this->db->query($sql, array($email))->row_array();
    }
 public  function random_password() 
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $password = array(); 
    $alpha_length = strlen($alphabet) - 1; 
    for ($i = 0; $i < 8; $i++) 
    {
        $n = rand(0, $alpha_length);
        $password[] = $alphabet[$n];
    }
    return implode($password); 
}
  public function update_data($em_data,$password) {
        $data1 = array(
           
            'password'=>$password
        );
       $this->db->where('email', $em_data);
        $this->db->update('artist_master', $data1);
    }

//echo random_password();

}
