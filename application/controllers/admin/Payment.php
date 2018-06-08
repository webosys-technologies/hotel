<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!admin_logged_in()) {
            redirect('admin');
        }
        $this->load->model('admin/Payment_model');
    }

    function index()
    {
        $includes = array('datatable', 'iCheck');
        $this->data['inclusions'] = inclusions($includes);
        $this->data['page_title'] = "List of Payments";

        $result = $this->Payment_model->getall_list();
        // debug($result);
        if($result){
            $this->data['userdata']=$result;
        }
        
        load_backend_page('backend/client/payment_view', $this->data);
    }
}

?>    