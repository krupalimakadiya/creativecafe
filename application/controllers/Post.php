<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('art_category_model');
        $this->load->model('post_model');
        $this->load->model('artist_model');
    }

    public function index() {
        $data['art_category_list'] = $this->art_category_model->getart_categorylist();
        $data['post_list'] = $this->post_model->getpostlist();
        $data['artist_list'] = $this->artist_model->getartistlist();
        $this->load->view('v_post_view', $data);
    }

    public function import() {
        $this->load->view('import_post');
    }

    public function delete($post_id) {
        $this->post_model->delete($post_id);
        $this->session->set_flashdata('message', 'record deleted successfully...');
        redirect("post");
    }

    public function update_status_active($post_id) {
        $post_status = $this->input->get('post_status');
        $this->post_model->update_active($post_id, $post_status);
        redirect('post');
    }

    public function update_status_deactive($post_id) {
        $post_status = $this->input->get('post_status');
        $this->post_model->update_deactive($post_id, $post_status);
        redirect('post');
    }

    /*public function importp() {
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
              $art_category_id=trim($filesop[2]);
              if(strlen($art_category_id)<0)
              {
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
              //  $category_data=$this->artist_model->getcategoryid($art_category_id);
              $country_id = $country_data['country_id'];
              $state_id = $state_data['state_id'];
              $city_id = $city_data['city_id'];
              //  $art_category_id=$category_data['art_category_id'];
              try {
              $param = array(
              'first_name' => $first_name,
              'last_name' => $last_name,
              //      'art_category_id'=>$art_category_id,
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
        }
    }*/

    /* public function export() {
      $this->load->dbutil();
      $this->load->helper('file');
      $this->load->helper('download');
      $delimiter = ",";
      $newline = "\r\n";
      $filename = "post_master.csv";
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
      } */

    public function deletemultiple() {
        $post_id = $_POST['post_id'];
        $i = 0;
        while ($i < count($post_id)) {
            if (isset($_POST['submit'])) {

                if ($this->post_model->delete($post_id[$i])) {
                    $this->session->set_flashdata('success', 'artist Detail Is Delete Successfully..');
                } else {
                    $this->session->set_flashdata('fail', 'artist Detail Is Not Delete. Please Try Again.');
                }
            }
            if (isset($_POST['submit1'])) {
                $this->post_model->update_active($post_id[$i]);
                $this->session->set_flashdata('success', 'artist Detail Is Activated Successfully..');
            }
            if (isset($_POST['submit2'])) {
                $this->post_model->update_deactive($post_id[$i]);
                $this->session->set_flashdata('success', 'artist Detail Is Deactivated Successfully..');
            }
            $i++;
        }
        redirect("post");
    }

}
?>