<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/login_model');
	}

	function getuserList($id) {
		// debug($id);
		if($id!="")
		{$data = array(
				'id' => custom_decode($id)			
				);
			$this->db->where($data);
		}
		if($id=="na"){
			return false;
		}
		$query = $this->db->select('*')->from('user')->get();
		if ($query->num_rows() >=1) {
			$result = $query->result();
			return $result;
		}
		return false;	
	}

	function deleteUser($value){
		$where = array(
			'id' =>custom_decode($value)
			);
		$result = $this->db->delete('user', $where);
		if ($result) {
			return true;
		}
		return false;
	}

	function status($value){
		$status=1;
		if($value['isverified']=="verified"){
			$status=0;
		}
		$value['isverified']=$status;
		$this->db->where('id',custom_decode($value['id']));
		array_shift($value);
		$result = $this->db->update('user', $value);
		if ($result) {
			return true;
		}
		return false;
	}
function orderstatus($value){
		$status=1;
		if($value['status']=="checkin"){
			$status=0;
		}
		$value1['status']=$status;
         
		$this->db->where('id',custom_decode($value['id']));

		$result = $this->db->update('orders', $value1);
//                 echo $this->db->last_query();
//                die();
//		if ($result) {
//                 if($value['status']=="checkin"){
//                $data['left_hotel']=$value['avl_room']+ $value['no_of_room'];
//              
//		$this->db->where('hotel_id',$value['hotel_id']);
//		
//		$res = $this->db->update('hotel_details', $data);
////                echo $this->db->last_query();
////                die();
//                 }else{
//                     $data['left_hotel']=$value['total_room']- $value['no_of_room'];
//              
//		$this->db->where('hotel_id',$value['hotel_id']);
//		
//		$res = $this->db->update('hotel_details', $data); 
//                 }
		if ($result) {
			return true;
		}
//			return true;
//                }
		return false;
	}
        function roomstatus($filter=array()){
//             debug($filter);
//                 die();
	         $result = $this->db->update_batch('hotel_room', $filter, 'hotel_room_id');
//             echo $this->db->last_query();
//                die();
                    return $this->db->affected_rows();
            }
        
        

        function gethotel($id,$limit,$start,$data=array()) 
	{

//		 debug($id);
//                 die();
//		$this->db->select('hd.*,ar.room_id,tp.price_id')->from('hotel_details hd')->join('available_room ar', 'hd.hotel_id=ar.hotel_id','left')->where('hd.left_hotel>0')->join('total_price tp', 'hd.hotel_id=tp.hotel_id','left')->where('left_hotel>0')->order_by('hd.hotel_id','DESC');	
		$this->db->select('hd.*')->from('hotel_details hd')->where('hd.hotel_id>0')->order_by('hd.hotel_id','DESC');	
		
		if(isset($id) && $id!=""){
			$this->db->where('hd.hotel_id',custom_decode($id['hotel_id']));
		}
		$this->db->limit($limit, $start);
		$query =$this->db->get();
//		 echo $this->db->last_query();
//		 die();
		// debug($query);
		if ($query) {
			$result = $query->result();
			return $result;
		}
		return false;	
	}
     
        function gethotelListfront($id,$limit,$start,$data=array()) 
	{

		// debug($id['userid']);
//		$this->db->select('hd.*,ar.room_id,tp.price_id')->from('hotel_details hd')->join('available_room ar', 'hd.hotel_id=ar.hotel_id','left')->where('hd.left_hotel>0')->join('total_price tp', 'hd.hotel_id=tp.hotel_id','left')->where('left_hotel>0')->order_by('hd.hotel_id','DESC');	
		$this->db->select('hd.*')->from('hotel_details hd')->where('hd.isverified=1')->order_by('hd.hotel_id','DESC');	
			
                if(!isset($id) && $id!="") {			
			$this->db->where('hd.hotel_id',custom_decode($id));
		}
		if(isset($id['userid'])){
			$this->db->where('hd.create_user',$id['userid']);
		}
		$this->db->limit($limit, $start);
		$query =$this->db->get();
//		 echo $this->db->last_query();
//		 die();
		// debug($query);
		if ($query) {
			$result = $query->result();
			return $result;
		}
		return false;	
	}
                function getparti_hotel($data=array()) { 
                    $data['hotel_id']=custom_decode($data['hotel_id']);
                  $this->db->select('count(hotel_room_id) as numid')->from('hotel_room')->where('hotel_id',$data['hotel_id'])->where('booking_status=0');	
		  $query =$this->db->get();
//		 echo $this->db->last_query();
//		 die();
		// debug($query);
		if ($query) {
			$result = $query->result();
			return $result;
		}
		return false;	
	}
            
        
	function gethotelList($id,$limit,$start,$data=array()) 
	{

		// debug($id['userid']);
//		$this->db->select('hd.*,ar.room_id,tp.price_id')->from('hotel_details hd')->join('available_room ar', 'hd.hotel_id=ar.hotel_id','left')->where('hd.left_hotel>0')->join('total_price tp', 'hd.hotel_id=tp.hotel_id','left')->where('left_hotel>0')->order_by('hd.hotel_id','DESC');	
		$this->db->select('hd.*')->from('hotel_details hd')->where('hd.hotel_id>0')->order_by('hd.hotel_id','DESC');	
			
                if(!isset($id) && $id!="") {			
			$this->db->where('hd.hotel_id',custom_decode($id));
		}
		if(isset($id['userid'])){
			$this->db->where('hd.create_user',$id['userid']);
		}
		$this->db->limit($limit, $start);
		$query =$this->db->get();
//		 echo $this->db->last_query();
//		 die();
		// debug($query);
		if ($query) {
			$result = $query->result();
			return $result;
		}
		return false;	
	}
       function gethotelList1($id,$limit,$start,$data=array())  {

		// debug($id['userid']);
		$this->db->select('hd.*,ar.room_id,tp.price_id')->from('hotel_details hd')->join('available_room ar', 'hd.hotel_id=ar.hotel_id','left')->where('hd.left_hotel>0')->join('total_price tp', 'hd.hotel_id=tp.hotel_id','left')->where('left_hotel>0')->order_by('hd.hotel_id','DESC');	
			
                if(!isset($id['userid']) && $id!="") {			
			$this->db->where('hd.hotel_id',custom_decode($id));
		}
		if(isset($id['userid'])){
			$this->db->where('hd.create_user',$id['userid']);
		}
		$this->db->limit($limit, $start);
		$query =$this->db->get();
//		 echo $this->db->last_query();
//		 die();
		// debug($query);
		if ($query) {
			$result = $query->result();
			return $result;
		}
		return false;	
	}
        function getroomprice($id,$data=array()) 
	{

		// debug($id['userid']);
  $this->db->select('hr.*')->from('hotel_room hr')->order_by('hd.hotel_id','DESC');	
			
                if(!isset($id) && $id!="") {			
			$this->db->where('hd.hotel_id',custom_decode($id));
		}

		$query =$this->db->get();

		if ($query) {
			$result = $query->result();
			return $result;
		}
		return false;	
	}
        function gethotelroom($id,$limit,$start,$data=array()) 
	{
		$this->db->select('hr.hotel_id,hr.hotel_room_id,hr.bed_type,hr.price,hr.ac_non_room,hr.room_no,hr.room_avalivality,hr.person_allowed')->from('hotel_room hr');	
		if(!isset($id['userid']) && $id!="") {			
//			$this->db->where('hr.hotel_room_id',custom_decode($id));
                        	$this->db->where('hr.hotel_id',custom_decode($id));
		}
		if(isset($id['userid'])){ 
			$this->db->where('hr.create_user',$id['userid']);
		}
		$this->db->limit($limit, $start);
		$query =$this->db->get();
//		 echo $this->db->last_query();
//		 die();
		// debug($query);
		if ($query) {
			$result = $query->result();
			return $result;
		}
		return false;	
	}
	

	function deleteHotel($value){
		$where = array(
			'hotel_id' =>custom_decode($value)
			);
		$result = $this->db->delete('hotel_details', $where);
                if($result){
                   $res1 = $this->db->delete('hotel_room', $where);
                   $res2= $this->db->delete('total_price', $where);
                   $res3 = $this->db->delete('available_room', $where);
                    
			return true;
               }
		return false;
	}
        function deleteRoom($value){
		$where = array(
			'hotel_room_id' =>custom_decode($value)
			);
		$result = $this->db->delete('hotel_room', $where);
                if($result){
                    
			return true;
               }
		return false;
	}

	function hotelstatus($value){
		$status=1;
		if($value['isverified']=="verified"){
			$status=0;
		}
		$value['isverified']=$status;
		$this->db->where('hotel_id',custom_decode($value['hotel_id']));
		array_shift($value);
		$result = $this->db->update('hotel_details', $value);
		if ($result) {
			return true;
		}
		return false;
	}

        	function avl_room($filters = array()){   
//                    echo $filters;
//                    die();
      
          $this->db->select("av.*,ord.no_of_room ,ord.hotel_id,ord.avl_room,(ord.avl_room + ord.no_of_room) as all_room");
        $this->db->from("orders ord");
        $this->db->join('available_room av', 'ord.hotel_id = av.hotel_id');
        if(isset($filters) && $filters!=''){  
              $this->db->where("checkout < ('{$filters}')");
     $result=  $this->db->get()->result_array();
     
     
//       echo  $this->db->last_query();
////            print_r($result);
//       die();
       
        }
          $avl_room=array(
              'avl_room'=>all_room,
          );
          $hotel_id=array(
              'hotel_id'=>hotel_id,
          );
          
	if ($result) {
            
			return true;
		}
		return false;
	}
     
        
