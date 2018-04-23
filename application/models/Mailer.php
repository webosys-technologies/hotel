<?php

class Mailer extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function send_mail($mail_data) {

        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'UTF-8';
        $config['dsn'] = TRUE;
        $config['wordwrap'] = TRUE;
        $config['validate'] = TRUE;
        $config['mailtype'] = "html";
        $this->email->initialize($config);
        $this->email->from($mail_data['from'], "Maihyaryatra");
        $this->email->to($mail_data['to']);
        $this->email->subject($mail_data['subject']);
        $this->email->message($mail_data['message']);
        $res=$this->email->send();
        if($res){
            return true;
        }else{
            return false;
        }
    }

}
