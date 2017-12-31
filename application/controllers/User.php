<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('country_model');
        $this->load->model('state_model');
        $this->load->model('city_model');
        $this->load->model('user_model');
    }

    public function index() {
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $data['city_list'] = $this->city_model->getcitylist();
        $data['user_list'] = $this->user_model->getuserlist();
        $this->load->view('v_user_view', $data);
    }

    public function view_user() {
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $data['city_list'] = $this->city_model->getcitylist();
        $data['user_list'] = $this->user_model->getuserlist();
        $this->load->view('v_user_view', $data);
    }

    public function add_user() {
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $data['city_list'] = $this->city_model->getcitylist();
        $data['user_list'] = $this->user_model->getuserlist();
        $this->load->view('v_user_form', $data);
    }

        public function addp() {
        $user_data = $this->user_model->check_data($_POST['first_name'],$_POST['last_name'],$_POST['country_id'],$_POST['state_id'],$_POST['city_id'],$_POST['pincode'],$_POST['email'],$_POST['mobile']);
        if (isset($user_data)) {
            $this->session->set_flashdata('message','record already exists...');            
            redirect('city/index');
        } else {
            $this->user_model->insert($_POST['first_name'],$_POST['last_name'],$_POST['country_id'],$_POST['state_id'],$_POST['city_id'],$_POST['pincode'],$_POST['email'],$_POST['mobile']);
             $this->session->set_flashdata('message','insert successfully...');
            redirect('city/index');
        }
    }

   /* public function edit_data($city_id) {
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
    }*/

  public function delete($user_id) {
        $this->user_model->delete($user_id);
        redirect("user/index");
    }
    
    public function update_status_active($user_id) {
        $status = $this->input->get('status');
        $this->user_model->update_active($user_id, $status);
        redirect('user/index');
    }

    public function update_status_deactive($user_id) {
        $status = $this->input->get('status');
        $this->user_model->update_deactive($user_id, $status);
        redirect('user/index');
    }
}
