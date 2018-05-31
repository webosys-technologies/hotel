<?php  

/**
 * 
 */
class Otp extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

		function send_otp()
        {          
            $email=$this->input->post('member_email');
            $val=is_numeric($email);
            
            if($val)
            {
                $res=$this->User_model->check_mobile_exist($email);

                if($res == true)
                {
                	//echo "Mobile is not registered";
                     echo json_encode(array('mobile_error'=>'This Mobile is not registered'));
                }else{	
                     $rand=mt_rand(100000,999999);
                $data=array('otp'=>$rand);
               // $this->session->set_userdata($otp_mobile);
               
                 $this->User_model->update_otp(array('phone'=>$email),$data);
     //Your authentication key

$authKey = "217899AjUpTycrXx6K5b0e2283";    //suraj9195shinde for

//Multiple mobiles numbers separated by comma

$mobileNumber = $email;
//Sender ID,While using route4 sender id should be 6 characters long.

$senderId = "pkgnau";
//Your message to send, Add URL encoding here.

$message =$rand.' is your OTP for verifying mobile number on packagingnaukri.com.';


//Define route 

$route = "4";
//Prepare you post parameters

$postData = array(

    'authkey' => $authKey,

    'mobiles' => $mobileNumber,

    'message' => $message,

    'sender' => $senderId,

    'route' => $route

);


//API URL

$url="http://api.msg91.com/api/sendhttp.php";


// init the resource

$ch = curl_init();
curl_setopt_array($ch, array(

    CURLOPT_URL => $url,

    CURLOPT_RETURNTRANSFER => true,

    CURLOPT_POST => true,

    CURLOPT_POSTFIELDS => $postData

    //,CURLOPT_FOLLOWLOCATION => true

));
//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

//get response

$output = curl_exec($ch);
//Print error if any
if(curl_errno($ch))
{
   // echo json_encode(array('error'=> curl_error($ch)));
}
curl_close($ch);

echo json_encode(array('send'=>'OTP is sent Successfully'));       
            }


}else{
            // $res=$this->Members_model->check_if_email_exist($email);
            // if($res)
            // {
            //     echo json_encode(array('email_error'=>'This email is not registered'));
            // }else{
                
            //     $send=$this->email_otp($email);
            //     if($send)
            //     {
            //     echo json_encode(array('send'=>'OTP is Send Successfully '));
            //     }
            // }   
            }
 }

  function query()
  {
  	$res=$this->User_model->query();
  	if ($res) {
  		echo 'success';
  	}
  }
}




?>