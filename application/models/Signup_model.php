<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	function signup($data) {
      
		$this->db->insert('user', $data);
		return $this->db->insert_id();
	}

	function user_update($where,$data) {
      
		$this->db->update('user', $data,$where);
		return $this->db->affected_rows();
	}

	function owner_signup($data) {
      
		
               $this->db->from('hotel_owner');
               $this->db->where('email',$data['email']);
               $this->db->or_where('phone',$data['phone']);
               $res=$this->db->get();
               $num=$res->num_rows();
               if($num>0)
               {
                 
                   return false;
               }else{
                    
		$this->db->insert('hotel_owner', $data);
		return $this->db->insert_id();
               }
               
	}

	function owner_update($where,$data) {
      
		$this->db->update('hotel_owner', $data,$where);
		return $this->db->affected_rows();
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