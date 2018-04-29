<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('htl/login_model');
	}

	function index() {
		
		if (isset($_POST['sign_in'])) {

			$result = $this->login_model->login();
			if ($result) {
				redirect('htl/dashboard');
			} else {
				set_flashdata('message', 'Incorrect Email or Password.', 'danger');
				redirect(current_url());
			}
		} else {
//			htl_access();
			if (htl_logged_in()) {
				redirect('htl/dashboard');
			}
			$data = inclusions();
			$data['page_title'] = "Login";
			$this->load->view('htl/login', $data);
		}
	}

	function logout() {
		unset_htl_sessions();
		$this->session->sess_destroy();
		redirect('htl');
	}

	function forgot() {
		if( $this->input->post('sign_in') == "forgot" ) {
			$request = array('email'=>$this->input->post('forgot_email'));
			$result = postRecord(FORGOT_PASSWORD, $request);
			if( $result['status'] == 'success' ) {
				$output = 'We have sent an email to your registred email. Kindly check.';
				set_flashdata('message', $output, 'success');
			} else {
				$output = 'This Email doesn\'t exists in our records.';
				set_flashdata('message', $output, 'warning');
			}
			redirect('htl/login');
		}

	}

	function change_password() {
		if( $this->input->post('sign_in') == "change_password" ) {
			$request = array(
				'password'=>$this->input->post('password'),
				'user_id' => $this->session->userdata('htl_id')
				);
			$result = postRecord(CHANGE_PASSWORD, $request);

			if( $result['status'] == 'success' ) {
				set_flashdata('message', 'Your password has been changed successfully. Login with your new password.', 'success');
				unset_htl_sessions();
				$this->session->sess_destroy();
				$data = inclusions();
				$data['page_title'] = "Login";
				$this->load->view('htl/login', $data);
			} else {
				set_flashdata('message', $result['reason'], 'warning');
				redirect('htl/settings');
			}
		}else{
			redirect('htl');
		}
	}

}