<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_admin extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function templets($view, $data = '') {
        $this->load->view('header', $data);
        $this->load->view('contenar');
        $this->load->view('footer');
    }

}
