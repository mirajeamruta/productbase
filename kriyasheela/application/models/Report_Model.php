<?php

class Report_Model extends CI_Model
{

     public function __construct()
	{
		parent::__construct();
	}

     public function getWorkSheet($loginUserId)
	{
		$query = $this->db->query("SELECT * FROM tbl_worksheet  inner join tbl_workorder  on  tbl_worksheet.workorder_no=tbl_workorder.workorder_no  where user_id=$loginUserId");

		return $query->result_array();
	}

	public function getWorkSheets()
	{
		$query = $this->db->query("SELECT * FROM tbl_worksheet  inner join tbl_workorder  on  tbl_worksheet.workorder_no=tbl_workorder.workorder_no");

		return $query->result_array();
	}
}
