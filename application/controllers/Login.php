<?php

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('admin/client_model');
	}

	public function index() {
		$userid=$this->session->userdata('userid');
		if(!isset($userid)){
			$this->load->view('login');
		}else{
  $res=$this->session->userdata('res');

			if (!empty($res)) {
				$id=$res['hotel_id'];
    $data=array(
        'hotel_id'=>custom_decode($id),
    );
//       print_r($data);
//   die();
  $result = $this->client_model->gethotelList($id,1000,0);  
//   $result = $this->client_model->getroomprice($data);  
  $data['booking_info']= $result;
				$data['pickup']=$res;
  $data['userid']=$this->session->userdata('userid');
	  $this->load->view('user/booking_dashboard',$data);
		}else{
			redirect(base_url());
		}
		}
	}
	public function login() {
		if (isset($_POST['otp'])) {

			$result = $this->login_model->login_otp();
			
			// die();
			if ($result == true){

				redirect('Regester');
				// if($result['isverified']!=1){
				// 	set_flashdata('message', "Oops! Your account is not verified Please contact Admin.", 'danger');
				// 	redirect('login');
				// }else{
				// 	redirect('home');
				// }
			} else {
				// set_flashdata('message', "Oops! Your Mobile and OTP didn't match.", 'danger');
				redirect('Login');
			}
			die();

		}elseif (isset($_POST['email'])) {
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
		}else{
				set_flashdata('message', "Please enter details properly", 'danger');
				redirect('login');

		}

	}

	function islogin()
	{
		if(!isset($_SESSION['userid'])){
			echo json_encode(array('status' => "fail"));
			// echo "success";
			// redirect('home');
		}else{
			echo json_encode(array('status' => "success"));
			// echo "fail";
  // $this->load->view('user/booking_dashboard',$data);
		}

	}



}
?>