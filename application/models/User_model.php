<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_model {

	public function index()
	{
		$this->load->view('v_user_view');
	}
         public function getuserlist() {
        $query = $this->db->query("select * from user_master");
        return $query->result();
    }
}
