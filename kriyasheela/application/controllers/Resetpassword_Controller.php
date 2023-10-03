<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Resetpassword_Controller extends CI_Controller
{

    function Resetpassword(){
     
            $this->load->view('Resetpassword');
       	
    }


function changePassword(){

        $officialEmail=$this->input->post('officialEmail');
        $newPassword=$this->input->post('n-password');
        $confirmPassword=$this->input->post('c-password');
        if($newPassword==$confirmPassword){ 
            $finalPassword=md5($newPassword);
            $data=array(
             'password'=>$finalPassword
        );
        $this->load->model('Resetpassword_Model');
        $this->Resetpassword_Model->resetPassword($data,$officialEmail);
     
       
        }   
      $this->session->set_flashdata('success', 'Password reset successfully.');
       
	    
				redirect(base_url() . 'Main/login');
}
}

