<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

    public function index() {
        $this->load->model('welcome_model');
        $data['post'] = $this->welcome_model->get_total_post();
        $data['artist'] = $this->welcome_model->get_total_artist();
        $data['user'] = $this->welcome_model->get_total_user();
        $this->load->view('welcome_message',$data);
    }

}
