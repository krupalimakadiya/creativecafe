<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email_sc extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('email_sc_model');
    }

    public function index() {        
        $config = array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googleemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'info.cafecreative@gmail.com',
        'smtp_pass' => 'mkgroup2018',
        'charset' => 'utf-8',
        'wordwrap' => TRUE,
        'mailtype' => 'html'
        );
        $this->load->library('email', $config);

        $this->email->to('krupalimakadiya123@gmail.com');
        $this->email->from('info.cafecreative@gmail.com');
        $this->email->subject('this is test ');
        $this->email->message('Hi  Here is information from creativecafe..');

        if ($this->email->send()) {
            echo 'your email was sent';
        } else {
            show_error($this->email->print_debugger());
        }

           $data['emailsc_list'] = $this->email_sc_model->get_email_list();
        $data['list'] = $this->email_sc_model->get_email_list();
        $this->load->view('v_email_sc_view',$data);
    }


    public function delete($sc_id) {
        $this->email_sc_model->delete($sc_id);
        $this->session->set_flashdata('message', 'record deleted successfully...');
        redirect("email_sc");
    }

    public function deletemultiple() {

        $email_sc_id = $_POST['email_sc_id'];
        $i = 0;
        while ($i < count($email_sc_id)) {
            if (isset($_POST['submit'])) {
                if ($this->email_sc_model->delete($email_sc_id[$i])) {
                    print_r($email_sc_id);
                    exit();
                    $this->session->set_flashdata('success', 'Contact Detail Is Delete Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'Contact Detail Is Not Delete. Please Try Again.');
                }
            }
            if (isset($_POST['submit1'])) {
                $this->email_sc_model->update_active($email_sc_id[$i]);
                $this->session->set_flashdata('success', 'Contact Detail Is Activated Successfully..');
            }
            if (isset($_POST['submit2'])) {
                $this->email_sc_model->update_deactive($email_sc_id[$i]);
                $this->session->set_flashdata('success', 'Contact Detail Is Deactivated Successfully..');
            }
            $i++;
        }
        redirect("email_sc");
    }

}
