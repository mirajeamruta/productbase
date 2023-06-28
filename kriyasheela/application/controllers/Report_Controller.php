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

	public function	index(){

		if ($this->session->userdata('balunand_id_no') == '') {
			//echo "not logged in";      

			redirect(base_url() . 'main/login');
		} else {
			$loggedInUserId = $this->session->userdata('userId');
			$this->load->model('Report_Model');
			if ($this->session->userdata('usertype') == 'admin') {
				$data['worksheet'] = $this->Report_Model->getWorkSheets();
				$sr_number = 1;
				foreach ($data['worksheet'] as $worksheet) {

					$status = $worksheet['status'];

					if ($status === 'open') {
						$status = 'pending';
					}

					$data['workesheetdata'][] = array(
						'SrNo' => $sr_number,
						'workorder_no' => $worksheet['workorder_no'],
						'client_name' => $worksheet['client_name'],
						'date' => $worksheet['date'],
						'work_description' => $worksheet['work_description'],
						'start_time'=>$worksheet['start_time'],
						'end_time'=>$worksheet['end_time'],
						'partner_in_charge'=>$worksheet['partner_in_charge'],
						'status'=>$status,
					);
					// $sr_number++;
					// echo $sr_number;
					++$sr_number;
					echo "</br>";

				}
			} else {
				$data['worksheet'] = $this->Report_Model->getWorkSheet($loggedInUserId);
				$sr_number = 1;
				foreach ($data['worksheet'] as $worksheet) {

					$data['workesheetdata'][] = array(
						'SrNo' => $sr_number,
						'workorder_no' => $worksheet['workorder_no'],
						'client_name' => $worksheet['client_name'],
						'date' => $worksheet['date'],
						'work_description' => $worksheet['work_description'],
						'start_time'=>$worksheet['start_time'],
						'end_time'=>$worksheet['end_time'],
						'partner_in_charge'=>$worksheet['partner_in_charge'],
						'status'=>$worksheet['status'],
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

			$this->load->view('Report',$data);

			$this->load->view('template/footer');
	}
}


