<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        // Load the todo model to make it available
        // to *all* of the controller's actions
        // Load the todo model to make it available
        // to *all* of the controller's actions
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->load->model('User_model');
    }
    public function index()
    {

        if ($this->session->userdata('balunand_id_no') == '') {
            //echo "not logged in";

            redirect(base_url() . 'main/login');
        } else {

            $this->load->helper(array('form', 'url'));

            $this->load->library('form_validation');


            $this->load->model('User_model');

            $loggedInUserId = $this->session->userdata('userId');

            $data['usertype'] = $this->User_model->getAllUserType();

            //  var_dump($data['usertype']);

            foreach ($data['usertype'] as $usertypedetails) {
                $data['usertypes'][] = array(
                    'user_type_id' => $usertypedetails['user_type_id'],

                    'user_type' => $usertypedetails['user_type']


                );
            }

            $this->load->view('template/header');

            $this->load->view('template/navigation');

            $this->load->view('User_form', $data);

            $this->load->view('template/footer');
        }
    }

    public function createUser()
    {
        $loggedInEmployee = $this->session->userdata('username');

		$loggedInUserId = $this->session->userdata('userId');

		$user_info = $this->User_model->duplicateId($this->input->post('balunandno'));

		//var_dump($user_info);

		// return;

		if (count($user_info) > 0) {
			$data['error'] = 'This Balunand ID is already assigned to a usser ';
			$this->session->set_flashdata('error', 'This Balunand ID is already assigned to an user');

			redirect(base_url('User/index'));
		}
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            /*
            $this->form_validation->set_rules( 'usertype', 'Usertype', 'required');
            $this->form_validation->set_rules( 'username', 'Username', 'required');
            $this->form_validation->set_rules( 'reg_no', 'Reg_no', 'required' );

            $this->form_validation->set_rules( 'employee_id', 'Employee_id', 'required' );


			$this->form_validation->set_rules( 'partner_in_charge', 'Partner in Charge', 'required' );
            $this->form_validation->set_rules( 'start_date', 'Start Date', 'required' );

            $this->form_validation->set_rules( 'targetted_end_date', 'Targetted End Date', 'required' );
            $this->form_validation->set_rules( 'deadline', 'Deadline', 'required' );
            $this->form_validation->set_rules( 'assign_to', 'Assign To', 'required' );
            $this->form_validation->set_rules( 'remarks', 'Remarks', 'required' );
			*/


            if ($this->form_validation->run() == TRUE || $this->form_validation->run() == False) {
                $usertype = $this->input->post('usertype');



                // Directory
                $config['allowed_types'] = 'jpg|png|jpeg';

                $config['upload_path'] = './photos/';
                //type of images allowed
                $config['max_size'] = '30720';
                //Max Size
                // For unique image name at a time
                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                //File Uploading library
                if ($this->upload->do_upload('profilephoto')) {
                    //print_r($this->upload->data());

                    //print_r($this->upload->data('file_name'));

                    $imgname = $this->upload->data('file_name');
                } else {
                    //print_r($this->upload->display_errors());
                }


                $username = $this->input->post('username');
                $userimage = $imgname;

                //var_dump($userimage);

                //var_dump($username);

                $reg_no = $this->input->post('reg_no');
                $REG_NO = strtoupper($reg_no);
                $REG_NO = strtoupper($reg_no);
                $employee_id = $this->input->post('employee_id');

                $commencementofarticleship = $this->input->post('commencementofarticleship');
                $commencementofemployment = $this->input->post('commencementofemployment');

                $completionofarticleship = $this->input->post('completionofarticleship');
                $completionofemployment = $this->input->post('completionofemployment');
                $partner_registered = $this->input->post('partner_registered');
                $balunandno = $this->input->post('balunandno');

                $personalemail = $this->input->post('personalemail');
                $officialemail = $this->input->post('officialemail');
                $mobilenumber = $this->input->post('mobile');
                $bloodgroup = $this->input->post('bloodgroup');
                $password = $this->input->post('password');

                $icai_Number=$this->input->post('icai_number');

                $icai_Number=$this->input->post('icai_number');

                $hashpassword = md5($password);


                //var_dump($hashpassword);
                //var_dump($password);

                //var_dump($hashpassword);
                //var_dump($password);

                // return;

                $data = array(
                    'name' => $username,
                    'user_image' => $userimage,
                    'student_reg_no' => $REG_NO,
                    'icai'=> $icai_Number,
                    //'employee_id'=>$employee_id,
                    'student_reg_no' => $REG_NO,
                    'icai'=> $icai_Number,
                    //'employee_id'=>$employee_id,
                    'date_of_comencement_of_articleship' => $commencementofarticleship,
                    'date_of_comencement_of_employment' => $commencementofemployment,
                    'date_of_completion_of_articleship' => $completionofarticleship,
                    'date_of_completion_of_employment' => $completionofemployment,
                    'partner_under_whom_registered' => $partner_registered,
                    'balunand_id_no' => $balunandno,
                    'personal_email' => $personalemail,
                    'official_email' => $officialemail,
                    'mobile_no' => $mobilenumber,
                    'bloodgroup' => $bloodgroup,
                    'password' => $hashpassword,
                    'user_type_id' => $usertype,
'status'=> 'Active'
                );




                var_dump($data);

                // return;

                $this->load->model('User_model');
                $this->User_model->insertUsers($data);

                $notification_data = array(
                    'user_name' => $username,
                    //'user_id' => $lastInsertedID,
                    'type' => 'New User',
                    'status' => '0',
                    'date' => date('Y-m-d H:i:s')
                    );
                
                
                                $this->load->model('Notification_Model');
                                $this->Notification_Model->insertnotification($notification_data);
                
                $this->session->set_flashdata('success', 'New user created successfully');
                redirect(base_url('User/allusers'));
            }
        }
    }
    public function validate()
	{
		if ($this->User_model->duplicateId($this->input->post('balunandno'))) {

			$this->error = 'This Balunand Number is already assigned to a user ';

			//var_dump($this->error);
			return !$this->error;
		}
	}


    public function allusers()
    {
	if ($this->session->userdata('balunand_id_no') == '') {
			redirect(base_url() . 'main/login');
        } else {
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
            $data['userdetailsdata'][] = array(
                'user_type_id' => $user['user_type_id'],
                'user_id' => $user['user_id'],
                'balunand_id_no' => $user['balunand_id_no'],
                'balunand_id_no' => $user['balunand_id_no'],
                'user_type_id' => $user['user_type_id'],
                'name' => $user['name'],
                'student_reg_no' => $user['student_reg_no'],
                'partner_under_whom_registered' => $user['partner_under_whom_registered'],
                'password'=>$user['password'],
                 //'employee_id' => $user['employee_id'],
                'partner_under_whom_registered' => $user['partner_under_whom_registered'],
                'password'=>$user['password'],
                 //'employee_id' => $user['employee_id'],
                'personal_email' => $user['personal_email'],
                'mobile_no' => $user['mobile_no'],
                'details' => $user['mobile_no'],
            );


        }
        


        $this->load->view('template/header');

        $this->load->view('template/navigation');

        $this->load->view('View_users', $data);

        $this->load->view('template/footer');
	}
    }


    public function editUserData($userid)
    {
	if ($this->session->userdata('balunand_id_no') == '') {
			redirect(base_url() . 'main/login');
        } else {
        $this->load->model('User_model');

        $data['userdetails'] = $this->User_model->editUserData($userid);

        foreach ($data['userdetails'] as $user) {

            if ($user['user_type_id'] == 3) {

                $data['userdetailsdata'][] = array(
                    'user_type_id' => $user['user_type_id'],
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
                    'password'=>$user['password'],
                    'bloodgroup' => $user['bloodgroup'],
'status' => $user['status'],
'user_type_id'=>$user['user_type_id']
                    //'details'=>$user['mobile_no'],
                );
                // print_r($data['userdetailsdata']);
                // print_r($data['userdetailsdata']);
            }

            if ($user['user_type_id'] == 4) {

                $data['userdetailsdata'][] = array(
                    'user_type_id'=>$user['user_type_id'],
                    'user_id' => $user['user_id'],
                    'name' => $user['name'],
                    'ID' => $user['icai'],
                    'ID' => $user['icai'],
                    'image' => $user['user_image'],
                    //'employee_id'=>$user['employee_id'],
                    'startdate' => $user['date_of_comencement_of_employment'],

                    'enddate' => $user['date_of_completion_of_employment'],
                    'startdate' => $user['date_of_comencement_of_employment'],

                    'enddate' => $user['date_of_completion_of_employment'],

                    'partner_under_whom_registered' => $user['partner_under_whom_registered'],
                    'balunand_id_no' => $user['balunand_id_no'],
                    'personal_email' => $user['personal_email'],
                    'official_email' => $user['official_email'],

                    'mobile_no' => $user['mobile_no'],
                    'password'=>$user['password'],
                    'bloodgroup' => $user['bloodgroup'],
'status' => $user['status']
                    //'details'=>$user['mobile_no'],
                );
                //print_r($data['userdetailsdata']);
            }

            // Tesinging start

            if ($user['user_type_id'] == 2) {

               
                $data['userdetailsdata'][] = array(
                    'user_type_id'=>$user['user_type_id'],
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
                    'password'=>$user['password'],
                    'bloodgroup' => $user['bloodgroup'],
'status' => $user['status']
                    //'details'=>$user['mobile_no'],
                );
                //print_r($data['userdetailsdata']);
                //print_r($data['userdetailsdata']);
            }

             // Tesinging end

            if ( $user['user_type_id'] == 1) {
             // Tesinging end

            if ( $user['user_type_id'] == 1) {

                //echo 2;
                $data['userdetailsdata'][] = array(
                    'user_type_id'=>$user['user_type_id'],
                    'user_id' => $user['user_id'],
                    'name' => $user['name'],
                    //'sro_no'=>$user['student_reg_no'],
                    //'sro_no'=>$user['student_reg_no'],
                    'image' => $user['user_image'],
                    'ID' => $user['icai'],
                    'ID' => $user['icai'],
                    'startdate' => ($user['date_of_comencement_of_employment']),

                    'enddate' => ($user['date_of_completion_of_employment']),

                    'partner_under_whom_registered' => $user['partner_under_whom_registered'],
                    'balunand_id_no' => $user['balunand_id_no'],
                    'personal_email' => $user['personal_email'],
                    'official_email' => $user['official_email'],
                    'mobile_no' => $user['mobile_no'],
                    'password'=>$user['password'],
                    'password'=>$user['password'],
                    'bloodgroup' => $user['bloodgroup'],
'status' => $user['status']
                    //'details'=>$user['mobile_no'],
                );

                //   var_dump(	$data['userdetailsdata']);
                //   var_dump(	$data['userdetailsdata']);

                //return;

            }
        }


        $this->load->view('template/header');

        $this->load->view('template/navigation');

        $this->load->view('Edit_user', $data);



        $this->load->view('template/footer');
	}
    }

    public function EditUser(){
        $user_type_id=$this->input->post('user_type_id');
        $userid = $this->input->post('user_id');
        $userimage= $this->input->POST('user_image');
echo($userimage);
var_dump($userimage);
print_r($userimage);
        $usertype=$this->input->post('usertype');        
        $usertypeid= $usertype;
        if($usertypeid=='Admin'){
            $usertypeid='1';
        }else if($usertypeid=='Employee'){
            $usertypeid='2';
        }else if($usertypeid=='Article Trainee'){
            $usertypeid='3';
        }else if($usertypeid=='External Consultant'){
            $usertypeid='4';
        } 
        if ($user_type_id == 1) {
            if ( $userimage) {
                $data = array(
                    'user_type_id' => $usertypeid,
                    'name' => $_POST['name'],
                    'icai' => $_POST['ID'],
                    'user_image' => $userimage,
                    'date_of_comencement_of_employment' => $_POST['startdate'],
                    'date_of_completion_of_employment' => $_POST['enddate'],
                    // 'icai'=>$_POST['icai'],
                    'partner_under_whom_registered' => $_POST['partner_under_whom_registered'],
                    'balunand_id_no' => $_POST['balunand_id_no'],
                    'personal_email' => $_POST['personal_email'],
                    'official_email' => $_POST['official_email'],
                    'mobile_no' => $_POST['mobile_no'],
                    'bloodgroup' => $_POST['bloodgroup'],
                    'status' => $_POST['status']
                );
            } else {

                $data = array(
                    'user_type_id' => $usertypeid,
                    'name' => $_POST['name'],
                    'icai' => $_POST['ID'],
                    'date_of_comencement_of_employment' => $_POST['startdate'],
                    'date_of_completion_of_employment' => $_POST['enddate'],
                    // 'icai'=>$_POST['icai'],
                    'partner_under_whom_registered' => $_POST['partner_under_whom_registered'],
                    'balunand_id_no' => $_POST['balunand_id_no'],
                    'personal_email' => $_POST['personal_email'],
                    'official_email' => $_POST['official_email'],
                    'mobile_no' => $_POST['mobile_no'],
                    'bloodgroup' => $_POST['bloodgroup'],
                    'status' => $_POST['status']
                );
            }
        } else if($user_type_id==2){

if ( $userimage) {
                $data = array(
                    'user_type_id' => $usertypeid,
                    'name' => $_POST['name'],
                    'icai' => $_POST['ID'],
                    'user_image' =>  $userimage,
                    'date_of_comencement_of_employment' => $_POST['startdate'],
                    'date_of_completion_of_employment' => $_POST['enddate'],
                    // 'icai'=>$_POST['icai'],
                    'partner_under_whom_registered' => $_POST['partner_under_whom_registered'],
                    'balunand_id_no' => $_POST['balunand_id_no'],
                    'personal_email' => $_POST['personal_email'],
                    'official_email' => $_POST['official_email'],
                    'mobile_no' => $_POST['mobile_no'],
                    'bloodgroup' => $_POST['bloodgroup'],
                    'status' => $_POST['status']
                );
            } else {

                $data = array(
                    'user_type_id' => $usertypeid,
                    'name' => $_POST['name'],
                    'icai' => $_POST['ID'],
                    'date_of_comencement_of_employment' => $_POST['startdate'],
                    'date_of_completion_of_employment' => $_POST['enddate'],
                    // 'icai'=>$_POST['icai'],
                    'partner_under_whom_registered' => $_POST['partner_under_whom_registered'],
                    'balunand_id_no' => $_POST['balunand_id_no'],
                    'personal_email' => $_POST['personal_email'],
                    'official_email' => $_POST['official_email'],
                    'mobile_no' => $_POST['mobile_no'],
                    'bloodgroup' => $_POST['bloodgroup'],
                    'status' => $_POST['status']
                );
            }
        } else if ($user_type_id==3){
if ( $userimage) {
                $data = array(
                    'user_type_id' => $usertypeid,
                    'name' => $_POST['name'],
                    'student_reg_no' => $_POST['ID'],
                    'user_image' =>  $userimage,
                    'date_of_comencement_of_articleship' => $_POST['startdate'],
                    'date_of_completion_of_articleship' => $_POST['enddate'],
                    // 'icai'=>$_POST['icai'],
                    'partner_under_whom_registered' => $_POST['partner_under_whom_registered'],
                    'balunand_id_no' => $_POST['balunand_id_no'],
                    'personal_email' => $_POST['personal_email'],
                    'official_email' => $_POST['official_email'],
                    'mobile_no' => $_POST['mobile_no'],
                    'bloodgroup' => $_POST['bloodgroup'],
                    'status' => $_POST['status']
                );
            } else {

                $data = array(
                    'user_type_id' => $usertypeid,
                    'name' => $_POST['name'],
                    'student_reg_no' => $_POST['ID'],
                    'date_of_comencement_of_articleship' => $_POST['startdate'],
                    'date_of_completion_of_articleship' => $_POST['enddate'],
                    // 'icai'=>$_POST['icai'],
                    'partner_under_whom_registered' => $_POST['partner_under_whom_registered'],
                    'balunand_id_no' => $_POST['balunand_id_no'],
                    'personal_email' => $_POST['personal_email'],
                    'official_email' => $_POST['official_email'],
                    'mobile_no' => $_POST['mobile_no'],
                    'bloodgroup' => $_POST['bloodgroup'],
                    'status' => $_POST['status']
                );
            }

        } else if ($user_type_id==4){
if ( $userimage) {
                $data = array(
                    'user_type_id' => $usertypeid,
                    'name' => $_POST['name'],
                    'icai' => $_POST['ID'],
                    'user_image' =>  $userimage,
                    'date_of_comencement_of_employment' => $_POST['startdate'],
                    'date_of_completion_of_employment' => $_POST['enddate'],
                    // 'icai'=>$_POST['icai'],
                    'partner_under_whom_registered' => $_POST['partner_under_whom_registered'],
                    'balunand_id_no' => $_POST['balunand_id_no'],
                    'personal_email' => $_POST['personal_email'],
                    'official_email' => $_POST['official_email'],
                    'mobile_no' => $_POST['mobile_no'],
                    'bloodgroup' => $_POST['bloodgroup'],
                    'status' => $_POST['status']
                );
            } else {

                $data = array(
                    'user_type_id' => $usertypeid,
                    'name' => $_POST['name'],
                    'icai' => $_POST['ID'],
                    'date_of_comencement_of_employment' => $_POST['startdate'],
                    'date_of_completion_of_employment' => $_POST['enddate'],
                    // 'icai'=>$_POST['icai'],
                    'partner_under_whom_registered' => $_POST['partner_under_whom_registered'],
                    'balunand_id_no' => $_POST['balunand_id_no'],
                    'personal_email' => $_POST['personal_email'],
                    'official_email' => $_POST['official_email'],
                    'mobile_no' => $_POST['mobile_no'],
                    'bloodgroup' => $_POST['bloodgroup'],
                    'status' => $_POST['status']
                );
            }


        }
            $this->load->model('User_model');
            $this->User_model->EditUserInfo($data, $userid);

         $notification_data = array(
            'user_name'=>$_POST['name'],
            'user_id'=>$userid,
            'type' => 'Updated User',
            'status'=>0,
            'date'=>date('Y-m-d H:i:s')
        );

        $this->load->model('Notification_Model');
        $this->Notification_Model->insertnotification($notification_data);
 $this->session->set_flashdata('success', 'Successfully Updated');
                 redirect(base_url('User/editUserData/'.$userid));
         
     }

    public function EditUser(){
        $userid = $this->input->post('user_id');
         $data=array(
             'name' => $_POST['name'],
             'student_reg_no' => $_POST['ID'],
            'icai'=>$_POST['ID'],
             'partner_under_whom_registered'=>$_POST['partner_under_whom_registered'],
             'balunand_id_no'=>$_POST['balunand_id_no'],
             'personal_email'=>$_POST['personal_email'],
             'official_email'=>$_POST['official_email'],
             'mobile_no'=>$_POST['mobile_no'],
             'bloodgroup'=>$_POST['bloodgroup']     
         );
         $this->load->model('User_model');
         $this->User_model->EditUserInfo($data,$userid);

         $notification_data = array(
            'user_name'=>$_POST['name'],
            'user_id'=>$userid,
            'type'=>'edituser',
            'status'=>0,
            'date'=>date('Y-m-d H:i:s')
        );

        $this->load->model('Notification_Model');
        $this->Notification_Model->insertnotification($notification_data);
 $this->session->set_flashdata('success', 'Successfully Updated');
                 redirect(base_url('User/editUserData/'.$userid));
         
     }

    public function MyProfile()

    {
	if ($this->session->userdata('balunand_id_no') == '') {
			redirect(base_url() . 'main/login');
        } else {

        $data = '';

        if ($this->session->userdata('userId') != '') {

            if (($this->input->post('oldpassword'))) {

                $oldpassword = md5($this->input->post('oldpassword'));

                $results = $this->User_model->oldPasswordValidation($oldpassword);

                // echo $this->session->userdata('userId');

                $pass = $this->session->userdata('userId');

                if (!empty($results)) {
                    $newpassword = $this->input->post('newpassword');

                    $hashnewpassword = md5($newpassword);
                    // echo $newpassword;
                    // echo $hashnewpassword;
                    // echo $newpassword;
                    // echo $hashnewpassword;

                    if ($this->input->post('newpassword') == $this->input->post('confirmpassword')) {

                        if ($this->input->post('newpassword') == $this->input->post('oldpassword')) {

                            $this->session->set_flashdata('passwordsuccess', 'Your Old  Password  and New Password cant be same.');
                        } else {

                            $this->User_model->updatePassword($pass, $hashnewpassword);

                            $this->session->set_flashdata('passwordsuccess', ' <h6 class="sucessmsg" style="margin-top: 363px !important; margin-left: 203px !important; color: green;">Your Password has been updated</h6>');
                            $this->session->set_flashdata('passwordsuccess', ' <h6 class="sucessmsg" style="margin-top: 363px !important; margin-left: 203px !important; color: green;">Your Password has been updated</h6>');
                        }
                    } elseif ($this->input->post('newpassword') != $this->input->post('confirmpassword')) {

                        $this->session->set_flashdata('passwordsuccess', 'password and confirm password should be same');
                    }
                } else {
                   $this->session->set_flashdata('passwordfail', '<h6 style="color:red;margin-top: 353px;margin-left: 107px;">Your old password was entered incorrectly. Please enter it again. </h6> ');
                   $this->session->set_flashdata('passwordfail', '<h6 style="color:red;margin-top: 353px;margin-left: 107px;">Your old password was entered incorrectly. Please enter it again. </h6> ');
                }
            }



        $this->load->view('template/header');

        $this->load->view('template/navigation');

        $this->load->view('userpassword_form', $data);

            $this->load->view('template/footer');
        }
   }
}