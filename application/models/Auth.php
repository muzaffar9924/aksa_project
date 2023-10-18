<?php 
	
	class Auth extends CI_Model{

		/* User authorization function if session is set or not */
        public function authorizedUser(){
            $user = $this->session->userdata('result');
            if(!empty($user)){
                return true;
            }
            else{
                return false;
            }
        }

        // to register emp
        public function add_user($array){
       
            return $this->db->insert('employee_details',$array);
        }
	}
?>