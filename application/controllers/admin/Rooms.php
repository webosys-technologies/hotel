<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!admin_logged_in()) {
            redirect('admin');
        }
        $this->load->model('admin/client_model');
            $this->load->model('User_model');
            $this->load->model('Client_model');
    }
    function index()
    {
        $includes = array('datatable', 'iCheck');
        $this->data['inclusions'] = inclusions($includes);
        $this->data['page_title'] = "List of Hotels";

       // $result = $this->client_model->gethotel_with_room("",1000,0);
    $result = $this->client_model->gethotelList("",1000,0);
    // print_r($result);
        // debug($result);
        if($result){
            $this->data['hoteldata']=$result;
        }
        load_backend_page('backend/client/manage_room', $this->data);
    }

 function Roomprofile($hotel_room_id){
       
   $includes = array('datatable','validate','iCheck','datepicker');
   $this->data['inclusions'] = inclusions($includes);
   $this->data['page_title'] = "Room Detail";
   $result = $this->client_model->gethotel_with_room($hotel_room_id,"","");
   $this->data['room_info']=$result;

   load_backend_page('backend/client/manage_room_details', $this->data);

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
        redirect('admin/clients');
    }else {
       set_flashdata('message', "Opps: Some thing went wrong, please try again!", 'danger');
       redirect('admin/clients');
   }
}


function delete_room()
{
  $result = $this->client_model->deleteRoom($_GET['hotel_room_id']);

  if ($result) {
   set_flashdata('message', "Room is deleted successfully!", 'success');
   redirect('admin/rooms');
 }else {
   set_flashdata('message', "Opps: Some thing went wrong, please try again!", 'danger');
   redirect('admin/rooms');
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
       redirect('admin/rooms/Roomprofile/'.$_POST['hotel_room_id']);
     }else{
      set_flashdata('message', "Oops! Failed to update Room.", 'danger');
      redirect('admin/rooms/Roomprofile/'.$_POST['hotel_room_id']);
    }
  }

} 

}

function manage_room1()
    {
        $includes = array('datatable', 'iCheck');
        $this->data['inclusions'] = inclusions($includes);
        $this->data['page_title'] = "List of Rooms";

        $result = $this->client_model->gethotel_with_room1("",1000,0);
        // debug($result);
        
        if($result){
            $this->data['roomdata']=$result;
        }
        load_backend_page('backend/client/manage_room1', $this->data);
    }

    function roomlist($id)
    {
      $includes = array('datatable', 'iCheck');
        $this->data['inclusions'] = inclusions($includes);
        $this->data['page_title'] = "List of Rooms";

        $result = $this->client_model->gethotel_with_room1($id,1000,0);
        // debug($result);
        // print_r($result);
        if($result){
            $this->data['roomdata']=$result;
        }
        load_backend_page('backend/client/manage_hotel_room', $this->data);
    }

    function update_hotel_room()
    {

       $data=array(

          'hotel_room_id'=>$this->input->post('hotel_room_id'),
          'bed_type'=>$this->input->post('bed_type'),
          'price'=>$this->input->post('price'),
          'ac_non_room'=>$this->input->post('ac_non_room'),
          'room_no'=>$this->input->post('room_no'),
          'person_allowed'=>$this->input->post('person_allowed'),
            
 
    );
    
//  $img_result = $this->User_model->upload_room("room_pic", IMAGEUPLOAD, "png|jpg|gif|jpeg", 5000000, 0, 0);
//    echo $file_old_name = $_FILES['room_pic']['name'];
//
//  $data['room_pic']=$img_result['data']['file_name'];
       // die();
       $id=$this->input->post('hotel_room_id');

      $res = $this->client_model->updatehotelroom1(array('hotel_room_id' => $id),$data);

         $data['hotel_name']=$this->input->post('hotel_name');
     //  print_r($data);

       // $this->pic_upload($data);

      echo json_encode(array('status' => True));



    }

    function pic_upload($data)
    {  
       $id=$data['hotel_room_id'];
       
                                   $new_file=$data['hotel_name'].mt_rand(100,9999);
       
         $config = array(
                                  'upload_path' => './upload/img',
                                  'allowed_types' => 'gif|jpg|png|jpeg',
                                  'max_size' => '72000',
                                  'max_width' => '1920',
                                  'max_height' => '1200',
                                  'overwrite' => false,
                                  'remove_spaces' =>true,
                                  'file_name' =>$new_file 
                              );           
                      
                    // print_r($config);
                                  
                       $this->load->library('upload', $config);
                       $this->upload->initialize($config);
                       
                       if (!$this->upload->do_upload('room_pic')) # form input field attribute
                       {

                           if(empty($this->input->post('room_pic')))
                           {

                                $msg="Image size should less than 7MB,Dimension 1920*1200";
                           return $msg; 
                            
                           }
                           else
                           {
                                   return true;                    
                           }
                         
                       }
                       else
                       {
                        
                            $res=$this->Client_model->room_by_id($id);
                            
                            if(file_exists($res->room_pic))
                            {
                            unlink($res->room_pic);
                            }
                                               
                           
                            $ext= explode(".",$this->upload->data('file_name'));  
                            $img_name =$new_file.".".end($ext); //video name as path in db
                             echo $img_path=str_replace(' ','_',$img_name);
                          $pic = array(
                              'room_pic' => $img_path,
                            );
            
                                  
           $res = $this->client_model->updatehotelroom1(array('hotel_room_id' => $id),$pic);
                                    
                  // $insert =  $this->User_model->user_update(array('hotel_room_id' =>$id), $pic);
                          
                         return true; 
                                               
                       }

        

            
    }
}
