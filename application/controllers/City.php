<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class city extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('country_model');
        $this->load->model('state_model');
        $this->load->model('city_model');
    }

    public function view_city() {  //redirect on data table page
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $data['city_list'] = $this->city_model->getcitylist();
        $this->load->view('v_city_view', $data);
    }

    public function add_city() {    //redirect on form
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $data['city_list'] = $this->city_model->getcitylist();
        $this->load->view('v_city_form', $data);
    }

    public function index() {
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $data['city_list'] = $this->city_model->getcitylist();
        $this->load->view('v_city_view', $data);
    }

        public function update_status_active($city_id) {
        $status = $this->input->get('status');
        $this->city_model->update_active($city_id, $status);
        redirect('city/index');
    }

    public function update_status_deactive($city_id) {
        $status = $this->input->get('status');
        $this->city_model->update_deactive($city_id, $status);
        redirect('city/index');
    }

   

}
