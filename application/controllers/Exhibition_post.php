<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Exhibition_post extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('exhibition_post_model');
    }

    public function index() {
        $data['exhibition_post_list'] = $this->exhibition_post_model->geteexhibitionpostlist();
        $this->load->view('v_exhibition_post_view', $data);
    }
  public function delete($exhibition_post_id) {
        $this->exhibition_post_model->delete($exhibition_post_id);
        $this->session->set_flashdata('message', 'record deleted successfully...');
        redirect("Exhibition_post");
    }
public function update_status_active($exhibition_post_id) {
        $exhibition_post_status = $this->input->get('exhibition_post_status');
        $this->exhibition_post_model->update_active($exhibition_post_id, $exhibition_post_status);
        redirect('Exhibition_post');
    }

    public function update_status_deactive($exhibition_post_id) {
        $exhibition_post_status = $this->input->get('exhibition_post_status');
        $this->exhibition_post_model->update_deactive($exhibition_post_id, $exhibition_post_status);
        redirect('Exhibition_post');
    }
 
     public function deletemultiple() {
             $exhibition_post_id = $_POST['exhibition_post_id'];
        $i = 0;
            while ($i < count($exhibition_post_id)) {
            if (isset($_POST['submit'])) {
                if ($this->exhibition_post_model->delete($exhibition_post_id[$i])) {
                    $this->session->set_flashdata('success', 'Exhibition Post Is Delete Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'Exhibition Post Is Not Delete. Please Try Again.');
                }
            }
            if (isset($_POST['submit1'])) {
                $this->exhibition_post_model->update_active($exhibition_post_id[$i]);
                $this->session->set_flashdata('success', 'Exhibition Post Detail Is Activated Successfully..');
            }
            if (isset($_POST['submit2'])) {
                $this->exhibition_post_model->update_deactive($exhibition_post_id[$i]);
                $this->session->set_flashdata('success', 'Exhibition Post Detail Is Deactivated Successfully..');
            }
            $i++;
        }
        redirect("Exhibition_post");
    }

}
  