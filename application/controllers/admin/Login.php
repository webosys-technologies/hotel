<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/login_model');
	}

	function index() {
		
		if (isset($_POST['sign_in'])) {

			$result = $this->login_model->login();
			if ($result) {
				redirect('admin/dashboard');
			} else {
				set_flashdata('message', 'Incorrect Email or Password.', 'danger');
				redirect(current_url());
			}
		} else {
			admin_access();
			if (admin_logged_in()) {
				redirect('admin/dashboard');
			}
			$data = inclusions();
			$data['page_title'] = "Login";
			$this->load->view('backend/login', $data);
		}
	}

	function logout() {
		unset_admin_sessions();
		$this->session->sess_destroy();
		redirect('admin');
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
			redirect('admin/login');
		}

	}

	function change_password() {
		if( $this->input->post('sign_in') == "change_password" ) {
			$request = array(
				'password'=>$this->input->post('password'),
				'user_id' => $this->session->userdata('admin_id')
				);
			$result = postRecord(CHANGE_PASSWORD, $request);

			if( $result['status'] == 'success' ) {
				set_flashdata('message', 'Your password has been changed successfully. Login with your new password.', 'success');
				unset_admin_sessions();
				$this->session->sess_destroy();
				$data = inclusions();
				$data['page_title'] = "Login";
				$this->load->view('backend/login', $data);
			} else {
				set_flashdata('message', $result['reason'], 'warning');
				redirect('admin/settings');
			}
		}else{
			redirect('admin');
		}
	}
        
        function query()
        {
            $result=$this->login_model->hotel_owner();
            if($result)
            {
                echo "success";
            }
        }

}