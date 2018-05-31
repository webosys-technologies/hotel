<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Searchhotel');
                $this->load->model('placeorder');
	}
	public function index()
	{ 
            
            $req=$this->input->post();
         //      print_r($req);
         // die();
             if((isset($req['checkin'])&& $req['checkin']!='')&& (isset($req['checkout'])&& $req['checkout']!='')){
            $checkin=$req['checkin'];
            $checkinvalue=(explode("/",$checkin));
           $req['searchcheckin']=implode("-",array($checkinvalue[2], $checkinvalue[0],$checkinvalue[1]));
            $checkout=$req['checkout'];
            $checkoutvalue=(explode("/",$checkout));
           $req['searchcheckout']=implode("-",array($checkoutvalue[2], $checkoutvalue[0],$checkoutvalue[1]));
           
        }
//          $countroom = $this->Searchhotel->Countroom(); 
//          die();
//       $keyval = array_search($req['no_of_room'], array_column($countroom, 'total_room'));
////       print_r($keyval);
////       die();
//       
////          echo array_search("red",$countroom['list']);
//          echo'<pre>';
//          print_r($countroom);
//          die();
//             $data = array(
//                    'hotel_id'=>$_POST['hotel_id'],
//                    'bed_type'=>$_POST['bed_type'],
//                    'no_of_room'=>$_POST['no_of_room'], 
//                 );
//             
////          $req['bed_type']=$_POST['bed_type'];
////          $req['rooms']=$_POST['no_of_room'];
//                
//         
//                 $booking=array();
////                if($countroom['0']['total_room']>=$_POST['no_of_room']);
                  
		$result = $this->Searchhotel->searchhotel($req);
//                echo '<pre>';
//                print_r($result);
//                die();
//                die();
		if($result)
		{
			$this->data['searchresult']=$result;
		}else{
			$this->data['searchresult']=array();
		}
		$this->data['pickup']=$_POST;
		$this->load->view('search',$this->data);
	}

	function room_available()
	{  

	 $req=$this->input->post();
              // print_r($req);

         // die();
             if((isset($req['checkin'])&& $req['checkin']!='')&& (isset($req['checkout'])&& $req['checkout']!='')){
            $checkin=$req['checkin'];
            $checkinvalue=(explode("/",$checkin));
           $req['searchcheckin']=implode("-",array($checkinvalue[2], $checkinvalue[0],$checkinvalue[1]));
            $checkout=$req['checkout'];
            $checkoutvalue=(explode("/",$checkout));
           $req['searchcheckout']=implode("-",array($checkoutvalue[2], $checkoutvalue[0],$checkoutvalue[1]));
           
        }

		$result = $this->Searchhotel->search_room($req);
		// print_r($result);
		$ids=array();
		foreach ($result as $key => $value) {
			$ids[]=$value->room_nos;

		}
		//print_r($ids);
		$data=$this->Searchhotel->avl_room($req,$ids);
		$req['room_no']=$data->room_no;
		$val['res']=$req;
		$this->session->set_userdata($val);
		echo json_encode($req);
	}

}
