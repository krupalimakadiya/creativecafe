<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bid extends My_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('bid_model');
    }

    public function index() {
        $data['bid_list'] = $this->bid_model->getbidlist();
        $this->load->view('v_bid_view', $data);
    }
  public function delete($bid_id) {
        $this->bid_model->delete($bid_id);
        $this->session->set_flashdata('message', 'record deleted successfully...');
        redirect("Bid");
    }
public function update_status_active($bid_id) {
        $bid_status = $this->input->get('bid_status');
        $this->bid_model->update_active($bid_id, $bid_status);
        redirect('Bid');
    }

    public function update_status_deactive($bid_id) {
        $bid_status = $this->input->get('bid_status');
        $this->bid_model->update_deactive($bid_id, $bid_status);
        redirect('Bid');
    }
  public function deletemultiple() {
        $bid_id = $_POST['bid_id'];
        $i = 0;
        while ($i < count($bid_id)) {
            if (isset($_POST['submit'])) {
                if ($this->bid_model->delete($bid_id[$i])) {
                    $this->session->set_flashdata('success', 'News Detail Is Delete Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'Bid Detail Is Not Delete. Please Try Again.');
                }
            }
            if (isset($_POST['submit1'])) {
                if ($this->bid_model->update_active($bid_id[$i])) {
                    $this->session->set_flashdata('success', 'Bid Detail Is Deactivated Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'Bid Detail Is Not Deactivated.. Please Try Again.');
                }
            }
            if (isset($_POST['submit2'])) {
                if ($this->bid_model->update_deactive($bid_id[$i])) {
                    $this->session->set_flashdata('success', 'Bid Detail Is Activated Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'Bid Detail Is Not Activated.. Please Try Again.');
                }
            }
            $i++;
        }
        redirect("Bid");
    }
}
  