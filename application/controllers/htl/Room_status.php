<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Room_status extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!htl_logged_in()) {
            redirect('htl');
        }
        $this->load->model('htl/client_model');
            $this->load->model('User_model');
    }
    function index()
    {
        $includes = array('datatable', 'iCheck');
        $this->data['inclusions'] = inclusions($includes);
        $this->data['page_title'] = "List of Rooms";
        $id=$this->session->userdata('owner_id');
        $result = $this->client_model->gethotel_with_room($id);
//         debug($result);
//         die();
        if($result){
            $this->data['roomdata']=$result;
        }
//        print_r($this->data);
        load_htlbackend_page('htl/client/manage_room_status', $this->data);
    }

   function status()
   {
    $request = array(
        'id' =>$_GET['id'],
        'isverified' => $_GET['status']
        );
    $result = $this->client_model->status($request);
    if ($result) {
        set_flashdata('message', "Status is updated successfully!", 'success');
        redirect('htl/clients');
    }else {
       set_flashdata('message', "Opps: Some thing went wrong, please try again!", 'danger');
       redirect('htl/clients');
   }
}

public function update_room() {
  $req=$this->input->post();  

$valuenc=explode(",",$req['hotel_room_id']);

 
       $row_data = array();      
    foreach($valuenc as $row=>$value) { 
 
   
      $row_data[]=array(
    'hotel_room_id'=>$value,
    'fromdate'=>$req['fromdate'],
    'todate'=>$req['todate'],
    'booking_status'=>1,

        );           
    } 
//   echo '<pre>';
//  print_r($row_data);
//  die();  
  $output=array();
  if ($row_data) {
  
      $res = $this->client_model->roomstatus($row_data);

      if($res){
//    
			$output = array(
				'error' => false,
				'message' =>"Hotel status changed to Booked status.",
				
				);
		}else {
			$output = array(
				'error' => true,
				'message' => 'Something went wrong please try again.',
				
				);
		}
                
		json_output(json_encode($output));
//       set_flashdata('message', "Room is update Successfully", 'success');
//       redirect('admin/Room_status');
//     }else{
//      set_flashdata('message', "Oops! Failed to update Room.", 'danger');
//      redirect('admin/Room_status');
//    }

//        set_flashdata('message', "Status is updated successfully!", 'success');
//        redirect('admin/Room_status');
//    }else {
//       set_flashdata('message', "Opps: Some thing went wrong, please try again!", 'danger');
//       redirect('admin/Room_status');
//   }

} 

}
}
