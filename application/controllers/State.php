<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class State extends CI_Controller {

   public function __construct() {
        parent::__construct();
        $this->load->model('country_model');
        $this->load->model('state_model');
    }

    public function view_state() {
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $this->load->view('v_state_view', $data);
    }

    public function add_state() {
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $this->load->view('v_state_form', $data);
    }
    public function index() {
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $this->load->view('v_state_view', $data);
    }
    
    public function delete($state_id) {
        $this->state_model->delete($state_id);
        redirect("state/index");
    }

   public function update_status_active($state_id) {
        $status = $this->input->get('status');
        $this->state_model->update_active($state_id, $status);
        redirect('state/index');
    }

    public function update_status_deactive($state_id) {
        $status = $this->input->get('status');
        $this->state_model->update_deactive($state_id, $status);
        redirect('state/index');
    }
    
}
