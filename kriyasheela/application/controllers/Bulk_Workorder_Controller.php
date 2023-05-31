<?php
defined('BASEPATH') or exit('No direct script access allowed');
require '../vendor/autoload.php';

class Bulk_Workorder_Controller extends CI_Controller {
    
  public function bulk_workorder() {
    
    $this->load->view('template/header');
    $this->load->view('template/navigation');
    $this->load->view('template/footer');
    $this->load->view('Bulk_Workorder');

  
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
    'workorder_no' => 'A',
    'created_on' => 'B',
    'client_name' => 'C',
    'type_of_work' => 'D',
    'partner_in_charge' => 'E',
    'start_date' => 'F',
    'targetted_end_date' => 'G',
    'deadline' => 'H',
    'assign_to' => 'I',
    'remarks' => 'J',
    'status' => 'K'
];

foreach ($sheet->getRowIterator() as $row) {
    $rowData = [];
    foreach ($columnNames as $columnName => $columnLetter) {
        $cellValue = $spreadsheet->getActiveSheet()->getCell($columnLetter . $row->getRowIndex())->getValue();
        $rowData[$columnName] = $cellValue;
    }
    
    // Access the cell values using column names
    $workorder_no = $rowData['workorder_no'];
    $created_on = $rowData['created_on'];
    $client_name = $rowData['client_name'];
    $type_of_work = $rowData['type_of_work'];
    $partner_in_charge = $rowData['partner_in_charge'];
    $start_date = $rowData['start_date'];
    $targetted_end_date = $rowData['targetted_end_date'];
    $deadline = $rowData['deadline'];
    $assign_to = $rowData['assign_to'];
    $remarks = $rowData['remarks'];
    $status = $rowData['status'];


          $this->load->model('bulk_workorder_model');
          $data['workorderno'] = $this->bulk_workorder_model->getWorkOrderNo();

        // Workorder number duplication checking
        $isPresent=false; // This will check is workorder number is present in db or not
        foreach($data['workorderno'] as $value){
          $workorder_no_db=implode('',$value); 
          if($workorder_no==$workorder_no_db){
            $isPresent=true;
            break;
          }    
        }
       if($workorder_no==''|| $isPresent || $workorder_no=='workorder_no'){
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
            'assign_to' => $assign_to,
            'remarks' => $remarks,
            'status' => $status,
          );     
          $this->db->insert('tbl_workorder', $data);
        }

    
         $count_Rows++;
        
        }

        $this->session->set_flashdata('success', 'Data imported successfully.');
        redirect(base_url() . 'Bulk_Workorder_Controller');
      } else {
        $data=$upload_status['message'];
        $this->session->set_flashdata('error', $data );
        
         redirect(base_url() . 'Bulk_Workorder_Controller');
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
