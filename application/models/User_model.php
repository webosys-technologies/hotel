<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


  public function upload_data($field_name, $upload_path, $allowd_types = '', $max_size = 5024, $max_width = 0, $max_height = 0) {

    $config['upload_path'] = $upload_path;
    $config['allowed_types'] = '*';
    $file_old_name = $_FILES[$field_name]['name'];
    if (strripos($file_old_name, ".")) {
        try {
            $file_name_explode = explode(".", $file_old_name, -1);
            $file_name_without_ext = implode(".", $file_name_explode);
            $temp_file_name = explode(".", $file_old_name);
            $file_ext = $temp_file_name[count($temp_file_name) - 1];
            $file_new_name = $file_name_without_ext . "__" . date("dmY_His") . "__." . $file_ext;
        } catch (Exception $e) {
            $file_new_name = $file_old_name;
        }
    } else {
        $file_new_name = $file_old_name;
    }
    $config['file_name'] = $file_new_name;
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload($field_name)) {
        $result = array("succ" => FALSE, "_err_msg" => $this->upload->display_errors());
    } else {
        $result = array("succ" => TRUE, "data" => $this->upload->data(), "path" => $this->upload->data('file_path'));
    }
    return $result;
}
function add_hotel($filters = array()) {
//    print_r($filters) ;
//    die();
    if (isset($filters['hotel_id']) && $filters['hotel_id'] != '') {
     $filters['hotel_id']=custom_decode($filters['hotel_id']);

     $this->db->where('hotel_id', $filters['hotel_id']);
       // array_pop($filters);
       // debug($filters);
     $this->db->update('hotel_details', $filters);
       // debug($this->db->affected_rows());
     return $this->db->affected_rows();
 }
 else{
    $this->db->insert("hotel_details", $filters);
 
    return $this->db->insert_id();
}
}

function add_room($filters = array()){

 if (isset($filters['room_id']) && $filters['room_id'] != '') {
//     $filters['hotel_id']=custom_decode($filters['hotel_id']);
     $filters['room_id']=custom_decode($filters['room_id']);

     $this->db->where('room_id', $filters['room_id']);
        // array_pop($filters);
          // debug($filters);
        $result = $this->db->update('available_room', $filters);
      //     echo $this->db->last_query();
      // die();
        if($result){
            return true;
        }else{
            return false;
        }
    }else{
//        echo '<pre>';
//     print_r($filters);
//     die();
        $this->db->insert("available_room", $filters);
        echo $this->db->last_query();
    die();
        return $this->db->insert_id();
    }
}
function add_price($filters = array()) {
//     print_r($filters);
// die();
    if (isset($filters['price_id']) && $filters['price_id'] != '') {
//         $filters['hotel_id']=custom_decode($filters['hotel_id']);
     $filters['price_id']=custom_decode($filters['price_id']);

     $this->db->where('price_id', $filters['price_id']);
   // if(isset($filters['price_id'])){
   //      $this->db->where('price_id',custom_decode($filters['price_id']));
        // array_pop($filters);
          // debug($filters);
        $result = $this->db->update('total_price', $filters);
      //    echo $this->db->last_query();
      // die();
        if($result){
            return true;
        }else{
            return false;
        }
    }else{
    $this->db->insert("total_price", $filters);
    return $this->db->insert_id();
}
}
function add_hotel_room($filters = array()) {
 
 if (isset($filters[0]['hotel_id']) && $filters[0]['hotel_id'] != '') {
    
        
                $where = array('hotel_id' =>$filters[0]['hotel_id']);
                
		$result = $this->db->delete('hotel_room', $where);
//     
		if ($result) {
                    $this->db->insert_batch("hotel_room", $filters);
//                               echo $this->db->last_query();
//       die();
                     return $this->db->insert_id();
		}
		return false;
    }else{
    $this->db->insert_batch("hotel_room", $filters);
     echo $this->db->last_query();
     die();
    return $this->db->insert_id();
 }
}

function get_hotel_details($filters = array()) {
// print_r($filters);
// die();
    $this->db->select("*");
    $this->db->from("hotel_details");
    $this->db->order_by("hotel_id", 'desc');
    if (isset($filters['add_by']) && $filters['add_by'] != '') {
        $this->db->where("add_user", $filters['add_by']);   
        return $this->db->get()->result_array();   
    }
    return $this->db->get()->result_array();   

}  


}