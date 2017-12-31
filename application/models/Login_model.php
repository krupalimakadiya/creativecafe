<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

     public function validate($email,$password)
    {
        $sql="select * from admin_master where email=? and password=md5(?)";
        return $this->db->query($sql,array($email,$password))->row_array();
    }
    /*public function validate($email, $password) {
        if ($email == null && $password == null) {
            $data = array("status" => "fail", "message" =>" Invalid username/password.");
          <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
          Invalid Username and Password
              </div>
            
            return $data;
        }
        $user_data = $this->getuserbypswd($email, $password);
        // if user and pswd not matched

        if (!isset($user_data["admin_id"])) {
            $data = array("status" => "fail", "message" => "Invalid username/password.");
            return $data;
        }
        
        return $user_data;
        */
        // check if account is Inactive
        /* if (!($user_data["user_status"] == "Active"))
          {
          $data = array("status" => "fail", "message" => "Your account is not active.");
          return $data;
          }
          $data = array("status" => "success", "message" => "", "data" => $user_data);
          return $data;
          } 
    }

    function getuserbypswd($email, $password) {
        $sql = "select * from admin_master
		where email = ?
		AND password = md5(?) ";
        return $this->db->query($sql, array($email, $password))->row_array();
    }
*/
}
