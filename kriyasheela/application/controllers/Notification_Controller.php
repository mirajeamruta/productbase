<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Notification_Controller extends CI_Controller
{

    function notification(){

        $this->load->view('template/header');
         $this->load->view('template/footer');
        $this->load->view('template/navigation');
        $this->load->view('Notification');
       
    }
}
