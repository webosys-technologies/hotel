<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('htl/client_model');
	}

	public function index()
	{
		$result = $this->client_model->gethotelListfront("",1000,0);
                
		if($result) {
			$this->data['hoteldata']=$result;
		}else{
			$this->data['hoteldata']=array();
		}
                
		$this->load->view('hotel/hotel',$this->data);
	}

   public function detail(){
          
            $request = array(
            'hotel_id' =>$_GET['hotel_id'],);
          
            	$result = $this->client_model->gethotel($request,1000,0);
//                  echo '<pre>';
//                print_r($result);
//                die();
		if($result) {
			$this->data['hotelroom']=$result;
                        
		}else{
			$this->data['hotelroom']=array();
		}
              
                
                
                $other_result = $this->client_model->gethotelListfront("",4,0);
                
                
	        $removed = array_shift($other_result);
		if($other_result)
		{
			$this->data['hoteldata']=$other_result;
		}
                $totlbookedroom= $this->client_model->getparti_hotel($request);
//                echo'<pre>';
//                print_r($totlbookedroom);
//                die();
                if($totlbookedroom) {
			$this->data['bookedroom']=$totlbookedroom;
                        
		}else{
			$this->data['bookedroom']=array();
		}
              
                
		$this->load->view('hotel/hoteldetail',$this->data);
	}

}
