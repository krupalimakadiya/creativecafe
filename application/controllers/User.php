<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index() {
        $this->load->Model('User_model');
        $data['user_list'] = $this->User_model->getuserlist();
        $this->load->view('v_user_view', $data);
    }

    public function user_add() {

        $this->load->view('v_user_form');
    }

}
