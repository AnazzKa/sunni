<?php
/**
 *
 */
class Login_model extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }
    function validate_login($datas)
    {
        $username = $datas['username'];
        $password = $datas['password'];
        $password = encrypt($password);
       
        $data = array();
        $this->db->select('*');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $qry = $this->db->get('login');
        if($qry->num_rows()>0)
        {
            $data['status'] = true;
            $data['data'] = $qry->row_array();

        }	else{
            $data['status'] = false;
            $data['data'] = array();
        }

        return $data;
    }


    function validate_user($username)
    {
        $query = "select * from login u where u.email = ?";
        $query = $this->db->query($query, $username);
        //echo $this->db->last_query();exit;
        if($query->num_rows()>0)
        {
            return $query->row_array();
        } else
        {
            return false;
        }
    }
    function update_password($pass, $uname)
    {
        $data = array('password' => $pass);
        $this->db->where('email', $uname);
        $qry = $this->db->update('login', $data);

        //echo $this->db->last_query();exit;
        return $qry;
    }
    function validate_password($pass)
    {
        $session_data=$this->session->userdata('logged_in_admin');
        $id=$session_data['id'];
        $password = $this->input->post('old_password');
        
        $query = "select * from login u where u.password ='$password' and u.id = $id";
        $query = $this->db->query($query);
        //echo $this->db->last_query();exit;
        if($query->num_rows()>0)
        {
            return true;
        } else
        {
            return false;
        }
    }
    function change_password()
    {
        $data = array();
        $this->db->trans_begin();
        $datas = array('password' => $this->input->post('new_password'));
        $session_data=$this->session->userdata('logged_in_admin');
        $id=$session_data['id'];
        $this->db->where('id',$id);
        $this->db->update('login',$datas);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $data['status'] = FALSE;
        } else {
            $this->db->trans_commit();
            $data['status'] = TRUE;
        }
        return $data;
    }

    function change_pwd($username,$password,$random)
    {
        $password = encrypt($password);
        $data = array('password' => $password,'random_key' => '');
        $this->db->where('email', $username);
        $qry = $this->db->update('login', $data);
        return $qry;
    }
    function add_random_string($random, $uname)
    {
        $data = array('random_key' => $random);
        $this->db->where('email', $uname);
        $qry = $this->db->update('login', $data);
        return $qry;
    }
    function validate_user_with_random_key($username, $random)
    {
        $query = "select * from login c where c.email = '$username' and c.random_key = '$random'";
        $query = $this->db->query($query);
       // echo $this->db->last_query();
        if($query->num_rows()>0)
        {
            return $query->row_array();
        } else
        {
            return false;
        }
    }
}
?>