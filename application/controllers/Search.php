<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Search extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->library('pagination');
        $this->load->model(array('admin/mdl_dashboard','admin/mdl_preference', 'mdl_search'));

    }
    function result()
    {
        $config = array();
        $config["base_url"] = base_url() . "search/result/";
        $res = array(
           'gender' => $this->input->post('gender'),
           'agefrom' => $this->input->post('agefrom'),
           'ageto' => $this->input->post('ageto'),
           'cast' => $this->input->post('cast'),
           'education' => $this->input->post('education'),
           'mother_tongue' => 3
       );
        $data['s_gender']=$this->input->post('gender');
        $data['s_agefrom']=$this->input->post('agefrom');
        $data['s_ageto']=$this->input->post('ageto');
        $data['s_cast']=$this->input->post('cast');
        $data['s_education']=$this->input->post('education');
        $result_count = $this->mdl_search->get_search_count($res);

        $config["total_rows"] =  count($result_count);
        $config["per_page"] = 10;
            //pagination customization using bootstrap styles
            $config['full_tag_open'] = '<div class="pagination pagination-centered"><ul class="page_test  pagination">'; // I added class name 'page_test' to used later for jQuery
            $config['full_tag_close'] = '</ul></div><!--pagination-->';

            $config['first_link'] = '&laquo; First';
            $config['first_tag_open'] = '<li class="prev page">';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = 'Last &raquo;';
            $config['last_tag_open'] = '<li class="next page">';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = 'Next &rarr;';
            $config['next_tag_open'] = '<li class="next page">';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = '&larr; Previous';
            $config['prev_tag_open'] = '<li class="prev page">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";

            $config['num_tag_open'] = '<li class="page">';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['page'] = $page;

            $data["data"] = $this->mdl_search->get_search_results($res, $config["per_page"], $page);
            $data['casts'] = get_cast_by_rel(1);
            $data['educations'] = $this->mdl_preference->get_edudation();
            $data['islamic_educations'] = $this->mdl_preference->get_islamicEducation();
            $data['works_with'] = $this->mdl_preference->get_work_with();
            $data['works_as'] = $this->mdl_preference->get_work_as();
            $data['heights'] = $this->mdl_preference->get_user_height();
            $data["links"] = $this->pagination->create_links();
            $data['head'] = $this->load->view('templates/user/edit_head', '', true);
            $data['header'] = $this->load->view('templates/user/edit_header', '', true);
            $data['footer'] = $this->load->view('templates/user/edit_footer', '', true);
            $this->load->view('edit_view_search_result', $data);

        }
        function search_new()
        {
            $res='';
            $cnt=0;
            if(!empty($_POST['favorite'])){
            foreach ($_POST['favorite'] as $key) {
                if($cnt!=0)
                    $res.=" or ";
                $res.=" ud.cast_id=".$key;
                $cnt++;
            }
        }
        if(!empty($_POST['education'])){
            foreach ($_POST['education'] as $key) {
                if($cnt!=0)
                    $res.=" or ";
                $res.=" ud.education_id =".$key;
                $cnt++;
            }
        }
        if(!empty($_POST['islamic_education'])){
            foreach ($_POST['islamic_education'] as $key) {
                if($cnt!=0)
                    $res.=" or ";
                $res.=" ud.islamic_education_id =".$key;
                $cnt++;
            }
        }
        if(!empty($_POST['wors_on'])){
            foreach ($_POST['wors_on'] as $key) {
                if($cnt!=0)
                    $res.=" or ";
                $res.=" ud.work_with =".$key;
                $cnt++;
            }
        }
        if(!empty($_POST['heights'])){
            foreach ($_POST['heights'] as $key) {
                if($cnt!=0)
                    $res.=" or ";
                $res.=" ud.height =".$key;
                $cnt++;
            }
        }
        if(!empty($_POST['gender']))
        {
            if($cnt!=0)
                    $res.=" or ";
                $res.=" u.gender ='".$_POST['gender']."'";
                $cnt++;
        }
        
            $result_count = $this->mdl_search->get_search_results_new($res);
            $out='';
       foreach ($result_count as $key) {
           $out.="<div class='col-md-6'>
                <div class='prfldiv'>
                    <div class='prfldetailss'>
                        <div class='col-md-4 profile_image'>
                            <img src='../uploads/profile/".$key['profile_image']."'>
                        </div>
                        <div class='col-md-8'>
                            <h4 class='nameh4'>".$key['name']." <span>(".$key['user_id'].")</span></h4>
                            <table>
                                <tr>
                                    <td>Age</td>
                                    <td>: ".$key['date_of_birth']."Yrs</td>
                                </tr>
                                <tr>
                                    <td>Madhab</td>
                                    <td>: ".$key['cast']."</td>
                                </tr>
                                <tr>
                                    <td>Mother Tongue</td>
                                    <td>: ".$key['mother_tongue']."</td>
                                </tr>
                                <tr>
                                    <td>Location</td>
                                    <td>: ".$key['city'].", Kerala</td>
                                </tr>
                                <tr>
                                    <td>Education</td>
                                    <td>: BA</td>
                                </tr>
                                <tr>
                                    <td>Profession</td>
                                    <td>: UI, UX Designer</td>
                                </tr>
                            </table>
                        </div>
                    </div>    
                    <div class='col-md-12 contact_tab_prfl'>
                        <div class='col-md-6 ftrprfldiv'>
                            <label><i class='fa fa-user' aria-hidden='true'></i></label>
                            <h6>View Full Profile</h6>
                        </div>
                        <div class='col-md-6 ftrprfldiv'>
                            <label><i class='fa fa-address-book' aria-hidden='true'></i></label>
                            <h6>Contact Details</h6>
                        </div>
                    </div>
                    <div class='expressbtn'>
                        <a href='#'><p style='margin:0;text-align: center; '>Express Intrest</p></a>
                    </div>
                </div>
            </div>";
       }
echo $out;
        }
    }


    ?>