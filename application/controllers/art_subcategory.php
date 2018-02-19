<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Art_subcategory extends MY_Controller {

   public function __construct() {
        parent::__construct();
        $this->load->model('art_category_model');
        $this->load->model('art_subcategory_model');
    }
    public function view_art_subcategory() {
        $data['art_category_list'] = $this->art_category_model->getart_categorylist();
        $data['art_subcategory_list'] = $this->art_subcategory_model->getart_subcategorylist();
        $this->load->view('v_art_subcategory_view', $data);
    }

    public function add_art_subcategory() {
        $data['art_category_list'] = $this->art_category_model->getart_categorylist();
        $data['art_subcategory_list'] = $this->art_subcategory_model->getart_subcategorylist();
        $this->load->view('v_art_subcategory_form', $data);
    }
    public function index() {
        $data['art_category_list'] = $this->art_category_model->getart_categorylist();
        $data['art_subcategory_list'] = $this->art_subcategory_model->getart_subcategorylist();
        $this->load->view('v_art_subcategory_view', $data);
    }
        public function import_art_subcategory() {
        $this->load->view('import_art_subcategory');
    }

    
      public function addp() {
        $art_subcategory_data = $this->art_subcategory_model->check_data($_POST['art_category_id'],$_POST['art_subcategory_name']);
        if (isset($art_subcategory_data)) {
            $this->session->set_flashdata('message','Record already exists...');            
            redirect('art_subcategory');
        } else {
            $this->art_subcategory_model->insert($_POST['art_category_id'],$_POST['art_subcategory_name']);
             $this->session->set_flashdata('message','Insert successfully...');
            redirect('art_subcategory');
        }
    }
    
    public function edit_data($art_subcategory_id) {
        $data['update_data'] = $this->art_subcategory_model->edit_data($art_subcategory_id);
        $data['art_category_list'] = $this->art_category_model->getart_categorylist();
        $data['art_subcategory_list'] = $this->art_subcategory_model->getart_subcategorylist();
        $this->load->view('v_art_subcategory_form', $data);
    }

    public function editp() {
        $this->art_subcategory_model->update_data($_POST['art_subcategory_id'], $_POST['art_category_id'], $_POST['art_subcategory_name']);
        $this->session->set_flashdata('message','Update succesfully');
        redirect("art_subcategory");
    }

    public function delete($art_subcategory_id) {
        $this->art_subcategory_model->delete($art_subcategory_id);
          $this->session->set_flashdata('message','Record deleted successfully...');            
        redirect("art_subcategory");
    }

   public function update_art_subcategory_status_active($art_subcategory_id) {
        $art_subcategory_status = $this->input->get('art_subcategory_status');
        $this->art_subcategory_model->update_active($art_subcategory_id, $art_subcategory_status);
        redirect('art_subcategory');
    }

    public function update_art_subcategory_status_deactive($art_subcategory_id) {
        $art_subcategory_status = $this->input->get('art_subcategory_status');
        $this->art_subcategory_model->update_deactive($art_subcategory_id, $art_subcategory_status);
        redirect('art_subcategory');
    }
    
      public function importp() {
        $file = $_FILES['upload']['tmp_name'];
        $handle = fopen($file, "r");
        $row = 1;
        $counter = 0;
        $records = 0;
        while (($filesop = fgetcsv($handle, 100000, ",")) !== false) {
            $records++;
            if ($row == 1) {
                $row++;
                continue;
            }
            $art_category_name = trim($filesop[0]);
            if (strlen($art_category_name) < 2) {
                continue;
            }
            $art_subcategory_name = trim($filesop[1]);
            if (strlen($art_subcategory_name) < 2) {
                continue;
            }
            $artcategory_data = $this->art_subcategory_model->getart_category_id($art_category_name);
            $art_category_id = $artcategory_data['art_category_id'];
            try {
                $param = array(
                    'art_category_id' => $art_category_id
                    , 'art_subcategory_name' => $art_subcategory_name
                    //, 'art_subcategory_status' => 1
                );
           
                $this->art_subcategory_model->insert($art_category_id,$art_subcategory_name);
                $counter++;
            } catch (Exception $ex) {
                
            }
        }
        $total = ($records - 1);
        $this->session->set_flashdata('message', $counter . " record(s) out of " . ($total == -1 ? 0 : $total) . " successfully imported.");
        redirect("art_subcategory");
    }

    public function export()
    {
        $this->load->dbutil(); 
        $this->load->helper('file'); 
        $this->load->helper('download'); 
        $delimiter = ","; 
        $newline = "\r\n"; 
        $filename = "art_subcategory_master.csv"; 
     //   $query = "SELECT course_master_name as 'Course Name',book_name as 'Book Name',author_name as 'Author Name',publication_name as 'Publication Name',book_edition as 'Book Edition',book_quantity as 'Book Quantity' 
     //   FROM college_master cm,college_course_master ccm,course_master com,book_master as b 
     //   WHERE b.college_course_master_id = ccm.college_course_master_id and ccm.college_master_id = cm.college_master_id and ccm.course_master_id = com.course_master_id and ccm.college_master_id = $college_master_id"; 
        $query = "select art_category_name as 'Art Category Name', art_subcategory_name as 'Art Subcategory Name' 
                from art_category_master as artcat, art_subcategory_master as artsubcat
                where artcat.art_category_id=artsubcat.art_category_id";
        $result = $this->db->query($query); 
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline); 
        force_download($filename, $data);

    }
     public function deletemultiple() 
    { 
        $art_subcategory_id = $_POST['art_subcategory_id']; 
        $i = 0; 
        while($i<count($art_subcategory_id)) 
        { 
            if(isset($_POST['submit'])) 
            { 
                
                if($this->art_subcategory_model->delete($art_subcategory_id[$i])) 
                { 
                    $this->session->set_flashdata('success', 'State Detail Is Delete Successfully..'); 
                     } 
                else 
                { 
                    $this->session->set_flashdata('fail', 'State Detail Is Not Delete. Please Try Again.'); 
                     } 
            } 
            if(isset($_POST['submit1'])) 
            { 
                $this->art_subcategory_model->update_active($art_subcategory_id[$i]);      
               $this->session->set_flashdata('success', 'State Detail Is Activated Successfully..');
                  } 
            if(isset($_POST['submit2'])) 
            { 
               $this->art_subcategory_model->update_deactive($art_subcategory_id[$i]);
                  $this->session->set_flashdata('success', 'State Detail Is Deactivated Successfully..'); 
           } 
            $i++; 
        } 
        redirect("art_subcategory"); 
    }

  
}
