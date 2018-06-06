<?php
/**
* 
*/
class Mdl_register extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}
    function generateuser_id()
    {
        
        $this->db->select_max('user_id');
        $result = $this->db->get('users');
        if ($result->num_rows() > 0) {
            $res = $result->row();
            $res = $res->user_id;
            $ret_res = $res + 1;
        } else {
            $ret_res = 1000;
        }
        return $ret_res;
    }

    function newUser($data)
	{
        
		return $insert_id;
	}
	function insert_details($data, $fileName)
    {
        $this->db->trans_begin();


        $day = $data['dateOfBirthDay'];
        $month = $data['dateOfBirthMonth'];
        $year = $data['dateOfBirthyear'];
        
        $dob = $year.'-'.$month.'-'.$day;

        $user_id = $this->generateuser_id();
        $user = array(
            'name' => $data['txtName'],
            'mobile' => $data['txtMobileNo'],
            'email' => $data['txtEmail'],
            'password' => $data['txtPassword'],
            'date_of_birth' => $dob,
            'marrital_status' => $data['marrital_status'],
            'gender' => $data['genderReg'],
            'no_of_children' => $data['no_of_childrens'],
            'profile_created_by' => $data['DDProfileCreatedby'],
            'user_id' => $user_id
        );

        $this->db->insert('users', $user);
        $insert_id = $this->db->insert_id();



          $data = array(
                    'user_id' => $insert_id,
                    'country_id' => $data['country'],
                    'cast_id' => $data['cast'],
                    'state_id' => $data['state'],
                    'district_id' => $data['district'],
                    'taluk_id' => $data['taluk'],
                    'panchayath_id' => $data['panchayath'],
                    'city' => $data['city'],
                    'islamic_education_id' => $data['islamic_education'],
                    'education_id' => $data['education_level'],
                    'education_field_id' => $data['education_field'],
                    'work_with_id' => $data['work_with'],
                    'work_as_id' => $data['work_as'],
                    'height' => $data['height'],
                    'weight' => $data['weight'], 
                    'body_type' => $data['body_type'],
                    'skin_tone' => $data['skin_tone'],
                    'smoke' => $data['smoke'],
                    'family_status' => $data['family_status'],
                    'profile_image' => $fileName,
                    'address' => $data['address'],
                    'about' => $data['about']
                );



        $this->db->insert('user_details', $data);
        $user_id = $data['user_id'];
        
        
        /*foreach ($laguages as $laguage)
        {
            $lan =array('user_id' => $user_id, 'laguage_id' => $laguage);
            $this->db->insert('user_laguages', $lan);
        }
        foreach ($educations as $education)
        {
            $edu =array('user_id' => $user_id, 'education_id' => $education);
            $this->db->insert('user_education', $edu);
        }*/
        //var_dump($laguages);
       
       if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return false;
        }
        else
        {
            $this->db->trans_commit();
            return true;
        }

    }
    function getIslamicEducation()
    {
        $qry = $this->db->select('*');
        $this->db->where('is_del', 0);
        $qry = $this->db->get('islamic_education');
        if ($qry->num_rows() > 0) {
            return $qry->result_array();
        } else {
            return array();
        }
    }
}

?>