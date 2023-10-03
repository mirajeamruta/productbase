<?php

use SebastianBergmann\Environment\Console;

defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{

	private $error = '';

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 
	 * config/routes.php, it's displayed at http://example.com/
	 
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html 
	 
	 */

	function __construct()
	{
		parent::__construct();

		$this->load->model('Client_model');
	}


	//index function//

	public function index()
	{

		if ($this->session->userdata('balunand_id_no') == '') {
			//echo "not logged in";      

			redirect(base_url() . 'main/login');
		} else {

			$data = '';

			$this->load->view('template/header');

			$this->load->view('template/navigation');

			$this->load->view('Client_form', $data);

			$this->load->view('template/footer');
		}
	}

	function createClient()
	{

		// $this->load->model('Client_model');

		$loggedInEmployee = $this->session->userdata('username');

		$loggedInUserId = $this->session->userdata('userId');

		$client_info = $this->Client_model->duplicatePan($this->input->post('pancard'));

		// var_dump($client_info);

		// return;

		if (count($client_info) > 0) {
			$data['error'] = 'The Pan Number is already present in database ';
			$this->session->set_flashdata('error', 'The PAN Number is already present in the database');

			redirect(base_url('Client/index'));
		}

		if (($_SERVER['REQUEST_METHOD'] == 'POST')) {

			$clientname = $this->input->post('clientname');
			$tradename = $this->input->post('tradename');
			$Type_of_Clients = $this->input->post('Type_of_Clients');
			$pan = $this->input->post('pancard');
			$PAN = strtoupper($pan);
			$gst = $this->input->post('gst');
			$tan = $this->input->post('tan');
			$TAN = strtoupper($tan);

			$aadhar = $this->input->post('aadhar');
			$address = $this->input->post('address');
			$person_incharge = $this->input->post('person_incharge');
			$person_name = $this->input->post('person_name');
			$person_to_be_contact = $this->input->post('person_to_be_contact');

			$data = array(
				'name' => $clientname,
				'Trade_Name' => $tradename,
				'Type_of_Clients' => $Type_of_Clients,
				'PAN' => $PAN,
				'gst' => $gst,
				'tan' => $TAN,
				'aadhar' => $aadhar,
				'address' => $address,
				'person_incharge' => $person_incharge,
				'person_name' => $person_name,
				'person_to_be_contact' => $person_to_be_contact,

			);

			//print_r($data);

			//return;

			$this->Client_model->insertClient($data);
			$notification_data = array(
				'name' => $clientname,
				'status' => 0,
				'type' => 'New Client',
				'date' => date('Y-m-d H:i:s')

			);

			$this->load->model('Notification_Model');
			$this->Notification_Model->insertnotification($notification_data);


			$this->session->set_flashdata('success', 'Successfully client Created');

			redirect(base_url('Client/ClientList'));
		}
	}

	public function validate()
	{
		if ($this->Client_model->duplicatePan($this->input->post('pan'))) {

			$this->error = 'The Pan Number is already present in database ';

			// var_dump($this->error);
			return !$this->error;
		}
	}


	// public function uploadClient()
	// {
	// 	{
	// 		$this->load->model('Client_model');

	// 		$this->load->library('Csvimport');

	// 		if (isset($_POST['submit'])) {
	// 			//echo "yeah submitted";

	// 			$config['allowed_types'] = 'csv';
	// 			$config['max_size'] = '1000';
	// 			$config['upload_path'] = './photos/';

	// 			$this->load->library('upload', $config);

	// 			$this->upload->initialize($config);

	// 			if ($this->upload->do_upload('userfile')) {
	// 				//print_r($this->upload->data());

	// 				//	echo "one uploaded ";

	// 				// print_r($this->upload->data('file_name'));

	// 				$file_path =  './photos/' . $this->upload->data('file_name');

	// 				if ($this->Csvimport->get_array($file_path)) {
	// 					$csv_array = $this->Csvimport->get_array($file_path);

	// 					//print_r($csv_array);
	// 					//					var_dump($csv_array);

	// 					//return;

	// 					foreach ($csv_array as $row) {

	// 						//	var_dump($row['PAN']);

	// 						$client_info = $this->Client_model->duplicatePan($row['PAN']);
	// 						// var_dump($client_info);

	// 						// echo "<br>";

	// 						//echo gettype($client_info);
	// 						if (count($client_info) > 0) {

	// 							//        echo "yes if";

	// 							//return;
	// 							foreach ($client_info as $clientrow) {

	// 								if ($clientrow['PAN'] == $row['PAN']) {

	// 									// var_dump($clientrow['PAN']);

	// 									// echo "yes elseee if";
	// 									//return;
	// 								}
	// 							}
	// 						} else {

	// 							// echo "yeah";
	// 							echo "<br>";

	// 							//return;
	// 							$insert_data = array(
	// 								'name' => $row['name'],
	// 								'Trade_Name' => $row['Trade_Name'],
	// 								'PAN' => $row['PAN'],
	// 								'GST' => $row['GST'],
	// 								'tan' => $row['tan'],
	// 								'aadhar' => $row['aadhar'],
	// 								'address' => $row['address'],
	// 								'person_incharge' => $row['person_incharge'],
	// 								'person_to_be_contact' => $row['person_to_be_contact'],
	// 							);
	// 							$this->Client_model->insert_csv($insert_data);


	// 							$notification_data = array(
	// 								'name' => $row['name'],
	// 								'status' => 0,
	// 								'type' => 'client',
	// 								'date' => date('Y-m-d H:i:s')
	// 							);
	// 							$this->load->model('Notification_Model');
	// 							$this->Notification_Model->insertnotification($notification_data);
	// 						}
	// 					}
	// 				}
	// 			}
	// 			$this->session->set_flashdata('success', 'Csv Data Imported Succesfully');

	// 			redirect(base_url() . 'Client/index');
	// 		} else {
	// 			// echo "else";
	// 			// print_r($this->upload->display_errors());

	// 			return;
	// 		}
	// 		$this->load->view('Client_form');
	// 	}
	// }

public function countRecordsWithCellValue($csv_array, $columnName, $cellValue) 
	{
		$count = 0;
		foreach ($csv_array as $row) {
			// Check if the cell value in the desired column matches the given value
			if (isset($row[$columnName]) && $row[$columnName] == $cellValue) {
				$count++;
			}
		}
		return $count;
	}
	public function incrementOrSetDefaultValue(&$map, $key) {
    // Check if the key exists in the map
    if (array_key_exists($key, $map)) {
        // Increment the value by 1
        $map[$key]++;
    } else {
        // Set default value to 0 and then increment by 1
        $map[$key] = 1;
    }
}
	public function uploadClient()
	{
		$this->load->model('Client_model');
		$this->load->library('Csvimport');
	
		if (isset($_POST['submit'])) {
			$config['allowed_types'] = 'csv';
			$config['max_size'] = '1000';
			$config['upload_path'] = './photos/';
	
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
	
			if ($this->upload->do_upload('userfile')) {
				$file_path = './photos/' . $this->upload->data('file_name');
	
				if ($this->csvimport->get_array($file_path)) {
					$csv_array = $this->csvimport->get_array($file_path);

					//print_r($csv_array);
					//					var_dump($csv_array);

					//return;
					$message = '';
					$inserted_count = 0;
					$pan_tracker = array();
					foreach ($csv_array as $row) {
						//if ($row['status'] == 'new') {
							//	var_dump($row['PAN']);
							$client_info = $this->Client_model->duplicatePan($row['PAN']);
							// var_dump($client_info);
							// echo "<br>";
							$this->incrementOrSetDefaultValue($pan_tracker, $row['PAN']); 
							//echo gettype($client_info);
							if (count($client_info) > 0) {
								if ($this->countRecordsWithCellValue($csv_array, "PAN", $row['PAN']) > 1 && $this->countRecordsWithCellValue($csv_array, "PAN", $row['PAN']) === $pan_tracker[$row['PAN']]) {

									$message = $message . '<br/>The PAN number ' . $row['PAN'] . ' which you have entered for the client(s) ' . $row['name'] . ' ' . $row['Trade_Name'] . ' already exist.';
								}
						
							} else {
								//echo "yeah";
								//echo "<br>";
								//return;
								$insert_data = array(
									'name' => $row['name'],
									'Trade_Name' => $row['Trade_Name'],
									'Type_of_Clients' => $row['Type_of_Clients'],
									'PAN' => $row['PAN'],
									'GST' => $row['GST'],
									'tan' => $row['tan'],
									'aadhar' => $row['aadhar'],
									'address' => $row['address'],
									'person_incharge' => $row['person_incharge'],
									'person_name' => $row['person_name'],
									'person_to_be_contact' => $row['person_to_be_contact'],
								);
								$this->Client_model->insert_csv($insert_data);
								$inserted_count += 1;
								$notification_data = array(
	 								'name' => $row['name'],
	 								'status' => 0,
	 								'type' => 'Clients Added Through Csv',
	 								'date' => date('Y-m-d H:i:s')
	 							);
							$this->load->model('Notification_Model');
	 						$this->Notification_Model->insertnotification($notification_data);
								
							}

						//}
					}
			}
			$this->session->set_flashdata('success', $message.'<br/>'.$inserted_count.' client(s) have been inserted successfully.');
			
			redirect(base_url() . 'Client/index');
		} else {
			//echo "else";
			//print_r($this->upload->display_errors());

			return;
		}
	
		$this->load->view('Client_form');
	}
	}
	

	public function clientList()
	{
	if ($this->session->userdata('balunand_id_no') == '') {
			redirect(base_url() . 'main/login');
        } else {
		$this->load->model('Client_model');

		$data['clientdetails'] = $this->Client_model->allClients();

		foreach ($data['clientdetails'] as $client) {
			$data['clientdetailsdata'][] = array(
				'client_id' => $client['client_id'],

				'name' => $client['name'],
				'Trade_Name' => $client['Trade_Name'],
				'Type_of_Clients' => $client['Type_of_Clients'],
				'PAN' => $client['PAN'],
				'GST' => $client['GST'],
				'tan' => $client['tan'],
				'aadhar' => $client['aadhar'],
				'address' => $client['address'],
				'person_incharge' => $client['person_incharge'],
				'person_name' => $client['person_name'],
				'person_to_be_contact' => $client['person_to_be_contact'],

			);

			//https://www.youtube.com/watch?v=LxddgOvMrwY https://www.youtube.com/watch?v=sDw9tyDbEV4  https://www.codexworld.com/codeigniter-import-csv-file-data-into-mysql-database/fgetcsv()
		}

		$this->load->view('template/header');

		$this->load->view('template/navigation');

		$this->load->view('template/footer');

		$this->load->view('View_clients', $data);
		}
	}


	public function editClientData($clientid)
	{
	if ($this->session->userdata('balunand_id_no') == '') {
			redirect(base_url() . 'main/login');
        } else {
		$this->load->model('Client_model');

		$data['clientdetails'] = $this->Client_model->editClientData($clientid);

		foreach ($data['clientdetails'] as $client) {
			$data['clientdetailsdata'][] = array(
				'client_id' => $client['client_id'],
				'name' => $client['name'],
				'Trade_Name' => $client['Trade_Name'],
				'Type_of_Clients' => $client['Type_of_Clients'],
				'PAN' => $client['PAN'],
				'GST' => $client['GST'],
				'tan' => $client['tan'],
				'aadhar' => $client['aadhar'],
				'address' => $client['address'],
				'person_incharge' => $client['person_incharge'],
				'person_name' => $client['person_name'],
				'person_to_be_contact' => $client['person_to_be_contact'],

			);

			//https://www.youtube.com/watch?v=LxddgOvMrwY https://www.youtube.com/watch?v=sDw9tyDbEV4  https://www.codexworld.com/codeigniter-import-csv-file-data-into-mysql-database/fgetcsv()
		}

		$this->load->view('template/header');

		$this->load->view('template/navigation');

		$this->load->view('Edit_client', $data);

		$this->load->view('template/footer');
	}
}

	public function EditClient()
	{
		$clientid = $this->input->post('client_id');
		$data = array(
			'name' => $_POST['clientname'],
			'Trade_Name' => $_POST['tradename'],
			'Type_of_Clients' => $_POST['Type_of_Clients'],
			'PAN' => $_POST['pancard'],
			'GST' => $_POST['gst'],
			'tan' => $_POST['tan'],
			'aadhar' => $_POST['aadhar'],
			'address' => $_POST['address'],
			'person_incharge' => $_POST['person_incharge'],
			'person_name' => $_POST['person_name'],
			'person_to_be_contact' => $_POST['person_to_be_contact']
		);

		$this->load->model('Client_model');
		$this->Client_model->EditClientInfo($data, $clientid);

		$notification_data = array(
			'name' => $_POST['clientname'],
			'client_id' => $clientid,
			'type' => 'Updated Client',
			'status' => 0,
			'date' => date('Y-m-d H:i:s')
		);

		$this->load->model('Notification_Model');
		$this->Notification_Model->insertnotification($notification_data);

		$this->session->set_flashdata('success', 'Successfully Updated');
		redirect(base_url('Client/editClientData/' . $clientid));
	}
}
