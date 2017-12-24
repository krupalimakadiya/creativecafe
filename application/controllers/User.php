<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

      public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }
    
    public function index() {
        $data['user_list'] = $this->user_model->getuserlist();
        $this->load->view('v_user_view', $data);
    }

     public function view_user() {
        $data['user_list'] = $this->user_model->getuserlist();
        $this->load->view('v_user_view', $data);
    }

    public function add_user() {
        $data['user_list'] = $this->user_model->getuserlist();
        $this->load->view('v_user_form', $data);
    }
    
    /*public function user_add() {

        $this->load->view('v_user_form');
    }
*/
}
