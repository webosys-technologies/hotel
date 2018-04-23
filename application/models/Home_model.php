<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function search_result(){
		// debug($_POST);
		if(!empty($_POST)){
			$_SESSION['data']=$_POST;
		}
		
		// debug($_SESSION['data']['search']);
		$this->db->select('*'); 
		$this->db->from('shop_list');
		$this->db->like('lat', $_SESSION['data']['lat']);  
		$this->db->or_like('lon', $_SESSION['data']['lon']);
		// $this->db->or_where('lon', $_POST['lon']);
		$this->db->or_like('name', $_SESSION['data']['search']);
		$this->db->or_like('city', $_SESSION['data']['search']);
		$this->db->or_like('country', $_SESSION['data']['search']);
		
		// debug($this->db->get()->result());
		return $this->db->get()->result();
	}

	public function getshopbyid($data){

		

		$data = array(
			'id' =>base64_decode($data)
			);
		// debug($data);		
		$this->db->where($data);
		$query = $this->db->get('shop_list');
		return $query->result_array();
		
	}
}