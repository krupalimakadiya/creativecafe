<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Changepwd extends CI_Controller {

    public function index() {
        $this->load->view('changepwd_view');
    }

    public function changepass() {

        $oldpwd = md5($this->input->post('oldpwd'));        
        $newpwd = md5($this->input->post('newpwd'));
        $confirmpwd = md5($this->input->post('confirmpwd'));
        $admin_id = $this->session->userdata('admin_id');
        $this->load->model('changepwd_model');

        
        if ($newpwd = $confirmpwd) {
            $data = $this->changepwd_model->getidpass($admin_id, $oldpwd);
           
            if (isset($data['admin_id'])) {
                $this->changepwd_model->change_data($admin_id, $newpwd);
                $this->session->set_flashdata('message', 'pwd is change');
                redirect("Login");
            } else {
                $this->session->set_flashdata('message', 'pwd is not change');
                redirect("Changepwd");
            }
        } else {
            $this->session->set_flashdata('message', 'newpwd and confirmpwd is not same');
            redirect("changepwd");
        }
    }

}
