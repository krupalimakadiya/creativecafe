<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Art_category extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('art_category_model');
        $this->load->helper('string');
    }

    public function index() {
        $data['art_category_list'] = $this->art_category_model->getart_categorylist();
        $this->load->view('v_art_category_view', $data);
    }

    public function add_art_category() {
        $data['art_category_list'] = $this->art_category_model->getart_categorylist_sub();
        $this->load->view('v_art_category_form', $data);
    }

    public function import() {
        $this->load->view('import_art_category');
    }

    public function addp() {
        $art_category_leval = $_POST['art_sub_category_id'] == 0 ? 1 : 2;
        $category_data = $this->art_category_model->check_data($_POST['art_category_name'], '', $art_category_leval);
        if (isset($category_data)) {
            $this->session->set_flashdata('message', 'Record already exists...');
            redirect('art_category');
        } else {
            $categoryarray = array(
                "art_category_name" => $_POST['art_category_name'],
                "art_sub_cat_id" => $_POST['art_sub_category_id'],
                "art_category_leval" => $art_category_leval,
                "url_code" => random_string('alnum', 16),
            ); //1= active //0-deactive
            $this->art_category_model->insert($categoryarray);
            $this->session->set_flashdata('message', 'insert successfully...');
            redirect('art_category');
        }
    }

    public function edit_data($art_category_id) {
        $data['update_data'] = $this->art_category_model->edit_data($art_category_id);
        $data['art_category_list'] = $this->art_category_model->getart_categorylist_sub();
        $this->load->view('v_art_category_form', $data);
    }

    public function editp() {
        $art_category_leval = $_POST['art_category_id_1'] == 0 ? 1 : 2;
        $category_data = $this->art_category_model->check_data($_POST['art_category_name'], $_POST['art_category_id_1'], $art_category_leval);
        if (isset($category_data)) {
            $this->session->set_flashdata('message', 'Record already exists...');
            redirect('art_category');
        } else {
            $art_category_leval = $_POST['art_category_id_1'] == 0 ? 1 : 2;
            $categoryarray = array(
                "art_category_name" => $_POST['art_category_name'],
                "art_sub_cat_id" => $_POST['art_category_id'],
                "art_category_leval" => $art_category_leval,
                "url_code" => random_string('alnum', 16),
            ); //1= active //0-deactive
            $this->art_category_model->update_data($_POST['art_category_id_1'], $categoryarray);
            $this->session->set_flashdata('message', 'update successfully...');
            redirect('art_category');
        }
    }

    public function delete($art_category_id) {
        $this->art_category_model->delete($art_category_id);
        $this->session->set_flashdata('message', 'record deleted successfully...');
        redirect("art_category");
    }

    public function update_art_category_status_active($art_category_id) {
        $this->load->model('art_category_model');
        $art_category_art_category_status = $this->input->get('art_category_art_category_status');
        $this->art_category_model->update_active($art_category_id, $art_category_art_category_status);
        redirect('art_category');
    }

    public function update_art_category_status_deactive($art_category_id) {
        $this->load->model('art_category_model');
        $art_category_art_category_status = $this->input->get('art_category_art_category_status');
        $this->art_category_model->update_deactive($art_category_id, $art_category_art_category_status);
        redirect('art_category');
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
            $art_category_data = $this->art_category_model->check_data($art_category_name);
            if (isset($art_category_data['art_category_id'])) {
                continue;
            }
            try {
                $this->art_category_model->insert($art_category_name);
                $counter++;
            } catch (Exception $ex) {
                
            }
        }
        $total = ($records - 1);
        $this->session->set_flashdata('message', $counter . " record(s) out of " . ($total == -1 ? 0 : $total) . " successfully imported.");
        redirect("art_category");
    }

    public function export() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "art_category_master.csv";
        //   $query = "SELECT course_master_name as 'Course Name',book_name as 'Book Name',author_name as 'Author Name',publication_name as 'Publication Name',book_edition as 'Book Edition',book_quantity as 'Book Quantity' FROM college_master cm,college_course_master ccm,course_master com,book_master as b WHERE b.college_course_master_id = ccm.college_course_master_id and ccm.college_master_id = cm.college_master_id and ccm.course_master_id = com.course_master_id and ccm.college_master_id = $college_master_id"; 
        $query = "select art_category_name as 'Art Category Name' from art_category_master ";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);

        force_download($filename, $data);
    }

    public function deletemultiple() {
        $art_category_id = $_POST['art_category_id'];
        $i = 0;
        while ($i < count($art_category_id)) {
            if (isset($_POST['submit'])) {
                if ($this->art_category_model->delete($art_category_id[$i])) {
                    $this->session->set_flashdata('success', 'Art category Detail Is Delete Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'Art category Detail Is Not Delete. Please Try Again.');
                }
            }
            if (isset($_POST['submit1'])) {
                $this->art_category_model->update_active($art_category_id[$i]);
                $this->session->set_flashdata('success', 'Art category Detail Is Activated Successfully..');
            }
            if (isset($_POST['submit2'])) {
                $this->art_category_model->update_deactive($art_category_id[$i]);
                $this->session->set_flashdata('success', 'Art category Detail Is Deactivated Successfully..');
            }
            $i++;
        }
        redirect("art_category");
    }

}
