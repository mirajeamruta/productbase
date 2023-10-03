<?php

class Report_Model extends CI_Model
{

     public function __construct()
	{
		parent::__construct();
	}

     public function getWorkSheet($userid)
	{
		$query = $this->db->query("SELECT * FROM tbl_worksheet  inner join tbl_workorder  on  tbl_worksheet.workorder_no=tbl_workorder.workorder_no  where user_id='$userid'");

		return $query->result_array();
	}

	public function getWorkSheets()
	{
		$query = $this->db->query("SELECT * FROM tbl_worksheet  inner join tbl_workorder  on  tbl_worksheet.workorder_no=tbl_workorder.workorder_no");

		return $query->result_array();
	}

	public function insertUsers($data)
	{
		$this->db->insert('tbl_users', $data);
	}

	public function editUserData($userid)
	{
		$query = $this->db->query("SELECT * FROM tbl_users  where user_id='$userid'");

		return $query->result_array();
	}
	public function getUsers()
	{
		$query = $this->db->query('SELECT * FROM tbl_users');

		return $query->result_array();
	}


}
