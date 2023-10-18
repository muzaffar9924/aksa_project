<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_task extends CI_Controller{

	public function index(){
		$this->load->view('admin/admin_view');
	}

	public function assign_task(){

		if(isset($_POST['submit'])){
		    // user double submitted 
		
			$assign_by = $this->input->post('assign_by');

			$emp_name = $this->input->post('employee_name');

			$company = $this->input->post('company');

			$task_name = $this->input->post('task');

			$work_status = $this->input->post('work_status');
			
			$allocation_date = htmlentities($_POST['allocation_date']);
	        $date_allocation = date('Y-m-d', strtotime($allocation_date));

	        // $start_date = htmlentities($_POST['start_date']);
	        // $date_start = date('Y-m-d', strtotime($start_date));


	        // deadline
	        if (empty($_POST["deadline"]))
		    {      
		      $deadline = NULL;
		    }
		    else
		    {
		       $deadline = strtotime($_POST["deadline"]);
		       $deadline = date("Y-m-d H:i:s", $deadline);
		    }


		    // start date
		      if (empty($_POST["start_date"]))
		    {      
		      $date_start = NULL;
		    }
		    else
		    {
		       $date_start = strtotime($_POST["start_date"]);
		       $date_start = date("Y-m-d H:i:s", $date_start);
		    }

		    
	        $start_time = $this->input->post('start_time');


	        if (empty($_POST["end_date"]))
		    {      
		      $date_ends = NULL;
		    }
		    else
		    {
		       $date_ends = strtotime($_POST["end_date"]);
		       $date_ends = date("Y-m-d H:i:s", $date_ends);
		    }

	        $end_time = $this->input->post('end_time');

	        $query = $this->db->query("INSERT INTO `employee_task`(`assign_by`,`emp_name`, `company_name`, `task_name`, `allocation_date`,`start_date`, `start_time`,`end_date`, `end_time`,`deadline`,`work_status`) VALUES ('$assign_by','$emp_name','$company','$task_name','$allocation_date','$date_start','$start_time','$date_ends','$end_time','$deadline','$work_status')");

	        redirect('admin_task/view_admin');
    	}
    	// $empData = $this->session->userdata('result');
		// $data['empData'] = $empData;

		// echo "<pre>";
		// print_r($empData);
		// echo "</pre>";
		// die();


		// $this->load->view('add_task',$data);
	}

	// admin view
	public function view_admin(){

		 $select_query = $this->db->query("SELECT * FROM `employee_task` where 1 ORDER BY `user_id` DESC");

        $data['result'] = $select_query->result_array();

		$select_pending = $this->db->query("SELECT * FROM `employee_task` WHERE `work_status`='Pending'");

        $select_onprogress = $this->db->query("SELECT * FROM `employee_task` WHERE  `work_status`='In-progress'");

        $select_complete = $this->db->query("SELECT * FROM `employee_task` WHERE  `work_status`='Completed'");

        $data['pending'] = $select_pending->num_rows();
        $data['onprogress'] = $select_onprogress->num_rows();
        $data['complete'] = $select_complete->num_rows();
		
		$this->load->view('admin/view_admin',$data);
	}


		public function edit_form($user_id){
		    
		    $empData = $this->session->userdata('result');
		    $data['empData'] = $empData;
			
			$query = $this->db->query("SELECT * FROM `employee_task` WHERE  `user_id`='$user_id'");

			$data['result'] = $query->result_array();

			// $data['user_id'] = $user_id;

			$this->load->view('admin/admin_edit_form',$data);
		}

		public function edit_form_post(){

			$task_name = $this->input->post('task');
        // $start_date = date('Y-m-d', strtotime($_POST['start_date']));
        // $end_date = date('Y-m-d', strtotime($_POST['end_date']));
        // $end_date = $this->input->post('end_date');
		  // $start_date = date('dd-mm-yy', strtotime($this->input->post('start_date')));
        // $end_date = date('dd-mm-yy', strtotime($this->input->post['end_date']));

        
			$emp_name = $this->input->post('emp_name');
			$company = $this->input->post('company');

			$task_name = $this->input->post('task');

			$work_status = $this->input->post('work_status');
			
			$allocation_date = htmlentities($_POST['allocation_date']);
	        $date_allocation = date('Y-m-d', strtotime($allocation_date));

	        // $start_date = htmlentities($_POST['start_date']);
	        // $date_start = date('Y-m-d', strtotime($start_date));
	        if (empty($_POST["start_date"]))
		    {      
		      $date_start = NULL;
		    }
		    else
		    {
		       $date_start = strtotime($_POST["start_date"]);
		       $date_start = date("Y-m-d H:i:s", $date_start);
		    }

	        $start_time = $this->input->post('start_time');

	        // $end_date = htmlentities($_POST['end_date']);
	        // $date_ends = date('Y-m-d', strtotime($end_date));

	        if (empty($_POST["end_date"]))
		    {      
		      $date_ends = NULL;
		    }
		    else
		    {
		       $date_ends = strtotime($_POST["end_date"]);
		       $date_ends = date("Y-m-d H:i:s", $date_ends);
		    }

	        $end_time = $this->input->post('end_time');
	        $user_id = $this->input->post('user_id');


         $query = $this->db->query("UPDATE `employee_task` SET `emp_name`='$emp_name',`company_name`='$company',`task_name`='$task_name',`allocation_date`='$date_allocation',`start_date`='$date_start',`start_time`='$start_time',`end_date`='$date_ends',`end_time`='$end_time',`work_status`='$work_status' WHERE `user_id`= $user_id");

        if($query){
        	$this->session->set_flashdata('update', 'yes');
        	$_SESSION['status'] = "Data updated successfully";
    	    $_SESSION['status_code'] = "success";
        	redirect("admin_task/view_admin");
        }
        else{
        	$this->session->set_flashdata('update', 'yes');
        	$_SESSION['status'] = "Data not updated";
    	    $_SESSION['status_code'] = "error";
        	redirect("admin_task/view_admin");
        }
		}

		function delete_blog(){

	    // print_r($_POST);
            if(isset($_POST['user_id'])){
                
         
			$user_id = $_POST['user_id'];

			$query = $this->db->query("DELETE FROM `employee_task` WHERE user_id='$user_id'");

			if ($query) {
				echo "deleted";
			}else{
				echo "notdeleted";
			}
			
				// $_SESSION['status1'] = "Data updated successfully";
            //     	    $_SESSION['status_code1'] = "success";
			}
	 }
}