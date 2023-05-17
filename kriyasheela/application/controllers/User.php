<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        // Load the todo model to make it available
        // to *all* of the controller's actions
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->load->model('User_model');
    }
    public function index()
    {

        if ($this->session->userdata('balunand_id_no') == '') {
            echo "not logged in";

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

		var_dump($user_info);

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
                $config['allowed_types'] = 'jpg|png';

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
                    print_r($this->upload->display_errors());
                }


                $username = $this->input->post('username');
                $userimage = $imgname;

                //var_dump($userimage);

                //var_dump($username);

                $reg_no = $this->input->post('reg_no');
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

                $hashpassword = md5($password);


                //var_dump($hashpassword);
                //var_dump($password);

                // return;

                $data = array(
                    'name' => $username,
                    'user_image' => $userimage,
                    'student_reg_no' => $reg_no,
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
                );


                var_dump($data);

                // return;

                $this->load->model('User_model');
                $this->User_model->insertUsers($data);
                $this->session->set_flashdata('success', 'New user created successfully');
                redirect(base_url('User/allusers'));
            }
        }
    }
    public function validate()
	{
		if ($this->User_model->duplicateId($this->input->post('balunandno'))) {

			$this->error = 'This Balunand Number is already assigned to a user ';

			var_dump($this->error);
			return !$this->error;
		}
	}


    public function allusers()
    {

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
                'user_id' => $user['user_id'],
                'balunand_id_no' => $user['balunand_id_no'],
                'user_type_id' => $user['user_type_id'],
                'name' => $user['name'],
                'student_reg_no' => $user['student_reg_no'],
                'partner_under_whom_registered' => $user['partner_under_whom_registered'],
                'password'=>$user['password'],
                 //'employee_id' => $user['employee_id'],
                'personal_email' => $user['personal_email'],
                'mobile_no' => $user['mobile_no'],
                'details' => $user['mobile_no'],
            );

        }
        // foreach($data['userdetailsdata'] as $user){
        //     $password = $user['password'];
        //     print_r(($user['password']));

        // }


        $this->load->view('template/header');

        $this->load->view('template/navigation');

        $this->load->view('View_users', $data);

        $this->load->view('template/footer');
    }


    public function editUserData($userid)
    {
        $this->load->model('User_model');

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
                print_r($data['userdetailsdata']);
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

                echo 2;
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

        $this->load->view('Edit_user', $data);

        $this->load->view('template/footer');
    }


    public function MyProfile()

    {

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

                    if ($this->input->post('newpassword') == $this->input->post('confirmpassword')) {

                        if ($this->input->post('newpassword') == $this->input->post('oldpassword')) {

                            $this->session->set_flashdata('passwordsuccess', 'Your Old  Password  and New Password cant be same.');
                        } else {

                            $this->User_model->updatePassword($pass, $hashnewpassword);

                            $this->session->set_flashdata('passwordsuccess', 'Your Password has been updated');
                        }
                    } elseif ($this->input->post('newpassword') != $this->input->post('confirmpassword')) {

                        $this->session->set_flashdata('passwordsuccess', 'password and confirm password should be same');
                    }
                } else {
                    $this->session->set_flashdata('passwordsuccess', '<h6 style="color:red; margin-left: 61px; " > </h6> ');
                }
            }



        $this->load->view('template/header');

        $this->load->view('template/navigation');

        $this->load->view('userpassword_form', $data);

            $this->load->view('template/footer');
        }
   }
}
