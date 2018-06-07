<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('string');
    $this->load->model('Searchhotel');
		$this->load->model('Login_model');
                $this->load->model('placeorder');
		$this->load->model('mailer');
	}

	public function index()
	{
            $req=$this->input->post();
//            echo '<pre>';
//print_r($req);
//die();
            $no_of_room=1;
              $checkin=$req['checkin'];
            $checkinvalue=(explode("/",$checkin));
            $searchcheckin=implode("-",array($checkinvalue[2], $checkinvalue[0],$checkinvalue[1]));
            $checkout=$req['checkout'];
            $checkoutvalue=(explode("/",$checkout));
            $searchcheckout=implode("-",array($checkoutvalue[2], $checkoutvalue[0],$checkoutvalue[1]));
           $userid=$this->session->userdata('userid');
		$input=array(

      'orderid'=>random_string('alnum',5),
	     'user_id' =>$userid,
			'amount_pay'=>$_POST['youpay'],
			'transaction_id'=>$_POST['razorpay_payment_id'],
                        'hotel_id'=>$_POST['hotel_id'],
			'bed_type'=>$_POST['bed_type'],
                        'owner_id'=>$_POST['owner_id'],
                        'user_id'=>$_POST['userid'],
                       'no_of_room'=>$no_of_room,
			'checkin'=>$searchcheckin,
			'checkout'=>$searchcheckout,
                        'status'=>1,
      'paid_percentage'=>$_POST['hotel_price'],
                       // 'total_room'=>$_POST['left_hotel'],
                       // 'avl_room'=>($_POST['left_hotel']-$_POST['no_of_room'])
			);
    // print_r($input);
    
                 $countroom = $this->placeorder->bookCountroom($input); 
                 // $totalroomno=sizeof($countroom);
                 $totalroomno=1;
                // print_r($countroom);
                // die();
                $data=array(
                    'hotel_id'=>$_POST['hotel_id'],
                    'bed_type'=>$_POST['bed_type'],
                   'no_of_room'=>$no_of_room, 
                  // 'total_room'=>$countroom['total_room'],
                );
                  $booking=array();
                if($totalroomno >= $no_of_room){
                    $result['list']  = $this->placeorder->bookroom($data);
           
                    $ids = array_column($result['list'], 'hotel_room_id');
                     
                   foreach ($ids as $value) {
                      $booking[] = array(
                             "booking_status" => 1, 
                          'hotel_room_id'=>$value,
                      );
                 }
               $input['room_nos']=$ids;
                $input['room_nos'] = implode(",", $input['room_nos']);
//                print_r($input['room_nos']);
//                die();
		$result = $this->placeorder->placeorder($input);
                if($result){
                  $this->payment($input);
                  // $res = $this->placeorder->updateroomstatus($booking);
                }
//                   die();
		if($result)
		{	
			$this->data['hoteldata']=$input;
		}else{
			$this->data['hoteldata']=array();
        } 
        
                }
                 else{
                    echo 'please Select Some Room In Other Type';
                }
		  
      $id=$this->session->userdata('userid');
      $user=$this->Login_model->user_data($id);

		$data=array('from'=>SOURCEMAIL,'to'=>$user->email,'subject'=>"Maiharyatra Booking Detail",'message'=>"Hi Your hotel with order no <h1>".$input['orderid']."</h1> is booked successfully. For more detail you can call us on 7289058852. Our team ll connect you shortly");
		$res= $this->mailer->send_mail($data);

		if($res)
		{
			$output = array(
				'error' => false,
				'message' =>"Your Order is placed successfully.",
				'data'=>$input['orderid']
				);
		}else {
			$output = array(
				'error' => true,
				'message' => 'Something went wrong please try again.',
				'data'=>$input['orderid']
				);
		}
                
		json_output(json_encode($output));
	}

        public function mang_order()
	{
		$result = $this->client_model->gethotelorder("",1000,0);
		if($result) {
			$this->data['orderdata']=$result;
		}else{
			$this->data['orderdata']=array();
		}
		$this->load->view('client/mang_hotel_order',$this->data);
	}

         public function getprice()
	{
             $response=array();
             $req=$this->input->post();
           // print_r($req);


              $checkin=$req['checkin'];
            $checkinvalue=(explode("/",$checkin));
            $searchcheckin=implode("-",array($checkinvalue[2], $checkinvalue[0],$checkinvalue[1]));
            $checkout=$req['checkout'];
            $checkoutvalue=(explode("/",$checkout));
            $searchcheckout=implode("-",array($checkoutvalue[2], $checkoutvalue[0],$checkoutvalue[1]));

               $date1=new DateTime($searchcheckin);
               $date2= new DateTime($searchcheckout);
                $diff=$date1->diff($date2);
                 $day=$diff->format("%d");
                if ($day == 0) {
                  $day=1;
                }
            
             
                        $res = $this->placeorder->getprice($req);
                        
            //            print_r($res);
            // die();  
		if($res)
		{


                              if (!empty($res[0]['hotel_price'])) {
                              	$response['success'] = TRUE;
                              $response['msg'] = "Room Available";
                              $per=$res[0]['hotel_price']/100;
                              $response['amt']=$res[0]['price']*$day*$per;
                              $response['data']=$res[0]['price']*$day+$response['amt'];
                              $response['avl']="Remaining amount to be paid at Hotel";
                              $response['hotel_price']=$res[0]['hotel_price'];
                              }else{
                              	$response['success'] = TRUE;
                              $response['msg'] = "Room Available";
                              $response['data']=$res[0]['price']*$day;
                              $response['amt']=$response['data'];
                              $response['hotel_price']=0;


                              }

//				'error' => false,
//				'message' =>"success.",
//				'data'=>$res[0]['price']*$req['no_of_room'],
				
		}else {
           
			      $response['success'] = FALSE;
                              $response['msg'] = "Please select Other Room";
                              $response['bederr']='Please select Other Bed Type';
                              $response['avl']='Please select Other Bed Type';
		}
                
		json_output(json_encode($response));
	}

  function payment($input)
  {
   // echo $input['orderid'];
    $data=array(
          'orderid' =>$input['orderid'],
          'transaction_id' =>$input['transaction_id'],
          'amount_paid'  => $input['amount_pay'],
          'paid_percentage' => $input['paid_percentage'],
          'payment_status'  =>$input['status'],
          'created_at' =>date('Y-m-d h:i:s'),

    );

    $result=$this->placeorder->payment_add($data);
    if ($result) {
    return True;
    }



  }
}
