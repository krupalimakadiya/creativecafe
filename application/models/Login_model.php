<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

public function validate($email,$password)
	{
		$sql="select * from admin_master
		where email = ?
		AND password = md5(?)";
		return $this->db->query($sql,array($email,$password))->row_array();
	}

}
