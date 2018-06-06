<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Register extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('form', 'string'));
        $this->load->model(array('mdl_register', 'admin/mdl_preference'));
        
        
    }
    function getislamicEducation()
    {
        $data = $this->mdl_register->getIslamicEducation();
        if (!empty($data)) {
            exit(json_encode(array('status' => true, 'data' => $data)));
        } else {
            exit(json_encode(array('status' => false, 'reason' => 'Please try again later')));
        }
    }
    function newUser()
    {
        if ($this->input->is_ajax_request()) {
            
            
           
            if ($this->form_validation->run() == TRUE) {
                $result = $this->mdl_register->newUser($this->input->post());
                $session_array = array('name' => $this->input->post('txtName'),
                    'email' => $this->input->post('txtEmail'),
                    'mobile' => $this->input->post('txtMobileNo'),
                    'id' => $result,
                    'is_verified' => 0
                );
                $this->session->set_userdata('logged_in_user', $session_array);
                exit(json_encode(array('status' => true, 'data' => $result)));
            } else {
                exit(json_encode(array('status' => FALSE, 'reason' => validation_errors())));
            }
        } else {
            show_error('We are unable to process the request in this way..!!');
        }
    }

    function complete_registration()
    {
        
        $data['head'] = $this->load->view('templates/user/edit_head', '', true);
        $data['header'] = $this->load->view('templates/user/edit_header', '', true);
        $data['footer'] = $this->load->view('templates/user/edit_footer', '', true);
        $result = array('name' => $this->input->post('txtName'),
                        'gender' => $this->input->post('genderReg'),
                        'email' => $this->input->post('txtEmail'),
                        'cemail' => $this->input->post('confirmemail'),
                        'mobile' => $this->input->post('txtMobileNo'),
                        /*'day' => $this->input->post('dateOfBirthDay'),
                        'month' => $this->input->post('dateOfBirthMonth'),
                        'year' => $this->input->post('dateOfBirthyear')*/
                        'cmobile' => $this->input->post('confirmmobile')
                        );
        $data['data'] = $result;
        $data['countries'] = get_countries();
        $data['relegions'] = $this->mdl_preference->get_religion();
        $data['laguages'] = $this->mdl_preference->get_laguages();
        $data['educations'] = $this->mdl_preference->get_edudation();
        $data['islamic_educations'] = $this->mdl_preference->get_islamicEducation();
        $data['fields'] = $this->mdl_preference->get_education_fields();
        $data['works_with'] = $this->mdl_preference->get_work_with();
        $data['works_as'] = $this->mdl_preference->get_work_as();
        $data['heights'] = $this->mdl_preference->get_user_height();
        $data['casts'] = get_cast_by_rel(1);
        $this->load->view('edit_complete_registration', $data);
    }

    function get_states_by_country()
    {
        $country_id = $this->input->get('country_id');
        $country_id = intval($country_id);
        $data = get_states_by_country($country_id);

        if (!empty($data)) {
            exit(json_encode(array('status' => true, 'data' => $data)));
        } else {
            exit(json_encode(array('status' => false, 'reason' => 'Please try again later')));
        }
    }

    function get_district_by_state()
    {
        $state_id = $this->input->get('state_id');
        $state_id = intval($state_id);
        $data = get_city_by_state($state_id);
        if (!empty($data)) {
            exit(json_encode(array('status' => true, 'data' => $data)));
        } else {
            exit(json_encode(array('status' => false, 'reason' => 'Please try again later')));
        }
    }
    function get_taluk_by_district()
    {
        $district_id = $this->input->get('district_id');
        $district_id = intval($district_id);
        $data = get_taluk_by_district($district_id);
        if (!empty($data)) {
            exit(json_encode(array('status' => true, 'data' => $data)));
        } else {
            exit(json_encode(array('status' => false, 'reason' => 'Please try again later')));
        } 
    }

    function get_cast_by_relgion()
    {
        $rel_id = $this->input->get('rel_id');
        $rel_id = intval($rel_id);
        $data = get_cast_by_rel($rel_id);

        if (!empty($data)) {
            exit(json_encode(array('status' => true, 'data' => $data)));
        } else {
            exit(json_encode(array('status' => false, 'reason' => 'Please try again later')));
        }
    }
    function get_panchayath_by_taluk()
    {
        $taluk_id = $this->input->get('taluk_id');
        $taluk_id = intval($taluk_id);
        $data = get_panchayath_by_taluk($taluk_id);

        if (!empty($data)) {
            exit(json_encode(array('status' => true, 'data' => $data)));
        } else {
            exit(json_encode(array('status' => false, 'reason' => 'Please try again later')));
        }
    }

    function do_register()
    {
        //echo json_encode($this->input->post());
        if($this->input->is_ajax_request()){
            $this->form_validation->set_rules('txtName', 'Name', 'required|trim');
            $this->form_validation->set_rules('txtEmail', 'Email', 'required|trim|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules("marrital_status","Marrital status","trim|required");
             $this->form_validation->set_rules('txtPassword', 'Password ', 'trim|required');
            $this->form_validation->set_rules('txtMobileNo', 'Mobile', 'trim|required|is_unique[users.mobile]');
            $this->form_validation->set_rules('ctxtPassword', 'Confirm Password', 'required|matches[txtPassword]');
            $this->form_validation->set_rules('ctxtEmail', 'Confirm Email', 'required|matches[txtEmail]');
            $this->form_validation->set_rules('dateOfBirthDay', 'Day of birth', 'trim|required');
            $this->form_validation->set_rules('dateOfBirthMonth', 'Month of birth', 'trim|required');
            $this->form_validation->set_rules('dateOfBirthyear', 'Year of birth', 'trim|required');
            $this->form_validation->set_rules('genderReg', 'Gender', 'trim|required');
            $this->form_validation->set_rules('DDProfileCreatedby', 'Created By', 'trim|required');
            $this->form_validation->set_rules("height","Height","trim|required");
            $this->form_validation->set_rules("weight","Weight","trim|required");
            $this->form_validation->set_rules("district","District","trim|required");
            $this->form_validation->set_rules("taluk","Taluk","trim|required");
            //$this->form_validation->set_rules("mother_tongue","Mother tongue","trim|required");
            $this->form_validation->set_rules("cast","Mehdhab","trim|required");
            $this->form_validation->set_rules("country","Country","trim|required");
            $this->form_validation->set_rules("state","State","trim|required");
            $this->form_validation->set_rules("work_as","Work As","trim|required");
            $this->form_validation->set_rules("work_with","Work With","trim|required");
            $this->form_validation->set_rules("city","City","trim|required");
            $this->form_validation->set_rules("islamic_education","Islamic Education","trim|required");
            $this->form_validation->set_rules("address","Address","trim|required");
            $this->form_validation->set_rules("body_type","Body Type","trim|required");
            $this->form_validation->set_rules("skin_tone","Skin Tone","trim|required");
            $this->form_validation->set_rules("education_field","Education Field","trim|required");
            $this->form_validation->set_rules("education_level","Educations Level","trim|required");
            $this->form_validation->set_rules("looking_for","Looking For","trim");
            if( $this->form_validation->run() ){

                $session_array = $this->session->userdata('logged_in_user');
                $user_id = $session_array['id'];
                $this->load->library('upload');
             //  var_dump($_FILES['userfile']['name']);     
                if(isset($_FILES['userfile']['name']))
                {


                    $files = $_FILES;
                    $cpt = count($_FILES['userfile']['name']);
                    
                        $_FILES['userfile']['name']= $files['userfile']['name'];
                        $_FILES['userfile']['type']= $files['userfile']['type'];
                        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'];
                        $_FILES['userfile']['error']= $files['userfile']['error'];
                        $_FILES['userfile']['size']= $files['userfile']['size'];

                        $this->upload->initialize($this->set_upload_options());

                        $upload_img = $this->upload->do_upload();

                        if(!$upload_img){
                            exit(json_encode(array('status'=>FALSE, 'reason'=>$this->upload->display_errors())));
                        } else{
                            $fileName = $_FILES['userfile']['name'];
                           $fileName = str_replace(' ', '_', $fileName);
                           //$_FILES['userfile']['name']= $fileName;
                           $fileName = 'uploads/profile/'.$fileName;
                        }
                   
                }else{
                    $fileName = 'uploads/profile/dummy.png';
                }

              
               // $laguages = $this->input->post('laguage');
                //$educations = $this->input->post('educations');
                $result = $this->mdl_register->insert_details($this->input->post(),$fileName);
                if($result)
                {
                    $session_array = array('name' => $this->input->post('txtName'),
                    'email' => $this->input->post('txtEmail'),
                    'mobile' => $this->input->post('txtMobileNo'),
                    'id' => $result,
                    'is_verified' => 0
                );
                $this->session->set_userdata('logged_in_user', $session_array);
                    exit(json_encode(array("status"=>true)));
                }else{
                   exit(json_encode(array("status"=>FALSE,"reason"=>'Please try again later')));
                }

            }else{
                exit(json_encode(array("status"=>FALSE,"reason"=>validation_errors())));          
            }

        }else{

            show_error("We are unable to process this request on this way!");

        }
    }
     private function set_upload_options()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = './uploads/profile/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['remove_spaces'] = TRUE;
        $config['max_size']      = '2400';
        $config['overwrite']     = FALSE;

        return $config;
    }
}

?>