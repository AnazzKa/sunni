<?php 
/**
* 
*/
class Users extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('admin/mdl_users'));
	}
	function index()
	{
		$data['header'] = $this->load->view('templates/admin/edit_header', '', true);
        $data['sidebar'] = $this->load->view('templates/admin/edit_sidebar', '', true);
        $data['footer'] = $this->load->view('templates/admin/edit_footer', '', true);
        $data['users'] = $this->mdl_users->get_verified_users();
        $this->load->view('admin/edit_list_users', $data);
	}
}
?>