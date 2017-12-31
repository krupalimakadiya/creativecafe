<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class city extends MY_Controller {

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
    
    public function addp() {
        $city_data = $this->city_model->check_data($_POST['country_id'],$_POST['state_id'],$_POST['city_name']);
        if (isset($city_data)) {
            $this->session->set_flashdata('message','record already exists...');            
            redirect('city/index');
        } else {
            $this->city_model->insert($_POST['country_id'],$_POST['state_id'],$_POST['city_name']);
             $this->session->set_flashdata('message','insert successfully...');
            redirect('city/index');
        }
    }

    public function edit_data($city_id) {
        $data['update_data'] = $this->city_model->edit_data($city_id);

        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $data['city_list'] = $this->city_model->getcitylist();

        $this->load->view('v_city_add', $data);
    }

    public function editp() {
        $this->city_model->update_data($_POST['city_id'], $_POST['country_id'], $_POST['state_id'], $_POST['city_name']);
        redirect("city/index");
    }

    public function update_data($cityid) {
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['update_data'] = $this->state_model->getstatelist();
        $data['update_data'] = $this->city_model->edit_data($city_id);

        $data['city_list'] = $this->city_model->getcitylist();
        $this->load->view('v_city_view', $data);
    }

    public function delete($city_id) {
        $this->city_model->delete($city_id);
        redirect("city/index");
    }

    public function drop_state() {
        $data['update_data'] = $this->city_model->drop_state($_POST['country_id']);
        $this->load->view('drop_state', $data);
        //     print_r( $data['update_data']);
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
