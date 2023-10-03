<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Report_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		//$this->load->model('Notification_model');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Report_Model');
		
		//$this->load->view('view_workorder');
		//$this->load->helper(array('form', 'url'));
		//$this->load->library('form_validation');
	}

	
	public function editUserData($userid)
    {
        $this->load->model('User_model');
		if ($this->session->userdata('balunand_id_no') == '') {
			//echo "not logged in";      

			redirect(base_url() . 'main/login');
		} else {

		

        $data['userdetails'] = $this->User_model->editUserData($userid);

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
       
        $loggedInUserId= $this->session->userdata('user_id');

		if ($this->session->userdata('usertype') == 'admin') {
            
			$data['worksheet'] = $this->Report_Model->getWorkSheet($userid);
			$sr_number = 1;
			foreach ($data['worksheet'] as $worksheet) {
			$Starttime_in_12_hour_format  = date("g:i a", strtotime($worksheet['start_time']));

			$Endtime_in_12_hour_format  = date("g:i a", strtotime($worksheet['end_time']));

				$status = $worksheet['status'];

				if ($status === 'open') {
					$status = 'pending';
				}

				$data['workesheetdata'][] = array(
					'SrNo' => $sr_number,
					'workorder_no' => $worksheet['workorder_no'],
					'type_of_work' =>$worksheet['Type_of_work'],
					'client_name' => $worksheet['client_name'],
					'date' => $worksheet['date'],
					'work_description' => $worksheet['work_description'],
					'start_time'=>$Starttime_in_12_hour_format,
					'end_time'=>$Endtime_in_12_hour_format,
					'partner_in_charge'=>$worksheet['partner_in_charge'],
					'status'=>$status,
				);
				// $sr_number++;
				// echo $sr_number;
				++$sr_number;
				echo "</br>";

			}

            
		}else {
            $data['worksheet'] = $this->Report_Model->getWorkSheet($userid);
            $sr_number = 1;
            foreach ($data['worksheet'] as $worksheet) {

		$Starttime_in_12_hour_format  = date("g:i a", strtotime($worksheet['start_time']));

		$Endtime_in_12_hour_format  = date("g:i a", strtotime($worksheet['end_time']));
                $status = $worksheet['status'];

                if ($status === 'open') {
                    $status = 'pending';
                }

                $data['workesheetdata'][] = array(
                    'SrNo' => $sr_number,
                    'workorder_no' => $worksheet['workorder_no'],
                    'type_of_work' =>$worksheet['Type_of_work'],
                    'client_name' => $worksheet['client_name'],
                    'date' => $worksheet['date'],
                    'work_description' => $worksheet['work_description'],
                    'start_time'=>$Starttime_in_12_hour_format,
                    'end_time'=>$Endtime_in_12_hour_format,
                    'partner_in_charge'=>$worksheet['partner_in_charge'],
                    'status'=>$status,
                );

            

                // $sr_number++;
                // echo $sr_number;
                ++$sr_number;
                echo "</br>";
            }
        }
        
        
	}


        $this->load->view('template/header');

        $this->load->view('template/navigation');

        $this->load->view('Report', $data);

        $this->load->view('template/footer');
    

}



}


