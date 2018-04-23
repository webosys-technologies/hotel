<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Searchhotel extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

        
         
           public function Countroom()
	{	
               
	$this->db->select("count('hr.hotel_id') as total_room, hr.hotel_id,hr.bed_type,hd.*"); 
		$this->db->from('hotel_room hr');
                $this->db->join("hotel_details hd", "hr.hotel_id = hd.hotel_id", "LEFT");
                
                $this->db->where('hr.booking_status','0');
               $this->db->group_by("hr.bed_type");
                 $this->db->group_by("hr.hotel_id");
       
       $result =$this->db->get()->result_array();
       print_r($result);
       die();
//       echo $this->db->last_query();
//       die();
//       return $return;
    }
    public function searchhotel($filter=array()) {
//            print_r($filter) ;
//            die(); 
		$this->db->select("count('hr.hotel_id') as total_room, hr.hotel_id as roomhotel_id,hr.bed_type,hd.*"); 
		$this->db->from('hotel_room hr');
                $this->db->join("hotel_details hd", "hr.hotel_id = hd.hotel_id", "LEFT");
                $this->db->where('hd.isverified','1');
                $this->db->where('hr.booking_status','0');
                  if (isset($filter['bed_type']) && $filter['bed_type'] != '') {
                  $this->db->where("bed_type" ,$filter['bed_type']);
            }
//                   if (isset($filter['bed_type']) && $filter['bed_type'] != '') {
//                  $this->db->where("hd.isverified" ,1);
//            }
//                  if (isset($filter['bed_type']) && $filter['bed_type'] != '') {
//                  $this->db->where("hr.isverified" ,1);
//            }
                  if (isset($filter['no_of_room']) && !empty($filter['no_of_room'])) {
                 $this->db->HAVING ("total_room >= '{$filter['no_of_room']}'");         
                  }
               $this->db->group_by("hr.hotel_id");
               $this->db->group_by("hr.bed_type");
                 
       
       return $this->db->get()->result();
//      echo $this->db->last_query();
//        die();
    }
 
//	public function searchhotel($filter=array()) {
////            print_r($filter) ;
////            die(); 
//		$this->db->select('*'); 
//		$this->db->from('hotel_details');
//                 if (isset($filter['no_of_room']) && !empty($filter['no_of_room'])) {
//                    
//                     
//            $this->db->where("left_hotel >= '{$filter['no_of_room']}'");        
//        }
//       $return =$this->db->get()->result();
//       echo $this->db->last_query();
//        die();
//       return $return;
//    }
// 

	
}