<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class category extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('category_model');
    }

    public function view_category() {
        $data['category_list'] = $this->category_model->getcategorylist();
        $this->load->view('v_art_category_view', $data);
    }

    public function add_category() {
        $data['category_list'] = $this->category_model->getcategorylist();
        $this->load->view('v_art_category_form', $data);
    }

    public function import() {
        $this->load->view('import_category');
    }

    public function index() {
        $data['category_list'] = $this->category_model->getcategorylist();
        $this->load->view('v_art_category_view', $data);
    }

   public function addp() {
        $category_data = $this->category_model->check_data($_POST['art_category_name']); 
        if (isset($category_data)) {
                $this->session->set_flashdata('message','record already exists..');
            redirect('category/index');
        } else {
            $this->category_model->insert($_POST['art_category_name']);
                $this->session->set_flashdata('message','insert successfully...');
            redirect('category/index');
        }
    }
    
    public function importp() {
        $file = $_FILES['upload']['tmp_name'];
        $handle = fopen($file, "r");
        $c = 0;
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
            $country_data = $this->category_model->check_data($art_category_name);
            if (isset($category_data['art_category_id'])) {
                continue;
            }
            try {
                $this->category_model->insert($art_category_name);
                $counter++;
            } catch (Exception $ex) {
                
            }
        }
        $total = ($records - 1);
        $this->session->set_flashdata('message', $counter . " record(s) out of " . ($total == -1 ? 0 : $total) . " successfully imported.");
        redirect("category/index");
    }

    public function edit_data($art_category_id) {
        $data['update_data'] = $this->category_model->edit_data($art_category_id);
        $data['category_list'] = $this->category_model->getcategorylist();
   
        $this->load->view('v_art_category_form', $data);
    }

    public function editp() {
     $data["update"]= $this->category_model->update_data($_POST['art_category_id'], $_POST['art_category_name']);
        redirect("category/view_category");
    }

    public function del($art_category_id) {
        $this->category_model->del($art_category_id);
        redirect("category/view_category");
    }
public function update_status_active($art_category_id) {
        $this->load->model('category_model');
        $status = $this->input->get('status');
        $this->category_model->update_active($art_category_id, $status);
        redirect('category/index');
    }

    public function update_status_deactive($art_category_id) {
        $this->load->model('category_model');
        $status = $this->input->get('status');
        $this->category_model->update_deactive($art_category_id, $status);
        redirect('category/index');
    }
}
