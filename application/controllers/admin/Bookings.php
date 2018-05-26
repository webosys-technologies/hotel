<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bookings extends MY_Controller
{

	public function __construct() 
	{
		parent::__construct();

		if (!admin_logged_in()) { 
			redirect('admin');

		}

		$this->load->model('admin/login_model');
                $this->load->model('admin/Client_model');
				$this->load->model('Placeorder');
	}

	function index() {

		$res=$this->Client_model->booked_room();
		// print_r($res);
        $includes = array('datatable', 'iCheck');
        $this->data['inclusions'] = inclusions($includes);
        $this->data['page_title'] = "List of Booking";
        $this->data['roomlist'] = $res;
			load_backend_page('backend/client/booking',$this->data);
		
	}

	function query()
	{
		$res=$this->Placeorder->query();
		if ($res) {
			echo "sucess";
		}
	}
}

?>	
