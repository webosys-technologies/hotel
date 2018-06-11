<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/client_model');
        $this->load->model('admin/client_model');
        $this->load->model('Placeorder');
        $this->load->model('admin/payment_model');
    }

    function index() {
        if (!admin_logged_in()) {
            redirect('admin');
        }
        $result = $this->client_model->getuserList("");
        $hotels = $this->client_model->gethotelList("",1000,0);
        $orders=$this->Placeorder->getorders("");
        $payment=$this->payment_model->getpaymentamt("");
        foreach ($payment as $key => $value) {
            $paymentamt[]=$value->amount_paid;
        }
        $this->data['page_title'] = "Dashboard";
        $this->data['usercount']= count($result);
        $this->data['hotelcount']= count($hotels);
        $this->data['ordercount']= count($orders);
        $this->data['paymentcount']= array_sum($paymentamt);
        

        load_backend_page('backend/dashboard/index', $this->data);
    }  
}
