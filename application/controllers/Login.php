<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

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
    	$this->load->view('login',$data);
    }
	

	

	public function login_form(){
      // print_r($_POST);

      if(isset($_POST)){
         // $username = $_POST['username'];
         // $password = $_POST['password'];
         $username = $this->input->post('email');
         $password = $this->input->post('password');

         $query = $this->db->query("SELECT * FROM `employee_details` WHERE `username` ='$username' AND `password` = '$password'");

        if ($query->num_rows()) {

            // credintial are valid
            $result = $query->result_array();

            // /* Storing user details */
            $sessionArray['id'] = $result[0]['emp_id'];
            $sessionArray['name'] = $result[0]['e_name'];
            $sessionArray['email'] = $result[0]['username'];

            // echo '<pre>';
            // print_r($sessionArray);
            // echo '</pre>';
            // die();
            $this->session->set_userdata('result',$sessionArray);
            
            redirect(base_url().'task/view_task');
            // redirect('task/view_task');
         }
         else{
            // credential are invalid

            $this->session->set_flashdata('error', 'Invalid Username and Password');
            redirect('login');

         }

      }
      else{
         die('Invalid Username and Password');
      }
    }

     public function logout(){
      session_destroy();

      redirect('login');
    }

    public function register(){
      $this->load->view('register');
    }

    public function register_data(){

      // $post= $this->input->post(); 
      //  print_r($post);
      //  die();

      if($post= $this->input->post() ){
          $post= $this->input->post(); 
         //  print_r($post); 
         //  die();
          $this->load->model('auth');
          if($this->auth->add_user($post)){
              $this->session->set_flashdata('user_added','Employee added successfully..');
              $this->session->set_flashdata('user_class','alert-success');
          }
          else{
              $this->session->set_flashdata('user_added','Employee Not added please try again');
              $this->session->set_flashdata('user_class','alert-danger');

          }
          return redirect('login');
        
      }
      else{
          return redirect('login/register');
      }
  }
}
?>



