<?php
class VisitorCount_Model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

// Inserting Visitor Counts
public function insertVisitorCounts($data){
    $query=$this->db->insert('tbl_visitors',$data);
    if ($query) {
			return true;
		} else {
			return false;
		}
}
// Getting visito Counts
public function getVisitor(){
   $query = $this->db->query('SELECT visitor_Count FROM tbl_visitors');
    return $query->result_array();
}
// Inserting Visitors 
public function postVisitors($data){
    $this->db->where('id', 1);
    $this->db->update('tbl_visitors', $data);
}
}