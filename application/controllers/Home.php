<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Fzl
 * User: faisal
 * Date: 8/12/17
 * Time: 8:05 AM
 */

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('admin/mdl_dashboard','admin/mdl_preference'));

    }
    function index()
    {
        $data['head'] = $this->load->view('templates/user/edit_head', '', true);
        $data['header'] = $this->load->view('templates/user/edit_header', '', true);
        $data['footer'] = $this->load->view('templates/user/edit_footer', '', true);
        $data['languages'] = $this->mdl_preference->get_laguages();
        $data['educations'] = $this->mdl_preference->get_edudation();
        $data['casts'] = get_cast_by_rel(1);
        $this->load->view('edit_home_page', $data);
    }
     function view_result()
    {
        $data['head'] = $this->load->view('templates/user/edit_head', '', true);
        $data['header'] = $this->load->view('templates/user/edit_header', '', true);
        $data['footer'] = $this->load->view('templates/user/edit_footer', '', true);
        $data['casts'] = get_cast_by_rel(1);
        $data['educations'] = $this->mdl_preference->get_edudation();
        $data['islamic_educations'] = $this->mdl_preference->get_islamicEducation();
        $data['works_with'] = $this->mdl_preference->get_work_with();
        $data['works_as'] = $this->mdl_preference->get_work_as();
        $data['heights'] = $this->mdl_preference->get_user_height();
        $this->load->view('edit_view_search', $data);
    }
    function search()
    {
        $data['head'] = $this->load->view('templates/user/edit_head', '', true);
        $data['header'] = $this->load->view('templates/user/edit_header', '', true);
        $data['footer'] = $this->load->view('templates/user/edit_footer', '', true);
        //// $data['religions'] = $this->mdl_preference->get_religion();
        // $data['casts'] = $this->mdl_preference->get_cast();
        $this->load->view('edit_search_result', $data);
    }
}