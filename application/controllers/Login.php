<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $this->load->model('login_model');
        $this->load->view('login_frm');
    }

    function checkdata() { 
            $this->load->model('login_model');
            $checkdata = $this->login_model->validate($_POST['email'], $_POST['password']);
            if (isset($checkdata['admin_id'])) {
                $userdata = $data['checkdata'];
                $this->session->set_userdata('email', $userdata['email']);
                $this->session->set_userdata('password', $userdata['password']);
                redirect("welcome/index");
            } else {
                $this->session->set_flashdata('message', 'pls enter validate data..');
                redirect("login/index");
            }
        }
    }
    