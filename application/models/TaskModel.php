
<?php 
	
	class TaskModel extends CI_Model{

        public function pendingTask($userName){
            $this->db->select('*');
            $this->db->from('employee_task');
            $this->db->where('work_status', 'Pending');
            $this->db->where('emp_name', $userName);
            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
        }

        public function inprogressTask($userName){
            $this->db->select('*');
            $this->db->from('employee_task');
            $this->db->where('work_status', 'In-progress');
            $this->db->where('emp_name', $userName);
            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
        }

        public function completedTask($userName){
            $this->db->select('*');
            $this->db->from('employee_task');
            $this->db->where('work_status', 'Completed');
            $this->db->where('emp_name', $userName);
            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
        }


        public function viewPendingTask($userName){
            $this->db->select('*');
            $this->db->from('employee_task');
            $this->db->where('work_status', 'Pending');
            $this->db->where('emp_name', $userName);
            $queryPending = $this->db->get();
            $result = $queryPending->num_rows();
            return $result;
        }
        public function viewInprogressTask($userName){
            $this->db->select('*');
            $this->db->from('employee_task');
            $this->db->where('work_status', 'In-progress');
            $this->db->where('emp_name', $userName);
            $queryPending = $this->db->get();
            $result = $queryPending->num_rows();
            return $result;
        }
        public function viewCompleteTask($userName){
            $this->db->select('*');
            $this->db->from('employee_task');
            $this->db->where('work_status', 'Completed');
            $this->db->where('emp_name', $userName);
            $queryPending = $this->db->get();
            $result = $queryPending->num_rows();
            return $result;
        }


        //Assign task
        public function assignPendingTask($userName){
            $this->db->select('*');
            $this->db->from('employee_task');
            $this->db->where('work_status', 'Pending');
            $this->db->where('assign_by', $userName);
            $queryAssign = $this->db->get();
            $result = $queryAssign->result_array();
            return $result;
        }
        public function assignInprogressTask($userName){
            $this->db->select('*');
            $this->db->from('employee_task');
            $this->db->where('work_status', 'In-progress');
            $this->db->where('assign_by', $userName);
            $queryAssign = $this->db->get();
            $result = $queryAssign->result_array();
            return $result;
        }
        public function assignCompletedTask($userName){
            $this->db->select('*');
            $this->db->from('employee_task');
            $this->db->where('work_status', 'Completed');
            $this->db->where('assign_by', $userName);
            $queryAssign = $this->db->get();
            $result = $queryAssign->result_array();
            return $result;
        }

        public function assignviewPendingTask($userName){
            $this->db->select('*');
            $this->db->from('employee_task');
            $this->db->where('work_status', 'Pending');
            $this->db->where('assign_by', $userName);
            $AssignQueryPending = $this->db->get();
            $result = $AssignQueryPending->num_rows();
            return $result;
        }
        public function assignviewInprogressTask($userName){
            $this->db->select('*');
            $this->db->from('employee_task');
            $this->db->where('work_status', 'In-progress');
            $this->db->where('assign_by', $userName);
            $AssignQueryPending = $this->db->get();
            $result = $AssignQueryPending->num_rows();
            return $result;
        }
        public function assignviewCompletedTask($userName){
            $this->db->select('*');
            $this->db->from('employee_task');
            $this->db->where('work_status', 'Completed');
            $this->db->where('assign_by', $userName);
            $AssignQueryPending = $this->db->get();
            $result = $AssignQueryPending->num_rows();
            return $result;
        }
		
	}
?>