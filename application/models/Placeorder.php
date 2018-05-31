<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Placeorder extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	

	public function placeorder($data){

//		 debug($data);	
//                 die();
		// $this->db->where($data);
		$query = $this->db->insert('orders',$data);
              
		if($query){
                 
		// $data1['left_hotel']=$data['avl_room'];
		// $this->db->where('hotel_id',$data['hotel_id']);
		
		// $result = $this->db->update('hotel_details', $data1);
                
		// if ($result) {
		// 	return true;
		// }
			return true;
		}else{
			return false;
		}
		
	}
        
        public function bookCountroom($filter=array())
	{	
//            print_r($filter);
//            die();
            
//         $this->db->select("count('hr.hotel_id') as total_room,hotel_room_id, hr.hotel_id,hr.bed_type"); 
	$this->db->select("hotel_room_id, hr.hotel_id,hr.bed_type"); 	
            $this->db->from('hotel_room hr');
            
                
                $this->db->where('hr.booking_status','0');
                 if (isset($filter['hotel_id']) && !empty($filter['hotel_id'])) {              
                 $this->db->where ("hotel_id " ,$filter['hotel_id']);         
                  }
                   if (isset($filter['bed_type']) && !empty($filter['bed_type'])) {              
                 $this->db->where ("bed_type " ,$filter['bed_type']);         
                  }
                  if (isset($filter['no_of_room']) && !empty($filter['no_of_room'])) {
                  
//                 $this->db->HAVING ("total_room >= '{$filter['no_of_room']}'");         
                  }
//               $this->db->group_by("hr.bed_type");
//                 $this->db->group_by("hr.hotel_id");
       
        $return =$this->db->get()->result_array();
//       
//       echo $this->db->last_query();
//       die();
       return $return;
    
    }
//	$this->db->select("count('hotel_id') as total_room, hotel_id,bed_type"); 
//		$this->db->from('hotel_room');
//                $this->db->where('booking_status','0');
//               $this->db->group_by("bed_type");
//                 $this->db->group_by("hotel_id");
//       
//       $return =$this->db->get()->result_array();
//       
////       echo $this->db->last_query();
////       die();
//       return $return;
//    }
   
	public function bookroom($filters=array()){

//		 debug($filters);	
//                 die();
////		
                $this->db->select("*"); 
		$this->db->from('hotel_room');
                $this->db->where('booking_status','0');
                  if (isset($filters['hotel_id']) && $filters['hotel_id'] != '') {
                  $this->db->where("hotel_id" ,$filters['hotel_id']);
            }
                 if (isset($filters['bed_type']) && $filters['bed_type'] != '') {
                  $this->db->where("bed_type" ,$filters['bed_type']);
            }
            //      if (isset($filters['no_of_room']) && $filters['no_of_room'] != '') {
            //       $this->db->limit($filters['no_of_room']);
            // }
          $this->db->limit(1);
       
       $return =$this->db->get()->result_array();
 
       return $return;

	}
            	public function updateroomstatus($filter=array()) {

                    $result = $this->db->update_batch('hotel_room', $filter, 'hotel_room_id');
                    return $this->db->affected_rows();
            }
        
	public function getorders($id)
	{	
           
            if(empty($id))
            {
                  $this->db->from('orders as ord');
                  $this->db->join('user as usr', 'usr.id=ord.user_id', 'LEFT'); 
                   $this->db->join('hotel_details as dtl', 'dtl.hotel_id=ord.hotel_id', 'LEFT'); 
                   $query1 = $this->db->get();
                  $result1=$query1->result();
//                  print_r($result1);
//                  die;
               if($result1)
                        {
			return $result1;
		}else{
		return false;
                }
            }else{
		  $this->db->from('orders as ord');
                  $this->db->join('user as usr', 'usr.id=ord.user_id', 'LEFT');
                   $this->db->join('hotel_details as dtl', 'dtl.hotel_id=ord.hotel_id', 'LEFT'); 
                  $this->db->where('ord.owner_id',$id);
                  $query = $this->db->get();
                  $result=$query->result();
                
                        if($result)
                        {
			return $result;
		}else{
		return false;
                }
            }
	}
         public function getprice($filter=array())
	{	
    $this->db->from('hotel_room as hr');           
	$this->db->select("count('hr.hotel_id') as totalroom, hr.hotel_id,bed_type,price,hotel_price"); 
    $this->db->join('hotel_details as hd','hd.hotel_id=hr.hotel_id','Left');
                $this->db->where('booking_status','0');
                   if (isset($filter['bed_type']) && !empty($filter['bed_type'])) {
                 $this->db->where ("bed_type ", $filter['bed_type']);      
                  }
                   if (isset($filter['hotel_id']) && !empty($filter['hotel_id'])) {
                 $this->db->where ("hr.hotel_id ", $filter['hotel_id']);         
                  }
               $this->db->group_by("bed_type");
                 $this->db->group_by("hr.hotel_id");
       
       $return =$this->db->get()->result_array();
//       print_r($return);
//       die;
//       echo $this->db->last_query();
//       die();
       return $return;
    }

    function query()
    {
      $this->db->query('ALTER TABLE `hotel_details` DROP `owner_email`');
      $this->db->query('ALTER TABLE `hotel_details` DROP `owner_name`');
      $this->db->query('ALTER TABLE `hotel_details` DROP `owner_mobile_no`');
      $this->db->query('ALTER TABLE `hotel_details` DROP `owner_telephone`');
      $this->db->query('ALTER TABLE `orders` DROP `customer_name`');
      $this->db->query('ALTER TABLE `orders` DROP `customer_email`');
      $this->db->query('ALTER TABLE `orders` DROP `customer_address`');
      $this->db->query('ALTER TABLE `orders` DROP `customer_mobile`');
      $this->db->query('ALTER TABLE `orders` DROP `city`');
      $res=$this->db->query('ALTER TABLE `orders` DROP `pincode`');

        return $res;
    }
}