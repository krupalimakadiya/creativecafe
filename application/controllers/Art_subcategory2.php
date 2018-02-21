<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Art_subcategory2 extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('art_category_model');
        $this->load->model('art_subcategory_model');
        $this->load->model('art_subcategory2_model');
    }

    public function add_art_subcategory2() {    //redirect on form
        $data['art_category_list'] = $this->art_category_model->getart_categorylist();
        $data['art_subcategory_list'] = $this->art_subcategory_model->getart_subcategorylist();
        $data['art_subcategory2_list'] = $this->art_subcategory2_model->getart_subcategory2list();
        $this->load->view('v_art_subcategory2_form', $data);
    }
    
    public function import()
    {
        $this->load->view('import_art_subcategory2');
    }

    public function index() {
        $data['art_category_list'] = $this->art_category_model->getart_categorylist();
        $data['art_subcategory_list'] = $this->art_subcategory_model->getart_subcategorylist();
        $data['art_subcategory2_list'] = $this->art_subcategory2_model->getart_subcategory2list();
        $this->load->view('v_art_subcategory2_view', $data);
    }

    public function addp() {
        $art_subcategory2_data = $this->art_subcategory2_model->check_data($_POST['art_category_id'], $_POST['art_subcategory_id'], $_POST['art_subcategory2_name']);
        if (isset($art_subcategory2_data)) {
            $this->session->set_flashdata('message', 'record already exists...');
            redirect('art_subcategory2');
        } else {
            $this->art_subcategory2_model->insert($_POST['art_category_id'], $_POST['art_subcategory_id'], $_POST['art_subcategory2_name']);
            $this->session->set_flashdata('message', 'insert successfully...');
            redirect('art_subcategory2');
        }
    }

    public function edit_data($art_subcategory2_id) {
        $data['update_data'] = $this->art_subcategory2_model->edit_data($art_subcategory2_id);
        $data['art_category_list'] = $this->art_category_model->getart_categorylist();
        $data['art_subcategory_list'] = $this->art_subcategory_model->getart_subcategorylist();
        $data['art_subcategory2_list'] = $this->art_subcategory2_model->getart_subcategory2list();
        $this->load->view('v_art_subcategory2_form', $data);
    }

    public function editp() {
        $this->art_subcategory2_model->update_data($_POST['art_subcategory2_id'], $_POST['art_category_id'], $_POST['art_subcategory_id'], $_POST['art_subcategory2_name']);
        redirect("art_subcategory2");
    }

    public function update_data($art_subcategory2id) {
        $data['art_category_list'] = $this->art_category_model->getart_categorylist();
        $data['update_data'] = $this->art_subcategory_model->getart_subcategorylist();
        $data['update_data'] = $this->art_subcategory2_model->edit_data($art_subcategory2_id);
        $data['art_subcategory2_list'] = $this->art_subcategory2_model->getart_subcategory2list();
        $this->load->view('v_art_subcategory2_view', $data);
    }

    public function delete($art_subcategory2_id) {
        $this->art_subcategory2_model->delete($art_subcategory2_id);
        $this->session->set_flashdata('message', 'record deleted successfully...');
        redirect("art_subcategory2");
    }

    public function drop_art_subcategory() {
        $data['update_data'] = $this->art_subcategory2_model->drop_art_subcategory($_POST['art_category_id']);
        $this->load->view('drop_art_subcategory', $data);
    }

    public function update_status_active($art_subcategory2_id) {
        $art_subcategory2_status = $this->input->get('art_subcategory2_status');
        $this->art_subcategory2_model->update_active($art_subcategory2_id, $art_subcategory2_status);
        redirect('art_subcategory2');
    }

    public function update_status_deactive($art_subcategory2_id) {
        $art_subcategory2_status = $this->input->get('art_subcategory2_status');
        $this->art_subcategory2_model->update_deactive($art_subcategory2_id, $art_subcategory2_status);
        redirect('art_subcategory2');
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
            if (strlen($art_category_name) < 0) {
                continue;
            }
            $art_subcategory_name = trim($filesop[1]);
            if (strlen($art_subcategory_name) < 0) {
                continue;
            }
            $art_subcategory2_name = trim($filesop[2]);
            if (strlen($art_subcategory2_name) < 0) {
                continue;
            }
            
           $art_category_data = $this->art_subcategory2_model->getart_categoryid($art_category_name);           
           $art_subcategory_data = $this->art_subcategory2_model->getart_subcategoryid($art_subcategory_name);
           $art_category_id = $art_category_data['art_category_id'];
           $art_subcategory_id = $art_subcategory_data['art_subcategory_id'];
            try {
                $param = array(
                    'art_category_id' => $art_category_id,
                    'art_subcategory_id' => $art_subcategory_id,
                    'art_subcategory2_name'=>$art_subcategory2_name
                    );
               
                $this->art_subcategory2_model->insert($art_category_id, $art_subcategory_id, $art_subcategory2_name);
                $counter++;
            } catch (Exception $ex) {
                
            }
        }
        $total = ($records - 1);
        $this->session->set_flashdata('message', $counter . " record(s) out of " . ($total == -1 ? 0 : $total) . " successfully imported.");
        redirect("art_subcategory2");
    }
    
    public function export()
    {
        $this->load->dbutil(); 
        $this->load->helper('file'); 
        $this->load->helper('download'); 
        $delimiter = ","; 
        $newline = "\r\n"; 
        $filename = "art_subcategory2_master.csv"; 
        $query = "select art_category_name as 'Art Category Name', art_subcategory_name as 'Art Subcategory Name', art_subcategory2_name as 'Art Subcategory2 Name' 
                from art_category_master as c, art_subcategory_master as s, art_subcategory2_master as art_subcategory2
                where art_subcategory2.art_category_id=c.art_category_id AND art_subcategory2.art_subcategory_id=s.art_subcategory_id";
        $result = $this->db->query($query); 
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline); 
        force_download($filename, $data);

    }
    
    public function deletemultiple() {

        $art_subcategory2_id = $_POST['art_subcategory2_id'];
        $i = 0;
        while ($i < count($art_subcategory2_id)) {
            if (isset($_POST['submit'])) {

                if ($this->art_subcategory2_model->delete($art_subcategory2_id[$i])) {
                    $this->session->set_flashdata('success', 'City Detail Is Delete Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'City Detail Is Not Delete. Please Try Again.');
                }
            }
            if (isset($_POST['submit1'])) {
                $this->art_subcategory2_model->update_active($art_subcategory2_id[$i]);
                $this->session->set_flashdata('success', 'City Detail Is Activated Successfully..');
            }
            if (isset($_POST['submit2'])) {
                $this->art_subcategory2_model->update_deactive($art_subcategory2_id[$i]);
                $this->session->set_flashdata('success', 'City Detail Is Deactivated Successfully..');
            }
            $i++;
        }
        redirect("art_subcategory2");
    }


}
