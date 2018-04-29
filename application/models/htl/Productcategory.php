<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Productcategory extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/login_model');
	}

	function getCategory() {

		$query = $this->db->select('*')->from('category')->get();
		// debug($query);
		if ($query->num_rows() >=1) {
			$result = $query->result();
			return $result;
		}
		return false;	
	}
}