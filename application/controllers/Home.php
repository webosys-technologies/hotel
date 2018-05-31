<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/client_model');
		$this->load->model('Searchhotel');
		$this->load->model('Placeorder');
	}

	public function index()
	{
		$this->update_room_status();
		
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

	function update_room_status()
	{
		$date=date('Y-m-d');
		
		$data=$this->Searchhotel->check_room_status($date);

		// $ids[]=array();
		foreach ($data as $key => $value) {
			$ids[]=$value->room_nos;
			echo $value->checkout;
			$status[] = array(
                             "booking_status" => 1, 
                          'hotel_room_id'=>$value->room_nos,
                          'fromdate'=>$value->checkin,
                          'todate' => $value->checkout,
                      );
                  $this->Placeorder->updateroomstatus($status);
                   	
		}
		
		$res=array(
                   		'booking_status' =>0,
                   		'fromdate' => " ",
                   		'todate' => " ",
                   );
		if (!empty($ids)) {
                   $this->Searchhotel->change_room_status($ids,$res);		
		}else{
			$ids=array();
                   $this->Searchhotel->change_room_status($ids,$res);
		 }

		
	}
}
