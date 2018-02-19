<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends My_Controller{

     public function __construct() {
        parent::__construct();
        $this->load->model('comment_model');
    }
    public function index() {
     
        $data['comment_list'] = $this->comment_model->getcommentlist();
        $this->load->view('v_comment_view', $data);
    }

    public function delete($comment_id) {
        $this->comment_model->delete($comment_id);
        $this->session->set_flashdata('message','record deleted successfully...');            
        redirect("comment");
    }
    public function update_status_active($comment_id) {
        $this->load->model('comment_model');
        $status = $this->input->get('status');
        $this->comment_model->update_active($comment_id, $status);
        redirect('comment');
    }

    public function update_status_deactive($comment_id) {
        $this->load->model('comment_model');
        $status = $this->input->get('status');
        $this->comment_model->update_deactive($comment_id, $status);
        redirect('comment');
    }
    
   public function deletemultiple() 
    {
        $comment_id = $_POST['comment_id']; 
        $i = 0; 
        while($i<count($comment_id)) 
        { 
            if(isset($_POST['submit'])) 
            {           
                if($this->comment_model->delete($comment_id[$i])) 
                { 
                    $this->session->set_flashdata('success', 'Country Detail Is Delete Successfully..'); 
                } 
                else 
                { 
                    $this->session->set_flashdata('fail', 'Country Detail Is Not Delete. Please Try Again.'); 
                } 
            } 
            if(isset($_POST['submit1'])) 
            { 
                if($this->comment_model->update_active($comment_id[$i])) 
                {             
                    $this->session->set_flashdata('success', 'Country Detail Is Deactivated Successfully..'); 
                } 
                else 
                { 
                    $this->session->set_flashdata('fail', 'Country Detail Is Not Deactivated.. Please Try Again.'); 
                } 
            } 
            if(isset($_POST['submit2'])) 
            { 
                if($this->comment_model->update_deactive($comment_id[$i])) 
                {             
                    $this->session->set_flashdata('success', 'Country Detail Is Activated Successfully..'); 
                } 
                else 
                { 
                    $this->session->set_flashdata('fail', 'Country Detail Is Not Activated.. Please Try Again.'); 
                } 
            } 
            $i++; 
        } 
        redirect("comment"); 
    }

    
}
