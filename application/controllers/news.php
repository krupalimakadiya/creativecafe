<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends My_Controller{

     public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
    }
    public function index() {
        $data['news_list'] = $this->news_model->getnewslist();
        $this->load->view('v_news_view', $data);
    }

    public function add_news() {
     //   $data['news_list'] = $this->news_model->getnewslist();
        $this->load->view('v_news_frm');
    }

        public function addp() {   
       $news_data = $this->news_model->check_data($_POST['title'],$_POST['description'],$_POST['image']);
       print_r($news_data);
       die();
        if (isset($news_data)) {
            $this->session->set_flashdata('message', 'record already exists...');
            redirect('news/index');
        } else {
            $this->news_model->insert($_POST['title'],$_POST['description'],$_POST['image']);
            $this->session->set_flashdata('message', 'insert successfully...');
            redirect('news/index');
        }
    }
    

    public function delete($news_id) {
        $this->news_model->delete($news_id);
        $this->session->set_flashdata('message','record deleted successfully...');            
        redirect("news/index");
    }
    public function update_status_active($news_id) {
        $status = $this->input->get('status');
        $this->news_model->update_active($news_id, $status);
        redirect('news/index');
    }

    public function update_status_deactive($news_id) {
        $status = $this->input->get('status');
        $this->news_model->update_deactive($news_id, $status);
        redirect('news/index');
    }
    
   public function deletemultiple() 
    {
        $news_id = $_POST['news_id']; 
        $i = 0; 
        while($i<count($news_id)) 
        { 
            if(isset($_POST['submit'])) 
            {           
                if($this->news_model->delete($news_id[$i])) 
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
                if($this->news_model->update_active($news_id[$i])) 
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
                if($this->news_model->update_deactive($news_id[$i])) 
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
        redirect("news/index"); 
    }

    
}
