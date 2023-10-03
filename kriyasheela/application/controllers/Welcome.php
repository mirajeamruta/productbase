<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
        {
                $loggedInUserId = $this->session->userdata('userId');
                if($loggedInUserId){
                        redirect(base_url() . 'Main/dashboard');
                }
                $this->load->view('template/header');

                $this->load->view('template/navigation1');

                $this->load->view('template/login');
                //$this->load->view('home');

                $this->load->view('template/footer');
        }
}
