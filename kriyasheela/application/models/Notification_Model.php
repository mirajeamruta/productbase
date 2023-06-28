<?php

class Notification_Model extends CI_Model
{
        function insertnotification($data)
        {
                $this->db->insert('notification', $data);
                
        }

    public function getNotifications()
    {
        $query=$this->db->query("SELECT * FROM notification order by `date` desc");
        return $query->result_array();
    }


    public function getUsersType($userid)
    {
         //$query = $this->db->query("SELECT * FROM tbl_users_type  where user_type_id =$userid" );

         $query = $this->db->query("SELECT * FROM tbl_users  inner join tbl_users_type on  tbl_users.user_type_id=tbl_users_type.user_type_id  where tbl_users.user_id =$userid");

         return $query->row('user_type');
    }


    public function getUserType($user_id)
    {
         $query = $this->db->query("SELECT user_type FROM tbl_users_type where user_type_id= $user_id");

         return $query->row('user_type');
    }
    public  function getAssignToForWorkOrderNo($workorder_no)
	{
		$query = $this->db->query("SELECT * FROM tbl_workorder WHERE workorder_no = '$workorder_no'");

		return $query->result_array();
	}

}