<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
    parent::__construct();
    $this->load->database(); // Load the database library
     }
	
	public function index()
	{
		$this->load->helper('url');
		$this->load->model('VisitorCount_Model');
        $data['visitorCounts']=$this->VisitorCount_Model->getVisitor();
        foreach($data['visitorCounts'] as $element){
           $data['visitorCount']=array(
                  'visitorCount'=>$element['visitor_Count']
        );
        }
		$this->load->view('index', $data);
	}
	// Inserting Visitor Counts
	public function postVisitorCounts(){
		$visitorCounts=$this->input->post('visitorCounts');
		$data=array(
			'visitor_Count'=>$visitorCounts
		);
		 $this->load->model('VisitorCount_Model');
		 $this->VisitorCount_Model->postVisitors($data);
		 redirect(base_url());
	}
}
