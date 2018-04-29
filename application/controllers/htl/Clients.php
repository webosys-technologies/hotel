<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends MY_Controller
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
        $this->data['page_title'] = "List of Users";

        $result = $this->client_model->getuserList("");
        // debug($result);
        if($result){
            $this->data['userdata']=$result;
        }
        
        load_backend_page('backend/client/index', $this->data);
    }

    function profile($id){

       $includes = array('datatable','validate','iCheck','datepicker');
       $this->data['inclusions'] = inclusions($includes);
       $this->data['page_title'] = "User Detail";
       $result = $this->client_model->getuserList($id);
       $this->data['client_info']=$result;
       load_backend_page('backend/client/profile', $this->data);

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

function delete_user()
{
    $result = $this->client_model->deleteUser($_GET['id']);
    if ($result) {
       set_flashdata('message', "Account is deleted successfully!", 'success');
       redirect('admin/clients');
   }else {
       set_flashdata('message', "Opps: Some thing went wrong, please try again!", 'danger');
       redirect('admin/clients');
   }
}
public function hotel(){

  load_backend_page('backend/client/hotel', $this->data);
}
}