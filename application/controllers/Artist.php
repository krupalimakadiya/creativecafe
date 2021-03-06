<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Artist extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('country_model');
        $this->load->model('state_model');
        $this->load->model('city_model');
        $this->load->model('artist_model');
    }

    public function index() {
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $data['city_list'] = $this->city_model->getcitylist();
        $data['artist_list'] = $this->artist_model->getartistlist();
        $this->load->view('v_artist_view', $data);
    }

    public function add_artist() {
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $data['city_list'] = $this->city_model->getcitylist();
        $data['artist_list'] = $this->artist_model->getartistlist();
        $this->load->view('v_artist_form', $data);
    }

    public function import() {
        $this->load->view('import_artist');
    }

    public function addp() {
        $config['upload_path'] = $this->config->item('image_path');
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $filename = $_FILES["artist_profile"]["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newfilename = time() . $filename;
        $config['file_name'] = $newfilename;

        $this->load->library('upload', $config);
        if ($filename != '') {
            if (!$this->upload->do_upload('artist_profile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
                $artist_data = array(
                    'first_name' => $_POST['first_name'],
                    'last_name' => $_POST['last_name'],
                    'mobile' => $_POST['mobile'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'artist_profile' => $newfilename,
                    'country_id' => $_POST['country_id'],
                    'state_id' => $_POST['state_id'],
                    'city_id' => $_POST['city_id'],
                    'pincode' => $_POST['pincode'],
                    'user_type' => $_POST['user_type']
                );
                $this->artist_model->insert($artist_data);
                redirect('artist');
            }
        } else {
            //    $data = array('upload_data' => $this->upload->data());
            $artist_data = array(
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'mobile' => $_POST['mobile'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'country_id' => $_POST['country_id'],
                'state_id' => $_POST['state_id'],
                'city_id' => $_POST['city_id'],
                'pincode' => $_POST['pincode'],
                'user_type' => $_POST['user_type']
            );
            $this->artist_model->insert($artist_data);
            redirect('artist');
        }
    }

    public function drop_state() {
        $data['update_data'] = $this->artist_model->drop_state($_POST['country_id']);
        $this->load->view('drop_state', $data);
    }

    public function drop_city() {
        $data['update_data'] = $this->artist_model->drop_city($_POST['state_id']);
        $this->load->view('drop_city', $data);
    }

    public function edit_data($artist_id) {
        $data['update_data'] = $this->artist_model->edit_data($artist_id);
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['state_list'] = $this->state_model->getstatelist();
        $data['city_list'] = $this->city_model->getcitylist();
        $data['artist_list'] = $this->artist_model->getartistlist();
        $this->load->view('v_artist_form', $data);
    }

    public function editp() {
        $config['upload_path'] = $this->config->item('image_path');
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 800;
        $config['max_width'] = 2024;
        $config['max_height'] = 4000;
        $filename = $_FILES["artist_profile"]["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newfilename = time() . $filename;
        $config['file_name'] = $newfilename;
        $this->load->library('upload', $config);
        if ($filename != '') {
            if (!$this->upload->do_upload('artist_profile')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $this->artist_model->update_data($_POST['artist_id'], $_POST['first_name'], $_POST['last_name'], $_POST['mobile'], $_POST['email'], $_POST['password'], $newfilename, $_POST['country_id'], $_POST['state_id'], $_POST['city_id'], $_POST['pincode'], $_POST['user_type']);
                redirect("artist");
            }
        } else {           
            $this->artist_model->update_data($_POST['artist_id'], $_POST['first_name'], $_POST['last_name'], $_POST['mobile'], $_POST['email'], $_POST['password'],'', $_POST['country_id'], $_POST['state_id'], $_POST['city_id'], $_POST['pincode'], $_POST['user_type']);
            redirect("artist");
        }
    }

    public function update_data($artist_id) {
        $data['artist_list'] = $this->artist_model->getartistlist();
        $data['country_list'] = $this->country_model->getcountrylist();
        $data['update_data'] = $this->state_model->getstatelist();
        $data['update_data'] = $this->city_model->getcitylist();
        $data['artist_data'] = $this->artist_model->edit_data($artist_id);
        $data['artist_list'] = $this->artist_model->getartistlist();
        $this->load->view('v_artist_view', $data);
    }

    public function delete($artist_id) {
        $this->artist_model->delete($artist_id);
        $this->session->set_flashdata('message', 'record deleted successfully...');
        redirect("artist");
    }

    public function update_status_active($artist_id) {
        $status = $this->input->get('artist_status');
        $this->artist_model->update_active($artist_id, $artist_status);
        redirect('artist');
    }

    public function update_status_deactive($artist_id) {
        $status = $this->input->get('artist_status');
        $this->artist_model->update_deactive($artist_id, $artist_status);
        redirect('artist');
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
            $first_name = trim($filesop[0]);
            if (strlen($first_name) < 2) {
                continue;
            }
            $last_name = trim($filesop[1]);
            if (strlen($last_name) < 2) {
                continue;
            }
            $mobile = trim($filesop[3]);
            if (strlen($mobile) < 2) {
                continue;
            }
            $email = trim($filesop[4]);
            if (strlen($email) < 2) {
                continue;
            }
            $password = trim($filesop[5]);
            if (strlen($password) < 2) {
                continue;
            }
            $country_name = trim($filesop[6]);
            if (strlen($country_name) < 0) {
                continue;
            }
            $state_name = trim($filesop[7]);
            if (strlen($state_name) < 0) {
                continue;
            }
            $city_name = trim($filesop[8]);
            if (strlen($city_name) < 0) {
                continue;
            }
            $pincode = trim($filesop[9]);
            if (strlen($pincode) < 2) {
                continue;
            }

            $country_data = $this->artist_model->getcountryid($country_name);
            $state_data = $this->artist_model->getstateid($state_name);
            $city_data = $this->artist_model->getcityid($city_name);
            $country_id = $country_data['country_id'];
            $state_id = $state_data['state_id'];
            $city_id = $city_data['city_id'];
            try {
                $param = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'mobile' => $mobile,
                    'email' => $email,
                    'password' => $password,
                    'country_id' => $country_id,
                    'state_id' => $state_id,
                    'city_id' => $city_id,
                    'pincode' => $pincode
                        //, 'status' => 1
                );

                $this->artist_model->insert($first_name, $last_name, $mobile, $email, $password, $country_id, $state_id, $city_id, $pincode);
                $counter++;
            } catch (Exception $ex) {
                
            }
        }
        $total = ($records - 1);
        $this->session->set_flashdata('message', $counter . " record(s) out of " . ($total == -1 ? 0 : $total) . " successfully imported.");
        redirect("artist");
    }

    public function export() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "artist_master.csv";
        $query = "select
                            first_name as 'First Name', 
                            last_name as 'Last Name',
                           mobile as 'Mobile' ,
                            email as 'Email ID' ,
                            password as 'Password',
                            country_name as 'Country Name', state_name as 'State Name', city_name as 'City Name' , 
                            pincode as 'Pincode'
                            FROM country_master as c, state_master as s, city_master as city, artist_master as artist,
                where and  artist.country_id=c.country_id AND artist.state_id=s.state_id AND artist.city_id=city.city_id ";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

    public function deletemultiple() {
        $artist_id = $_POST['artist_id'];
        $i = 0;
        while ($i < count($artist_id)) {
            if (isset($_POST['submit'])) {
                if ($this->artist_model->delete($artist_id[$i])) {
                    $this->session->set_flashdata('success', 'artist Detail Is Delete Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'artist Detail Is Not Delete. Please Try Again.');
                }
            }
            if (isset($_POST['submit1'])) {
                if ($this->artist_model->update_active($artist_id[$i])) {
                    $this->session->set_flashdata('success', 'artist Detail Is Activated Successfully..');
                }
            }
            if (isset($_POST['submit2'])) {
                if ($this->artist_model->update_deactive($artist_id[$i])) {
                    $this->session->set_flashdata('success', 'artist Detail Is Deactivated Successfully..');
                }
            }
            $i++;
        }
        redirect("artist");
    }

}
