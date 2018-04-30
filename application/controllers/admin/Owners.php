<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Owners extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!admin_logged_in()) {
            redirect('admin');
        }
        $this->load->model('admin/client_model');
    }

    function index()
    {
        $includes = array('datatable', 'iCheck');
        $this->data['inclusions'] = inclusions($includes);
        $this->data['page_title'] = "List of Owners";

        $result = $this->client_model->getownerList("");
        // debug($result);
        if($result){
            $this->data['userdata']=$result;
        }
        
        load_backend_page('backend/client/owner_view', $this->data);
    }

    function profile($id){

       $includes = array('datatable','validate','iCheck','datepicker');
       $this->data['inclusions'] = inclusions($includes);
       $this->data['page_title'] = "Owner Detail";
       $result = $this->client_model->getownerList($id);
       $this->data['client_info']=$result;
       load_backend_page('backend/client/owner_profile', $this->data);

   }

   function status()
   {
    $request = array(
        'id' =>$_GET['id'],
        'isverified' => $_GET['status']
        );
    $result = $this->client_model->status($request);
    if ($result) {
        set_flashdata('message', "Status is updated successfully!", 'success');
        redirect('admin/clients');
    }else {
       set_flashdata('message', "Opps: Some thing went wrong, please try again!", 'danger');
       redirect('admin/clients');
   }
}

function delete_owner()
{
    $result = $this->client_model->deleteowner($_GET['id']);
    if ($result) {
       set_flashdata('message', "Account is deleted successfully!", 'success');
       redirect('admin/Owners');
   }else {
       set_flashdata('message', "Opps: Some thing went wrong, please try again!", 'danger');
       redirect('admin/Owners');
   }
}
public function hotel(){

  load_backend_page('backend/client/owner_view', $this->data);
}
}
