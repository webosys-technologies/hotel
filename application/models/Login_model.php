<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	function login() {
		
		$username = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $username,
			'password' => $password,
			);
		$this->db->where($where);
		$query = $this->db->get('user');
		if ($query->num_rows() == 1) {
			$result = $query->row_array();
			// debug($result);
			if($result['isverified']=='0'){
				// set_flashdata('message', "Oops! Your account is not verified Please contact Admin.", 'danger');
				return $result;	
			}else{
				$session_data = array(
					'userid' => $result['id'],
					'email'=>$result['email'],
					'name'=>$result['fname']." ".$result['lname'],
					'logged_in' => 1
					); 
				set_sessions($session_data);
				return true;
			}
		}
		return false;
	}

	function login_otp() {
		
		$username = $this->input->post('email');
		$otp = $this->input->post('otp');
		$where = array(
			'phone' => $username,
			'otp' => $otp,
			);
		$this->db->where($where);
		$query = $this->db->get('user');
		if ($query->num_rows() == 1) {
			$result = $query->row_array();
			// debug($result);
			if($result['isverified']=='1'){
				set_flashdata('message', "Oops! Your account is not verified Please contact Admin.", 'danger');
				return $result;	
			}else{
				$session_data = array(
					'userid' => $result['id'],
					'email'=>$result['email'],
					'name'=>$result['fname']." ".$result['lname'],
					'logged_in' => 1
					); 
				set_sessions($session_data);
				return true;
			}
		}
		else{
			$send_otp=$this->session->userdata('otp');
			$send_mobile=$this->session->userdata('mobile');
			if($send_mobile==$username)
			{
				if ($send_otp==$otp) {
					
				$session_data = array(
					'logged_in' => 1
					); 
				set_sessions($session_data);
				set_flashdata('message','login successfully');
				return false;
				}
				else{
					set_flashdata('message','Otp Does not match');
					return false;
				}

			}else{
				set_flashdata('message','Mobile no not matched');
				return false;
			}
		}
		return false;
	}

	function user_data($id)
	{
		$this->db->from('user');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->row();
	}
}