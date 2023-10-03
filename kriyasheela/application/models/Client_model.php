<?php

class Client_model extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
	}


	public function insertClient($data)
	{
		$this->db->insert('tbl_clients', $data);
	}


	
	public function duplicatePan($data)
	{
		$query = $this->db->query("SELECT * FROM tbl_clients where PAN = '$data'");
		return $query->result_array();
	}


	function insert_csv($data)
	{
		$this->db->insert('tbl_clients', $data);
	}
	


	public function allClients()
	{
		$query = $this->db->query("SELECT * FROM `tbl_clients` ORDER BY `client_id` DESC");

		return $query->result_array();
	}


	public function editClientData($clientid)
	{
		$query = $this->db->query("SELECT * FROM tbl_clients where client_id ='$clientid'");

		return $query->result_array();
	}

	public function EditClientInfo($data,$clientid)
	{
	$this->db->where('client_id',$clientid);
	
	$this->db->update('tbl_clients',$data);
	}

}


