<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('htl/client_model');
        $this->load->model('htl/client_model');
        $this->load->model('Placeorder');
    }

    function index() {
        if (!htl_logged_in()) {
            redirect('htl');
        }
        
        $result = $this->client_model->getuserList("");
        $hotels = $this->client_model->gethotelList("",1000,0);
        $orders=$this->Placeorder->getorders("");
        $this->data['page_title'] = "Dashboard";
        $this->data['usercount']= count($result);
        $this->data['hotelcount']= count($hotels);
        $this->data['ordercount']= count($orders);
        

        load_htlbackend_page('htl/dashboard/index', $this->data);
    }  
}
