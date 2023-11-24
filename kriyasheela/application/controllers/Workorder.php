<?php
defined('BASEPATH') or exit('No direct script access allowed');
// $fromLocal=localStorage.getItem('name');
// echo $fromLocal;
class Workorder extends CI_Controller
{

	function workorderform()
	{
		//http://localhost/tutorial/codeigniter/main/login
		$data['title'] = 'CodeIgniter Simple Login Form With Sessions';
		if ($this->session->userdata('balunand_id_no') == '') {
			redirect(base_url() . 'main/login');
		} else {
			$this->load->model('Workorder_model');
			$this->load->model('Main_model');
			$this->load->library('session');
			$loggedInUserId = $this->session->userdata('userId');
			//echo $loggedInUserId;
			$this->load->helper('url');

			$data['name'] = $this->Workorder_model->getClientName();
			foreach ($data['name']  as $name) {
				$data['clientname'][] = array(
					//'workorder_no'=>$userdetails['workorder_no'],
					'name' => $name['name']
				);
			}
			//   var_dump($data['clientname'] );
			$data['assign_to'] = $this->Workorder_model->getUsers();
			// var_dump($data['assign_to'] );
			foreach ($data['assign_to']  as $assign_to) {
				$data['assign_to2'][] = array(
					'user_id' =>  $assign_to['user_id'],
					'name' =>   $assign_to['name']
				);
			}
			$data['workordernumber'] = $this->Workorder_model->fetch_workorder();
			$data['EA'] = '23EA0';
			$data['IA'] = '23IA0';
			$data['TA'] = '23TA0';
			$data['RF'] = '23RF0';
			foreach ($data['workordernumber'] as $worknumber) {
				$workorder_no = $worknumber['workorder_no'];
				//	$type_Of_Work=$worknumber['type_of_work'];
				//echo $workorder_no;

				foreach ((array) $workorder_no as $workid) {
					//echo $workid;
					$data['work'] = substr($workid, 2, 2);
					//echo $data['work'];

					if ($data['work'] == 'EA') {
						$data['EA'] = $workid;
						//print_r($data['EA']);

					} else if ($data['work'] == 'IA') {
						$data['IA'] = $workid;
					} else if ($data['work'] == 'TA') {
						$data['TA'] = $workid;
					} else if ($data['work'] == 'RF') {
						$data['RF'] = $workid;
						//echo $data['RF'];

					} else {
						echo " Not a Match ";
					}
				}
			}
			$data['typeofworkorder'] = $this->Workorder_model->getTypeofWork();
			foreach ($data['typeofworkorder'] as $typeofworkorder) {
				$data['typeofworkorderdata'][] = array(
					'type_of_work_id' => $typeofworkorder['type_of_work_id'],
					'prefix' => $typeofworkorder['prefix']
				);

				switch ($typeofworkorder['type_of_work_id']) {
					case 1:

						foreach ((array) $data['EA'] as $id) {

							$data['workdata1'] = substr($id, 4);
							echo $data['workdata1'];
							if ($data['workdata1'] == '') {
								//echo($data['workdata1']);
								//$data['workdata1']=1;
							} else {
								$workdata_ea = $data['workdata1'] + 1;
							}
							$data['work_order_last_number_ea'] = $workdata_ea;
							// echo $id;	
							// print_r($data['workdata']);
							// Getting 23EA
							$type_Of_Work = substr($id, 0, 4);
							//	echo $data['year_typeOfWork'];
							// final workorder number
							$final_workorder_number = $type_Of_Work . $workdata_ea;
							//echo $final_workorder_number;


							echo "<br/>";
						}

						break;
					case 2:
						foreach ((array) $data['IA'] as $id) {
							//echo $id;
							$data['workdata1'] = substr($id, 4);
							$workdata_ia = $data['workdata1'] + 1;
							$data['work_order_last_number_ia'] = $workdata_ia;
							// echo $id;	
							// print_r($data['workdata']);
							// Getting 23EA
							$type_Of_Work = substr($id, 0, 4);
							//	echo $data['year_typeOfWork'];
							// final workorder number
							$final_workorder_number = $type_Of_Work . $workdata_ia;
							//echo $final_workorder_number;
							echo "<br/>";
						}
						break;
					case 3:
						foreach ((array) $data['TA'] as $id) {
							//echo $id;
							$data['workdata1'] = substr($id, 4);
							$workdata_ta = $data['workdata1'] + 1;
							$data['work_order_last_number_ta'] = $workdata_ta;
							// echo $id;	
							// print_r($data['workdata']);
							// Getting 23EA
							$type_Of_Work = substr($id, 0, 4);
							//	echo $data['year_typeOfWork'];
							// final workorder number
							$final_workorder_number = $type_Of_Work . $workdata_ta;
							//echo $final_workorder_number;
							echo "<br/>";
						}
						break;
					case 4:
						foreach ((array) $data['RF'] as $id) {
							//echo $id;
							$data['workdata1'] = substr($id, 4);
							$workdata_rf = $data['workdata1'] + 1;
							$data['work_order_last_number_rf'] = $workdata_rf;
							// echo $id;	
							// print_r($data['workdata']);
							// Getting 23EA
							$type_Of_Work = substr($id, 0, 4);
							//	echo $data['year_typeOfWork'];
							// final workorder number
							$final_workorder_number = $type_Of_Work . $workdata_rf;
							//echo $final_workorder_number;
							echo "<br/>";
						}
						break;
					default:
						//echo "Invalid type";
				}
			}

			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$this->load->view('Workorder_form', $data);
			$this->load->view('template/footer');
		}
	}

