<?php /**
* 
*/
class Login_model extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}
	function validate_login($data)
	{
		$username = $data['username'];
		$password = $data['password'];
		$qry = "SELECT * FROM `users` WHERE (email = ? OR mobile = ?) AND password = ?";
		$qry = $this->db->query($qry, array($username, $username, $password));
		if($qry->num_rows()>0)
		{
			return $qry->row_array();
		}else{
			return false;
		}
	}
}