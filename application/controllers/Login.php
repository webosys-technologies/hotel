<?php

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index() {

		if(!isset($_SESSION['userid'])){
			$this->load->view('login');
		}else{
			redirect(base_url());
		}
	}
	public function login() {
		if (isset($_POST['email'])) {
			$result = $this->login_model->login();
			if ($result){
				if($result['isverified']!=1){
					set_flashdata('message', "Oops! Your account is not verified Please contact Admin.", 'danger');
					redirect('login');
				}else{
					redirect('home');
				}
			} else {
				set_flashdata('message', "Oops! Your username and password didn't match.", 'danger');
				redirect('login');
			}
		} 
	}
}