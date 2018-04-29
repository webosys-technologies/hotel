<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/shop_model');
	}

	function shopList() {
		// $this->db->select('*');
		$query = $this->db->select('*')->from('shop_signup')->get();
		// debug($query);
		if ($query->num_rows() >=1) {
			$result = $query->result();
			return $result;
		}
		return false;	
	}

	function shop(){

		$query = $this->db->select('*')->from('shop_list')->get();
		// debug($query);
		if ($query->num_rows() >=1) {
			$result = $query->result();
			return $result;
		}
		return false;	
	}

	function deleteAccount($value) {

		$where = array(
			'id' =>custom_decode($value)
			);
		$result = $this->db->delete('shop_list', $where);
		// debug($result);
		if ($result) {
			return true;
		}
		return false;
	}

	function deleteuser($value) {

			
		$where = array(
			'id' =>custom_decode($value)
			);

		$result = $this->db->delete('shop_signup', $where);
		if ($result) {
			return true;
		}
		return false;
	}

	function addShop($value) {

		if(empty($value['id'])) {
			array_pop($value);
			$query = $this->db->insert('shop_list', $value);
		}else{
			$this->db->where('id',$value['id']);
			$query = $this->db->update('shop_list', $value);
		}
		// debug($query);
		if($query) {			
			return true;
		}else{
			return false;
		}
	}


	function addnewuser($value) {

		$activation_code = random_code();
		$where = array(
			'verified_status' => 0,
			'username' => $value['name'],
			'password' => md5($value['password']),
			'activation_code' => $activation_code,
			'email' => $value['name'],
			'phone' => $value['mobileno'],
			'created_at' => updated_at(),
			'is_admincreated'=>1
			);
		$query = $this->db->insert('shop_signup', $where);
		if($query) {		
			return true;	
		}else{
			return false;
		}
		
	}
}