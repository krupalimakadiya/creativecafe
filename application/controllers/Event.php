<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('event_model');
    }

    public function index() {
        $data['event_list'] = $this->event_model->geteventlist();

        $this->load->view('v_event_view', $data);
    }

    public function add_event() {
        $data['event_list'] = $this->event_model->geteventlist();
        $this->load->view('v_event_frm', $data);
    }

    public function do_upload() {


        $event_id = $this->input->post('event_id');
        $title = $this->input->post('title');
      $date = $this->input->post('date');
     $description = $this->input->post('description');
           $this->load->library('upload');
          if (!empty($_FILES['image']['name'])) {
          $date = date_create();
               $filename = $_FILES["image"]["name"];
             $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $result_img1 = "eventimage-" . date_timestamp_get($date);
              $newname= $result_img1.".".$extension;
           $attachment_path1 = $this->config->item("static_url1") . 'event_image/';
            $config['upload_path'] = $attachment_path1;
            $config['file_ext_tolower'] = TRUE;
            $config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG|PNG|JPG|pdf|PDF';
            $config['max_size'] = 1024 * 1024 * 5;
             $config['file_name'] = $result_img1;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('message', $this->upload->display_errors());
            }
        }

        if (!empty($_FILES['file']['name'])) {
            
            $date = date_create();
             $filename1 = $_FILES["file"]["name"];
              
            $extension1 = pathinfo($filename1, PATHINFO_EXTENSION);
            $result_img2 = "eventfile-" . date_timestamp_get($date);
               $newname1= $result_img2.".".$extension1;
          
            $attachment_path = $this->config->item("static_url1") . 'event_file/';
            $config['upload_path'] = $attachment_path;
            $config['file_ext_tolower'] = TRUE;
            $config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG|PNG|JPG|pdf|PDF';
            $config['max_size'] = 1024 * 1024 * 5;
               
            $config['file_name'] = $result_img2;
                $this->upload->initialize($config);
         
            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('message', $this->upload->display_errors());
            }
        }
        $this->load->model('event_model');
        
             

        $data = array('title' => $_POST['title'],
            'file' => $newname1 . $this->upload->data("file"),
            'date' => $_POST['date'],
            'image' => $newname . $this->upload->data("image"),
            'description' => $_POST['description']
        );
        //print_r($data);
        //die();
        //$this->db->insert('test',$data);
        $this->load->model('event_model');

        $this->event_model->insert($data);
        $this->session->set_flashdata('message', "Entry successfully added.");
        redirect("event/index");
    }

    public function delete($event_id) {
        $this->event_model->delete($event_id);
        $this->session->set_flashdata('message', 'record deleted successfully...');
        redirect("event/index");
    }

    public function update_status_active($event_id) {
        $event_status = $this->input->get('event_status');
        $this->event_model->update_active($event_id, $event_status);
        redirect('event/index');
    }

    public function update_status_deactive($event_id) {
        $event_status = $this->input->get('event_status');
        $this->event_model->update_deactive($event_id, $event_status);
        redirect('event/index');
    }

    public function deletemultiple() {
        $event_id = $_POST['event_id'];
        $i = 0;
        while ($i < count($event_id)) {
            if (isset($_POST['submit'])) {
                if ($this->event_model->delete($event_id[$i])) {
                    $this->session->set_flashdata('success', 'Event Detail Is Delete Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'Event Detail Is Not Delete. Please Try Again.');
                }
            }
            if (isset($_POST['submit1'])) {
                if ($this->event_model->update_active($event_id[$i])) {
                    $this->session->set_flashdata('success', 'Event Detail Is Deactivated Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'Event Detail Is Not Deactivated.. Please Try Again.');
                }
            }
            if (isset($_POST['submit2'])) {
                if ($this->event_model->update_deactive($event_id[$i])) {
                    $this->session->set_flashdata('success', 'Event Detail Is Activated Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'Event Detail Is Not Activated.. Please Try Again.');
                }
            }
            $i++;
        }
        redirect("event/index");
    }

    public function edit_data($event_id) {
        $data['update_data'] = $this->event_model->edit_data($event_id);
       $data['event_list'] = $this->event_model->geteventlist();
        
        $this->load->view('v_event_frm', $data);
    }

    /*public function editp() {
        $this->event_model->update_data($_POST['event_id'], $_POST['title'], $_POST['file'], $_POST['date'], $_POST['image'], $_POST['description']);
        $this->session->set_flashdata('message', 'record updated successfully...');

        redirect("event/index");
    }*/
    public function editp() 
            {
           $event_id = $this->input->post('event_id');
        $title = $this->input->post('title');
         $title = $this->input->post('file');
        $date = $this->input->post('date');
         $title = $this->input->post('image');
      
        $description = $this->input->post('description');
        $this->load->library('upload');
        if (!empty($_FILES['image']['name'])) {
            $date = date_create();
            $filename = $_FILES["image"]["name"];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $result_img1 = "eventimage-" . date_timestamp_get($date);
            $newname = $result_img1 . "." . $extension;
          //  print_r($newname);
            $attachment_path1 = $this->config->item("static_url1") . 'event_image/';
            $config['upload_path'] = $attachment_path1;
            $config['file_ext_tolower'] = TRUE;
            $config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG|PNG|JPG|pdf|PDF';
            $config['max_size'] = 1024 * 1024 * 5;
            $config['file_name'] = $result_img1;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('message', $this->upload->display_errors());
            }
        }

        if (!empty($_FILES['file']['name'])) {

            $date = date_create();
            $filename1 = $_FILES["file"]["name"];

            $extension1 = pathinfo($filename1, PATHINFO_EXTENSION);
            $result_img2 = "eventfile-" . date_timestamp_get($date);
            $newname1 = $result_img2 . "." . $extension1;
       //     print_r($newname1);
     
            $attachment_path = $this->config->item("static_url1") . 'event_file/';
            $config['upload_path'] = $attachment_path;
            $config['file_ext_tolower'] = TRUE;
            $config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG|PNG|JPG|pdf|PDF';
            $config['max_size'] = 1024 * 1024 * 5;

            $config['file_name'] = $result_img2;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                echo "hello if";
                $this->session->set_flashdata('message', $this->upload->display_errors());
            }
        }
  
         $data = array(
            'event_id' => $_POST ['event_id'],
              'title' => $_POST['title'],
            'file' => $newname1 . $this->upload->data("file"),
            'date' => $_POST['date'],
            'image' => $newname . $this->upload->data("image"),
            'description' => $_POST['description']
        );
//         echo "<pre>";
//        print_r($data);
//        die();
        $this->load->model('event_model');
     $this->event_model->update_data($data);
      $this->session->set_flashdata('message', 'record updated successfully...');
      redirect("event/index");
        /*
        $this->event_model->update_data($_POST['event_id'], $_POST['title'], $_POST['file'], $_POST['date'], $_POST['image'], $_POST['description']);
      
        redirect("event/index");*/
    }



}

?>