<?php

class View_user_reportmodel extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
	}

	public function insertUsers($data)
	{
		$this->db->insert('tbl_users', $data);
	}



	public function getAllUsersDetails()
	{
		$query = $this->db->query('SELECT * FROM tbl_users  inner join tbl_users_type on  tbl_users.user_type_id=tbl_users_type.user_type_id');

		return $query->result_array();
	}

}