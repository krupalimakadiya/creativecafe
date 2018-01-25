<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class exibition extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('exibition_model');
    }

    public function view_exibition() {
        $data['exibition_list'] = $this->exibition_model->getexibitionlist();
        $this->load->view('v_exibition_view', $data);
    }

    public function add_exibition() {
        $data['exibition_list'] = $this->exibition_model->getexibitionlist();
        $this->load->view('v_exibition_view', $data);
    }

    public function import() {
        $this->load->view('import_exibition');
    }

    public function index() {
        $data['exibition_list'] = $this->exibition_model->getexibitionlist();
        $this->load->view('v_exibition_view', $data);
    }

   /*public function addp() {
        $exibition_data = $this->exibition_model->check_data($_POST['art_category_name']); 
        if (isset($category_data)) {
                $this->session->set_flashdata('message','record already exists..');
            redirect('category/index');
        } else {
            $this->category_model->insert($_POST['art_category_name']);
                $this->session->set_flashdata('message','insert successfully...');
            redirect('category/index');
        }
    }
   
    public function edit_data($art_category_id) {
        $data['update_data'] = $this->category_model->edit_data($art_category_id);
        $data['category_list'] = $this->category_model->getcategorylist();
        $this->load->view('v_art_category_form', $data);
    }

    public function editp() {
     $data["update"]= $this->category_model->update_data($_POST['art_category_id'], $_POST['art_category_name']);
        redirect("category/view_category");
    }*/

    public function delete($exibition_id) {
        $this->exibition_model->delete($exibition_id);
          $this->session->set_flashdata('message','record deleted successfully...');            
        redirect("exibition/index");
    }
public function update_status_active($exibition_id) {
        $exibition_status = $this->input->get('status');
        $this->exibition_model->update_active($exibition_id, $exibition_status);
        redirect('exibition/index');
    }

    public function update_status_deactive($exibition_id) {
        $exibition_status = $this->input->get('status');
        $this->exibition_model->update_deactive($exibition_id, $exibition_status);
        redirect('exibition/index');
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

    }

     public function deletemultiple() 
    { 
      
        $art_category_id = $_POST['art_category_id']; 
        $i = 0; 
        while($i<count($art_category_id)) 
        { 
            if(isset($_POST['submit'])) 
            { 
                
                if($this->category_model->delete($art_category_id[$i])) 
                { 
                    $this->session->set_flashdata('success', 'Category Detail Is Delete Successfully..'); 
                } 
                else 
                { 
                    $this->session->set_flashdata('fail', 'Category Detail Is Not Delete. Please Try Again.'); 
                } 
            } 
            if(isset($_POST['submit1'])) 
            { 
                if($this->category_model->update_active($art_category_id[$i])) 
                {             
                    $this->session->set_flashdata('success', 'Category Detail Is Deactivated Successfully..'); 
                } 
                else 
                { 
                    $this->session->set_flashdata('fail', 'Category Detail Is Not Deactivated.. Please Try Again.'); 
                } 
            } 
            if(isset($_POST['submit2'])) 
            { 
                if($this->category_model->update_deactive($art_category_id[$i])) 
                {             
                    $this->session->set_flashdata('success', 'Category Detail Is Activated Successfully..'); 
                     } 
                else 
                { 
                    $this->session->set_flashdata('fail', 'Category Detail Is Not Activated.. Please Try Again.'); 
                     } 
            } 
            $i++; 
        } 
        redirect("category/index"); 
    }
*/
  
}
