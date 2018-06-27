<?php


class Register extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('htl/signup_model');
  }

  public function index() {
    $this->load->view('htl/register');

  }

  public function signup() {
     
     $post['regester']=$_POST;
     // debug($data);
     $mobile=$this->session->userdata('owner_mobile');
     $otp=$this->session->userdata('owner_otp');

     if ($mobile==$_POST['phone']) {

       if ($otp==$_POST['otp']) {
       
      
      
    $data=array(
      'fname'=>$_POST['fname'],
      'lname'=>$_POST['lname'],
      'phone'=>$_POST['phone'],
      'email'=>$_POST['email'],
      'password'=>$_POST['password'],
      'dob'=>$_POST['dob'],
      'country'=>$_POST['country'],
      'state'=>$_POST['state'],
      'city'=>$_POST['city'], 
      'isverified'=>0,
      
            );
    
//   
//    $falag=0;
//    if(isset($_POST['updateProduct'])){
//      $data['isverified']=1;
//    }
//    
//    if(isset($_POST['userid'])){
//      $data['id']=$_POST['userid'];
//
//      $data['isverified']=$_POST['status'];
//      $falag=1;
//    }

    // debug($data);
    $result = $this->signup_model->signup($data);
   
    if($result)
    {
        set_flashdata('message', "Account is created successfully!", 'success');
    redirect('htl/login');

    }else{
         set_flashdata('message', "Email is already registered with us. Please use a
            different email or Phone.", 'danger');
    $this->load->view('htl/register',$post);
         
         // redirect('htl/Register ');
    }
    
    
//    if(isset($_POST['updateProduct'])){
//      if($falag){
//        set_flashdata('message', "Account is updated successfully!", 'success');
//        redirect('htl/clients/profile/'.$_POST['userid'].'');
//      }else{
//        if($result){
//          set_flashdata('message', "Account is created successfully!", 'success');
//        }else{
//          set_flashdata('message', "Email or Phone is already registered with us. Please use a
//            different email or Phone.", 'danger');
//
//        }
//        redirect('htl/clients/profile/na');
//      }
//    }
//    else if(isset($_POST['Update'])){
//      if($falag){
//        $_SESSION['name']=$_POST['fname']." ".$_POST['lname'];
//        set_flashdata('message', "Account is updated successfully!", 'success');
//        redirect('user/index/'.$_POST['userid'].'');
//      }else{
//        set_flashdata('message', "Account is created successfully!", 'success');
//        redirect('user/index/na');
//      }
//    }
//    else{
//      if($result){
//        $output = array(
//          'error' => false,
//          'message' =>"Your Account is created successfully, Continue to login"
//          );
//      }else {
//        $output = array(
//          'error' => true,
//          'message' => 'Email or Phone is already registered with us. Please use a
//          different email or Phone.'
//          );
//      }
//      json_output(json_encode($output));
//    }
      }else{
         set_flashdata('message', "OTP Does not match.", 'danger');
         $this->load->view('htl/register',$post);
         
         // redirect('htl/Register '); 
       }
    }else{
         set_flashdata('message', "Phone and Otp Does not match.", 'danger');
    $this->load->view('htl/register',$post);

         // redirect('htl/Register ');
          }
  }



  
}
