<?php
defined('BASEPATH') OR EXIT ('No direct script access allowed ');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $session_array = $this->session->userdata('logged_in_admin');
        $this->load->model(array('admin/mdl_dashboard'));
        if (!isset($session_array)) {
            redirect('admin/login');
        }
    }

    function set_menu()
    {
        $data['header'] = $this->load->view('templates/admin/edit_header', '', true);
        $data['sidebar'] = $this->load->view('templates/admin/edit_sidebar', '', true);
        $data['footer'] = $this->load->view('templates/admin/edit_footer', '', true);
        return $data;
    }

    public function index()
    {
        $data['header'] = $this->load->view('templates/admin/edit_header', '', true);
        $data['side_bar'] = $this->load->view('templates/admin/edit_sidebar', '', true);
        $data['footer'] = $this->load->view('templates/admin/edit_footer', '', true);
        //$data['dashboard'] = $this->mdl_dashboard->getdashborad_data();
        $this->load->view('admin/edit_dashboard', $data);

    }

    public function change_password()
    {
        $data['header'] = $this->load->view('admin_2/template/header', '', true);
        $data['side_bar'] = $this->load->view('admin_2/template/side_bar', '', true);
        $data['footer'] = $this->load->view('admin_2/template/footer', '', true);
        $this->load->view('admin_2/change_password', $data);
    }

    function get_warehouses()
    {
        if (has_role('manage_warehouse')) {
            $data = $this->set_menu();
            $data['warehouse'] = $this->mdl_dashboard->get_all_warehouses();
            $this->load->view('admin_2/edit_list_warehouse', $data);
        }
    }

    function add_warehouse()
    {


        if ($this->input->is_ajax_request()) {

            $session_data = $this->session->userdata('logged_in_admin');
            $userid = $session_data['id'];

            $this->form_validation->set_rules("name", "Warehouse Name", "trim|required");
            $this->form_validation->set_rules("address", "Warehouse Address", "trim|required");
            $this->form_validation->set_rules("phone", "Warehouse Contact Number", "trim|min_length[7]|max_length[12]|numeric");
            $this->form_validation->set_rules("gst_no", "GST", "trim|required");
            $this->form_validation->set_rules("dl_no", "DL No", "trim|required");
            if ($this->form_validation->run() == TRUE) {

                $qry = $this->mdl_dashboard->add_warehouse($userid);
                if ($qry) {
                    exit(json_encode(array('status' => TRUE, 'result' => 'add')));
                } else {
                    exit(json_encode(array('status' => False, 'reason' => 'Please try again later..!!')));
                }
            } else {
                exit(json_encode(array('status' => False, 'reason' => validation_errors())));
            }

        } else {
            show_error("Unable To Process The Request In This Way");
        }

    }

    function get_warehouse_by_id($id)
    {
        $data = getwarehouse_by_id($id);
        if ($data) {
            exit(json_encode(array('status' => true, 'data' => $data)));
        } else {
            exit(json_encode(array('status' => false, 'reason' => 'Please try again later')));
        }
    }

    function edit_warehouse($id)
    {


        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules("name", "Warehouse Name", "trim|required");
            $this->form_validation->set_rules("address", "Warehouse Address", "trim|required");
            $this->form_validation->set_rules("phone", "Warehouse Contact Number", "trim|min_length[7]|max_length[12]|numeric");
            $this->form_validation->set_rules("gst_no", "GST", "trim|required");
            $this->form_validation->set_rules("dl_no", "DL No", "trim|required");
            if ($this->form_validation->run() == TRUE) {

                $qry = $this->mdl_dashboard->edit_warehouse($id);
                if ($qry) {
                    exit(json_encode(array('status' => TRUE, 'result' => 'Update')));
                } else {
                    exit(json_encode(array('status' => False, 'reason' => 'Please try again later..!!')));
                }
            } else {
                exit(json_encode(array('status' => False, 'reason' => validation_errors())));
            }

        } else {
            show_error("Unable To Process The Request In This Way");
        }

    }


    function delete_warehouse()
    {
        if ($this->input->is_ajax_request()) {
            $ids = $this->input->post('chck_item_id');
            $qry = $this->mdl_dashboard->delete_warehouse($ids);
            if ($qry) {
                exit(json_encode(array('status' => TRUE)));
            } else {
                exit(json_encode(array('status' => FALSE, 'reason' => 'Please try again later..!')));
            }
        } else {
            show_error("Unable To Process The Request In This Way");
        }
    }

    function update_password()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('current_password', 'Current password', 'trim|required');
            $this->form_validation->set_rules('new_password', 'New password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]');
            if ($this->form_validation->run() == TRUE) {
                $password = $this->input->post('old_password');
                $new_pass = $this->input->post('new_password');
                $validate_user = $this->mdl_dashboard->validate_password($password);
                if ($validate_user) {
                    $res = $this->mdl_dashboard->update_password($new_pass);
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

    public function new_cheque_details()
    {
        $this->load->model(array('admin_2/mdl_customer', 'admin_2/Mdl_vendor'));
        $data['header'] = $this->load->view('templates/admin_2/edit_header', '', true);
        $data['sidebar'] = $this->load->view('templates/admin_2/edit_sidebar', '', true);
        $data['footer'] = $this->load->view('templates/admin_2/edit_footer', '', true);
        $data['type'] = $this->input->get('type');
        $data['customers'] = $this->mdl_customer->get_customers();
        $data['vendors'] = $this->Mdl_vendor->get_all_vendors();
        $this->load->view('admin_2/add_new_cheque_details', $data);
    }

    function add_cheque_details()
    {
        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('_type', 'Type', 'trim|required');
            $this->form_validation->set_rules('cheque_no', 'Cheque no', 'trim|required');
            $this->form_validation->set_rules('cheque_date', 'Cheque date', 'trim|required');
            $this->form_validation->set_rules('bankname', 'Bank name', 'trim|required');
            $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
            $this->form_validation->set_rules('account_no', 'Account no', 'trim|required');
            $this->form_validation->set_rules('account_name', 'Account name', 'trim|required');
            $this->form_validation->set_rules('pay_name', 'Pay name', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $add_data = $this->mdl_dashboard->add_cheque_details($this->input->post());
                if ($add_data) {
                    exit(json_encode(array('status' => true)));
                } else {
                    exit(json_encode(array('status' => false, 'reason' => 'Error.!, Please try again later')));
                }
            } else {
                exit(json_encode(array("status" => FALSE, "reason" => validation_errors())));
            }
        } else {
            show_error("Unable To Process The Request In This Way");
        }
    }
    public function list_cheque_details()
    {
        $data['header'] = $this->load->view('templates/admin_2/edit_header', '', true);
        $data['sidebar'] = $this->load->view('templates/admin_2/edit_sidebar', '', true);
        $data['footer'] = $this->load->view('templates/admin_2/edit_footer', '', true);
        $data['type'] = $this->input->get('type');
        $data['cheques'] = $this->mdl_dashboard->get_cheque_details();
        $this->load->view('admin_2/edit_list_cheque_details', $data);
    }
    function view_cheque_details($id)
    {
        $this->load->model(array('admin_2/mdl_customer', 'admin_2/Mdl_vendor'));
        $data['header'] = $this->load->view('templates/admin_2/edit_header', '', true);
        $data['sidebar'] = $this->load->view('templates/admin_2/edit_sidebar', '', true);
        $data['footer'] = $this->load->view('templates/admin_2/edit_footer', '', true);
        $data['customers'] = $this->mdl_customer->get_customers();
        $data['vendors'] = $this->Mdl_vendor->get_all_vendors();
        $data['cheque'] = $this->mdl_dashboard->get_cheque_by_id($id);
        $this->load->view('admin_2/edit_update_cheque_details', $data);
    }
    function updated_cheque_details($id)
    {
        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('cheque_no', 'Cheque no', 'trim|required');
            $this->form_validation->set_rules('cheque_date', 'Cheque date', 'trim|required');
            $this->form_validation->set_rules('bankname', 'Bank name', 'trim|required');
            $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
            $this->form_validation->set_rules('account_no', 'Account no', 'trim|required');
            $this->form_validation->set_rules('account_name', 'Account name', 'trim|required');
            $this->form_validation->set_rules('pay_name', 'Pay name', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $add_data = $this->mdl_dashboard->updated_cheque_details($id, $this->input->post());
                if ($add_data) {
                    exit(json_encode(array('status' => true)));
                } else {
                    exit(json_encode(array('status' => false, 'reason' => 'Error.!, Please try again later')));
                }
            } else {
                exit(json_encode(array("status" => FALSE, "reason" => validation_errors())));
            }
        } else {
            show_error("Unable To Process The Request In This Way");
        }
    }
    function deletecheque_data()
    {
        if($this->input->is_ajax_request())
        {
            $qry = $this->mdl_dashboard->deletecheque_data($this->input->post());
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


?>
