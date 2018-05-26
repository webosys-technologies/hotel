<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('string');
		$this->load->model('Searchhotel');
                $this->load->model('placeorder');
		$this->load->model('mailer');
	}

	public function index()
	{
            $req=$this->input->post();
//            echo '<pre>';
//print_r($req);
//die();
              $checkin=$req['checkin'];
            $checkinvalue=(explode("/",$checkin));
            $searchcheckin=implode("-",array($checkinvalue[2], $checkinvalue[0],$checkinvalue[1]));
            $checkout=$req['checkout'];
            $checkoutvalue=(explode("/",$checkout));
            $searchcheckout=implode("-",array($checkoutvalue[2], $checkoutvalue[0],$checkoutvalue[1]));
           
		$input=array('orderid'=>random_string('alnum',5),
			'customer_name'=>$_POST['name'],
			'customer_email'=>$_POST['email'],
			'customer_mobile'=>$_POST['mobile_no'],
			'customer_address'=>'',
			'city'=>$_POST['city'],
			'pincode'=>'',
			'amount_pay'=>$_POST['youpay'],
			'transaction_id'=>$_POST['razorpay_payment_id'],
                        'hotel_id'=>$_POST['hotel_id'],
			'bed_type'=>$_POST['bed_type'],
                        'owner_id'=>$_POST['owner_id'],
                        'user_id'=>$_POST['userid'],
                        'no_of_room'=>$_POST['no_of_room'],
			'checkin'=>$searchcheckin,
			'checkout'=>$searchcheckout,
                        'status'=>'1',
                        'total_room'=>$_POST['left_hotel'],
                        'avl_room'=>($_POST['left_hotel']-$_POST['no_of_room'])
			);
                 $countroom = $this->placeorder->bookCountroom($input); 
                 $totalroomno=sizeof($countroom);
//                 print_r($totalroomno);
//                 die();
                $data=array(
                    'hotel_id'=>$_POST['hotel_id'],
                    'bed_type'=>$_POST['bed_type'],
                    'no_of_room'=>$_POST['no_of_room'], 
//                    'total_room'=>$countroom['total_room'],
                );
                  $booking=array();
                if($totalroomno >= $_POST['no_of_room']){
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
                   $res = $this->placeorder->updateroomstatus($booking);
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
		
		$data=array('from'=>SOURCEMAIL,'to'=>$_POST['email'],'subject'=>"Maiharyatra Booking Detail",'message'=>"Hi Your hotel with order no <h1>".$input['orderid']."</h1> is booked successfully. For more detail you can call us on 7289058852. Our team ll connect you shortly");
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
            // die();
             
                        $res = $this->placeorder->getprice($req);
                        
            //            print_r($res);
            // die();  
		if($res)
		{
                              if (!empty($res[0]['price'])) {
                              	$response['success'] = TRUE;
                              $response['msg'] = "Room Available";
                              $per=$res[0]['hotel_price']/100;
                              $response['amt']=$res[0]['price']*$req['no_of_room']*$per;
                              $response['data']=$res[0]['price']*$req['no_of_room']+$response['amt'];
                              $response['avl']="Remaining amount to be paid at Hotel";
                              }else{
                              	$response['success'] = TRUE;
                              $response['msg'] = "Room Available";
                              $response['data']=$res[0]['price']*$req['no_of_room'];
                              $response['amt']=$response['data'];


                              }

//				'error' => false,
//				'message' =>"success.",
//				'data'=>$res[0]['price']*$req['no_of_room'],
				
		}else {
           
			      $response['success'] = FALSE;
                              $response['msg'] = "Please select Other Room";
                              $response['data']='Please select Other Bed Type';
                              $response['avl']='Please select Other Bed Type';
		}
                
		json_output(json_encode($response));
	}
}
