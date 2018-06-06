<?php
/**
 * Created by Mkz.
 * User: faisal
 * Date: 5/12/17
 * Time: 8:21 PM
 */

class Preference extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $session_array = $this->session->userdata('logged_in_admin');
        $this->load->model(array('admin/mdl_preference'));
        if (!isset($session_array)) {
            redirect('admin/login');
        }
    }

    function religion()
    {
        $data['header'] = $this->load->view('templates/admin/edit_header', '', true);
        $data['sidebar'] = $this->load->view('templates/admin/edit_sidebar', '', true);
        $data['footer'] = $this->load->view('templates/admin/edit_footer', '', true);
        $data['religions'] = $this->mdl_preference->get_religion();
        $this->load->view('admin/edit_list_religion', $data);
    }
    function add_religion()
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules("religion_name","Religion","trim|required");
            if($this->form_validation->run()== TRUE)
            {
                $qry = $this->mdl_preference->add_religion($this->input->post());
                if($qry)
                {
                    exit(json_encode(array('status'=>TRUE,'result'=>'add')));
                }else{
                    exit(json_encode(array('status'=>FALSE, 'reason'=>'Please try again later..!')));
                }
            }else{
                exit(json_encode(array('status'=>FALSE,'reason'=>validation_errors())));
            }
        }else{
            show_error("Unable to process the request in this way");
        }
    }
    function update_religion($id)
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules("religion_name","Religion","trim|required");
            if($this->form_validation->run()== TRUE)
            {
                $qry = $this->mdl_preference->update_religion($this->input->post(),$id);
                if($qry)
                {
                    exit(json_encode(array('status'=>TRUE)));
                }else{
                    exit(json_encode(array('status'=>FALSE, 'reason'=>'Please try again later..!')));
                }
            }else{
                exit(json_encode(array('status'=>FALSE,'reason'=>validation_errors())));
            }
        }else{
            show_error("Unable to process the request in this way");
        }
    }
    function delete_religion()
    {
        if($this->input->is_ajax_request())
        {
            $qry = $this->mdl_preference->delete_religion($this->input->post());
            if($qry)
            {
                exit(json_encode(array('status'=>TRUE)));
            }else{
                exit(json_encode(array('status'=>FALSE, 'reason'=>'Please try again later..!')));
            }
        }else{
            show_error("Unable to process the request in this way");
        }
    }
    function educations()
    {
        $data['header'] = $this->load->view('templates/admin/edit_header', '', true);
        $data['sidebar'] = $this->load->view('templates/admin/edit_sidebar', '', true);
        $data['footer'] = $this->load->view('templates/admin/edit_footer', '', true);
        $data['educations'] = $this->mdl_preference->get_edudation();
        $this->load->view('admin/edit_list_education', $data);
    }
    function add_education()
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules("educationname","Education","trim|required");
            if($this->form_validation->run()== TRUE)
            {
                $qry = $this->mdl_preference->add_edudation($this->input->post());
                if($qry)
                {
                    exit(json_encode(array('status'=>TRUE,'result'=>'add')));
                }else{
                    exit(json_encode(array('status'=>FALSE, 'reason'=>'Please try again later..!')));
                }
            }else{
                exit(json_encode(array('status'=>FALSE,'reason'=>validation_errors())));
            }
        }else{
            show_error("Unable to process the request in this way");
        }
    }
    function update_education($id)
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules("educationname","Education","trim|required");
            if($this->form_validation->run()== TRUE)
            {
                $qry = $this->mdl_preference->update_edudation($this->input->post(),$id);
                if($qry)
                {
                    exit(json_encode(array('status'=>TRUE)));
                }else{
                    exit(json_encode(array('status'=>FALSE, 'reason'=>'Please try again later..!')));
                }
            }else{
                exit(json_encode(array('status'=>FALSE,'reason'=>validation_errors())));
            }
        }else{
            show_error("Unable to process the request in this way");
        }
    }
    function delete_education()
    {
        if($this->input->is_ajax_request())
        {
            $qry = $this->mdl_preference->delete_edudation($this->input->post());
            if($qry)
            {
                exit(json_encode(array('status'=>TRUE)));
            }else{
                exit(json_encode(array('status'=>FALSE, 'reason'=>'Please try again later..!')));
            }
        }else{
            show_error("Unable to process the request in this way");
        }
    }
    function languages()
    {
        $data['header'] = $this->load->view('templates/admin/edit_header', '', true);
        $data['sidebar'] = $this->load->view('templates/admin/edit_sidebar', '', true);
        $data['footer'] = $this->load->view('templates/admin/edit_footer', '', true);
        $data['languages'] = $this->mdl_preference->get_laguages();
        $this->load->view('admin/edit_list_languages', $data);
    }
    function add_language()
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules("languagename","Language","trim|required");
            if($this->form_validation->run()== TRUE)
            {
                $qry = $this->mdl_preference->add_language($this->input->post());
                if($qry)
                {
                    exit(json_encode(array('status'=>TRUE,'result'=>'add')));
                }else{
                    exit(json_encode(array('status'=>FALSE, 'reason'=>'Please try again later..!')));
                }
            }else{
                exit(json_encode(array('status'=>FALSE,'reason'=>validation_errors())));
            }
        }else{
            show_error("Unable to process the request in this way");
        }
    }
    function update_language($id)
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules("languagename","Language","trim|required");
            if($this->form_validation->run()== TRUE)
            {
                $qry = $this->mdl_preference->update_language($this->input->post(),$id);
                if($qry)
                {
                    exit(json_encode(array('status'=>TRUE)));
                }else{
                    exit(json_encode(array('status'=>FALSE, 'reason'=>'Please try again later..!')));
                }
            }else{
                exit(json_encode(array('status'=>FALSE,'reason'=>validation_errors())));
            }
        }else{
            show_error("Unable to process the request in this way");
        }
    }
    function delete_language()
    {
        if($this->input->is_ajax_request())
        {
            $qry = $this->mdl_preference->delete_languages($this->input->post());
            if($qry)
            {
                exit(json_encode(array('status'=>TRUE)));
            }else{
                exit(json_encode(array('status'=>FALSE, 'reason'=>'Please try again later..!')));
            }
        }else{
            show_error("Unable to process the request in this way");
        }
    }
    function occupation()
    {
        $data['header'] = $this->load->view('templates/admin/edit_header', '', true);
        $data['sidebar'] = $this->load->view('templates/admin/edit_sidebar', '', true);
        $data['footer'] = $this->load->view('templates/admin/edit_footer', '', true);
        $data['occupations'] = $this->mdl_preference->get_occupation();
        $this->load->view('admin/edit_list_occupation', $data);
    }
    function add_occupation()
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules("occu_name","Occupation","trim|required");
            if($this->form_validation->run()== TRUE)
            {
                $qry = $this->mdl_preference->add_occupation($this->input->post());
                if($qry)
                {
                    exit(json_encode(array('status'=>TRUE,'result'=>'add')));
                }else{
                    exit(json_encode(array('status'=>FALSE, 'reason'=>'Please try again later..!')));
                }
            }else{
                exit(json_encode(array('status'=>FALSE,'reason'=>validation_errors())));
            }
        }else{
            show_error("Unable to process the request in this way");
        }
    }
    function update_occupation($id)
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules("occu_name","Occupation","trim|required");
            if($this->form_validation->run()== TRUE)
            {
                $qry = $this->mdl_preference->update_occupation($this->input->post(),$id);
                if($qry)
                {
                    exit(json_encode(array('status'=>TRUE)));
                }else{
                    exit(json_encode(array('status'=>FALSE, 'reason'=>'Please try again later..!')));
                }
            }else{
                exit(json_encode(array('status'=>FALSE,'reason'=>validation_errors())));
            }
        }else{
            show_error("Unable to process the request in this way");
        }
    }
    function delete_occupation()
    {
        if($this->input->is_ajax_request())
        {
            $qry = $this->mdl_preference->delete_occupation($this->input->post());
            if($qry)
            {
                exit(json_encode(array('status'=>TRUE)));
            }else{
                exit(json_encode(array('status'=>FALSE, 'reason'=>'Please try again later..!')));
            }
        }else{
            show_error("Unable to process the request in this way");
        }
    }
    function cast()
    {
        $data['header'] = $this->load->view('templates/admin/edit_header', '', true);
        $data['sidebar'] = $this->load->view('templates/admin/edit_sidebar', '', true);
        $data['footer'] = $this->load->view('templates/admin/edit_footer', '', true);
        $data['religions'] = $this->mdl_preference->get_religion();
        $data['casts'] = $this->mdl_preference->get_cast();
        $this->load->view('admin/edit_list_cast', $data);
    }
    function get_cast_by_id($id)
    {
        $data = $this->mdl_preference->get_cast_by_id($id);
        if($data)
        {
            echo json_encode(array('status' =>true, 'data'=> $data));
        }else{
            echo json_encode(array('status' =>false, 'reason' => 'Please try again later'));
        }
    }
    function add_cast()
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules("religion_id","Religion","trim|required");
            $this->form_validation->set_rules("cast","Cast","trim|required");
            if($this->form_validation->run()== TRUE)
            {
                $qry = $this->mdl_preference->add_cast($this->input->post());
                if($qry)
                {
                    exit(json_encode(array('status'=>TRUE,'result'=>'add')));
                }else{
                    exit(json_encode(array('status'=>FALSE, 'reason'=>'Please try again later..!')));
                }
            }else{
                exit(json_encode(array('status'=>FALSE,'reason'=>validation_errors())));
            }
        }else{
            show_error("Unable to process the request in this way");
        }
    }
    function update_cast($id)
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules("religion_id","Religion","trim|required");
            $this->form_validation->set_rules("cast","Cast","trim|required");
            if($this->form_validation->run()== TRUE)
            {
                $qry = $this->mdl_preference->update_cast($this->input->post(),$id);
                if($qry)
                {
                    exit(json_encode(array('status'=>TRUE)));
                }else{
                    exit(json_encode(array('status'=>FALSE, 'reason'=>'Please try again later..!')));
                }
            }else{
                exit(json_encode(array('status'=>FALSE,'reason'=>validation_errors())));
            }
        }else{
            show_error("Unable to process the request in this way");
        }
    }
    function delete_cast()
    {
        if($this->input->is_ajax_request())
        {
            $qry = $this->mdl_preference->delete_cast($this->input->post());
            if($qry)
            {
                exit(json_encode(array('status'=>TRUE)));
            }else{
                exit(json_encode(array('status'=>FALSE, 'reason'=>'Please try again later..!')));
            }
        }else{
            show_error("Unable to process the request in this way");
        }
    }
}