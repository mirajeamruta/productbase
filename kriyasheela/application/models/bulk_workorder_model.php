<?php

class bulk_workorder_model extends CI_Model
{
	public  function getWorkOrderNo()
	{

		$query = $this->db->query("SELECT workorder_no FROM tbl_workorder ");

		return $query->result_array();
	}	
}

?>
