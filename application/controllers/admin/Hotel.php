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
    $this->load->model('User_model');
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
  
      // echo $hotel_id;
      //die();
   $includes = array('datatable','validate','iCheck','datepicker');
   $this->data['inclusions'] = inclusions($includes);
   $this->data['page_title'] = "Hotel Detail";
  $owner = $this->client_model->getownerList("");
  $this->data['owner']=$owner;

   if($hotel_id == 'na'){
       $result = $this->client_model->gethotelList1($hotel_id,"",""); 
         $this->data['client_info']=$result;
   }else{
          $result = $this->client_model->gethotelList($hotel_id,"","");
   $this->data['client_info']=$result;
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

function add()
{
  $req=$this->input->post();
  // print_r($req);
  $data=array(
    'hotel_name' => $_POST['hotel_name'],
            'create_user' => $_POST['create_user'],
//    'hotel_price'=>$_POST['hotel_price'],
            'owner_id' =>$_POST['owner'],
            'hotel_description' => $_POST['hotel_description'],
            'hotel_address' => $_POST['hotel_address'],
            'city' => $_POST['city'],
            'pincode' => $_POST['pincode'],
            'state' => $_POST['state'],
            'country' => $_POST['country'],
            'temple_distance' => $_POST['temple_distance'],
            'mobile_no' => $_POST['mobile_no'],
            'telephone_no' => $_POST['telephone_no'],
            'checkin_time' => $_POST['checkin_time'],
            'checkout_time' => $_POST['checkout_time'],
            'star' => $_POST['star'],
            'near_railway_st' => $_POST['near_railway_st'],
            'hotel_price'=>$_POST['commission'],
            'isverified'=>$_POST['isverified'],
    );

 $img_result = $this->User_model->upload_data("hotel_pic", IMAGEUPLOAD, "png|jpg|gif|jpeg", 5000000, 0, 0);

  if (isset($img_result['succ']) && $img_result['succ']) {
    $data['hotel_pic'] = $img_result['data']['file_name'];
  }

  if ($data) {
    if(!empty($_POST['hotel_id']))
    {
      $data['hotel_id']=$_POST['hotel_id'];
      $res = $this->User_model->add_hotel($data);
      if($res || $res==0){
        // print_r($req);
           $row_data = array();
                    foreach ($req['bed_type'] as $row => $bed_type) {
                        $hotel_id = custom_decode($_POST['hotel_id']);
                        $bed_type = $bed_type;
                        $price = $req['price'][$row];
                        $ac_non_room = $req['ac_non_room'][$row];
                        $room_no = $req['room_no'][$row];
                        $person_allowed= $req['person_allowed'][$row];
                        $hotel_room_id=$req['hotel_room_id'][$row];

              // echo  $file_old_name = $_FILES['room_pic']['name'];
              // die();
         //         $room='room_pic'[$row];
         // $room_img = $this->User_model->upload_room_pic("room_pic", IMAGEUPLOAD, "png|jpg|gif|jpeg", 5000000, 0, 0);
         //                debug($room_img);

                        $row_data[] = array(
                            'hotel_id' => $hotel_id,
                            'bed_type' => $bed_type,
                            'price' => $price,
                            'ac_non_room' => $ac_non_room,
                            'room_no' => $room_no,
                            'person_allowed' => $person_allowed,
                            'hotel_room_id'=>$hotel_room_id,
                            //'room_pic' => $room_img['data']['file_name'],

                        );



  } 
 // echo '<pre>';  
 //  print_r($row_data);
 //  die();
    array_pop($row_data);
            foreach ($row_data as $key => $value) {
              $row = array(
                            'hotel_id' => $value['hotel_id'],
                            'bed_type' => $value['bed_type'],
                            'price' => $value['price'],
                            'ac_non_room' => $value['ac_non_room'],
                            'room_no' => $value['room_no'],
                            'person_allowed' => $value['person_allowed'],
                            
                            //'room_pic' => $room_img['data']['file_name'],

                        );
                if (!empty($value['hotel_room_id'])) {
                  $this->User_model->hotel_room_update(array('hotel_room_id'=>$value['hotel_room_id']),$row);
                }else{
                  $this->User_model->hotel_room_add($row);
                }

            }

           // $res = $this->User_model->add_hotel_room($row_data);


    
                    
           
           
       set_flashdata('message', "Hotel is update Successfully", 'success');
       //redirect('admin/hotel/index');
       echo json_encode(array('status'=>true));
     }else{
      set_flashdata('message', "Oops! Failed to update hotel.", 'danger');
     // redirect('admin/hotel/profile/'.$_POST['hotel_id']);
    }
  }
  else{
      $res = $this->User_model->add_hotel($data);

      if($res || $res==0){
        // print_r($req);
           $row_data = array();
                    foreach ($req['bed_type'] as $row => $bed_type) {
                        $hotel_id=$res;
                        $bed_type = $bed_type;
                        $price = $req['price'][$row];
                        $ac_non_room = $req['ac_non_room'][$row];
                        $room_no = $req['room_no'][$row];
                        $person_allowed= $req['person_allowed'][$row];

              // echo  $file_old_name = $_FILES['room_pic']['name'];
              // die();
         //         $room='room_pic'[$row];
         // $room_img = $this->User_model->upload_room_pic("room_pic", IMAGEUPLOAD, "png|jpg|gif|jpeg", 5000000, 0, 0);
         //                debug($room_img);

                        $row_data[] = array(
                            'hotel_id' => $hotel_id,
                            'bed_type' => $bed_type,
                            'price' => $price,
                            'ac_non_room' => $ac_non_room,
                            'room_no' => $room_no,
                            'person_allowed' => $person_allowed,
                            //'room_pic' => $room_img['data']['file_name'],

                        );



  } 
 // echo '<pre>';  
 //  print_r($row_data);
 //  die();
    array_pop($row_data);
            foreach ($row_data as $key => $value) {
              $row = array(
                            'hotel_id' => $value['hotel_id'],
                            'bed_type' => $value['bed_type'],
                            'price' => $value['price'],
                            'ac_non_room' => $value['ac_non_room'],
                            'room_no' => $value['room_no'],
                            'person_allowed' => $value['person_allowed'],
                            
                            //'room_pic' => $room_img['data']['file_name'],

                        );
                  $this->User_model->hotel_room_add($row);
                

            }

      
       set_flashdata('message', "Hotel is update Successfully", 'success');
       //redirect('admin/hotel/index');
       echo json_encode(array('status'=>true));
  }


  }
}


}
}