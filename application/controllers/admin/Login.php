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
        $this->load->model('admin/login_model');
        /* $session_array = $this->session->userdata('logged_in_admin');
         if (!isset($session_array)) {
             redirect('admin_2/login');
         }*/
    }

    function index()
    {


        $this->load->view('admin/edit_login');


    }

    function change_your_password($userna, $random)
    {
        $data['username'] = decrypt($userna);
        $data['random'] = decrypt($random);
        $this->load->view('admin/edit_change_password', $data);
    }

    function login_process()
    {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $result = $this->login_model->validate_login($this->input->post());
            if ($result['status'] == true) {
                $session_array = array(
                    'username' => $result['data']['username'],
                    'id' => $result['data']['id'],
                    'type' => $result['data']['user_type'],
                    'username' => $result['data']['username'],
                    'login' => true);

                $this->session->set_userdata('logged_in_admin', $session_array);
                exit(json_encode(array('status' => true)));
            } else {
                exit(json_encode(array('status' => false, 'reason' => 'Invalid Username or Password')));
            }

        } else {
            exit(json_encode(array('status' => false, 'reason' => validation_errors())));
        }

    }

    function forgot_password()
    {

        $username = $this->input->post('uname');
        $this->load->helper('string');

        $validate_user = $this->login_model->validate_user($username);
        ///var_dump($validate_user);exit;
        if ($validate_user) {
            $random = random_string('alnum', 16);
            $userna = $validate_user['email'];
            $add_random_string = $this->login_model->add_random_string($random, $userna);
            if ($add_random_string) {
                $data['userna'] = $userna;
                $data['random'] = $random;
                //  var_dump($data);exit;
                $sender_email = $userna;
                $mail_head = "Mckinley Admin";
                $mail_status = send_custom_email($sender_email, $mail_head, $userna, 'Change Password', $this->load->view('templates/admin_2/edit_forgot_password', $data, TRUE));
                if ($mail_status) {
                    $this->session->set_flashdata('msg', 'Reset link has been send to registered email');
                   // exit(json_encode(array('status' => TRUE)));
                    redirect('admin/login');
                } else {
                    $this->session->set_flashdata('msg', 'Something went wrong');
                    redirect('admin/login');
                    //exit(json_encode(array('status' => TRUE, 'reason' => 'Something went wrong')));
                }

            } else {
                $this->session->set_flashdata('msg', 'User does not exist');
                redirect('admin/login');
               // exit(json_encode(array('status' => false, 'reason' => 'User does not exist')));
            }

        } else {
            $this->session->set_flashdata('msg', 'User does not exist');
            redirect('admin/login');
            //exit(json_encode(array('status' => false, 'reason' => 'User does not exist')));
        }
    }

    public function loged_out()
    {
        $this->session->unset_userdata('logged_in_admin');

        redirect("admin/login");
    }

    public function change_password()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('old_password', 'old_password', 'trim|required');
            $this->form_validation->set_rules('new_password', 'password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]');
            if ($this->form_validation->run() == TRUE) {
                $password = $this->input->post('old_password');
                $validate_user = $this->login_model->validate_password($password);
                if ($validate_user) {
                    $res = $this->login_model->change_password();
                    if ($res) {
                        exit(json_encode(array('status' => true)));
                    } else {
                        exit(json_encode(array('status' => false, 'reason' => 'Database Error, Please try Again')));
                    }
                } else {
                    exit(json_encode(array('status' => false, 'reason' => 'Incorrect Current Password ')));
                }
            } else {
                exit(json_encode(array("status" => FALSE, "reason" => validation_errors())));
            }
        } else {
            show_error("Unable To Process The Request In This Way");
        }
    }

    function change_pwd()
    {
        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('password', 'password', 'trim|required');
            $this->form_validation->set_rules('c_password', 'Confirm Password', 'trim|required|matches[password]');
            if ($this->form_validation->run() == TRUE) {
                $password = $this->input->post('password');
                $username = $this->input->post('username');
                $random = $this->input->post('random');

                $validate_user_with_random_key = $this->login_model->validate_user_with_random_key($username, $random);
                if ($validate_user_with_random_key) {
                    $res = $this->login_model->change_pwd($username, $password, $random);
                    if ($res) {
                        $session_array = array(
                            'username' => $res['email'],
                            'id' => $res['id'],
                            'type' => $res['user_type'],
                            'login' => true);
                        $this->session->set_userdata('logged_in_admin', $session_array);
                        exit(json_encode(array('status' => true)));
                    } else {
                        exit(json_encode(array('status' => false, 'reason' => 'Database Error, Please try Again')));
                    }
                } else {
                    exit(json_encode(array('status' => false, 'reason' => 'Invalid user')));
                }
            } else {
                exit(json_encode(array("status" => FALSE, "reason" => validation_errors())));
            }
        } else {
            show_error("Unable To Process The Request In This Way");
        }
    }

}

?>