//	function gethotelorder($limit,$start,$data=array()) 
//	{
//
//		// debug($id['userid']);
//		$this->db->select('od.*')->from('orders od')->order_by('od.id','DESC');	
//	
//		$this->db->limit($limit, $start);
//		$query =$this->db->get();
////		 echo $this->db->last_query();
////		 die();
//		// debug($query);
//		if ($query) {
//			$result = $query->result();
//			return $result;
//		}
//		return false;	
//	}




	function gethotel_with_room($id,$limit,$start,$data=array()) 
	{
		//$this->db->select('hd.*,hr.*')->from('hotel_details hd')->join('hotel_room hr', 'hd.hotel_id=hr.hotel_id','left');	
		$this->db->select('hd.hotel_name,hr.*')->from('hotel_room hr')->join('hotel_details hd', 'hr.hotel_id=hd.hotel_id','left');	
		
                if(isset($id) && $id!="") {	
                    $hotelid=custom_decode($id);
			$this->db->where('hr.hotel_room_id',$hotelid)->order_by('hr.hotel_room_id','DESC');;
		}
		$this->db->limit($limit, $start);
		$query =$this->db->get();
		if ($query) {
			$result = $query->result();
			return $result;
		}
		return false;	
	}
        function updatehotelroom($filters = array()) {
//    print_r($filters) ;
//    die();
    if (isset($filters['hotel_room_id']) && $filters['hotel_room_id'] != '') {
     $filters['hotel_room_id']=custom_decode($filters['hotel_room_id']);

     $this->db->where('hotel_room_id', $filters['hotel_room_id']);
       // array_pop($filters);
       // debug($filters);
     $this->db->update('hotel_room', $filters);
//     echo $this->db->last_query();
//     die();
       // debug($this->db->affected_rows());
     return $this->db->affected_rows();
 }
 else{
    $this->db->insert("hotel_room", $filters);
 
    return $this->db->insert_id();
}
}
function gethotel_room($id,$limit,$start,$data=array()) 
	{
		//$this->db->select('hd.*,hr.*')->from('hotel_details hd')->join('hotel_room hr', 'hd.hotel_id=hr.hotel_id','left');	
		$this->db->select('hd.*,hr.*')->from('hotel_room hr')->join('hotel_details hd', 'hr.hotel_id=hd.hotel_id','left');	
		
                if(isset($id['hotel_id']) && $id['hotel_id']!="") {	
                    $hotelid=custom_decode($id['hotel_id']);
			$this->db->where('hr.hotel_id',$hotelid)->order_by('hr.hotel_room_id','DESC');;
		}
		$this->db->limit($limit, $start);
		$query =$this->db->get();
//                echo $this->db->last_query();
//                die();
		if ($query) {
			$result = $query->result();
			return $result;
		}
		return false;	
	}
}  