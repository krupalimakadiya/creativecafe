<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller {

    public function index() {
           $this->load->view('forgot_frm');                     
    }
    
   
    public function forgorpwd() {
        
    $this->load->model('forgot_model');
    $email =$this->input->post('email');
    $data['email_lst']=$this->forgot_model->validate($email);
    $password=$this->forgot_model->random_password();
   //echo $data['email_lst'];
   
$em_data = $data['email_lst']['email'];
 $password;  
  $updaterecord=$this->forgot_model->update_data($em_data,$password);
 $data['get_lst']=$this->forgot_model->getdata($email);

  $get_data = $data['get_lst']['email'];
 $get_data1 = $data['get_lst']['password'];
 $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'info.cafecreative@gmail.com', // change it to yours
            'smtp_pass' => 'mkgroup2018', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('info.cafecreative@gmail.com', 'creativecafe'); // change it to yours
        $this->email->to($get_data); // change it to yours
        $this->email->subject('Password recovery');
        $this->email->message('Your password is ' . $get_data1);
        if ($this->email->send()) {
            echo 'Email sent.';
               $this->session->set_flashdata('message', 'password change successfully');
                redirect("Login");
        } else {
            show_error($this->email->print_debugger());
        }
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
