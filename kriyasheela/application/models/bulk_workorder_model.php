<?php

class Bulk_workorder_model extends CI_Model
{
	public  function getWorkOrderNo()
	{

		$query = $this->db->query("SELECT workorder_no FROM tbl_workorder ");

		return $query->result_array();
	}
	// Getting User details
	public function getUserDetails(){
		$query = $this->db->query("SELECT user_id,name FROM tbl_users");
		return $query->result_array();
	}	
	// Getting client Details
	public function getClientDetails(){
		$query= $this->db->query("SELECT name from tbl_clients");
		return $query->result_array();
	}


	
}

?>
