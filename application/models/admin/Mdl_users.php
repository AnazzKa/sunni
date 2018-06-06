<?php
/**
* 
*/
class Mdl_users extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}
	function get_verified_users()
	{
		$qry = "SELECT u.name, u.mobile, u.email, u.gender, u.profile_created_by FROM users u WHERE u.is_verified = 1";
		$qry = $this->db->query($qry);
		if($qry->num_rows()>0)
		{
			return $qry->result_array();
		}else{
			return array();
		}
	}
}

?>