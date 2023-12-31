<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	// main login function

	function index()
	{
		$this->login();
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');

		$this->load->model('Main_model');

		$this->load->model('Workorder_model');

		$this->load->model('Notification_Model');

		// Load the todo model to make it available 
		// to *all* of the controller's actions 
		$this->load->helper('url');
	}

	function login()
	{

        $loggedInUserId = $this->session->userdata('userId');
		if($loggedInUserId){
			redirect(base_url() . 'Main/dashboard');
		}
		$this->load->view('template/header');

		$this->load->view('template/navigation1');

		$this->load->view('template/login');

	}

	// public   function dashboard()

	// {

	// 	$this->load->helper('url');

	// 	if ($this->session->userdata('balunand_id_no') == '') {

	// 		redirect(base_url() . 'Main/login');
	// 	}

	// 	$data['countworkorder']=$this->Main_model->countWorkorder();

    //    $data['countclents']=$this->Main_model->countclents();
		
	//    $data['countusers']=$this->Main_model->countusers();

	//    $data['pendingWorkorders']=$this->Main_model->pendingWorkorder();

	// 	//http://localhost/tutorial/codeigniter/Main/dashboard
	// 	$data['title'] = 'Balu & Anand, Chartered Accountants';

	// 	if (isset($_SESSION['usertype'])) {
	// 		$data['usertype'] = $_SESSION['usertype'];
	// 		// echo "if";

	// 		//var_dump( $type);

	// 	}

	// 	$data['usertype'] = $_SESSION['usertype'];

	// 	$this->load->view('template/header');

	// 	$this->load->view('template/navigation');

	// 	$this->load->view('template/dashboard', $data);

	// 	$this->load->view('template/footer');
	// }


	public   function dashboard()

    {

        $this->load->helper('url');

        if ($this->session->userdata('balunand_id_no') == '') {

            redirect(base_url() . 'Main/login');
        }

        $data['countworkorder'] = $this->Main_model->countWorkorder();

        $data['countclents'] = $this->Main_model->countclents();

        $data['countusers'] = $this->Main_model->countusers();

        $data['pendingWorkorders'] = $this->Main_model->pendingWorkorder();

		$data['notifications'] = $this->Notification_Model->getNotifications();

        $data['pendingWorkorderDetails1'] = $this->Main_model->pendingWorkorderDetails();
		
		$data['notifyNewUser1']=$this->Main_model->notifyNewUser();

		$data['notifyNewClient1']=$this->Main_model->notifyNewClient();

		$this->load->view('template/header');

        $loggedInUserId = $this->session->userdata('userId');

        foreach ($data['pendingWorkorderDetails1']  as $worknumber) {
            $array['number1'] = str_replace('"', '',  $worknumber['assign_to']);
            $array['number2'] = str_replace(']', '',    $array['number1']);
            $array['number3'] = str_replace('[', '',    $array['number2']);
            $array['number4'] = explode(',',  $array['number3']);
           
            if (in_array($loggedInUserId, $array['number4'])) {


                $data['pendingWorkorderDetails2'][] = array(
                    'workordernumber' => $worknumber['workorder_no']
                );
            }
            //  else {

            //  $data['pendingWorkorderDetails2'][] = array(
            //      'workordernumber' => ''
            //  );
            // }
        }

        if (count($data['pendingWorkorderDetails1']) > 0) {
            $count = 0;

            $this->session->set_userdata('countnotify', $data['pendingWorkorders']);

            $count++;
        }
		if ($this->session->userdata('usertype') == 'admin') {
			foreach ($data['notifyNewUser1'] as $user) {
				//print_r($data['notifyNewUser1']);
				$data['notifyNewUser2'][] = array(
					'uid' => $user['user_id'],
					'name' => $user['name'],
				);
				//print_r($data['notifyNewUser2']);
			}
			foreach ($data['notifyNewClient1'] as $client) {
				$data['notifyNewClient2'][] = array(
					'cid' => $client['client_id'],
					'name' => $client['name'],
				);
			}
		}

        //  var_dump($data['pendingWorkorderDetails']);

        //http://localhost/tutorial/codeigniter/Main/dashboard
        $data['title'] = 'Balu & Anand, Chartered Accountants';

        if (isset($_SESSION['usertype'])) {
            $data['usertype'] = $_SESSION['usertype'];
            // echo "if";

        }

        $data['usertype'] = $_SESSION['usertype'];


        $this->load->view('template/header');

        $this->load->view('template/navigation');

        $this->load->view('template/dashboard', $data);

        $this->load->view('template/footer');
    }

	function edit_submit_index()
	{
		$this->load->helper('url');

		$action = $this->input->post['submit'];

		$data = array(
			'name' => $this->input->post('firstname'),
			'subject' => $this->input->post('subject'),
			'organization' => $this->input->post('organization'),
			'message' =>  nl2br($this->input->post('message')),
		);
		//print_r( $data );
		$this->load->model('Main_model');
		$validate = $this->Main_model->submit_index($data);

		redirect(base_url());
	}

	public function login_validation()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('balunand_id_no', 'balunand_id_no', 'required');

		$this->form_validation->set_rules('password', 'Password', 'required');

		// $this->form_validation->set_rules('official_email', 'official_email', 'required');

		if ($this->form_validation->run()) {

			//true
			$balunand_id_no = $this->input->post('balunand_id_no');

			$password =($this->input->post('password'));
			$Password=md5($password);
			// $official_email=$this->input->post('official_email');

			//print_r($Password);

			//model function
			$this->load->model('Main_model');

			if ($this->Main_model->can_login($balunand_id_no, $Password)) {

				//if ($this->Main_model->can_login($balunand_id_no, $Password)) {

				$record = $this->Main_model->can_login($balunand_id_no, $Password);

				//$record = $this->Main_model->can_login($balunand_id_no, $Password);

				$record = $this->Main_model->can_login($balunand_id_no, $Password);
				// echo $password;
				//var_dump($record);

				// echo "<br>";
				$user_type_id=$this->Main_model->get_User_Type($balunand_id_no, $Password);

				$usertype = $this->Main_model->getUserType( $user_type_id);
				

				//var_dump($usertype);

				//return;

				$new_user_id = $this->Main_model->getUserId($balunand_id_no, $Password);
				$username = $this->Main_model->getUserName($new_user_id);

				// echo "username $username";

				//var_dump($username);

				//return;

				$session_data = array(
					'balunand_id_no' => $balunand_id_no,
					//'student_reg_no'=> $student_reg_no,
					'usertype'     => $usertype,
					'username'     => $username,
					// 'official_email'=> $official_email,
					'userId' => $record

				);

				//var_dump($session_data);

				//return;

				//https://getbootstrap.com/docs/5.0/forms/layout/

				$_SESSION['usertype'] = $session_data['usertype'];

				// var_dump( $_SESSION['usertype']);


				//return;

				$this->session->set_userdata($session_data);

				redirect(base_url() . 'Main/dashboard');

				//redirect('https://aaplweb.co.in/balunand/kriyasheela/Main/dashboard');
			} else {

				$this->session->set_flashdata('error', 'Invalid balunand_id_no and Password');

				redirect(base_url() . 'Main/login');
			}
			
		} else {

			//false
			$this->login();
		}
	}

	function enter()
	{

		if ($this->session->userdata('balunand_id_no') != '') {

			echo '<h2>Welcome - ' . $this->session->userdata('balunand_id_no') . '</h2>';

			echo '<label><a href="' . base_url() . 'Main/logout">Logout</a></label>';
		} else {

			redirect(base_url() . 'Main/login');
		}
	}

	function logout()
	{

		$this->session->unset_userdata('balunand_id_no');
		$this->session->unset_userdata('usertype');
		$this->session->unset_userdata('username');
		// $this->session->unset_userdata('official_email');
		$this->session->unset_userdata('userId');



		redirect(base_url() . 'Main/login');
	}
}

