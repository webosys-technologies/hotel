<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!admin_logged_in()) {
      redirect('admin');
    }
    $this->load->model('admin/client_model');
  }

  function index()
  {
    $includes = array('datatable', 'fancybox');
    $this->data['inclusions'] = inclusions($includes);
    $this->data['page_title'] = "List of Hotels";
    $result = $this->client_model->gethotelList("",1000,0);
    if($result){
      $this->data['hoteldata']=$result;
    }
    load_backend_page('backend/client/hotel', $this->data);
  }


  function profile($hotel_id){
  
      echo $hotel_id;
      //die();
   $includes = array('datatable','validate','iCheck','datepicker');
   $this->data['inclusions'] = inclusions($includes);
   $this->data['page_title'] = "Hotel Detail";
   if($hotel_id == 'na'){
       $result = $this->client_model->gethotelList1($hotel_id,"",""); 
         $this->data['client_info']=$result;
         echo "string1";
   }else{
          $result = $this->client_model->gethotelList($hotel_id,"","");
   $this->data['client_info']=$result;
   echo "string";
   }


   $res=$this->client_model->gethotelroom($hotel_id,"","");
   $this->data['hotel_room']=$res;
   $hotel_room=$res;

    $removed = array_shift($hotel_room);
    $this->data['room_info']=$hotel_room;
   load_backend_page('backend/client/add_hotel', $this->data);
 }
 
   function updatehotelroom($hotel_id){
    
   $includes = array('datatable','validate','iCheck','datepicker');
   $this->data['inclusions'] = inclusions($includes);
   $this->data['page_title'] = " Update Rooms";
   if(isset($hotel_id)){
   $this->data['hotelid'] = custom_decode($hotel_id);
   }

   $res=$this->client_model->gethotelroom($hotel_id,"","");
   $this->data['hotel_room']=$res;
   $hotel_room=$res;
    $removed = array_shift($hotel_room);
    $this->data['room_info']=$hotel_room;
   load_backend_page('backend/client/add_hotel_room', $this->data);

 }
  function addhotelroom(){
       
   $includes = array('datatable','validate','iCheck','datepicker');
   $this->data['inclusions'] = inclusions($includes);
   $this->data['page_title'] = " Add Rooms";
   if(isset($_GET['hotelid'])){
   $this->data['hotelid'] = custom_decode($_GET['hotelid']);
   }
   load_backend_page('backend/client/add_hotel_room', $this->data);

 }

 function status()
 {
  $request = array(
    'hotel_id' =>$_GET['hotel_id'],
    'isverified' => $_GET['status']
    );
//    print_r($request);
//    die();
  $result = $this->client_model->hotelstatus($request);
  if ($result) {
    set_flashdata('message', "Status is updated successfully!", 'success');
    redirect('admin/hotel');
  }else {
   set_flashdata('message', "Opps: Some thing went wrong, please try again!", 'danger');
   redirect('admin/hotel');
 }
}

function delete_hotel()
{
  $result = $this->client_model->deleteHotel($_GET['hotel_id']);
//    echo $this->db->last_query();
//    die();
  if ($result) {
   set_flashdata('message', "Hotel is deleted successfully!", 'success');
   redirect('admin/hotel');
 }else {
   set_flashdata('message', "Opps: Some thing went wrong, please try again!", 'danger');
   redirect('admin/hotel');
 }
}

}
