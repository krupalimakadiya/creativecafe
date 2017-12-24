<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {

     public function __construct() {
        parent::__construct();
        $this->load->model('country_model');
    }
    public function index() {
     
        $data['country_list'] = $this->country_model->getcountrylist();
        $this->load->view('v_country_view', $data);
    }

public function view_country() {
        $data['country_list'] = $this->country_model->getcountrylist();
        $this->load->view('v_country_view', $data);
    }

    public function add_country() {
        $data['country_list'] = $this->country_model->getcountrylist();
        $this->load->view('v_country_form', $data);
    }
 
    public function update_status_active($country_id) {
        $this->load->model('country_model');
        $status = $this->input->get('status');
        $this->country_model->update_active($country_id, $status);
        redirect('country/index');
    }

    public function update_status_deactive($country_id) {
        $this->load->model('country_model');
        $status = $this->input->get('status');
        $this->country_model->update_deactive($country_id, $status);
        redirect('country/index');
    }

}
