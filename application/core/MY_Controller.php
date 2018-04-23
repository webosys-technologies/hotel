<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    var $data;
    public function __construct()
    {
        parent::__construct();

        $this->data['title'] = SITE_NAME;

        $this->data['page'] = $this->uri->segment(1);

        $this->data['subpage'] = $this->uri->segment(2);

        $this->data['controller'] = $this->router->fetch_class();
        $this->data['method'] = $this->router->fetch_method();

        $this->data['inclusions'] = inclusions();

        if(get_session('timeZone') != '') {
            date_default_timezone_set(get_session('timeZone'));
        } else {
            date_default_timezone_set('Asia/Kolkata');
        }

    }

}
