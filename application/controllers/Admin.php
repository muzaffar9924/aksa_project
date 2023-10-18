<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

   public function index()
   {
      if(isset($_SESSION['id'])){
         redirect('dashbord');
      }

      $data=[];
      if(isset($_SESSION['error'])){

         // die($_SESSION['error']);
         $data['error'] = $_SESSION['error'];
      }
      else{
         $data['error'] = 'NO_ERROR';
      }
      $this->load->view('admin/admin_login',$data);
    }
   

   

   public function admin_login(){
     // print_r($_POST);
 
      if(isset($_POST)){
         // $username = $_POST['username'];
         // $password = $_POST['password'];
         $username = $this->input->post('email');
         $password = $this->input->post('password');

         $query = $this->db->query("SELECT * FROM `admin` WHERE `username` ='$username' AND `password` = '$password'");

        if ($query->num_rows()) {

            // credintial are valid
            $result = $query->result_array();

            // /* Storing user details */
            $sessionArray['id'] = $result[0]['id'];
            $sessionArray['name'] = $result[0]['username'];
            // $sessionArray['email'] = $result[0]['password'];

            // echo '<pre>';
            // print_r($sessionArray);
            // echo '</pre>';
            // die();
            $this->session->set_userdata('result',$sessionArray);

            redirect('Admin_task/view_admin');
         }
         else{ 
            // credential are invalid

            $this->session->set_flashdata('error', 'Invalid Username and Password');
            redirect('admin');

         }



      }
      else{
         die('Invalid Username and Password');
      }
    }

     public function logout(){
      session_destroy();

      redirect('admin');
    }



}
