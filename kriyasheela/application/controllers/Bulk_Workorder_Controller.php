<?php
defined('BASEPATH') or exit('No direct script access allowed');
require '../vendor/autoload.php';

class Bulk_Workorder_Controller extends CI_Controller {
    
  public function bulk_workorder() {
//     $this->load->model('bulk_workorder_model');
// $data['workorderno'] = $this->bulk_workorder_model->getWorkOrderNo();
// $data['clientNames']=$this->bulk_workorder_model->getClientDetails();
// print_r($data['clientNames']);
if ($this->session->userdata('balunand_id_no') == '') {
			redirect(base_url() . 'main/login');
        } else {
    $this->load->view('template/header');
    $this->load->view('template/navigation');
    $this->load->view('template/footer');    
    $this->load->view('Bulk_Workorder');
	}
  }

  public function index() {


       
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
      $upload_status = $this->uploadDoc();
      if ($upload_status['status']) {
        $inputFileName = $upload_status['path'];
        $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        $spreadsheet = $reader->load($inputFileName);
        $sheet = $spreadsheet->getSheet(0);
        $count_Rows = 0;
      
       $columnNames = [
             'client_name' => 'A',
             'type_of_work' => 'B',
             'partner_in_charge' => 'C',
             'start_date' => 'D',
             'targetted_end_date' => 'E',
             'deadline' => 'F',
             'assign_to' => 'G',
             'remarks' => 'H'
];


$cellClientName=array();
foreach ($sheet->getRowIterator() as $row) {
$isClientPresent=false;
$this->load->model('Bulk_workorder_model');
$data['workorderno'] = $this->Bulk_workorder_model->getWorkOrderNo();
$data['EA']='23EA0';
			$data['IA']='23IA0';
			$data['TA']='23TA0';
			$data['RF']='23RF0';

foreach ($data['workorderno'] as $worknumber) {
				$workorder_no = $worknumber;
				foreach ((array) $workorder_no as $workid) {
					$data['work'] = substr($workid, 2, 2);
					if ($data['work'] == 'EA') {
						$data['EA'] = $workid;
					} else if ($data['work'] == 'IA') {
						$data['IA'] = $workid;
					} else if ($data['work'] == 'TA') {
						$data['TA'] = $workid;
					} else if ($data['work'] == 'RF') {
						$data['RF'] = $workid;
					}
        }
      }
// Data for Assign to (user data)
    $this->load->model('Bulk_workorder_model');
    $data['userDetails'] = $this->Bulk_workorder_model->getUserDetails();

    $rowData = [];
    $wokorder_number="";

    foreach ($columnNames as $columnName => $columnLetter) {

        $cellValue = $spreadsheet->getActiveSheet()->getCell($columnLetter . $row->getRowIndex())->getValue();
     
         $cellValue;
        //Checking Converting type_of_work into respective number
        if(strtolower($columnName)=="type_of_work"&&strtolower($cellValue)=="external audit"){
           $cellValue=1;
           $data['workOrderLastDigit'] = substr($data['EA'], 4);
           $data['yearTypeOf']=substr($data['EA'],0,4);
           $workorder_no_incremented = $data['workOrderLastDigit'] + 1;
           $finalWorkorderNumber=$data['yearTypeOf'].$workorder_no_incremented;
           $wokorder_number=$finalWorkorderNumber;

        }else if(strtolower($columnName)=="type_of_work"&& strtolower($cellValue)=="internal audit"){
           $cellValue=2;
           $data['workOrderLastDigit'] = substr($data['IA'], 4);
           $data['yearTypeOf']=substr($data['IA'],0,4);
           $workorder_no_incremented = $data['workOrderLastDigit'] + 1;
           $finalWorkorderNumber=$data['yearTypeOf'].$workorder_no_incremented;
           $wokorder_number=$finalWorkorderNumber;
        }else if(strtolower($columnName)=="type_of_work"&&strtolower($cellValue)=="tax audit"){
          $cellValue=3;
           $data['workOrderLastDigit'] = substr($data['TA'], 4);
           $data['yearTypeOf']=substr($data['TA'],0,4);
           $workorder_no_incremented = $data['workOrderLastDigit'] + 1;
           $finalWorkorderNumber=$data['yearTypeOf'].$workorder_no_incremented;
           $wokorder_number=$finalWorkorderNumber;
        }else if(strtolower($columnName)=="type_of_work"&&strtolower($cellValue)=="return filling"){
          $cellValue=4;
           $data['workOrderLastDigit'] = substr($data['RF'], 4);
           $data['yearTypeOf']=substr($data['RF'],0,4);
           $workorder_no_incremented = $data['workOrderLastDigit'] + 1;
           $finalWorkorderNumber=$data['yearTypeOf'].$workorder_no_incremented;
           $wokorder_number=$finalWorkorderNumber;
        }
          $wordArray = [];
   if (strtolower($columnName) == "assign_to") {
  $currentWord = '';
  $strLength = strlen($cellValue);
  for ($index = 0; $index < $strLength; $index++) {
    if ($cellValue[$index] != ',' && $cellValue[$index] != ' ') {
      $currentWord = $currentWord . $cellValue[$index];
    } else {
      array_push($wordArray, $currentWord);
      $currentWord = ''; 
    }
  }
  if (!empty($currentWord)) {
  array_push($wordArray, $currentWord);
   }
       $assignedUserId=[];
      
       if($wordArray!=''){
        foreach($wordArray as $userName){
        foreach($data['userDetails'] as $userData){
        if(strtolower($userName)==strtolower($userData['name'])){
          // $cellValue=$userData['user_id'];
          array_push($assignedUserId,$userData['user_id']);
        }
      }
       }
       }else{
       $cellValue="Its Null";
       }
       $cellValue= $assignedUserId;
    }
    // Current Date after format
    
    if(strtolower($columnName)=="deadline"||strtolower($columnName)=='targetted_end_date'||strtolower($columnName)=="start_date"||strtolower($columnName)=="created_on"){
      $formattedDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($cellValue)->format('Y-m-d');
      $cellValue= $formattedDate;
      
    }
$this->load->model('Bulk_workorder_model');
$data['clientNames']=$this->Bulk_workorder_model->getClientDetails();
    if (strtolower($columnName) == "client_name") {
    // Initialize variables
        array_push($cellClientName,$cellValue);
    $isClientPresent = false;
    // $notUploadClientName=false;
    foreach ($data['clientNames'] as $clientName9) {
        if ($clientName9['name'] == $cellValue) {
            $isClientPresent = true;
            $notUploadClientName=false;
            break;
        } else {
            // Concatenate unmatched values
            // $unmatchedValues .= $cellValue . ",";
            // $notUploadClientName = true;
            continue;
        }
    }

    // Remove trailing comma from the concatenated string
    // $unmatchedValues = rtrim($unmatchedValues, ",");
}

        $rowData[$columnName] = $cellValue;     
 
    }
    
    // Access the cell values using column names
    $workorder_no = $wokorder_number;
    $created_on = date('Y-m-d');
    $client_name = $rowData['client_name'];
    $type_of_work = $rowData['type_of_work'];
    $partner_in_charge = $rowData['partner_in_charge'];
    $start_date = $rowData['start_date'];
    $targetted_end_date = $rowData['targetted_end_date'];
    $deadline = $rowData['deadline'];
    $assign_to = $rowData['assign_to'];
    $assign_tojson = json_encode($assign_to);
    $remarks = $rowData['remarks'];
    $status = 'open';
          $this->load->model('Bulk_workorder_model');
          $data['workorderno'] = $this->Bulk_workorder_model->getWorkOrderNo();

        // Workorder number duplication checking
        $isPresent=false; // This will check is workorder number is present in db or not
        foreach($data['workorderno'] as $value){
          $workorder_no_db=implode('',$value); 
          if($workorder_no==$workorder_no_db){
            $isPresent=true;
            break;
          }    
        }
       if($workorder_no==''|| $isClientPresent==false|| $workorder_no=='workorder_no'){
          continue;   
         }else{      
		     $data = array(
            'workorder_no' => $workorder_no,
            'created_on' => $created_on,
            'client_name' => $client_name,
            'type_of_work' => $type_of_work,
            'partner_in_charge' => $partner_in_charge,
            'start_date' => $start_date,
            'targetted_end_date' => $targetted_end_date,
            'deadline' => $deadline,
            'assign_to' => $assign_tojson,
            'remarks' => $remarks,
            'status' => $status,
          );     
          $this->db->insert('tbl_workorder', $data);
$notification_data = array(
              'workorder_no' =>$workorder_no,
              'assign_to' => $assign_tojson,
              'type' => 'Bulk Workorder',
              'status' => 0,
              'date' =>date('Y-m-d H:i:s')
            );
            $this->load->model('Notification_Model');
	 $this->Notification_Model->insertnotification($notification_data);
        }

  
     $count_Rows++;
    
        }

$this->load->model('Bulk_workorder_model');
$data['clientNames']=$this->Bulk_workorder_model->getClientDetails();
$clientNotRegistered = array();
$notPresent=false;
foreach ($cellClientName as $cellClientName) {
    $found = false; // check if names are match or not
    foreach ($data['clientNames'] as $dbClient) {
        if ($cellClientName == $dbClient['name']) {
            $found = true; // names are match
            break; 
        }
    }
    if (!$found) { // if not match then execute this function
      
      if($cellClientName!=null && $cellClientName!='client_name'){ // null and column name not allow
       array_push($clientNotRegistered, $cellClientName);
       $notPresent=true;
      }     
    }
}

   if($notPresent){
        $this->session->set_flashdata('success', 'Data imported successfully but some client(s) are not registered '.json_encode($clientNotRegistered));
   }else{
        $this->session->set_flashdata('success', 'Data imported successfully.');
   }
        redirect(base_url() . 'Bulk_Workorder_Controller'. '/'.'bulk_workorder');
      } else {
       
        $this->session->set_flashdata('error', 'Data not uploaded, Please check once or rename the file' );
        
         redirect(base_url() . 'Bulk_Workorder_Controller'. '/'.'bulk_workorder');
      }
      
    } else {
		     $this->load->view('template/header');
         $this->load->view('template/navigation');
         $this->load->view('template/footer');
         $this->load->view('Bulk_Workorder');
    }
  }

  private function uploadDoc() {
    $uploadPath = 'assets/uploads/imports/';
    if (!is_dir($uploadPath)) {
      mkdir($uploadPath, 0777, true);
    }

    $config['upload_path'] = $uploadPath;
    $config['allowed_types'] = 'csv|xlsx|xls';
    $config['max_size'] = 10000000;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if ($this->upload->do_upload('choose_bulk_workorder')) {
      $fileData = $this->upload->data();
      return array(
        'status' => true,
        'path' => $fileData['file_path'] . $fileData['file_name']
      );
    } else {
      return array(
        'status' => false,
        'message' => $this->upload->display_errors()
      );
    }
  }
}
