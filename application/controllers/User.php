<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('admin/client_model');
    $this->load->helper(array('form', 'url','file'));
                         $this->load->library('image_lib');

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
  $req=$this->input->post();  
//  echo '<pre>';
 // print_r($req);
//  die();
  $data=array(
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
            'isverified'=>$_POST['isverified']
    );
  if (isset($_POST['commission'])) {
    $data['hotel_price']=$_POST['commission'];
  }

 // debug($data);

  $img_result = $this->User_model->upload_data("hotel_pic", IMAGEUPLOAD, "png|jpg|gif|jpeg", 5000000, 0, 0);
  // debug($img_result);
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

              echo  $file_old_name = $_FILES['room_pic']['name']."hie";
              // die();
         //         $room='room_pic'[$row];
         $room_img = $this->User_model->upload_room_pic("room_pic", IMAGEUPLOAD, "png|jpg|gif|jpeg", 5000000, 0, 0);
                        debug($room_img);

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
  
  // die();
    array_pop($row_data);
           $res = $this->User_model->add_hotel_room($row_data);

           
           
       set_flashdata('message', "Hotel is update Successfully", 'success');
       redirect('admin/hotel/index');
     }else{
      set_flashdata('message', "Oops! Failed to update hotel.", 'danger');
      redirect('admin/hotel/profile/'.$_POST['hotel_id']);
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

  // $img_result = $this->User_model->upload_room_pic("room_pic", IMAGEUPLOAD, "png|jpg|gif|jpeg", 5000000, 0, 0);

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
       redirect('admin/Hotel/index');
     }else{
      set_flashdata('message', "Oops! Failed to added hotel.", 'danger');
      redirect('admin/hotel/profile/na');
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
       set_flashdata('message', "Hotel is update Successfully", 'success');
       redirect('admin/hotel/updatehotelroom/'.custom_encode($_POST['hotel_id']));
     }else{
      set_flashdata('message', "Oops! Failed to update hotel.", 'danger');
      redirect('admin/hotel/updatehotelroom/'.custom_encode($_POST['hotel_id']));
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
       redirect('admin/hotel/addhotelroom/na');
     }else{
      set_flashdata('message', "Oops! Failed to added Room.", 'danger');
      redirect('admin/hotel/addhotelroom/na');
    }
}

} 

}
public function book_hotel($id) {
//   print_r($id);
//   die();
  $res=$this->session->userdata('res');
  // print_r($res);
  // // echo $res;
  // die();
    $data=array(
        'hotel_id'=>custom_decode($id),
    );
//       print_r($data);
//   die();
  $result = $this->client_model->gethotelList($id,1000,0);  
//   $result = $this->client_model->getroomprice($data);  
  $data['booking_info']= $result;
  $data['pickup']=$res;
  $data['userid']=$this->session->userdata('userid');
  // echo $data['userid'];
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
