<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('form', 'string'));
        $this->load->model(array('login_model', 'admin/mdl_preference'));
	}
	function process()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|htmlspecialchars');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|htmlspecialchars');

		if($this->form_validation->run() == TRUE)
		{
			$result = $this->login_model->validate_login($this->input->post());
			
			if($result)
			{
				 
				 $session_array = array('name' => $this->input->post('txtName'),
                    'email' => $result['email'],
                    'mobile' => $result['mobile'],
                    'id' => $result['id'],
                    'is_verified' => $result['is_verified'],
                );
				$this->session->set_userdata('logged_in_user', $session_array);
              
				exit(json_encode(array('status'=>TRUE, 'data' =>$session_array)));
              //  redirect('public/home');
			} else{
				exit(json_encode(array('status'=>false, 'reason'=>'Invalid Username or Password')));
			}
		} else
		{
			exit(json_encode(array('status'=>false, 'reason'=> validation_errors())));
		}
	}
	function logout()
	{
	    $session_array = $this->session->userdata('logged_in_user');
	    $this->session->unset_userdata($session_array);
	    $this->session->sess_destroy();
	    redirect();
	}
}


?>