<?php
class Main_model extends CI_Model
{

     public   function can_login($balunand_id_no, $password)
     {
          $this->db->where('balunand_id_no', $balunand_id_no);
          $this->db->where('password', $password);
$this->db->where('status', 'Active');
          // $this->db->where('official_email', $official_email);

          $query = $this->db->get('tbl_users');

          //var_dump($query->row('password'));

          //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
          if ($query->num_rows() > 0) {
               //return true;
               return $query->row('user_id');
          } else {
               return false;
          }
     }
     public function getUserId($balunand_id_no, $password){
          
          $this->db->where('balunand_id_no', $balunand_id_no);
          $this->db->where('password', $password);
          $query = $this->db->get('tbl_users');

         // var_dump($query->row('password'));

          //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
          if ($query->num_rows() > 0) {
               //return true;
               return $query->row('user_id');
          } else {
               return false;
          }
      }

      public function get_User_Type($balunand_id_no, $password){
          
          $this->db->where('balunand_id_no', $balunand_id_no);
          $this->db->where('password', $password);
          $query = $this->db->get('tbl_users');

          if ($query->num_rows() > 0) {
               return $query->row('user_type_id');
          } else {
               return false;
          }
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

     public function getUserName($user_id)
     {
          $query = $this->db->query("SELECT * FROM tbl_users where user_id=$user_id");
          //  $query = $this->db->get('tbl_users');  

          return $query->row('name');
     }


	public function notifyNewUser()
     {
          $query=$this->db->query("SELECT * FROM tbl_users ");
          return $query->result_array();
     }

     public function notifyNewClient()
     {
          $query=$this->db->query("SELECT * FROM tbl_clients ");
          return $query->result_array();
     }



     public function countWorkorder()
     {
          $query = $this->db->query("SELECT COUNT(`workorder_no`) AS woirknumber FROM tbl_workorder ");


          return $query->row('woirknumber');
     }

     public function pendingWorkorder()
     {
          $query = $this->db->query("SELECT COUNT(`workorder_no`) AS woirknumber FROM tbl_workorder WHERE `status`='open' ");


          return $query->row('woirknumber');
     }

     public function pendingWorkorderDetails()
     {
          $query = $this->db->query("SELECT *  FROM tbl_workorder WHERE `status`='open' order by time desc");


          return $query->result_array();
     }

     // public function pendingWorkorderDetails()
     // {
     //      $query = $this->db->query("SELECT `workorder_no` ,`assign_to`FROM `tbl_workorder`WHERE `status` = 'open'ORDER BY `created_on` DESC");


     //      return $query->result_array();
     // }


     public function countclents()
     {
          $query = $this->db->query("SELECT COUNT(`client_id`) AS workclientnumber FROM tbl_clients ");


          return $query->row('workclientnumber');
     }


     public function countusers()
     {
          $query = $this->db->query("SELECT COUNT(`user_id`) AS workusernumber FROM tbl_users ");


          return $query->row('workusernumber');
     }

     public  function getAssignToForWorkOrderNo($workorder_no)
	{
		$query = $this->db->query("SELECT * FROM tbl_workorder WHERE workorder_no = '$workorder_no'");

		return $query->result_array();
	}
}
