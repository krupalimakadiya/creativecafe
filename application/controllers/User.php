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
            redirect('user/index');
        } else {
            $this->user_model->insert($_POST['first_name'],$_POST['last_name'],$_POST['country_id'],$_POST['state_id'],$_POST['city_id'],$_POST['pincode'],$_POST['email'],$_POST['mobile']);
             $this->session->set_flashdata('message','insert successfully...');
            redirect('user/index');
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
          $this->session->set_flashdata('message','record deleted successfully...');            
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
     public function deletemultiple() 
    { 
      
        $user_id = $_POST['user_id']; 
        $i = 0; 
        while($i<count($user_id)) 
        { 
            if(isset($_POST['submit'])) 
            { 
                
                if($this->user_model->delete($user_id[$i])) 
                { 
                    $this->session->set_flashdata('success', 'User Detail Is Delete Successfully..'); 
                } 
                else 
                { 
                    $this->session->set_flashdata('fail', 'User Detail Is Not Delete. Please Try Again.'); 
                } 
            } 
            if(isset($_POST['submit1'])) 
            { 
                if($this->user_model->update_active($user_id[$i])) 
                {             
                    $this->session->set_flashdata('success', 'User Detail Is Deactivated Successfully..'); 
                } 
                else 
                { 
                    $this->session->set_flashdata('fail', 'User Detail Is Not Deactivated.. Please Try Again.'); 
                } 
            } 
            if(isset($_POST['submit2'])) 
            { 
                if($this->user_model->update_deactive($user_id[$i])) 
                {             
                    $this->session->set_flashdata('success', 'User Detail Is Activated Successfully..'); 
                     } 
                else 
                { 
                    $this->session->set_flashdata('fail', 'User Detail Is Not Activated.. Please Try Again.'); 
                    } 
            } 
            $i++; 
        } 
        redirect("user/index"); 
    }

  
}
