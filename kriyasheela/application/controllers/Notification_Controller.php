
<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Notification_Controller extends CI_Controller
{

function index(){
  $this->load->helper('url');
  $this->load->view('Notification.php');
}
    function notification(){  

      $data=array(
  'myData'=> $this->input->post('myData')
);

    
     echo json_encode($data);
   
  function updatedate(){


  }

  
  // $postData = $this->input->post('myData');
  //    echo $postData;
  //    //echo "Hello ajax";
  //     // $data=array(
        
  //     // )
    
    
      
//  $targeted_date=$this->input->POST('targeted_date_data');
//       $deadline_date=$this->input->POST('deadline_date_data');
     

      // $data1=$targeted_date;
      // $data2= $deadline_date;
      // echo $data1;
      // echo $data2;
        
        $this->load->view('template/header');
        $this->load->view('template/footer');
        $this->load->view('template/navigation');
        $this->load->view('Notification');
  
    }    

  }
