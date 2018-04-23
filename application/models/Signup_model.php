<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	function signup($data) {

		// debug($data);
		if(empty($data['id'])) {
			array_pop($data);
			$query = $this->db->insert('user', $data);
		}else{
			// echo custom_decode($data['id']);
			// debug($data);
			$this->db->where('id',custom_decode($data['id']));
			$data['id']=custom_decode($data['id']);
			$query = $this->db->update('user', $data);
		}
		if($query){
			return true;	
		}else{			
			return false;
		}
	}

	function resetPass() {
		$post = $this->input->post();
		$this->db->where('email', $post['email']);
		$query = $this->db->get('shop_signup');
		if ($query->num_rows() == 1) {
			return true;
		}else{
			return false;
		}
	}

	function change_password() {
		$data = array(
			'password' => md5($_POST['newpassword']),
			);
		$this->db->where('email', $_POST['email']);
		$result = $this->db->update('shop_signup', $data);
		if ($result) {
			return true;
		}
		return false;
	}

	function deleteAccount() {
		
		$where = array(
			'id' =>$_POST['userid']
			);
		$data=array('user_id'=>$_POST['userid'],
			'reason'=>$_POST['reason']);
		$result = $this->db->delete('shop_signup', $where);
		if ($result) {
			$query = $this->db->insert('deleted_account', $data);
			return true;
		}
		return false;
	}	

}