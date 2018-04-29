<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Productlist extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/login_model');
	}

	function getProduct() {

		$query = $this->db->select('*')->from('product')->get();
		// debug($query);
		if ($query->num_rows() >=1) {
			$result = $query->result();
			return $result;
		}
		return false;	
	}
}