<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Notification_Controller extends CI_Controller
{

    function notification(){
        $this->load->helper('url');

        if($this->session->userdata('balunand_id_no')== ''){

            redirect(base_url(). 'Main/login');
        } else {



        }
        $this->load->library('session');
        $this->load->model('Notification_Model');
        $this->load->model('Workorder_model');
        $this->load->view('template/header');
         $this->load->view('template/footer');
        $this->load->view('template/navigation');
        $this->load->view('Notification');
        
       
    }
}
