<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Opration extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		/* Loading AuthModel */
		$this->load->model('Auth');

		$this->load->model('TaskModel');
	}
	public function index()
	{

		$this->load->view('dashbord');
	}

	public function add_task()
	{
		if (isset($_POST['submit'])) {
			// user double submitted 
			if (empty($_POST["assign_to"])) {
				$emp_name = $this->input->post('name');
			} else {
				$emp_name = $this->input->post('assign_to');
			}

			if (empty($_POST["assign_to"])) {
				$assign_by = '';
			} else {
				$assign_by = $this->input->post('name');
			}

			$assign_to = $this->input->post('assign_to');

			$company = $this->input->post('company');

			$project_name = $this->input->post('project_name');

			$task_name = $this->input->post('task');

			$task_desc = $this->input->post('task_desc');

			$work_status = $this->input->post('work_status');

			$allocation_date = $this->input->post('allocation_date');


			if (empty($_POST["start_date"])) {
				$date_start = NULL;
			} else {
				$date_start = strtotime($_POST["start_date"]);
				$date_start = date("Y-m-d", $date_start);
			}

			// if (empty($_POST["start_time"]))
			// {      
			//   $start_time = NULL;
			// }
			// else
			// {
			// $start_time = strtotime($_POST["start_time"]);
			//    $start_time = date("H:i:s", $start_time);
			// }

			$start_time = $this->input->post('start_time');
			if (empty($_POST["end_date"])) {
				$date_ends = NULL;
			} else {
				$date_ends = strtotime($_POST["end_date"]);
				$date_ends = date("Y-m-d H:i:s", $date_ends);
			}

			// if (empty($_POST["end_time"]))
			// {      
			//   $end_time = NULL;
			// }
			// else
			// {
			// $end_time = strtotime($_POST["end_time"]);
			//    $end_time = date('H:i:s', time($end_time));
			// }   
			$end_time = $this->input->post('end_time');

			$query = $this->db->query("INSERT INTO `employee_task`(
					`assign_by`,
					`assign_to`,
					`emp_name`, 
					`company_name`,
					`project_name`, 
					`task_desc`, 
					`task_name`, 
					`allocation_date`,
					`start_date`,
					`start_time`,
					`end_date`, 
					`end_time`,
					`work_status`)
			 VALUES 
			 (
				'$assign_by',
				'$assign_to',
				'$emp_name',
				'$company', 
				'$project_name',
				'$task_desc', 
				'$task_name',
				'$allocation_date',
				'$date_start',
				'$start_time',
				'$date_ends',
				'$end_time',
				'$work_status')");

			// echo "<pre>";
			// print_r($query);
			// die();
			redirect('admin_view_tasks');
		}
		$empData = $this->session->userdata('result');
		$data['empData'] = $empData;
		// echo "<pre>";
		// print_r($empData);
		// echo "</pre>";
		// die();
		$this->load->view('admin/operation/add_task', $data);
	}



	public function view_task()
	{
		if ($this->Auth->authorizedUser() == false) {
			/* If someone tries to access the dashboard without login */
			// $this->session->set_flashdata('errorMsg','Plese login to access dashboard!');
			redirect(base_url() . 'login/login_form');
		} else {

			$empData = $this->session->userdata('result');
			$data['empData'] = $empData;
			$emp_name = $empData['name'];

			$select_query = $this->db->query("SELECT * FROM `employee_task` where `emp_name` = '$emp_name'  ORDER BY `user_id` DESC");

			$data['result'] = $select_query->result_array();

			// $data = result_array($data);
			// echo "<pre>";
			// print_r($data);

			// die();
			$select_pending = $this->db->query("SELECT * FROM `employee_task` WHERE `emp_name` = '$emp_name' AND `work_status`='Pending'");

			$select_onprogress = $this->db->query("SELECT * FROM `employee_task` WHERE `emp_name` = '$emp_name' AND  `work_status`='In-progress'");

			$select_complete = $this->db->query("SELECT * FROM `employee_task` WHERE `emp_name` = '$emp_name' AND  `work_status`='Completed'");

			$data['pending'] = $select_pending->num_rows();
			$data['onprogress'] = $select_onprogress->num_rows();
			$data['completed'] = $select_complete->num_rows();

			$this->load->view('view_task', $data);
		}
	}


	public function edit_form($user_id)
	{

		if ($this->Auth->authorizedUser() == false) {
			/* If someone tries to access the dashboard without login */
			// $this->session->set_flashdata('errorMsg','Plese login to access dashboard!');
			redirect(base_url() . 'login/login_form');
		} else {


			$empData = $this->session->userdata('result');
			$data['empData'] = $empData;

			$query = $this->db->query("SELECT * FROM `employee_task` WHERE  `user_id`='$user_id'");

			$data['result'] = $query->result_array();

			// $data['user_id'] = $user_id;

			$this->load->view('edit_form', $data);
		}
	}



	public function edit_form_post()
	{
		if ($this->Auth->authorizedUser() == false) {
			/* If someone tries to access the dashboard without login */
			// $this->session->set_flashdata('errorMsg','Plese login to access dashboard!');
			redirect(base_url() . 'login/login_form');
		} else {


			$task_name = $this->input->post('task');
			// $start_date = date('Y-m-d', strtotime($_POST['start_date']));
			// $end_date = date('Y-m-d', strtotime($_POST['end_date']));
			// $end_date = $this->input->post('end_date');
			// $start_date = date('dd-mm-yy', strtotime($this->input->post('start_date')));
			// $end_date = date('dd-mm-yy', strtotime($this->input->post['end_date']));


			$emp_name = $this->input->post('name');
			$company = $this->input->post('company');

			$task_name = $this->input->post('task');

			$work_status = $this->input->post('work_status');

			$allocation_date = $this->input->post('allocation_date');
			// $start_date = htmlentities($_POST['start_date']);
			// $date_start = date('Y-m-d', strtotime($start_date));

			// $start_time = $this->input->post('start_time');

			// $end_date = htmlentities($_POST['end_date']);
			// $date_ends = date('Y-m-d', strtotime($end_date));

			if (empty($_POST["start_date"])) {
				$date_start = NULL;
			} else {
				$date_start = strtotime($_POST["start_date"]);
				$date_start = date("Y-m-d H:i:s", $date_start);
			}

			// $start_date = htmlentities($_POST['start_date']);
			// $date_start = date('Y-m-d', strtotime($start_date));

			$start_time = $this->input->post('start_time');
			// $s_time = date("h:i:s a");


			if (empty($_POST["end_date"])) {
				$date_ends = NULL;
			} else {
				$date_ends = strtotime($_POST["end_date"]);
				$date_ends = date("Y-m-d H:i:s", $date_ends);
			}


			$end_time = $this->input->post('end_time');
			$user_id = $this->input->post('user_id');


			$query = $this->db->query("UPDATE `employee_task` SET `emp_name`='$emp_name',`company_name`='$company',`task_name`='$task_name',`allocation_date`='$allocation_date',`start_date`='$date_start',`start_time`='$start_time',`end_date`='$date_ends',`end_time`='$end_time',`work_status`='$work_status' WHERE `user_id`= $user_id");

			if ($query) {
				$this->session->set_flashdata('update', 'yes');
				$_SESSION['status'] = "Data updated successfully";
				$_SESSION['status_code'] = "success";
				redirect("task/view_task");
			} else {
				$this->session->set_flashdata('update', 'yes');
				$_SESSION['status'] = "Data not updated";
				$_SESSION['status_code'] = "error";
				redirect("task/view_task");
			}
		}
	}

	function delete_blog()
	{

		// print_r($_POST);
		if (isset($_POST['user_id'])) {


			$user_id = $_POST['user_id'];

			$query = $this->db->query("DELETE FROM `employee_task` WHERE user_id='$user_id'");

			if ($query) {
				echo "deleted";
			} else {
				echo "notdeleted";
			}

			// $_SESSION['status1'] = "Data updated successfully";
			//     	    $_SESSION['status_code1'] = "success";
		}
	}



	function assign_task()
	{

		// $auto_delete = $this->db->query("DELETE FROM `employee_task` WHERE work_status='complete'<=DATE_SUB(NOW(), INTERVAL 1 DAY)");


		if ($this->Auth->authorizedUser() == false) {
			/* If someone tries to access the dashboard without login */
			// $this->session->set_flashdata('errorMsg','Plese login to access dashboard!');
			redirect(base_url() . 'login/login_form');
		} else {

			$empData = $this->session->userdata('result');
			$data['empData'] = $empData;
			$emp_name = $empData['name'];

			$select_query = $this->db->query("SELECT * FROM `employee_task` ORDER BY `user_id` DESC");

			$data['result'] = $select_query->result_array();

			// print_r($start_date);
			// echo "<pre>";
			// die();
			$select_pending = $this->db->query("SELECT * FROM `employee_task` WHERE   `work_status`='Pending'");

			$select_onprogress = $this->db->query("SELECT * FROM `employee_task` WHERE   `work_status`='In-progress'");

			$select_complete = $this->db->query("SELECT * FROM `employee_task` WHERE   `work_status`='Completed'");

			$data['pending'] = $select_pending->num_rows();
			$data['onprogress'] = $select_onprogress->num_rows();
			$data['completed'] = $select_complete->num_rows();
			$this->load->view('admin/operation/assign_task', $data);
		}
	}

	function task_assign_to()
	{
		if (isset($_POST['submit'])) {
			// user double submitted 

			$assign_by = $this->input->post('assign_by');

			$emp_name = $this->input->post('employee_name');

			$company = $this->input->post('company');

			$task_name = $this->input->post('task');

			$work_status = $this->input->post('work_status');

			$allocation_date = htmlentities($_POST['allocation_date']);
			$date_allocation = date('Y-m-d', strtotime($allocation_date));

			// deadline
			if (empty($_POST["deadline"])) {
				$deadline = NULL;
			} else {
				$deadline = strtotime($_POST["deadline"]);
				$deadline = date("Y-m-d H:i:s", $deadline);
			}
			/////
			if (empty($_POST["start_date"])) {
				$date_start = NULL;
			} else {
				$date_start = strtotime($_POST["start_date"]);
				$date_start = date("Y-m-d", $date_start);
			}

			// if (empty($_POST["start_time"]))
			// {      
			//   $start_time = NULL;
			// }
			// else
			// {
			// $start_time = strtotime($_POST["start_time"]);
			//    $start_time = date("H:i:s", $start_time);
			// }

			$start_time = $this->input->post('start_time');
			if (empty($_POST["end_date"])) {
				$date_ends = NULL;
			} else {
				$date_ends = strtotime($_POST["end_date"]);
				$date_ends = date("Y-m-d H:i:s", $date_ends);
			}

			// if (empty($_POST["end_time"]))
			// {      
			//   $end_time = NULL;
			// }
			// else
			// {
			// $end_time = strtotime($_POST["end_time"]);
			//    $end_time = date('H:i:s', time($end_time));
			// }   
			$end_time = $this->input->post('end_time');

			// $start_date = htmlentities($_POST['start_date']);
			// $date_start = date('Y-m-d', strtotime($start_date));

			// $query = $this->db->query("INSERT INTO `employee_task`(`assign_by`,`assign_to`,`emp_name`, `company_name`, `task_name`, `allocation_date`, `start_date`, `start_time`,`end_date`, `end_time`,`deadline`, `work_status`) VALUES ('$assign_by','$assign_to','$emp_name','$company','$task_name','$allocation_date','$date_start','$start_time','$date_ends','$end_time','$deadline','$work_status')");

			$query = $this->db->query("INSERT INTO `employee_task`(`assign_by`,`assign_to`,`emp_name`, `company_name`, `task_name`,`allocation_date`, `end_date`, `end_time`,`deadline`, `work_status`) VALUES ('$assign_by','$emp_name','$emp_name','$company','$task_name','$date_allocation','$date_ends','$end_time','$deadline','$work_status')");

			redirect('assign_task');
		}
	}

	function delete_assign_task()
	{

		// print_r($_POST);
		if (isset($_POST['user_id'])) {


			$user_id = $_POST['user_id'];

			$query = $this->db->query("DELETE FROM `employee_task` WHERE user_id='$user_id'");

			if ($query) {
				echo "deleted";
			} else {
				echo "notdeleted";
			}

			// $_SESSION['status1'] = "Data updated successfully";
			//     	    $_SESSION['status_code1'] = "success";
		}
	}


	///
	function pendingTask()
	{

		$empData = $this->session->userdata('result');
		$userName = $empData['name'];

		$data['result'] = $this->TaskModel->pendingTask($userName);

		$empData = $this->session->userdata('result');

		$data['empData'] = $empData;
		$emp_name = $empData['name'];

		$data['pending'] = $this->TaskModel->viewPendingTask($userName);
		$data['In_progress'] = $this->TaskModel->viewInprogressTask($userName);
		$data['Completed'] = $this->TaskModel->viewCompleteTask($userName);

		$this->load->view('pending_task', $data);
	}

	function inprogressTask()
	{

		$empData = $this->session->userdata('result');
		$userName = $empData['name'];

		$data['result'] = $this->TaskModel->inprogressTask($userName);

		$empData = $this->session->userdata('result');

		$data['empData'] = $empData;
		$emp_name = $empData['name'];

		$data['pending'] = $this->TaskModel->viewPendingTask($userName);
		$data['In_progress'] = $this->TaskModel->viewInprogressTask($userName);
		$data['Completed'] = $this->TaskModel->viewCompleteTask($userName);

		$this->load->view('inprogress_task', $data);
	}

	function completedTask()
	{

		$empData = $this->session->userdata('result');
		$userName = $empData['name'];

		$data['result'] = $this->TaskModel->completedTask($userName);

		$empData = $this->session->userdata('result');

		$data['empData'] = $empData;
		$emp_name = $empData['name'];

		$data['pending'] = $this->TaskModel->viewPendingTask($userName);
		$data['In_progress'] = $this->TaskModel->viewInprogressTask($userName);
		$data['Completed'] = $this->TaskModel->viewCompleteTask($userName);

		$this->load->view('completed_task', $data);
	}


	///assign task
	function assignPendingTask()
	{

		$empData = $this->session->userdata('result');

		$userName = $empData['name'];

		$data['result'] = $this->db->get_where('employee_task', array('work_status' => 'Pending')); //->result_array()

		echo '<pre>';

		print_r($data['result']->num_rows());
		exit;
		$empData = $this->session->userdata('result');

		$data['empData'] = $empData;
		$emp_name = $empData['name'];

		$data['pending'] = $this->TaskModel->assignviewPendingTask($userName);
		$data['In_progress'] = $this->TaskModel->assignviewInprogressTask($userName);
		$data['Completed'] = $this->TaskModel->assignviewCompletedTask($userName);

		$this->load->view('admin/operation/assign_pending_task', $data);
	}


	function assignInprogressTask()
	{

		$empData = $this->session->userdata('result');
		$userName = $empData['name'];

		$data['result'] = $this->TaskModel->assignInprogressTask($userName);

		$empData = $this->session->userdata('result');

		$data['empData'] = $empData;
		$emp_name = $empData['name'];

		$data['pending'] = $this->TaskModel->assignviewPendingTask($userName);
		$data['In_progress'] = $this->TaskModel->assignviewInprogressTask($userName);
		$data['Completed'] = $this->TaskModel->assignviewCompletedTask($userName);

		$this->load->view('assign_inprogress_task', $data);
	}

	function assignCompletedTask()
	{

		$empData = $this->session->userdata('result');
		$userName = $empData['name'];

		$data['result'] = $this->TaskModel->assignCompletedTask($userName);

		$empData = $this->session->userdata('result');

		$data['empData'] = $empData;
		$emp_name = $empData['name'];

		$data['pending'] = $this->TaskModel->assignviewPendingTask($userName);
		$data['In_progress'] = $this->TaskModel->assignviewInprogressTask($userName);
		$data['Completed'] = $this->TaskModel->assignviewCompletedTask($userName);

		$this->load->view('assign_complete_task', $data);
	}
}
