<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/client_model');
	}

	public function index()
	{
		$result = $this->client_model->gethotelListfront("",3,0);
		// debug($result);
		if($result)
		{
			$this->data['hoteldata']=$result;
		}else{
			$this->data['hoteldata']=array();
		}
		$this->load->view('home',$this->data);
	}

	public function contact()
	{
		$this->load->view('contact');
	}

	public function about()
	{
		$this->load->view('about');
	}


	function logout() {
		unset_login_sessions();
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
