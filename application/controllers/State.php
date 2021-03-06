<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class State extends MY_Controller {

   public function __construct() {
        parent::__construct();
        $this->load->model('country_model');
        $this->load->model('state_model');
    }
    
    public function add_state() {
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $this->load->view('v_state_form', $data);
    }
    public function index() {
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $this->load->view('v_state_view', $data);
    }
        public function import_state() {
        $this->load->view('import_state');
    }

    
      public function addp() {
        $state_data = $this->state_model->check_data($_POST['country_id'],ucwords($_POST['state_name']));
        if (isset($state_data)) {
            $this->session->set_flashdata('message','record already exists...');            
            redirect('state');
        } else {
            $this->state_model->insert($_POST['country_id'],ucwords($_POST['state_name']));
             $this->session->set_flashdata('message','insert successfully...');
            redirect('state');
        }
    }
    
    public function edit_data($state_id) {
        $data['update_data'] = $this->state_model->edit_data($state_id);
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $this->load->view('v_state_form', $data);
    }

    public function editp() {
        $state_data = $this->state_model->check_data($_POST['country_id'],ucwords($_POST['state_name']));
        if (isset($state_data)) {
            $this->session->set_flashdata('message','record already exists...');            
            redirect('state');
        } else {        
        $this->state_model->update_data($_POST['state_id'], $_POST['country_id'],ucwords($_POST['state_name']));
        $this->session->set_flashdata('message','update succesfully');
        redirect("state");
    }
    }
    public function delete($state_id) {
        $this->state_model->delete($state_id);
          $this->session->set_flashdata('message','record deleted successfully...');            
        redirect("state");
    }

   public function update_status_active($state_id) {
        $state_status = $this->input->get('state_status');
        $this->state_model->update_active($state_id, $state_status);
        redirect('state');
    }

    public function update_status_deactive($state_id) {
        $state_status = $this->input->get('state_status');
        $this->state_model->update_deactive($state_id, $state_status);
        redirect('state');
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
            $country_name = trim($filesop[0]);
            if (strlen($country_name) < 2) {
                continue;
            }
            $state_name = trim($filesop[1]);
            if (strlen($state_name) < 2) {
                continue;
            }
            $country_data = $this->state_model->getcountryid($country_name);
            $country_id = $country_data['country_id'];
            $state_data = $this->state_model->check_data($country_id, $state_name);
            if (isset($state_data['country_id']) && isset($state_data['state_name'])) {
                continue;
            }
            try {
                $param = array(
                    'country_id' => $country_id
                    , 'state_name' => $state_name
                        //, 'status' => 1
                );

                $data = $this->state_model->insert($country_id, $state_name);

                $counter++;
            } catch (Exception $ex) {
                
            }
        }
        $total = ($records - 1);
        $this->session->set_flashdata('message', $counter . " record(s) out of " . ($total == -1 ? 0 : $total) . " successfully imported.");
        redirect("state");
    }

    public function export() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "state_master.csv";
        $query = "select country_name as 'Country Name', state_name as 'State Name' 
                from country_master as c, state_master as s
                where c.country_id=s.country_id";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

    public function deletemultiple() {
        $state_id = $_POST['state_id'];
        $i = 0;
        while ($i < count($state_id)) {
            if (isset($_POST['submit'])) {

                if ($this->state_model->delete($state_id[$i])) {
                    $this->session->set_flashdata('success', 'State Detail Is Delete Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'State Detail Is Not Delete. Please Try Again.');
                }
            }
            if (isset($_POST['submit1'])) {
                $this->state_model->update_active($state_id[$i]);
                $this->session->set_flashdata('success', 'State Detail Is Activated Successfully..');
            }
            if (isset($_POST['submit2'])) {
                $this->state_model->update_deactive($state_id[$i]);
                $this->session->set_flashdata('success', 'State Detail Is Deactivated Successfully..');
            }
            $i++;
        }
        redirect("state");
    }

}