	// public function close_work_order(){

	// 	$workno = $this->input->get('workno');
	// 	$loggedInName=$this->input->get('loggedInName');
	// 	echo json_encode(['workno' => $workno]);
	// 	$loggedInUserId = $this->input->get('loggedInUserId');



	// 	$notification_data=array(
	// 		'workorder_no' =>$workno,
	// 		'user_id' =>$loggedInUserId,
	// 		'user_name' =>$loggedInName,
	// 		'type' =>'closeworkorder',
	// 		'status' => 0,
	// 		'date' => date('Y-m-d H:i:s')

	// 	);

	// 	$this->load->model('Notification_Model');
	// 	$this->Notification_Model->insertnotification($notification_data);
	// 	$this->session->set_flashdata('success', 'data is updated successfully');
	// }
	public function update_date()
	{
		$workorder_no = $this->input->get('workorder_no');
		$targeted_date = $this->input->get('targeted_date');
		$deadline_date = $this->input->get('deadline_date');
		$client_name = $this->input->get('client_name');
		$partner_in_charge = $this->input->get('partner_in_charge');

		$data = array(
			'workorder_no' => $workorder_no,
			'targetted_end_date' => $targeted_date,
			'deadline' => $deadline_date,
			'client_name' => $client_name,
			'partner_in_charge' => $partner_in_charge
		);

		$this->load->model('Workorder_model');
		$this->Workorder_model->updateentitydate($data);

		$notification_data = array(
			'workorder_no' => $workorder_no,
			'targetted_end_date' => $targeted_date,
			'deadline' => $deadline_date,
			'status' => 0,
			'type' => 'Updated Workorder',
			'date' => date('Y-m-d H:i:s')
		);

		$this->load->model('Notification_Model');
		$this->Notification_Model->insertnotification($notification_data);

		$notification_data = array(
			//'assign_to' => $assign_tojson,
			'workorder_no' => $workorder_no,
			'targetted_end_date' => $targeted_date,
			'deadline' => $deadline_date,
			'status' => 0,
			'type' => 'Workorder - Deadline',
			'date' => date('Y-m-d H:i:s')
		);

		$this->load->model('Notification_Model');
		$this->Notification_Model->insertnotification($notification_data);

		$this->session->set_flashdata('success', 'Data is updated successfully');
	}

	public function deadline()
	{
		$workorder_no = $this->input->get('workorder_no');
		$targeted_date = $this->input->get('targeted_date');
		$deadline_date = $this->input->get('deadline_date');
		//$date=date('Y-m-d H:i:s');

		$notification_data = array(
			'workorder_no' => $workorder_no,
			'targetted_end_date' => $targeted_date,
			'deadline' => $deadline_date,
			'status' => 0,
			'type' => 'Workorder - Deadline',
			'date' => date('Y-m-d H:i:s')
		);

		$this->load->model('Notification_Model');
		$this->Notification_Model->insertnotification($notification_data);
	}

	public function close_work_order()
	{
		$this->load->model('Main_model');
		$this->load->model('User_model');
		$loggedInUserId = $this->session->userdata('userId');
		$loggedInUserName = $this->session->userdata('username');
		$loggedInUserEmpId = $this->session->userdata('balunand_id_no');
		$workorder_no = $this->input->get('workorder_no');

		$notification_data = array(
			'workorder_no' => $workorder_no,
			'user_id' => $loggedInUserId,
			'balunand_id_no' => $loggedInUserEmpId,
			'user_name' => $loggedInUserName,
			'status' => 0,
			'type' => 'Requesting to Close Workorder',
			'date' => date('Y-m-d H:i:s')
		);
		$this->load->model('Notification_Model');
		$this->Notification_Model->insertnotification($notification_data);
	}

