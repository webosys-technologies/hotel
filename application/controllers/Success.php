<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Success extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('placeorder');
		
	}

	public function index($id)
	{
		// echo $id;
		if(isset($id) && $id !="")
		{
			$result = $this->placeorder->getorders(custom_decode($id));
                        
		}
		if($result){
			$this->data['orderdata']=$result;
		}
		$this->load->view('ordersuccess',$this->data);
	}

}