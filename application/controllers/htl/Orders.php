<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller
{

	public function __construct() {
		parent::__construct();
		$this->load->model('htl/login_model');
                $this->load->model('htl/client_model');
				$this->load->model('Placeorder');
	}

	function index() {
		admin_access();
		if (htl_logged_in()) { 

			$id=$this->session->userdata('owner_id');
			$res=$this->Placeorder->getorders($id);
			$includes = array('validate','datatable');
			$this->data['inclusions'] = inclusions($includes);
			$this->data['page_title'] = "List of Orders";
//				 debug($res);
//                                 die();
			if(count($res)>0 && !empty($res)){
				$this->data['orderlist'] =$res;
			}else{
				$this->data['orderlist']=array();
			}
//			 debug($this->data);
			load_htlbackend_page('htl/orders', $this->data);
		}else{
			redirect('admin');
		}
	}
function status()
   {
    
    $request = array(
        'id' =>$_GET['id'],
        'status' => $_GET['status'],
            'no_of_room'=>$_GET['no_of_room'],
        'room_nos'=>$_GET['room_nos'],
        'hotel_id'=>$_GET['hotel_id'],
        'avl_room'=>$_GET['avl_room'],
        );
    $roomnos= explode(",", $_GET['room_nos']);
    
    $roomstatus=array();
//    if($_GET['status']='checkin' ){
//        $status=1;
//    }
//      if($_GET['status']='checkout' ){
//       $status=0;
//    }
  $status=1;
		if($_GET['status']=="checkin"){
			$status=0;
		}
		$_GET['status']=$status;
    foreach ($roomnos as $value) {
        $roomstatus[]=array(
            'hotel_room_id'=>$value,
              'hotel_id'=>$_GET['hotel_id'],
              'booking_status'=>$_GET['status'],
        );
    }        
    
    $result = $this->client_model->orderstatus($request);
//    print_r($result);
//    die();
    if ($result==1) {
        $res = $this->client_model->roomstatus($roomstatus);
   
        
        set_flashdata('message', "Status is updated successfully!", 'success');
        redirect('htl/orders');
    }else {
       set_flashdata('message', "Opps: Some thing went wrong, please try again!", 'danger');
       redirect('htl/orders');
   }
}
}