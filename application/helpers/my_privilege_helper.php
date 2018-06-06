<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function has_role($role){

    $ci =& get_instance();

    //load databse library
    $ci->load->database();
    $ci->load->library('session');
    $sesson_array=  $ci->session->userdata('logged_in_admin');
    $userid = $sesson_array['id'];

    //To check whether the user is super admin_2
    $qry =  $ci->db->select('user_type')
        ->where('id' , $userid)
        ->get('login');

    if($qry && $qry->num_rows()>0){

        $res = $qry->row_array();
        if($res['user_type'] == 'SUPER_ADMIN'){
            return true;
        }
        if($res['user_type'] == 'ADMIN'){

            $querys =   "SELECT p.slug,p.title FROM 
                            login lg 
                            LEFT JOIN erp_privilege_user p_user ON p_user.user_id = lg.id 
                            INNER JOIN erp_privilege_group_con p_con ON p_con.group_id = p_user.group_id
                            LEFT JOIN erp_privilege p ON p.id = p_con.privilege_id
                            WHERE p.slug = ? AND p_user.user_id = ?";

            $query=$ci->db->query($querys,array($role, $userid));
            //echo $ci->db->last_query();
            if($query && $query->num_rows()>0)
            {
                return true;
            }
            else{
                return false;
            }
        }

    }
}
