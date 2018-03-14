<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email_sc extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('email_sc_model');
    }

    public function index() {
        $data['emailsc_list'] = $this->email_sc_model->getemaillist();
        $this->load->view('v_email_sc_view', $data);
    }

    public function view_country() {
        $data['contactus_list'] = $this->email_sc_model->getcontactlist();
        $this->load->view('v_contact_us_view', $data);
    }

 

    public function delete($sc_id) {
        $this->email_sc_model->delete($sc_id);
        $this->session->set_flashdata('message', 'record deleted successfully...');
        redirect("email_sc");
    }

  
    public function deletemultiple() {
         
        $contact_id = $_POST['contact_id'];
        
        
        $i = 0;
        while ($i < count($contact_id)) {
          if (isset($_POST['submit'])) {
                if ($this->contact_us_model->delete($contact_id[$i])) {
                    print_r($contact_id);
        exit();
                    $this->session->set_flashdata('success', 'Contact Detail Is Delete Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'Contact Detail Is Not Delete. Please Try Again.');
                }
            }
            if (isset($_POST['submit1'])) {
                $this->contact_us_model->update_active($contact_id[$i]);
                    $this->session->set_flashdata('success', 'Contact Detail Is Activated Successfully..');
              }
            if (isset($_POST['submit2'])) {
                $this->contact_us_model->update_deactive($contact_id[$i]);
                $this->session->set_flashdata('success', 'Contact Detail Is Deactivated Successfully..');
            }
            $i++;
        }
        redirect("contact_us");
    }

}
