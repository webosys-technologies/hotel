<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('admin/client_model');
  }
  public function index($id) {

    if(isset($_SESSION['userid'])){
      $result = $this->client_model->getuserList($id);
      $data['userinfo']= $result;
      $this->load->view('user/profile',$data);
    }else{
      redirect(base_url());
    }
  }
  public function dashboard(){
    if(isset($_SESSION['userid'])){

      $array=array('userid'=>$_SESSION['userid']);
      $result = $this->client_model->gethotelList($array,1000,0);
      if($result)
      {
        $this->data['hoteldata']=$result;
      }else{
       $this->data['hoteldata']=array();
     }
     $this->load->view('user/user_dashboard',$this->data);
   }else{
    redirect(base_url());
  }
}
public function add_hotel() {

    $id=$this->session->userdata('owner_id');

  $req=$this->input->post();  
//  echo '<pre>';
//  print_r($req);
//  die();
  $data=array(
    'owner_id' => $id,
    'hotel_name' => $_POST['hotel_name'],
            'create_user' => $_POST['create_user'],
//    'hotel_price'=>$_POST['hotel_price'],
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
            // 'owner_name' => $_POST['owner_name'],
            // 'owner_mobile_no' => $_POST['owner_mobile_no'],
            // 'owner_telephone' => $_POST['owner_telephone'],
            // 'owner_email' => $_POST['owner_email'],
            'isverified'=>$_POST['isverified']
    );

 // debug($data);
  $img_result = $this->User_model->upload_data("hotel_pic", IMAGEUPLOAD, "png|jpg|gif|jpeg", 5000000, 0, 0);
  // debug($img_result);
  // die();
  $response=array();
  if (isset($img_result['succ']) && $img_result['succ']) {
    $data['hotel_pic'] = $img_result['data']['file_name'];
  } 
 

  if ($data) {
    if(isset($_POST['hotel_id']))
    {
      $data['hotel_id']=$_POST['hotel_id'];
      $res = $this->User_model->add_hotel($data);
      if($res || $res==0){
        
           $row_data = array();
                    foreach ($req['bed_type'] as $row => $bed_type) {
                        $hotel_id = custom_decode($_POST['hotel_id']);
                        $bed_type = $bed_type;
                        $price = $req['price'][$row];
                        $ac_non_room = $req['ac_non_room'][$row];
                        $room_no = $req['room_no'][$row];
                        $person_allowed= $req['person_allowed'][$row];
                        
                        $row_data[] = array(
                            'hotel_id' => $hotel_id,
                            'bed_type' => $bed_type,
                            'price' => $price,
                            'ac_non_room' => $ac_non_room,
                            'room_no' => $room_no,
                            'person_allowed' => $person_allowed
                        );
  } 
  
    array_pop($row_data);
           $res = $this->User_model->add_hotel_room($row_data);

           
           
       set_flashdata('message', "Hotel is update Successfully", 'success');
       redirect('htl/hotel/index');
     }else{
      set_flashdata('message', "Oops! Failed to update hotel.", 'danger');
      redirect('htl/hotel/profile/'.$_POST['hotel_id']);
    }
  }
  else if(!isset($_POST['hotel_id']) && $_POST['create_user']=="admin"){
    $res_hotel = $this->User_model->add_hotel($data);
    if($res_hotel){

          $row_data = array();      
    foreach($req['bed_type'] as $row=>$bed_type) { 
    $hotel_id=$res_hotel; 
    $bed_type=$bed_type;     
    $price=$req['price'][$row];      
    $ac_non_room=$req['ac_non_room'][$row];      
    $room_no=$req['room_no'][$row];      
  $person_allowed=$req['person_allowed'][$row];   

      $row_data[]=array(
    'hotel_id'=>$hotel_id,
    'bed_type'=>$bed_type,
    'price'=>$price,
    'ac_non_room'=>$ac_non_room,
    'room_no'=>$room_no,
    'person_allowed'=>$person_allowed
        );           
    } 
    array_pop($row_data); 
       
     $res = $this->User_model->add_hotel_room($row_data);
       set_flashdata('message', "Hotel details is added Successfully", 'success');
       redirect('htl/hotel/index');
     }else{
      set_flashdata('message', "Oops! Failed to added hotel.", 'danger');
      redirect('htl/hotel/profile/na');
    }
}
else{
  $res_hotel = $this->User_model->add_hotel($data);
  if($res_hotel){

//     echo '<pre>';
//     print_r($available_room);
//     die();
//   $res = $this->User_model->add_room($available_room);
   if($res_hotel){

          $row_data = array();      
    foreach($req['bed_type'] as $row=>$bed_type) { 
    $hotel_id=$res_hotel; 
    $bed_type=$bed_type;     
    $price=$req['price'][$row];      
    $ac_non_room=$req['ac_non_room'][$row];      
    $room_no=$req['room_no'][$row];      
  $person_allowed=$req['person_allowed'][$row];   

      $row_data[]=array(
    'hotel_id'=>$hotel_id,
    'bed_type'=>$bed_type,
    'price'=>$price,
    'ac_non_room'=>$ac_non_room,
    'room_no'=>$room_no,
    'person_allowed'=>$person_allowed
        );           
    } 
    array_pop($row_data); 
       
     $res = $this->User_model->add_hotel_room($row_data);
    $output = array(
    'error' => true,
    'message' =>"Hotel Add Successful"
    ); 
     }else{
      $output = array(
    'error' => false,
    'message' =>"Something went wrong"
    ); 
    }
}
//else{
//  $output = array(
//    'error' => true,
//    'message' =>"Something went wrong"
//    );      
//}
echo json_encode($output);
}
} 

redirect('htl/Hotel');

}

