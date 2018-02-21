<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class exhibition extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('exhibition_model');
    }
public function add_exhibition() {
     //   $data['news_list'] = $this->news_model->getnewslist();
        $this->load->view('v_exhibition_form');
    }
    public function view_exhibition() {
        $data['exhibition_list'] = $this->exhibition_model->getexhibitionlist();
        $this->load->view('v_exhibition_view', $data);
    }

  /*  public function add_exhibition() {
        $data['exhibition_list'] = $this->exhibition_model->getexhibitionlist();
        $this->load->view('v_exhibition_view', $data);
    }*/

    public function import() {
        $this->load->view('import_exhibition');
    }

    public function index() {
        $data['exhibition_list'] = $this->exhibition_model->getexhibitionlist();
        $this->load->view('v_exhibition_view', $data);
    }

   public function addp() {
     $this->exhibition_model->insert($_POST['title'],$_POST['description'],$_POST['starting_time'],$_POST['end_time'],$_POST['date'],$_POST['fees'],$_POST['address']);
          $this->session->set_flashdata('message','insert successfully...');
            redirect('exhibition/index');
        
    }
  
 public function edit_data($exhibition_id) {
        $data['update_data'] = $this->exhibition_model->edit_data($exhibition_id);
        $data['category_list'] = $this->exhibition_model->getexhibitionlist();
        $this->load->view('v_exhibition_form', $data);
    }

    public function editp() {
     $data["update"]= $this->exhibition_model->update_data($_POST['exhibition_id'], $_POST['title'],$_POST['description'],$_POST['starting_time'],$_POST['end_time'],$_POST['date'],$_POST['fees'],$_POST['address']);
        redirect("exhibition/view_exhibition");
    }

    public function delete($exhibition_id) {
        $this->exhibition_model->delete($exhibition_id);
          $this->session->set_flashdata('message','record deleted successfully...');            
        redirect("exhibition/index");
    }
public function update_status_active($exhibition_id) {
        $exhibition_status = $this->input->get('exhibition_status');
        $this->exhibition_model->update_active($exhibition_id, $exhibition_status);
        redirect('exhibition/index');
    }

    public function update_status_deactive($exhibition_id) {
        $exhibition_status = $this->input->get('exhibition_status');
        $this->exhibition_model->update_deactive($exhibition_id, $exhibition_status);
        redirect('exhibition/index');
    }
    
    
    /*    public function export()
    {
        $this->load->dbutil(); 
        $this->load->helper('file'); 
        $this->load->helper('download'); 
        $delimiter = ","; 
        $newline = "\r\n"; 
        $filename = "art_category_master.csv"; 
        $query = "select art_category_name as 'Art Category Name' 
                from art_category_master";
                 $result = $this->db->query($query); 
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline); 
        force_download($filename, $data);

    }*/

     public function deletemultiple() 
    { 
      
        $exhibition_id= $_POST['exhibition_id']; 
        $i = 0; 
        while($i<count($exhibition_id)) 
        { 
            if(isset($_POST['submit'])) 
            { 
                
                if($this->exhibition_model->delete($exhibition_id[$i])) 
                { 
                    $this->session->set_flashdata('success', 'Exhibition Detail Is Delete Successfully..'); 
                } 
                else 
                { 
                    $this->session->set_flashdata('fail', 'Exhibition Detail Is Not Delete. Please Try Again.'); 
                } 
            } 
            if(isset($_POST['submit1'])) 
            { 
                if($this->exhibition_model->update_active($exhibition_id[$i])) 
                {             
                    $this->session->set_flashdata('success', 'Exhibition Detail Is Deactivated Successfully..'); 
                } 
                else 
                { 
                    $this->session->set_flashdata('fail', 'Exhibition Detail Is Not Deactivated.. Please Try Again.'); 
                } 
            } 
            if(isset($_POST['submit2'])) 
            { 
                if($this->category_model->update_deactive($exhibition_id[$i])) 
                {             
                    $this->session->set_flashdata('success', 'Exhibition Detail Is Activated Successfully..'); 
                     } 
                else 
                { 
                    $this->session->set_flashdata('fail', 'Exhibition Detail Is Not Activated.. Please Try Again.'); 
                     } 
            } 
            $i++; 
        } 
        redirect("exhibition/index"); 
    }
}
