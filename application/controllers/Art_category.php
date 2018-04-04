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
        $category_data = $this->art_category_model->check_data(ucwords($_POST['art_category_name']), '', $art_category_leval);
        if (isset($category_data)) {
            $this->session->set_flashdata('message', 'Record already exists...');
            redirect('art_category');
        } else {
            $categoryarray = array(
                "art_category_name" =>ucwords($_POST['art_category_name']),
                "art_sub_cat_id" => ucwords($_POST['art_sub_category_id']),
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
        $art_category_leval = $_POST['art_category_id'] == 0 ? 1 : 2;
        $category_data = $this->art_category_model->check_data(ucwords($_POST['art_category_name']), $_POST['art_category_id_1'], $art_category_leval);
        if (isset($category_data)) {
            $this->session->set_flashdata('message', 'Record already exists...');
            redirect('art_category');
        } else {
            $categoryarray = array(
                "art_category_name" =>ucwords($_POST['art_category_name']),
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