public function add_hotelroom() {
  $req=$this->input->post();  

  $data=array(
       'isverified'=>$_POST['isverified'],
  );
  if((isset($_POST['hotel_id']))&& $_POST['hotel_id']!=''){
      $data['hotel_id']=$_POST['hotel_id'];
  }
  if((isset($_POST['hotelroomid']))&& $_POST['hotelroomid']!=''){
       $data['hotel_id']=$_POST['hotelroomid'];
  }
  if ($data) {
    if(isset($_POST['hotelroomid']))
    { 
      $data['hotel_id']=$_POST['hotelroomid'];

        
    $row_data = array();      
    foreach($req['bed_type'] as $row=>$bed_type) { 
    $hotel_id=$data['hotel_id']; 
    $bed_type=$bed_type;     
    $price=$req['price'][$row];      
    $ac_non_room=$req['ac_non_room'][$row];    
    $room_no=$req['room_no'][$row];      
    $person_allowed=$req['person_allowed'][$row];  
      $row_data[]=array(
    'hotel_id'=>$hotel_id,
    'bed_type'=>$bed_type,
    'price'=>$price,
    'ac_non_room'=>$ac_non_room,
    'room_no'=>$room_no,
    'person_allowed'=>$person_allowed
        );         
    } 
    array_pop($row_data);
  
           $res = $this->User_model->add_hotel_room($row_data);
if($res){
       set_flashdata('message', "Hotel is updated Successfully", 'success');
       redirect('htl/hotel/updatehotelroom/'.custom_encode($_POST['hotel_id']));
     }else{
      set_flashdata('message', "Oops! Failed to update hotel.", 'danger');
      redirect('htl/hotel/updatehotelroom/'.custom_encode($_POST['hotel_id']));
    }
  }
  else if(!isset($_POST['hotelroomid']) && $_POST['create_user']=="admin"){
  

          $row_data = array();      
    foreach($req['bed_type'] as $row=>$bed_type) { 
    $hotel_id=$data['hotel_id']; 
    $bed_type=$bed_type;     
    $price=$req['price'][$row];      
    $ac_non_room=$req['ac_non_room'][$row];      
    $room_no=$req['room_no'][$row];      
  $person_allowed=$req['person_allowed'][$row];   
    $isverified=$_POST['isverified'];   
      $row_data[]=array(
    'hotel_id'=>$hotel_id,
    'bed_type'=>$bed_type,
    'price'=>$price,
    'ac_non_room'=>$ac_non_room,
    'room_no'=>$room_no,
    'person_allowed'=>$person_allowed,
               'isverified'=>$isverified
        );           
    } 

    array_pop($row_data); 
       
     $res = $this->User_model->add_hotel_room($row_data);
     if($res){
       set_flashdata('message', "Room details is added Successfully", 'success');
       redirect('htl/hotel/addhotelroom/na');
     }else{
      set_flashdata('message', "Oops! Failed to added Room.", 'danger');
      redirect('htl/hotel/addhotelroom/na');
    }
}

} 

}
public function book_hotel($id) {
//   print_r($id);
//   die();
    $data=array(
        'hotel_id'=>custom_decode($id),
    );
//       print_r($data);
//   die();
  $result = $this->client_model->gethotelList($id,1000,0);  
//   $result = $this->client_model->getroomprice($data);  
  $data['booking_info']= $result;
  $data['pickup']=$_POST;
//  print_r($data); 
//  die();
  $this->load->view('user/booking_dashboard',$data);
}

public function avl_room() {
  $curdate=date('m/d/Y');
  $result['alldetails'] = $this->client_model->avl_room($curdate);  
  $result['success'] = TRUE;
  echo json_encode($result);
  return;


}


public function get_hotel_details(){
  $request = $this->input->post();
  $result['alldetails'] = $this->User_model->get_hotel_details();
  $result['success'] = TRUE;
  echo json_encode($result);
  return;
}
}