	public function view_workorder($workidnumber = null)
	{
		$data = $this->input->post('data');
		//  $loggedInUserId = $this->session->userdata('userId');
		//  $jsonValue = json_encode($loggedInUserId);
		//  echo $jsonValue;

		echo $data;
		if ($this->session->userdata('balunand_id_no') == '') {
			redirect(base_url() . 'main/login');
		} else {
			$this->load->model('Workorder_model');
			$this->load->model('User_model');
			$loggedInUserId = $this->session->userdata('userId');
			$loggedInUserName = $this->session->userdata('username');
			$loggedInUserEmpId = $this->session->userdata('balunand_id_no');
			// echo $loggedInUserId;
			$usertype = $this->User_model->getUsersType($loggedInUserId);
			// workorder number and their status
			$data['workorderStatus'] = $this->Workorder_model->getWorkorderStatus();

			if ($workidnumber == null) {
				if ($usertype == 1) {
					$data['workorderno'] = $this->Workorder_model->getWorkOrderNo();

					foreach ($data['workorderno'] as $worksheet) {
						$data['workorderdetails'][] = array(
							'workorder_no' => $worksheet['workorder_no'],
							'client_name' => $worksheet['client_name'],
							'created_on' => $worksheet['created_on'],
							'assign_to' => $worksheet['assign_to'],
							'type_of_work' => $worksheet['type_of_work'],
							'partner_in_charge' => $worksheet['partner_in_charge'],
							'start_date' => $worksheet['start_date'],
							'targetted_end_date' => $worksheet['targetted_end_date'],
							'deadline' => $worksheet['deadline'],
						);
						//return;

					}

					//print_r($data['workorderdetails']);
					/// to fetch work order number
					$data['assignworkorderno'] = $this->Workorder_model->getAssignToWorkOrderNo();

					//var_dump($data['assignworkorderno']);


					if (count($data['assignworkorderno']) > 0) {
						foreach ($data['assignworkorderno'] as $assignworkorderno) {
							$workid = $assignworkorderno['workorder_no'];
							// var_dump($assignworkorderno['workorder_no']);
							$array['number1'] = str_replace('"', '',  $assignworkorderno['assign_to']);
							$array['number2'] = str_replace(']', '',    $array['number1']);
							$array['number3'] = str_replace('[', '',    $array['number2']);
							$array['number4'] = explode(',',  $array['number3']);
							foreach ($array['number4'] as $assignworkordernonumber4) {
								$data['userdetails'] = $this->Workorder_model->getAssignToUsers($assignworkordernonumber4);
								foreach ($data['userdetails'] as $key => $userdetails) {
									// var_dump($key);
									$data['userdetails1'][] = array(
										'user_id' => $userdetails['user_id'],
										'name' => $userdetails['name'],
										'balunand_id_no' => $userdetails['balunand_id_no'],
										'student_reg_no' => $userdetails['student_reg_no'],
										//  'assign_to' => $userdetails['assign_to'],  
										//  'leadname'=>$userdetails['name'],
										//  'user_id'=>$userdetails['user_id']
									);
								}
							}
							$data['oneworkorderdata'][] = array(
								'workorder_no' => $assignworkorderno['workorder_no'],
								'client_name' => $assignworkorderno['client_name'],
								'created_on' => $assignworkorderno['created_on'],
								'assign_to' => $assignworkorderno['assign_to'],
								'type_of_work' => $assignworkorderno['type_of_work'],
								'partner_in_charge' => $assignworkorderno['partner_in_charge'],
								'start_date' => $assignworkorderno['start_date'],
								'targetted_end_date' => $assignworkorderno['targetted_end_date'],
								'deadline' => $assignworkorderno['deadline'],
							);
							// var_dump($data['userdetails1']);
							break;
						}
						// return;
						/// for flow of work worksheet
						$data['fetch_data'] = $this->Workorder_model->fetchworkordersheetdata($workid);
						foreach ($data['fetch_data'] as $worksheet) {
							$starttime = chop($worksheet['start_time'], "amp");
							$endtime = chop($worksheet['end_time'], "amp");
							$start_time = strtotime($starttime);
							$end_time = strtotime($endtime);
							$timespent = ($end_time - $start_time) / 60;
							$data['workesheetdata'][] = array(
								'workorder_no' => $worksheet['workorder_no'],
								//'created_on' => $worksheet['created_on'],
								//'client_name' => $worksheet['client_name'],
								'name_of_employee' => $worksheet['employee_name'],
								'date' => $worksheet['date'],
								'work_description' => $worksheet['work_description'],
								'start_time' => $worksheet['start_time'],
								'end_time' => $worksheet['end_time'],
								'spent_time' => $timespent . 'minutes',
								'remark' => $worksheet['remark']
							);
						}
					}
					//return;
				}


				if ($usertype != 1) {
					//	echo "1";
					/// to display workorder dropdown in view file for employees/other then admins based on workorder assigned to them.
					$data['workorderno'] = $this->Workorder_model->getWorkOrderNo();
					foreach ($data['workorderno'] as $worksheet) {
						$array['number1'] = str_replace('"', '',  $worksheet['assign_to']);
						$array['number2'] = str_replace(']', '',    $array['number1']);
						$array['number3'] = str_replace('[', '',    $array['number2']);
						$array['number4'] = explode(',',  $array['number3']);
						//var_dump($array['number4']);
						if (in_array($loggedInUserId, $array['number4'])) {
							$data['workorderdetails'][] = array(
								'workorder_no' => $worksheet['workorder_no'],
								'client_name' => $worksheet['client_name'],
								'created_on' => $worksheet['created_on'],
								'assign_to' => $worksheet['assign_to'],
								'type_of_work' => $worksheet['type_of_work'],
								'partner_in_charge' => $worksheet['partner_in_charge'],
								'start_date' => $worksheet['start_date'],
								'targetted_end_date' => $worksheet['targetted_end_date'],
								'deadline' => $worksheet['deadline'],
							);
						}
					}
					///// end of dropdown code
					foreach ($data['workorderno'] as $worksheet) {
						$aids = $worksheet['assign_to'];
						//  var_dump($loggedInUserId,);
						$array['number1'] = str_replace('"', '', $worksheet['assign_to']);
						$array['number2'] = str_replace(']', '', $array['number1']);
						$array['number3'] = str_replace('[', '',    $array['number2']);
						$array['number4'] = explode(',',  $array['number3']);
						//var_dump($array['number4']);
						if (in_array($loggedInUserId, $array['number4'])) {
							$worksheetworkorderno = $worksheet['workorder_no'];
							$data['fetch_data'] = $this->Workorder_model->fetchworkordersheetdata($worksheetworkorderno);
							foreach ($array['number4'] as $assignworkordernonumber4) {
								//	echo $assignworkordernonumber4;
								$data['userdetails'] = $this->Workorder_model->getAssignToUsers($assignworkordernonumber4);
								foreach ($data['userdetails'] as $key => $userdetails) {
									$data['userdetails1'][] = array(
										'user_id' => $userdetails['user_id'],
										'name' => $userdetails['name'],
										'balunand_id_no' => $userdetails['balunand_id_no'],
										'student_reg_no' => $userdetails['student_reg_no'],
										//  'assign_to' => $userdetails['assign_to'],  
										//  'leadname'=>$userdetails['name'],
										//  'user_id'=>$userdetails['user_id']
									);
								}
							}
							//echo    $worksheet['workorder_no'] ;
							$data['oneworkorderdata'][] = array(
								'workorder_no' => $worksheetworkorderno,
								'client_name' => $worksheet['client_name'],
								'created_on' => $worksheet['created_on'],
								'assign_to' => $worksheet['assign_to'],
								'type_of_work' => $worksheet['type_of_work'],
								'partner_in_charge' => $worksheet['partner_in_charge'],
								'start_date' => $worksheet['start_date'],
								'targetted_end_date' => $worksheet['targetted_end_date'],
								'deadline' => $worksheet['deadline'],
							);
							break;
							// echo $worksheet['workorder_no'] ;var_dump( $data['oneworkorderdata']);
						}
					}
					$data['fetch_data'] = $this->Workorder_model->fetchworkordersheetdata($workidnumber);
					foreach ($data['fetch_data'] as $worksheet) {
						$starttime = chop($worksheet['start_time'], "amp");
						$endtime = chop($worksheet['end_time'], "amp");
						$start_time = strtotime($starttime);
						$end_time = strtotime($endtime);
						$timespent = ($end_time - $start_time) / 60;
						$data['workesheetdata'][] = array(
							'workorder_no' => $worksheet['workorder_no'],
							//'created_on' => $worksheet['created_on'],
							//'client_name' => $worksheet['client_name'],
							'name_of_employee' => $worksheet['employee_name'],
							'date' => $worksheet['date'],
							'work_description' => $worksheet['work_description'],
							'start_time' => $worksheet['start_time'],
							'end_time' => $worksheet['end_time'],
							'spent_time' => $timespent . 'minutes',
							'remark' => $worksheet['remark']
						);
					}
				}
			} else {
				//echo "not null in url";
				if ($usertype == 1) {
					$data['workorderno'] = $this->Workorder_model->getWorkOrderNo();
					/// for dropdown
					foreach ($data['workorderno'] as $worksheet) {
						$data['workorderdetails'][] = array(
							'workorder_no' => $worksheet['workorder_no'],
							'client_name' => $worksheet['client_name'],
							'created_on' => $worksheet['created_on'],
							'assign_to' => $worksheet['assign_to'],
							'type_of_work' => $worksheet['type_of_work'],
							'partner_in_charge' => $worksheet['partner_in_charge'],
							'start_date' => $worksheet['start_date'],
							'targetted_end_date' => $worksheet['targetted_end_date'],
							'deadline' => $worksheet['deadline'],
						);
					}
					//return;
					$resultsworkorder = $this->Workorder_model->getOneWorkOrder($workidnumber);
					foreach ($resultsworkorder as $assignworkorderno) {
						$workid = $assignworkorderno['workorder_no'];
						$array['number1'] = str_replace('"', '',  $assignworkorderno['assign_to']);
						$array['number2'] = str_replace(']', '',    $array['number1']);
						$array['number3'] = str_replace('[', '',    $array['number2']);
						$array['number4'] = explode(',',  $array['number3']);
						foreach ($array['number4'] as $assignworkordernonumber4) {
							$data['userdetails'] = $this->Workorder_model->getAssignToUsers($assignworkordernonumber4);
							foreach ($data['userdetails'] as $userdetails) {
								$data['userdetails1'][] = array(
									'user_id' => $userdetails['user_id'],
									'name' => $userdetails['name'],
									'balunand_id_no' => $userdetails['balunand_id_no'],
									'student_reg_no' => $userdetails['student_reg_no']
									// 'assign_to' => $userdetails['assign_to'],  
									//'leadname'=>$userdetails['name'],
									//  'user_id'=>$userdetails['user_id']
								);
							}
						}
						$data['oneworkorderdata'][] = array(
							'workorder_no' => $assignworkorderno['workorder_no'],
							'client_name' => $assignworkorderno['client_name'],
							'created_on' => $assignworkorderno['created_on'],
							'assign_to' => $assignworkorderno['assign_to'],
							'type_of_work' => $assignworkorderno['type_of_work'],
							'partner_in_charge' => $assignworkorderno['partner_in_charge'],
							'start_date' => $assignworkorderno['start_date'],
							'targetted_end_date' => $assignworkorderno['targetted_end_date'],
							'deadline' => $assignworkorderno['deadline'],
						);
					}
					$data['fetch_data'] = $this->Workorder_model->fetchworkordersheetdata($workidnumber);
					foreach ($data['fetch_data'] as $worksheet) {
						$starttime = chop($worksheet['start_time'], "amp");
						$endtime = chop($worksheet['end_time'], "amp");
						$start_time = strtotime($starttime);
						$end_time = strtotime($endtime);
						$timespent = ($end_time - $start_time) / 60;
						$data['workesheetdata'][] = array(
							'workorder_no' => $worksheet['workorder_no'],
							//'created_on' => $worksheet['created_on'],
							//'client_name' => $worksheet['client_name'],
							'name_of_employee' => $worksheet['employee_name'],
							'date' => $worksheet['date'],
							'work_description' => $worksheet['work_description'],
							'start_time' => $worksheet['start_time'],
							'end_time' => $worksheet['end_time'],
							'spent_time' => $timespent . 'minutes',
							'remark' => $worksheet['remark']
						);
					}
				}
				// <!-- ///////usertype 1 end process -->
				// var_dump($usertype);
				/// to display  workorder number in drop down 
				if ($usertype != 1) {
					//  var_dump($workidnumber);
					$data['workorderno'] = $this->Workorder_model->getWorkOrderNo();
					foreach ($data['workorderno'] as $worksheet) {
						$workids = $worksheet['workorder_no'];
						$aids = $worksheet['assign_to'];
						// var_dump($aids);
						$array['number1'] = str_replace('"', '',  $worksheet['assign_to']);
						$array['number2'] = str_replace(']', '',    $array['number1']);
						$array['number3'] = str_replace('[', '',    $array['number2']);
						$array['number4'] = explode(',',  $array['number3']);
						// var_dump($array['number4']);
						// echo "<br>";
						if (in_array($loggedInUserId, $array['number4'])) {
							//echo $workids;
							$data['workorderdetails'][] = array(
								'workorder_no' => $worksheet['workorder_no'],
								'client_name' => $worksheet['client_name'],
								'created_on' => $worksheet['created_on'],
								'assign_to' => $worksheet['assign_to'],
								'type_of_work' => $worksheet['type_of_work'],
								'partner_in_charge' => $worksheet['partner_in_charge'],
								'start_date' => $worksheet['start_date'],
								'targetted_end_date' => $worksheet['targetted_end_date'],
								'deadline' => $worksheet['deadline'],
							);
						}
						//  return;
					}
					//<!-- for dropdown filter  end process -->
					$resultsworkorder = $this->Workorder_model->getOneWorkOrder($workidnumber);
					foreach ($resultsworkorder as $assignworkorderno) {
						$workid = $assignworkorderno['workorder_no'];
						$array['number1'] = str_replace('"', '',  $assignworkorderno['assign_to']);
						$array['number2'] = str_replace(']', '',    $array['number1']);
						$array['number3'] = str_replace('[', '',    $array['number2']);
						$array['number4'] = explode(',',  $array['number3']);
						if (in_array($loggedInUserId, $array['number4'])) {
							foreach ($array['number4'] as $assignworkordernonumber4) {
								$data['userdetails'] = $this->Workorder_model->getAssignToUsers($assignworkordernonumber4);
								foreach ($data['userdetails'] as $userdetails) {
									$data['userdetails1'][] = array(
										'user_id' => $userdetails['user_id'],
										'name' => $userdetails['name'],
										'balunand_id_no' => $userdetails['balunand_id_no'],
										'student_reg_no' => $userdetails['student_reg_no']
										// 'assign_to' => $userdetails['assign_to'],  
										//'leadname'=>$userdetails['name'],
										//  'user_id'=>$userdetails['user_id']
									);
								}
							}
							$data['oneworkorderdata'][] = array(
								'workorder_no' => $assignworkorderno['workorder_no'],
								'client_name' => $assignworkorderno['client_name'],
								'created_on' => $assignworkorderno['created_on'],
								'assign_to' => $assignworkorderno['assign_to'],
								'type_of_work' => $assignworkorderno['type_of_work'],
								'partner_in_charge' => $assignworkorderno['partner_in_charge'],
								'start_date' => $assignworkorderno['start_date'],
								'targetted_end_date' => $assignworkorderno['targetted_end_date'],
								'deadline' => $assignworkorderno['deadline'],
							);
						}
					}
					$data['fetch_data'] = $this->Workorder_model->fetchworkordersheetdata($workidnumber);
					foreach ($data['fetch_data'] as $worksheet) {
						$starttime = chop($worksheet['start_time'], "amp");
						$endtime = chop($worksheet['end_time'], "amp");
						$start_time = strtotime($starttime);
						$end_time = strtotime($endtime);
						$timespent = ($end_time - $start_time) / 60;
						$data['workesheetdata'][] = array(
							'workorder_no' => $worksheet['workorder_no'],
							//'created_on' => $worksheet['created_on'],
							//'client_name' => $worksheet['client_name'],
							'name_of_employee' => $worksheet['employee_name'],
							'date' => $worksheet['date'],
							'work_description' => $worksheet['work_description'],
							'start_time' => $worksheet['start_time'],
							'end_time' => $worksheet['end_time'],
							'spent_time' => $timespent . 'minutes',
							'remark' => $worksheet['remark']
						);
					}
				}
			}

			$data['allAssignToId'] = $this->Workorder_model->getAssignToUserId();

			foreach ($data['allAssignToId'] as $assign_id) {
				$data['assign_to_id'][] = array(
					'remarks' =>  $assign_id['remarks'],

				);
			}
			//   var_dump($data['clientname'] );
			$data['assign_to'] = $this->Workorder_model->getUsers();
			// var_dump($data['assign_to'] );
			foreach ($data['assign_to']  as $assign_to) {
				$data['assign_to2'][] = array(
					'user_id' =>  $assign_to['user_id'],
					'name' =>   $assign_to['name']
				);
			}

			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$this->load->view('View_workorder',  $data);
			$this->load->view('template/footer');
		}
	}
	public function ajaxworkorder()
	{
		$this->load->model('Workorder_model');
		$postData = $this->input->post('typeofworkid');
		$getTypeofWorkPrefix = $this->Workorder_model->getTypeofWorkPrefix($postData);
		$getTypeofWork = $this->Workorder_model->fetch_workorder_data();
		$result[] = array(
			'workorder_no' => '1',
			'prefix' => $getTypeofWorkPrefix,
		);
		echo json_encode($result);
	}
	function registerNow()
	{



		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			//$this->form_validation->set_rules('workorder_no', 'Workorder No', 'required');
			// $this->form_validation->set_rules( 'created_on', 'Created On', 'required' );
			// $this->form_validation->set_rules( 'client_name', 'Name of the Client', 'required' );
			// $this->form_validation->set_rules( 'type_of_work', 'Type of Work', 'required' );
			// $this->form_validation->set_rules( 'partner_in_charge', 'Partner in Charge', 'required' );
			// $this->form_validation->set_rules( 'start_date', 'Start Date', 'required' );
			// $this->form_validation->set_rules( 'targetted_end_date', 'Targetted End Date', 'required' );
			// $this->form_validation->set_rules( 'deadline', 'Deadline', 'required' );
			// $this->form_validation->set_rules( 'assign_to', 'Assign To', 'required' );
			// $this->form_validation->set_rules( 'remarks', 'Remarks', 'required' );
			if (
				$this->form_validation->run() == true  ||
				$this->form_validation->run() == false
			) {
				$workorder_no = $this->input->post('workorder_no');
				$created_on = $this->input->post('created_on');
				//echo $created_on;
				//$foratedDate=date('Y-m-d',strtotime($created_on));
				$client_name = $this->input->post('client_name');
				$type_of_work = $this->input->post('type_of_work');
				$partner_in_charge = $this->input->post('partner_in_charge');
				$start_date = $this->input->post('start_date');
				$targetted_end_date = $this->input->post('targetted_end_date');
				$deadline = $this->input->post('deadline');
				$assign_to = $this->input->post('assign_to');

				$assign_tojson = json_encode($assign_to);
				// exit;
				// header('Content-Type: application/json');

				//exit;
				//var_dump($assign_tojson);

				// $assign_to['assign_to'] = array();
				//   var_dump(  $assign_tojson);
				//  var_dump(  $assign_to );
				// return; 
				//

				$remarks = $this->input->post('remarks');
				$time = date('Y-m-d H:i:s');
				$data = array(
					'workorder_no' => $workorder_no,
					'created_on' => $created_on,
					'client_name' => $client_name,
					'type_of_work' => $type_of_work,
					'partner_in_charge' => $partner_in_charge,
					'start_date' => $start_date,
					'targetted_end_date' => $targetted_end_date,
					'deadline' => $deadline,
					'assign_to' =>  $assign_tojson,
					//$data['assign_to'] = array();
					'remarks' => $remarks,
					'status' => 'open',
					'time' => $time
				);
				//var_dump( $data);
				$this->load->model('Workorder_model');
				$this->load->model('main_model');
				$this->Workorder_model->insertuser($data);

				$notification_data = array(
					'assign_to' => $assign_tojson,
					'workorder_no' => $workorder_no,
					'status' => 0,
					'type' => 'New Workorder',
					'date' => date('Y-m-d H:i:s')
				);

				$this->load->model('Notification_Model');
				$this->Notification_Model->insertnotification($notification_data);


				$notification_data = array(
					'assign_to' => $assign_tojson,
					'workorder_no' => $workorder_no,
					'targetted_end_date' => $targetted_end_date,
					'deadline' => $deadline,
					'status' => 0,
					'type' => 'Workorder - Deadline',
					'date' => date('Y-m-d H:i:s')
				);

				$this->load->model('Notification_Model');
				$this->Notification_Model->insertnotification($notification_data);


				$this->session->set_flashdata('success', 'Successfully created the workorder');
				redirect(base_url('Workorder/View_workorder/' . $workorder_no));
			}
		}
	}

	// New Assign user 
	function updateData()
	{
		$workorder_number = $this->input->post('workorder_number');
		$workorder_num = (string)$workorder_number;
		$assign_to = $this->input->post('assign_to');
		$last_user = $this->input->post('last_user');

		$assign_tojson = json_encode($assign_to);
		$last_user_tojson = json_encode($last_user);
		print_r($last_user_tojson);

		$data = array(
			'assign_to' =>  $assign_tojson,
		);

		// Addding data to workorder table
		$this->load->model('Workorder_model');
		$this->Workorder_model->updateViewWorkorder($data, $workorder_num);

		// Adding data to notification table
		$this->load->model('User_model');
		$loggedInUserId = $this->session->userdata('userId');
		$notification_data = array(
			'workorder_no' => $workorder_number,
			'assign_to' => $last_user_tojson,
			//'user_id' => $loggedInUserId,
			'type' => 'Workorder - Assigned to new user',
			'status' => 0,
			'date' => date('Y-m-d H:i:s')

		);

		$this->load->model('Notification_Model');
		$this->Notification_Model->insertnotification($notification_data);

		$this->session->set_flashdata('success', 'User Assigned Successfully');
		redirect(base_url('Workorder/View_workorder/' . $workorder_number));
	}

	// Close workorder

	function closeWorkorderStatus()
	{

		$workorder_status = $this->input->post('workorderStatus');
		$currentWorkorder = $this->input->post('currentWorkorderNo');

		$data = array(
			'status' => $workorder_status,
		);

		$this->load->model('Workorder_model');
		$this->Workorder_model->updateWorkorderStatus($data, $currentWorkorder);
		foreach ((array)$workorder_status as $status) {
			if ($status == 'closed') {
				$notification_data = array(
					'workorder_no' => $currentWorkorder,
					'type' => 'Closed Workorder',
					'status' => 0,
					'date' => date('Y-m-d H:i:s')
				);
				$this->load->model('Notification_Model');
				$this->Notification_Model->insertnotification($notification_data);
			} else if ($status == 'open') {
				$notification_data = array(
					'workorder_no' => $currentWorkorder,
					'type' => 'Open Workorder',
					'status' => 0,
					'date' => date('Y-m-d H:i:s')
				);
				$this->load->model('Notification_Model');
				$this->Notification_Model->insertnotification($notification_data);
			}
			//$this->session->set_flashdata('success', 'User Assigned Successfully');
			redirect(base_url('Workorder/View_workorder/' . $currentWorkorder));
		}
	}
	// Deleting Workorder from Database
	function deleteWorkorderNumber()
	{
		//$currentWorkorder = $this->input->post('currentWorkorderNumber');
		$this->load->library('session');
		$currentWorkorder = $this->session->userdata('current_workorder_no');
		$this->load->model('Workorder_model');
		$this->load->model('Notification_Model');
		$this->Workorder_model->deleteWorkoderNo($currentWorkorder);
		// $notification_data=array(
		// 	'workorder_no' => $currentWorkorder,
		// 	'type' => 'deleteWorkorder',
		// 	'status' => 0,
		// 	'date' => date('Y-m-d H:i:s')
		// );
		// $this->load->model('Notification_Model');
		// $this->Notification_Model->insertnotification($notification_data);

		$this->session->set_flashdata('success', 'Workorder no ' . $currentWorkorder . ' Deleted Successfully');
		$this->session->set_flashdata('error', 'Failed to delete the workorder');
		redirect(base_url('Workorder/View_workorder/'));
	}
	//Removing Assign user from assign user
	function updateDataAfterDelete()
	{
		$workorder_number = $this->input->post('workorder_number');
		$workorder_num = (string)$workorder_number;
		$assign_to = $this->input->post('remove_assign_user');
		$assign_tojson = json_encode($assign_to);

		$data = array(
			'assign_to' =>  $assign_tojson,
		);
		$this->load->model('Workorder_model');

		$this->Workorder_model->updateViewWorkorder($data, $workorder_num);

		$this->load->model('User_model');
		//$loggedInUserId = $this->session->userdata('userId');

		$notification_data = array(
			'workorder_no' => $workorder_number,
			'assign_to' => $assign_tojson,
			//'user_id' => $loggedInUserId,
			'type' => 'Workorder - Removal of user',
			'status' => 0,
			'date' => date('Y-m-d H:i:s')
		);

		$this->load->model('Notification_Model');
		$this->Notification_Model->insertnotification($notification_data);

		$this->session->set_flashdata('success', 'User Remove Successfully');
		redirect(base_url('Workorder/View_workorder/' . $workorder_number));
	}
}
