<?php 
/**
* 
*/
class Mdl_search extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}

	function get_search_count($data)
	{
		$qry = "SELECT u.id, u.name, u.mobile, u.email, u.user_id,
				c.cast, ud.address, 
				l.title as mother_tongue, ud.profile_image
				FROM users u
				LEFT JOIN user_details ud ON ud.user_id = u.id
				LEFT JOIN languages l ON l.id = ud.mother_tongue
				LEFT JOIN cast c ON c.id = ud.cast_id
				
				WHERE  ud.cast_id = ? AND ud.mother_tongue = ?
				AND u.gender = ?";
		$qry = $this->db->query($qry, array($data['cast'], $data['mother_tongue'], $data['gender']));
		//echo $this->db->last_query();
		if($qry->num_rows()>0){
			return $qry->result_array();
		}  else{
			return array();
		}

	}
	function get_search_results($data, $limit, $start)
	{
		$qry = "SELECT u.id, u.name, u.mobile, u.email, u.user_id,
				c.cast,  ud.address, 
				l.title as mother_tongue, ud.profile_image,u.date_of_birth,ud.city
				FROM users u
				LEFT JOIN user_details ud ON ud.user_id = u.id
				LEFT JOIN languages l ON l.id = ud.mother_tongue
				LEFT JOIN cast c ON c.id = ud.cast_id
				
				WHERE ud.cast_id = ? AND ud.mother_tongue = ?
				AND u.gender = ? LIMIT $start, $limit";
		$qry = $this->db->query($qry, array( $data['cast'], $data['mother_tongue'], $data['gender']));

		if($qry->num_rows()>0){
			return $qry->result_array();
		}  else{
			return array();
		}
		
	}
	function get_search_results_new($res)
	{
		$qry = "SELECT u.id, u.name, u.mobile, u.email, u.user_id,
				c.cast,  ud.address, 
				l.title as mother_tongue, ud.profile_image,u.date_of_birth,ud.city
				FROM users u
				LEFT JOIN user_details ud ON ud.user_id = u.id
				LEFT JOIN languages l ON l.id = ud.mother_tongue
				LEFT JOIN cast c ON c.id = ud.cast_id
				
				WHERE  $res ";

		$qry = $this->db->query($qry);

		if($qry->num_rows()>0){
			return $qry->result_array();
		}  else{
			return array();
		}
	}
}

?>