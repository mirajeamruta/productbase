<?php
defined('BASEPATH') or exit('No direct script access allowed');
class View_user_controllerreport extends CI_Controller
{
	 function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('View_user_reportmodel');
   
    }



	public function	View_user_report(){
$this->load->library('session');
$this->load->helper('url');

        if($this->session->userdata('balunand_id_no')== ''){

            redirect(base_url(). 'Main/login');
        } else {
            $this->load->model('View_user_reportmodel');
            
        }

		
        $this->load->model('User_model');

        $data['usertype'] = $this->User_model->getAllUserType();

        foreach ($data['usertype'] as $usertypedetails) {
            $data['usertypes'][] = array(
                'user_type_id' => $usertypedetails['user_type_id'],

                'user_type' => $usertypedetails['user_type']

            );
        }


        $data['userdetails'] = $this->User_model->getAllUsersDetails();
      

        foreach ($data['userdetails'] as $user) {

            if ($user['user_type_id'] == 3) {

                $data['userdetailsdata'][] = array(
                    'user_id' => $user['user_id'],
                    'name' => $user['name'],
                    
                    'ID' => $user['student_reg_no'],
                    'image' => $user['user_image'],
                    //'employee_id'=>$user['employee_id'],
                    'startdate' => $user['date_of_comencement_of_articleship'],

                    'enddate' => $user['date_of_completion_of_articleship'],

                    'partner_under_whom_registered' => $user['partner_under_whom_registered'],
                    'balunand_id_no' => $user['balunand_id_no'],
                    'personal_email' => $user['personal_email'],
                    'official_email' => $user['official_email'],
                    'mobile_no' => $user['mobile_no'],
                    'password'=>$user['password'],
                    'bloodgroup' => $user['bloodgroup'],
                    //'details'=>$user['mobile_no'],
                );
                // print_r($data['userdetailsdata']);
            }

            if ($user['user_type_id'] == 4) {

                $data['userdetailsdata'][] = array(
                    'user_id' => $user['user_id'],
                    'name' => $user['name'],
                    'ID' => $user['icai'],
                    'image' => $user['user_image'],
                    //'employee_id'=>$user['employee_id'],
                    'startdate' => $user['date_of_comencement_of_employment'],

                    'enddate' => $user['date_of_completion_of_employment'],

                    'partner_under_whom_registered' => $user['partner_under_whom_registered'],
                    'balunand_id_no' => $user['balunand_id_no'],
                    'personal_email' => $user['personal_email'],
                    'official_email' => $user['official_email'],

                    'mobile_no' => $user['mobile_no'],
                    'password'=>$user['password'],
                    'bloodgroup' => $user['bloodgroup'],
                    //'details'=>$user['mobile_no'],
                );
                //print_r($data['userdetailsdata']);
            }

            // Tesinging start

            if ($user['user_type_id'] == 2) {

               
                $data['userdetailsdata'][] = array(
                    'user_id' => $user['user_id'],
                    'name' => $user['name'],
                    'ID' => $user['icai'],
                    'image' => $user['user_image'],
                    //'employee_id'=>$user['employee_id'],
                    'startdate' => $user['date_of_comencement_of_employment'],

                    'enddate' => $user['date_of_completion_of_employment'],

                    'partner_under_whom_registered' => $user['partner_under_whom_registered'],
                    'balunand_id_no' => $user['balunand_id_no'],
                    'personal_email' => $user['personal_email'],
                    'official_email' => $user['official_email'],

                    'mobile_no' => $user['mobile_no'],
                    'password'=>$user['password'],
                    'bloodgroup' => $user['bloodgroup'],
                    //'details'=>$user['mobile_no'],
                );
                //print_r($data['userdetailsdata']);
            }

             // Tesinging end

            if ( $user['user_type_id'] == 1) {

                // echo 2;
                $data['userdetailsdata'][] = array(
                    'user_id' => $user['user_id'],
                    'name' => $user['name'],
                    //'sro_no'=>$user['student_reg_no'],
                    'image' => $user['user_image'],
                    'ID' => $user['icai'],
                    'startdate' => ($user['date_of_comencement_of_employment']),

                    'enddate' => ($user['date_of_completion_of_employment']),

                    'partner_under_whom_registered' => $user['partner_under_whom_registered'],
                    'balunand_id_no' => $user['balunand_id_no'],
                    'personal_email' => $user['personal_email'],
                    'official_email' => $user['official_email'],
                    'mobile_no' => $user['mobile_no'],
                    'password'=>$user['password'],
                    'bloodgroup' => $user['bloodgroup'],
                    //'details'=>$user['mobile_no'],
                );

                //   var_dump(	$data['userdetailsdata']);

                //return;

            }

            
        }

        

        $this->load->view('template/header');

        $this->load->view('template/navigation');

        $this->load->view('template/View_user_report', $data);

        $this->load->view('template/footer');
   
}


}
