<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends My_Controller{

public function __construct() {
parent::__construct();
$this->load->model('event_model');
}
public function index() {
$data['event_list'] = $this->event_model->geteventlist();
$this->load->view('v_event_view', $data);
}

public function add_event() {
     //   $data['news_list'] = $this->news_model->getnewslist();
        $this->load->view('v_event_frm');
}

public function do_upload()
{
                $config['upload_path']          = './event_image/';
                $config['upload_path']          = './event_file/';
                $config['allowed_types']        = 'pdf|doc';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 5000;
                $config['max_width']            = 5024;
                $config['max_height']           = 6468;
$this->load->Model('event_model');
                $data = array('title' => $_POST['title'],'file' => $_POST['file'],'date' => $_POST['date']
                        ,'description' => $_POST['description']);
$userid = $this->event_model->insert($data);

$filename = $_FILES["image"]["name"];
$extension = pathinfo($filename, PATHINFO_EXTENSION);
                  $newname= $userid.".".$extension;
//   die();
$config['file_name'] = $newname;
$this->load->library('upload', $config);
if (!$this->upload->do_upload('image')) {
$error = array('error' => $this->upload->display_errors());
$this->load->view('v_event_view', $error);
}
else {

$data = array('upload_data' => $this->upload->data());
                        $this->event_model->update_filename($userid,$newname);
redirect("event");
}
}

public function delete($event_id) {
$this->event_model->delete($event_id);
        $this->session->set_flashdata('message','record deleted successfully...');            
        redirect("event");
    }
    public function update_status_active($event_id) {
        $event_status = $this->input->get('event_status');
        $this->event_model->update_active($event_id, $event_status);
        redirect('event');
    }

    public function update_status_deactive($event_id) {
        $event_status = $this->input->get('event_status');
        $this->event_model->update_deactive($event_id, $event_status);
        redirect('event');
    }

   public function deletemultiple() 
    {
        $event_id = $_POST['event_id']; 
        $i = 0; 
        while($i<count($event_id)) 
        { 
            if(isset($_POST['submit'])) 
            {           
                if($this->event_model->delete($event_id[$i])) 
                { 
                    $this->session->set_flashdata('success', 'Event Detail Is Delete Successfully..'); 
                } 
                else 
                { 
                    $this->session->set_flashdata('fail', 'Event Detail Is Not Delete. Please Try Again.'); 
                } 
            } 
            if(isset($_POST['submit1'])) 
            { 
                if($this->event_model->update_active($event_id[$i])) 
                {             
                    $this->session->set_flashdata('success', 'Event Detail Is Deactivated Successfully..'); 
                } 
                else 
                { 
                    $this->session->set_flashdata('fail', 'Event Detail Is Not Deactivated.. Please Try Again.'); 
                } 
            } 
            if(isset($_POST['submit2'])) 
            { 
                if($this->event_model->update_deactive($event_id[$i])) 
                {             
                    $this->session->set_flashdata('success', 'Event Detail Is Activated Successfully..'); 
                } 
                else 
                { 
                    $this->session->set_flashdata('fail', 'Event Detail Is Not Activated.. Please Try Again.'); 
                } 
            } 
            $i++; 
        } 
        redirect("event"); 
    }

    public function edit_data($event_id) {
        $data['update_data'] = $this->event_model->edit_data($event_id);
       $data['event_list'] = $this->event_model->geteventlist();
        $this->load->view('v_event_frm', $data);
    }

    public function editp() {
        $this->event_model->update_data($_POST['event_id'],$_POST['title'],$_POST['file'],$_POST['date'],$_POST['image'],$_POST['description']);
        $this->session->set_flashdata('message', 'record updated successfully...');

        redirect("event");
    }

}
