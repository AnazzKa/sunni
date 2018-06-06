<?php
/**
 * Created by Mkz.
 * User: faisal
 * Date: 5/12/17
 * Time: 8:23 PM
 */

class Mdl_preference extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function get_religion()
    {
        $this->db->where('is_del', 0);
        $this->db->order_by("id", "desc");
        $qry = $this->db->get('religion');
        if($qry->num_rows()>0)
        {
            return $qry->result_array();
        }else{
            return array();
        }
    }
    function add_religion($data){
        $session_array = $this->session->userdata('logged_in_admin');
        $created_by = $session_array['id'];
        $religion = $data['religion_name'];
        $info = array('name' => $religion, 'created_by' => $created_by);
        $qry = $this->db->insert('religion', $info);
        return $qry;
    }
    function update_religion($data, $id){
        $datestring="%Y-%m-%d %h:%i";
        $session_array = $this->session->userdata('logged_in_admin');
        $updated_by = $session_array['id'];
        $religion = $data['religion_name'];
        $info = array('name' => $religion, 'updated_by' => $updated_by,
            'updated_on' => mdate($datestring));
        $this->db->where('id', $id);
        $qry = $this->db->update('religion', $info);
        return $qry;
    }
    function delete_religion($data)
    {
        $ids = $data['religions'];
        $info = array('is_del' => 1);
        $this->db->where_in('id', $ids);
        $qry = $this->db->update('religion', $info);
        return $qry;
    }
    function get_edudation()
    {
        $this->db->where('is_del', 0);
        $this->db->order_by("id", "desc");
        $qry = $this->db->get('educations');
        if($qry->num_rows()>0)
        {
            return $qry->result_array();
        }else{
            return array();
        }
    }
     function get_islamicEducation()
    {
        $this->db->where('is_del', 0);
        $this->db->order_by("id", "asc");
        $qry = $this->db->get('islamic_education');
        if($qry->num_rows()>0)
        {
            return $qry->result_array();
        }else{
            return array();
        }
    }
    function add_edudation($data){
        $session_array = $this->session->userdata('logged_in_admin');
        $created_by = $session_array['id'];
        $educationname = $data['educationname'];
        $info = array('title' => $educationname, 'created_by' => $created_by);
        $qry = $this->db->insert('educations', $info);
        return $qry;
    }
    function update_edudation($data, $id){
        $datestring="%Y-%m-%d %h:%i";
        $session_array = $this->session->userdata('logged_in_admin');
        $updated_by = $session_array['id'];
        $educationname = $data['educationname'];
        $info = array('title' => $educationname, 'updated_by' => $updated_by,
            'updated_on' => mdate($datestring));
        $this->db->where('id', $id);
        $qry = $this->db->update('educations', $info);
        return $qry;
    }
    function delete_edudation($data)
    {
        $ids = $data['educ_ids'];
        $info = array('is_del' => 1);
        $this->db->where_in('id', $ids);
        $qry = $this->db->update('educations', $info);
        return $qry;
    }
    function get_laguages()
    {
        $this->db->where('is_del', 0);
        $this->db->order_by("id", "desc");
        $qry = $this->db->get('languages');
        if($qry->num_rows()>0)
        {
            return $qry->result_array();
        }else{
            return array();
        }
    }
    function add_language($data){
        $session_array = $this->session->userdata('logged_in_admin');
        $created_by = $session_array['id'];
        $languagename = $data['languagename'];
        $info = array('title' => $languagename, 'created_by' => $created_by);
        $qry = $this->db->insert('languages', $info);
        return $qry;
    }
    function update_language($data, $id){
        $datestring="%Y-%m-%d %h:%i";
        $session_array = $this->session->userdata('logged_in_admin');
        $updated_by = $session_array['id'];
        $languagename = $data['languagename'];
        $info = array('title' => $languagename, 'updated_by' => $updated_by,
            'updated_on' => mdate($datestring));
        $this->db->where('id', $id);
        $qry = $this->db->update('languages', $info);
        return $qry;
    }
    function delete_languages($data)
    {
        $ids = $data['lan_ids'];
        $info = array('is_del' => 1);
        $this->db->where_in('id', $ids);
        $qry = $this->db->update('languages', $info);
        return $qry;
    }
    function get_occupation()
    {
        $this->db->where('is_del', 0);
        $this->db->order_by("id", "desc");
        $qry = $this->db->get('occupation');
        if($qry->num_rows()>0)
        {
            return $qry->result_array();
        }else{
            return array();
        }
    }
    function add_occupation($data){
        $session_array = $this->session->userdata('logged_in_admin');
        $created_by = $session_array['id'];
        $occu_name = $data['occu_name'];
        $info = array('title' => $occu_name, 'created_by' => $created_by);
        $qry = $this->db->insert('occupation', $info);
        return $qry;
    }
    function update_occupation($data, $id){
        $datestring="%Y-%m-%d %h:%i";
        $session_array = $this->session->userdata('logged_in_admin');
        $updated_by = $session_array['id'];
        $occu_name = $data['occu_name'];
        $info = array('title' => $occu_name, 'updated_by' => $updated_by,
            'updated_on' => mdate($datestring));
        $this->db->where('id', $id);
        $qry = $this->db->update('occupation', $info);
        return $qry;
    }
    function delete_occupation($data)
    {
        $ids = $data['ocu_ids'];
        $info = array('is_del' => 1);
        $this->db->where_in('id', $ids);
        $qry = $this->db->update('occupation', $info);
        return $qry;
    }
    function get_cast()
    {

    $qry = "SELECT c.id, c.cast, r.name FROM cast c
            LEFT JOIN religion r ON r.id = c.religion_id AND r.is_del = 0
            WHERE c.is_del =0 ORDER BY c.id DESC";
    $qry = $this->db->query($qry);
    if($qry->num_rows()>0)
    {
        return $qry->result_array();
    }else{
        return array();
    }
    }
    
    function get_cast_by_id($id)
    {
        $qry = "SELECT c.id, c.cast, r.name, c.religion_id FROM cast c
            LEFT JOIN religion r ON r.id = c.religion_id AND r.is_del = 0
            WHERE c.is_del =0 AND c.id = $id";
        $qry = $this->db->query($qry);
        if($qry->num_rows()>0)
        {
            return $qry->row_array();
        }else{
            return array();
        }
    }
    function add_cast($data){
        $session_array = $this->session->userdata('logged_in_admin');
        $created_by = $session_array['id'];
        $religion_id = $data['religion_id'];
        $cast = $data['cast'];
        $info = array('religion_id' => $religion_id, 'cast' => $cast, 'created_by' => $created_by);
        $qry = $this->db->insert('cast', $info);
        return $qry;
    }
    function update_cast($data, $id){
        $datestring="%Y-%m-%d %h:%i";
        $session_array = $this->session->userdata('logged_in_admin');
        $updated_by = $session_array['id'];
        $religion_id = $data['religion_id'];
        $cast = $data['cast'];
        $info = array('religion_id' => $religion_id, 'cast' => $cast, 'updated_by' => $updated_by,
            'updated_on' => mdate($datestring));
        $this->db->where('id', $id);
        $qry = $this->db->update('cast', $info);
        return $qry;
    }
    function delete_cast($data)
    {
        $ids = $data['cast_ids'];
        $info = array('is_del' => 1);
        $this->db->where_in('id', $ids);
        $qry = $this->db->update('cast', $info);
        return $qry;
    }
     function get_education_fields()
    {
        $this->db->where('is_del', 0);
        $this->db->order_by("id", "asc");
        $qry = $this->db->get('education_field');
        if($qry->num_rows()>0)
        {
            return $qry->result_array();
        }else{
            return array();
        }
    }
     function get_work_with()
    {
        $this->db->where('is_del', 0);
        $this->db->order_by("id", "asc");
        $qry = $this->db->get('work_with');
        if($qry->num_rows()>0)
        {
            return $qry->result_array();
        }else{
            return array();
        }
    }
    function get_work_as()
    {
        $qry = "SELECT * FROM work_as WHERE parent_id = 0 AND is_del = 0";
        $qry = $this->db->query($qry);
        if($qry->num_rows()>0){
            $data['works'] = $qry->result_array();
            foreach ($data['works'] as $key => $work) {
                $work_id = $work['id'];
                $qrs = "SELECT * FROM work_as WHERE parent_id = ? AND is_del = 0";
                $qrs = $this->db->query($qrs, $work_id);
                if($qrs->num_rows()>0){
                    $data['works'][$key]['sub_work'] = $qrs->result_array();    
                }else{
                    $data['works'][$key]['sub_work'] = array();
                }
                
            }
        }else{
            $data['works'] = array();
        }
        return $data;
    }
     function get_user_height()
    {
        $this->db->order_by("id", "asc");
        $qry = $this->db->get('user_height');
        if($qry->num_rows()>0)
        {
            return $qry->result_array();
        }else{
            return array();
        }
    }
}