<?php

class Resetpassword_Model extends CI_Model
{

    function resetPassword($data,$official_email){
       $this->db->where('official_email', $official_email);
		$this->db->update('tbl_users', $data);
    }

}