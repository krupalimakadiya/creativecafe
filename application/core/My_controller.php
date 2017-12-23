<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // check whether request for ws
       // $pos = strrpos($_SERVER["REQUEST_URI"], "/wsv1/");

        // check web login session
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == null || $admin_id == "")
        {
            if ($pos !== FALSE)
            {
                $output = array('status' => "fail", 'message' => "Session expired.");
               // echo(json_encode($output));
                exit;
            } else
            {
                $this->session->set_flashdata('message', "Session expired.");
                redirect("login/index");
                exit;
            }
        }
    }

}
