<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  

 
 class Main extends CI_Controller {  
      //functions  
      function login()  
      {  
           //http://localhost/tutorial/codeigniter/main/login  
           $data['title'] = ' Balu & Anand, Chartered Accountants';  
           $this->load->view("login", $data);  
      }  
      function login_validation()  
      {  
           $this->load->library('form_validation');  
           $this->form_validation->set_rules('student_reg_no', 'Student_reg_no', 'required');  
           $this->form_validation->set_rules('password', 'Password', 'required');  
           if($this->form_validation->run())  
           {  
                //true  
                $student_reg_no = $this->input->post('student_reg_no');  
                $password = $this->input->post('password');  
                //model function  
                $this->load->model('Main_model');  
                if($this->Main_model->can_login($student_reg_no, $password))  
                {  
                     $session_data = array(  
                          'student_reg_no'     =>     $student_reg_no  
                     );  
                     $this->session->set_userdata($session_data);  
                     redirect(base_url() . 'Main/enter');  
                }  
                else  
                {  
                     $this->session->set_flashdata('error', 'Invalid Student_reg_no and Password');  
                     redirect(base_url() . 'Main/login');  
                }  
           }  
           else  
           {  
                //false  
                $this->login();  
           }  
      }  
      function enter(){  
           if($this->session->userdata('student_reg_no') != '')  
           {  
                echo '<h2>Welcome - '.$this->session->userdata('student_reg_no').'</h2>';  
                echo '<label><a href="'.base_url().'Main/logout">Logout</a></label>';  
           }  
           else  
           {  
                redirect(base_url() . 'Main/login');  
           }  
      }  
      function logout()  
      {  
           $this->session->unset_userdata('student_reg_no');  
           redirect(base_url() . 'Main/login');  
      }  
 }  