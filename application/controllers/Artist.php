<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Artist extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('country_model');
        $this->load->model('state_model');
        $this->load->model('city_model');
    }

    public function index() {
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $data['city_list'] = $this->city_model->getcitylist();
        $data['artist_list'] = $this->artist_model->getuserlist();
        $this->load->view('v_artist_view', $data);
    }

    public function view_user() {
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $data['city_list'] = $this->city_model->getcitylist();
        $data['artist_list'] = $this->artist_model->getuserlist();
        $this->load->view('v_artist_view', $data);
    }

    public function add_user() {
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $data['city_list'] = $this->city_model->getcitylist();
        $data['artist_list'] = $this->artist_model->getuserlist();
        $this->load->view('v_artist_form', $data);
    }

        public function addp() {
        $user_data = $this->artist_model->check_data($_POST['first_name'],$_POST['last_name'],$_POST['country_id'],$_POST['state_id'],$_POST['city_id'],$_POST['pincode'],$_POST['email'],$_POST['mobile']);
        if (isset($user_data)) {
            $this->session->set_flashdata('message','record already exists...');            
            redirect('city/index');
        } else {
            $this->artist_model->insert($_POST['first_name'],$_POST['last_name'],$_POST['country_id'],$_POST['state_id'],$_POST['city_id'],$_POST['pincode'],$_POST['email'],$_POST['mobile']);
             $this->session->set_flashdata('message','insert successfully...');
            redirect('city/index');
        }
    }
    
     public function drop_state() {
        $data['update_data'] = $this->user_model->drop_state($_POST['country_id']);
        $this->load->view('drop_state', $data);
        //     print_r( $data['update_data']);
    }
    
    public function drop_city() {    
        $data['update_data'] = $this->user_model->drop_city($_POST['state_id']);
        $this->load->view('drop_city', $data);
    }

    public function edit_data($user_id) {
        $data['update_data'] = $this->user_model->edit_data($user_id);

        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $data['city_list'] = $this->city_model->getcitylist();
$data['user_list'] = $this->user_model->getuserlist();

        $this->load->view('v_user_form', $data);
    }

    public function editp() {
        $this->user_model->update_data($_POST['user_id'], $_POST['first_name'],$_POST['last_name'],$_POST['country_id'],$_POST['state_id'],$_POST['city_id'],$_POST['pincode'],$_POST['email'],$_POST['mobile']);
        redirect("user/index");
    }

    /*public function update_data($user_id) {
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['update_data'] = $this->state_model->getstatelist();
        $data['update_data'] = $this->city_model->getstatelist();
        
        $data['update_data'] = $this->user_model->edit_data($user_id);

        $data['city_list'] = $this->city_model->getcitylist();
        $this->load->view('v_city_view', $data);
    }*/
    public function update_data($user_id) {
        $data['user_list'] = $this->user_model->getuserlist();
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['update_data'] = $this->state_model->getstatelist();
        $data['update_data'] = $this->city_model->getcitylist();
        $data['user_data'] = $this->user_model->edit_data($user_id);
        $data['user_list'] = $this->user_model->getuserlist();
        $this->load->view('v_user_view', $data);
    }


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
