<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email_sc extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('email_sc_model');
    }

    public function index() {
        $data['emailsc_list'] = $this->email_sc_model->get_email_list();
        $this->load->view('v_email_sc_view', $data);
    }

    public function delete($sc_id) {
        $this->email_sc_model->delete($sc_id);
        $this->session->set_flashdata('message', 'record deleted successfully...');
        redirect("email_sc");
    }

    public function addp()
    {
          $subject = "Detail";
        $message = "<html>
                            <head>
                            <title>Detail</title>
                            </head>                            
                            <body>                            
                            <table cellspacing=\"0\" cellpadding=\"10\" border=\"1\" align=\"left\">
                            <tr>
                            <td align=\"left\" width=\"150px\" background=\"#EEEEEE\">Name:</td>
                            <td align=\"left\"> $user_name</td>
                            </tr>
                            <tr>
                            <td align=\"left\" width=\"150px\" background=\"#EEEEEE\">Password:</td>
                            <td align=\"left\"> $user_pwd</td>
                            </tr>
                            </table>                            
                            </body>
                            </html>
                            ";

        $from = "info.cafecreative@gmail.com";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
        $headers .= "From: $from" . "\r\n";
        mail($user_email, $subject, $message, $headers);

    }
  
    public function deletemultiple() {
         
        $contact_id = $_POST['contact_id'];              
        $i = 0;
        while ($i < count($contact_id)) {
          if (isset($_POST['submit'])) {
                if ($this->email_sc_model->delete($contact_id[$i])) {
                    print_r($contact_id);
        exit();
                    $this->session->set_flashdata('success', 'Contact Detail Is Delete Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'Contact Detail Is Not Delete. Please Try Again.');
                }
            }
            if (isset($_POST['submit1'])) {
                $this->email_sc_model->update_active($contact_id[$i]);
                    $this->session->set_flashdata('success', 'Contact Detail Is Activated Successfully..');
              }
            if (isset($_POST['submit2'])) {
                $this->email_sc_model->update_deactive($contact_id[$i]);
                $this->session->set_flashdata('success', 'Contact Detail Is Deactivated Successfully..');
            }
            $i++;
        }
        redirect("email_sc");
    }

}
