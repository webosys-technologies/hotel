<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends MY_Controller
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
        // debug($result);
        if($result){
            $this->data['roomdata']=$result;
        }
        load_htlbackend_page('htl/client/manage_room', $this->data);
    }

 function Roomprofile($hotel_room_id){
       
   $includes = array('datatable','validate','iCheck','datepicker');
   $this->data['inclusions'] = inclusions($includes);
   $this->data['page_title'] = "Room Detail";
   $result = $this->client_model->gethotel_with_room($hotel_room_id,"","");
   $this->data['room_info']=$result;

   load_htlbackend_page('htl/client/manage_room_details', $this->data);

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


function delete_room()
{
  $result = $this->client_model->deleteRoom($_GET['hotel_room_id']);

  if ($result) {
   set_flashdata('message', "Room is deleted successfully!", 'success');
   redirect('htl/rooms');
 }else {
   set_flashdata('message', "Opps: Some thing went wrong, please try again!", 'danger');
   redirect('htl/rooms');
 }
}
public function update_room() {
  $req=$this->input->post();  
//  echo '<pre>';
//  print_r($req);
//  die();
  $data=array(
    'bed_type'=>$_POST['bed_type'],
    'price'=>$_POST['price'],
    'ac_non_room'=>$_POST['ac_non_room'],
    'room_no'=>$_POST['room_no'],
      'person_allowed'=>$_POST['person_allowed'],
       'hotel_room_id'=>$_POST['hotel_room_id'],
      
 
    );

  if ($data) {
    if(isset($_POST['hotel_room_id']) && $_POST['hotel_room_id']!='')
    {
     
      $res = $this->client_model->updatehotelroom($data);

      if($res || $res==0){

       set_flashdata('message', "Room is update Successfully", 'success');
       redirect('htl/rooms/Roomprofile/'.$_POST['hotel_room_id']);
     }else{
      set_flashdata('message', "Oops! Failed to update Room.", 'danger');
      redirect('htl/rooms/Roomprofile/'.$_POST['hotel_room_id']);
    }
  }

} 

}
}
