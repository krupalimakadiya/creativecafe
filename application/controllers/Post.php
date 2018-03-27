<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('art_category_model');
        $this->load->model('post_model');
        $this->load->model('artist_model');
    }

    public function index() {
        $data['art_category_list'] = $this->art_category_model->getart_categorylist();
        $data['post_list'] = $this->post_model->getpostlist();
        $data['artist_list'] = $this->artist_model->getartistlist();
        $this->load->view('v_post_view', $data);
    }  

    public function delete($post_id) {
        $this->post_model->delete($post_id);
        $this->session->set_flashdata('message', 'record deleted successfully...');
        redirect("post");
    }

    public function update_status_active($post_id) {
        $post_status = $this->input->get('post_status');
        $this->post_model->update_active($post_id, $post_status);
        redirect('post');
    }
        
    public function update_status_deactive($post_id) {
        $post_status = $this->input->get('post_status');
        $this->post_model->update_deactive($post_id, $post_status);
        redirect('post');
    }
//update_status_ispublished
    public function update_status_ispublished($post_id) {
        $post_status = $this->input->get('ispublished');
        $this->post_model->update_ispublished($post_id, $ispublished);
        redirect('post');
    }
        
    public function update_status_isnotpublished($post_id) {
        $post_status = $this->input->get('ispublished');
        $this->post_model->update_isnotpublished($post_id, $ispublished);
        redirect('post');
    }
    
    
    public function deletemultiple() {
        $post_id = $_POST['post_id'];
        $i = 0;
        while ($i < count($post_id)) {
            if (isset($_POST['submit'])) {

                if ($this->post_model->delete($post_id[$i])) {
                    $this->session->set_flashdata('success', 'Post Detail Is Delete Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'Post Detail Is Not Delete. Please Try Again.');
                }
            }
            if (isset($_POST['submit1'])) {
                $this->post_model->update_active($post_id[$i]);
                $this->session->set_flashdata('success', 'Post Detail Is Activated Successfully..');
            }
            if (isset($_POST['submit2'])) {
                $this->post_model->update_deactive($post_id[$i]);
                $this->session->set_flashdata('success', 'Post Detail Is Deactivated Successfully..');
            }
            $i++;
        }
        redirect("post");
    }

}
?>