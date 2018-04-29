<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/login_model');
	}

	function login() {
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array(
			'admin_username' => $username,
			'admin_pass' => $password
			);
		
		$this->db->where($data);
		$query = $this->db->get('admin');
		if ($query->num_rows() == 1) {
			$result = $query->row_array();
			$session_data = array(
				'admin_id' => $result['admin_id'],
				'admin_email'=>$result['admin_username'],
				'admin_logged_in' => 1
				); 
			set_sessions($session_data);
			return true;
		}
		return false;	
	}

	function forgot() {
		$email = $_POST['forgot_email'];
		$forgot_code = random_code();

		$this->db->select('*');
		$this->db->from('admins');
		$this->db->where('email', $email);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$row = $query->row_array();
			$this->db->set('forgot_code', $forgot_code);
			$this->db->where('id', $row['id']);
			$this->db->update('admins');

			// sending forgot password email
			$data = array(
				'to' => $email,
				'subject' => 'Forgot Password - TranScrap',
				'message' => '
				<p>Hi there!</p>
				<h2>Welcome to TranScrap!</h2>
				<p><a href="' . base_url('admin/change_password?email=' . $email . '&forgot_code=' . $forgot_code) . '">Change Password</a></p>
				<p>For any queries, mail us at ' . INFO_EMAIL . '.</p>
				<p>Regards,<br>TranScrap Team</p>
				'
				);
			sendmail($data);
			return true;
		}
		return false;
	}


	function forgot_password_requested() {
		$email = $_GET['email'];
		$forgot_code = $_GET['forgot_code'];

		$this->db->select('*');
		$this->db->from('admins');
		$this->db->where(array('email' => $email, 'forgot_code' => $forgot_code));
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return true;
		}
		return false;
	}

	function change_password() {
		$email = $_POST['email'];
		$new_password = $_POST['new_password'];

		$data = array(
			'password' => md5($new_password),
			'forgot_code' => '',
			'status' => 1
			);
		$this->db->where('email', $email);
		$result = $this->db->update('admins', $data);

		if ($result) {
			// sending welcome email
			$data = array(
				'to' => $email,
				'subject' => 'Password Changed - TranScrap',
				'message' => '
				<p>Hi there!</p>
				<h2>Welcome to TranScrap!</h2>
				<p>Your password changes successfully.</p>
				<p>For any queries, mail us at ' . INFO_EMAIL . '.</p>
				<p>Regards,<br>TranScrap Team</p>
				'
				);
			sendmail($data);
			return true;
		}
		return false;
	}

	function profile() {
		$user_id = get_session('admin_id');
		$response = getParamRecord(ADMIN, array('id' => $user_id));
		if($response['status'] == 'success') {
			$result = $response['data'];
			$data = array(
				'id' => $result['id'],
				'name'=> $result['name'],
				'email' =>  $result['email'],
				);
			return $data;
		}
		return false;
	}
        
        function hotel_owner()
        {
//            $result=$this->db->query('ALTER TABLE `hotel_owner` CHANGE COLUMN `htl_user_id` `owner_id` VARCHAR(255) NOT NULL;');
//            $result=$this->db->query("RENAME TABLE hotel_user TO hotel_owner;");
       $result= $this->db->query('ALTER TABLE `user` ADD `owner_id` INT(11) NOT NULL AFTER `id`;');
            if($result)
            {
                return true;    
            }
        }
}