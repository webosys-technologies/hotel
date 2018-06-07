<?php


class Regester extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('signup_model');
    $this->load->model('User_model');
  }

  public function index() {
    $data['state']=$this->User_model->getall_state();
    $this->load->view('regester',$data);

  }

  public function signup() {
    $data=array(
      'fname'=>$_POST['fname'],
      'lname'=>$_POST['lname'],
      'phone'=>$_POST['phone'],
      'email'=>$_POST['email'],
      // 'password'=>$_POST['password'],
      // 'dob'=>$_POST['dob'],
      // 'country'=>$_POST['country'],
      // 'state'=>$_POST['state'],
      // 'city'=>$_POST['city'], 
      'isverified'=>1,
      
      );
    $falag=0;
    $otp_falag=0;
    if(isset($_POST['updateProduct'])){
      $data['isverified']=1;
    }
    
    if(isset($_POST['userid'])){
      $id=$_POST['userid'];

      $data['isverified']=$_POST['status'];
      $falag=1;
    $result = $this->signup_model->user_update(array('id' => custom_decode($id)),$data);

    }else{
      $otp=$this->session->userdata('regester_otp');
      if ($otp==$_POST['otp']) {

         $result = $this->signup_model->signup($data);  
         $otp_falag=1;      
      }
      
      }

    // debug($data);
    // echo $this->db->last_query();
    // die();
    if(isset($_POST['updateProduct'])){
      if($falag){
        set_flashdata('message', "Account is updated successfully!", 'success');
        redirect('admin/clients/profile/'.$_POST['userid'].'');
      }else{
        if($result){
          set_flashdata('message', "Account is created successfully!", 'success');
        }else{
          set_flashdata('message', "Email or Phone is already registered with us. Please use a
            different email or Phone.", 'danger');

        }
        redirect('admin/clients/profile/na');
      }
    }
    else if(isset($_POST['Update'])){
      if($falag){
        $_SESSION['name']=$_POST['fname']." ".$_POST['lname'];
        set_flashdata('message', "Account is updated successfully!", 'success');
        redirect('user/index/'.$_POST['userid'].'');
      }else{
        set_flashdata('message', "Account is created successfully!", 'success');
        redirect('user/index/na');
      }
    }
    else{
      if ($otp_falag) 
      {
        
      
              if($result){
                $output = array(
                  'error' => false,
                  'message' =>"Your Account is created successfully, Continue to login"
                  );
                set_flashdata('message',"Your Account is created successfully, Continue to login",'success');
                // redirect('Login');
              }else {
                $output = array(
                  'error' => true,
                  'message' => 'Email or Phone is already registered with us. Please use a
                  different email or Phone.'
                  );
              }
      }else{
                 $output = array(
          'error' => true,
          'message' => 'OTP Does not Match,PLease enter valid OTP',
          );
    }
      json_output(json_encode($output));
    }
  
  }

  public function owner_signup() {
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
    $falag=0;
    if(isset($_POST['updateProduct'])){
      $data['isverified']=1;
    }
    
    if(isset($_POST['userid'])){
      $id=$_POST['userid'];
      

      $data['isverified']=$_POST['status'];
      $falag=1;
      $result=$this->signup_model->owner_update(array('owner_id' => custom_decode($id)),$data);
    }else{
    $result = $this->signup_model->owner_signup($data);

    }

    // debug($data);
    // echo $this->db->last_query();
    // die();
    if(isset($_POST['updateProduct'])){
      if($falag){
        set_flashdata('message', "Account is updated successfully!", 'success');
        redirect('admin/clients/profile/'.$_POST['userid'].'');
      }else{
        if($result){
          set_flashdata('message', "Account is created successfully!", 'success');
        }else{
          set_flashdata('message', "Email or Phone is already registered with us. Please use a
            different email or Phone.", 'danger');

        }
        redirect('admin/Owners/profile/na');
      }
    }
    else if(isset($_POST['Update'])){
      if($falag){
        $_SESSION['name']=$_POST['fname']." ".$_POST['lname'];
        set_flashdata('message', "Account is updated successfully!", 'success');
        redirect('user/index/'.$_POST['userid'].'');
      }else{
        set_flashdata('message', "Account is created successfully!", 'success');
        redirect('user/index/na');
      }
    }
    else{
      if($result){
        $output = array(
          'error' => false,
          'message' =>"Your Account is created successfully, Continue to login"
          );
      }else {
        $output = array(
          'error' => true,
          'message' => 'Email or Phone is already registered with us. Please use a
          different email or Phone.'
          );
      }
      json_output(json_encode($output));
    }
  }

function show_cities($state)
        {           
            $st=str_replace('%20', ' ', $state);
            $cities=$this->User_model->getall_cities(ltrim($st));
          
            echo json_encode($cities);
        }

        function regester()
        {
              $mobile=$this->session->userdata('mobile');
              $data=array(
          'fname'=>$_POST['fname'],
          'lname'=>$_POST['lname'],
          'email'=>$_POST['email'],
          'phone'=>$mobile,
          // 'password'=>$_POST['password'],
          // 'dob'=>$_POST['dob'],
          // 'country'=>$_POST['country'],
          // 'state'=>$_POST['state'],
          // 'city'=>$_POST['city'], 
          'isverified'=>1,
          
          );
              $result=$this->signup_model->signup($data);
              if ($result) {
                
            $session_data = array(
              'userid' => $result,
              'email'=>$data['email'],
              'name'=>$data['fname']." ".$data['lname'],
              'logged_in' => 1
              ); 
            set_sessions($session_data);
            $output = array(
                  'error' => false,
                  'message' =>"Your Account is created successfully, Continue to login"
                  );
            
              }
              else{
                $output = array(
                  'error' => true,
                  'message' =>"Your email is already regester",
                  );
              }
      json_output(json_encode($output));


        }
  
}

?>