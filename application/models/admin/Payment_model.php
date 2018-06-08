<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
  * 
  */
 class Payment_model extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();	
 	}

 	function getall_list()
 	{
 		$this->db->from('payments');
 		$query= $this->db->get();
 		return $query->result();
 	}
 } 


 ?>