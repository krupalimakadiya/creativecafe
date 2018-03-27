<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends My_Controller {

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

    public function do_upload() {
        $config['upload_path'] = 'news_image/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 800;
        $config['max_width'] = 2024;
        $config['max_height'] = 4000;
        $filename = $_FILES["image"]["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        //        $extension = (explode(".", $filename));
        //$newfilename = $userid. "." . $extension;
        $newfilename = time() . $filename;
        $config['file_name'] = $newfilename;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
        } else {

            $data = array('upload_data' => $this->upload->data());
              $data = array('title' => $_POST['title'],
                  'date' => $_POST['date'],
                   'image'=>$newfilename,  
                  'description' => $_POST['description']);              
            $this->news_model->insert($data);

        }
        redirect('news');
    }

    public function delete($news_id) {
        $this->news_model->delete($news_id);
        $this->session->set_flashdata('message', 'record deleted successfully...');
        redirect("news");
    }

    public function update_status_active($news_id) {
        $news_status = $this->input->get('news_status');
        $this->news_model->update_active($news_id, $news_status);
        redirect('news');
    }

    public function update_status_deactive($news_id) {
        $news_status = $this->input->get('news_status');
        $this->news_model->update_deactive($news_id, $news_status);
        redirect('news');
    }

    public function deletemultiple() {
        $news_id = $_POST['news_id'];
        $i = 0;
        while ($i < count($news_id)) {
            if (isset($_POST['submit'])) {
                if ($this->news_model->delete($news_id[$i])) {
                    $this->session->set_flashdata('success', 'News Detail Is Delete Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'News Detail Is Not Delete. Please Try Again.');
                }
            }
            if (isset($_POST['submit1'])) {
                if ($this->news_model->update_active($news_id[$i])) {
                    $this->session->set_flashdata('success', 'News Detail Is Deactivated Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'News Detail Is Not Deactivated.. Please Try Again.');
                }
            }
            if (isset($_POST['submit2'])) {
                if ($this->news_model->update_deactive($news_id[$i])) {
                    $this->session->set_flashdata('success', 'News Detail Is Activated Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'News Detail Is Not Activated.. Please Try Again.');
                }
            }
            $i++;
        }
        redirect("news");
    }

    public function edit_data($news_id) {
        $data['update_data'] = $this->news_model->edit_data($news_id);

        $data['news_list'] = $this->news_model->getnewslist();
        $this->load->view('v_news_frm', $data);
    }

    public function editp() {
        $config['upload_path'] = 'news_image/';
        // $config['upload_path'] = $this->config->item('image_url');
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 800;
        $config['max_width'] = 2024;
        $config['max_height'] = 4000;
        $filename = $_FILES["image"]["name"];
        //  $extension = pathinfo($filename, PATHINFO_EXTENSION);
        //        $extension = (explode(".", $filename));
        //$newfilename = $userid. "." . $extension;
        $newfilename = time() . $filename;
        $config['file_name'] = $newfilename;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $this->news_model->update_data($_POST['news_id'], $_POST['title'], $_POST['date'], $newfilename, $_POST['description']);
        }

        redirect('news/index');               
        $this->session->set_flashdata('message', 'record updated successfully...');        redirect("news");
         }

}
