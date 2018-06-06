<?php
/**
 * Created by Me.
 * User: faisal
 * Date: 8/11/17
 * Time: 9:53 AM
 */

class Mdl_dashboard extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function add_warehouse($userid)
    {

        $name = ucfirst($this->input->post('name'));
        $nickname = ucfirst($this->input->post('nickname'));
        $address = ucfirst($this->input->post('address'));
        $phone = $this->input->post('phone');
        $gst = $this->input->post('gst_no');
        $dl_no = $this->input->post('dl_no');
        $data = array('name' => $name,
            'nick_name' => $nickname,
            'created_by' => $userid,
            'address' => $address,
            'phone' => $phone,
            'gst_no' => $gst,
            'dl_no' => $dl_no);
        $qry = $this->db->insert('warehouse', $data);
        return $qry;
    }

    function validate_password($pass)
    {
        $session_data = $this->session->userdata('logged_in_admin');
        $id = $session_data['id'];
        $current_password = $this->input->post('current_password');
        $password = encrypt($current_password);
        $query = "select * from login u where u.password = ? and u.id = $id";
        $query = $this->db->query($query, $password);
        //echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function update_password($pass)
    {
        $session_data = $this->session->userdata('logged_in_admin');
        $pass = encrypt($pass);

        $id = $session_data['id'];
        $data = array('password' => $pass);
        $this->db->where('id', $id);
        $qry = $this->db->update('login', $data);

        return $qry;
    }

    function get_all_warehouses()
    {

        $sql = "SELECT w.id,w.name,w.nick_name,w.address,w.phone, w.dl_no, w.gst_no
                FROM warehouse w
                WHERE w.is_del='0'
                ORDER BY w.id DESC";

        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->result_array();
        } else {
            return array();
        }


    }

    function edit_warehouse($id)
    {

        $name = ucfirst($this->input->post('name'));
        $nickname = ucfirst($this->input->post('nickname'));
        $address = ucfirst($this->input->post('address'));
        $phone = $this->input->post('phone');
        $gst = $this->input->post('gst_no');
        $dl_no = $this->input->post('dl_no');
        $data = array('name' => $name, 'nick_name' => $nickname, 'address' => $address, 'phone' => $phone, 'gst_no' => $gst,
            'dl_no' => $dl_no);
        $this->db->where('id', $id);
        $qry = $this->db->update('warehouse', $data);
        return $qry;
    }

    function delete_warehouse($ids)
    {

        $info = array('is_del' => 1);
        $this->db->where_in('id', $ids);
        $qry = $this->db->update('warehouse', $info);
        return $qry;
    }

    function getdashborad_data()
    {
        $qry = "SELECT COUNT(s.id) as total_invouce FROM sales s WHERE s.is_del = 0 AND s.sales_type = 'SALES'";
        $qry = $this->db->query($qry);
        if ($qry->num_rows() > 0) {
            $result = $qry->row_array();
            $data['sales'] = $result['total_invouce'];
        } else {
            $data['sales'] = 0;
        }
        $qry = "SELECT COUNT(s.id) as total_invouce FROM sales s WHERE s.is_del = 0 AND s.sales_type = 'SALES_ORDER'";
        $qry = $this->db->query($qry);
        if ($qry->num_rows() > 0) {
            $result = $qry->row_array();
            $data['sales_order'] = $result['total_invouce'];
        } else {
            $data['sales_order'] = 0;
        }
        $qry = "SELECT COUNT(p.id) as purchase FROM purchase p WHERE p.purchase_mode = 'PURCHASE' AND p.is_del = 0";
        $qry = $this->db->query($qry);
        if ($qry->num_rows() > 0) {
            $result = $qry->row_array();
            $data['purchase'] = $result['purchase'];
        } else {
            $data['purchase'] = 0;
        }
        $qry = "SELECT COUNT(p.id) as purchase_order FROM purchase p WHERE p.purchase_mode = 'PURCHASE_ORDER' AND p.is_del = 0";
        $qry = $this->db->query($qry);
        if ($qry->num_rows() > 0) {
            $result = $qry->row_array();
            $data['purchase_order'] = $result['purchase_order'];
        } else {
            $data['purchase_order'] = 0;
        }
        $qry = "SELECT COUNT(v.id) as total_vendors FROM vendors v WHERE v.is_del = 0";
        $qry = $this->db->query($qry);
        if ($qry->num_rows() > 0) {
            $result = $qry->row_array();
            $data['vendors'] = $result['total_vendors'];
        } else {
            $data['vendors'] = 0;
        }
        $qry = "SELECT COUNT(c.id) as total_customers FROM customers c WHERE c.is_del = 0";
        $qry = $this->db->query($qry);
        if ($qry->num_rows() > 0) {
            $result = $qry->row_array();
            $data['customers'] = $result['total_customers'];
        } else {
            $data['customers'] = 0;
        }
        $qry = "SELECT COUNT(w.id) as total_warehouse FROM warehouse w WHERE w.is_del = 0";
        $qry = $this->db->query($qry);
        if ($qry->num_rows() > 0) {
            $result = $qry->row_array();
            $data['warehouse'] = $result['total_warehouse'];
        } else {
            $data['warehouse'] = 0;
        }
        return $data;
    }

    function add_cheque_details($data)
    {
        $session_data = $this->session->userdata('logged_in_admin');
        $created_by = $session_data['id'];
        if ($data['_type'] == 'receive') {
            $ref_type = 'RECEIVE';
        } elseif ($data['_type'] == 'payment') {
            $ref_type = 'PAY';
        }
        $cheque_date = $data['cheque_date'];
        $cheque_date = date_php_to_mysql($cheque_date);
        $insert = array(
            'bank_name' => $data['bankname'],
            'cheque_date' => $cheque_date,
            'cheque_no' => $data['cheque_no'],
            'amount' => $data['amount'],
            'pay_name' => $data['pay_name'],
            'account_name' => $data['account_name'],
            'account_no' => $data['account_no'],
            'ref_type' => $ref_type,
            'ref_id' => $data['ref_id'],
            'created_by' => $created_by
        );
        $qry = $this->db->insert('cheque_details', $insert);
        return $qry;
    }

    function get_cheque_details()
    {
        $qry = "SELECT dt.id, dt.bank_name, 
                    DATE_FORMAT(dt.cheque_date, '%d-%b-%Y') as chq_date, 
                    dt.cheque_no, dt.amount, dt.pay_name, dt.account_name,
                    dt.account_no, dt.ref_type,
                     (CASE 
                    WHEN dt.ref_type = 'PAY' THEN (SELECT v.name FROM vendors v WHERE v.id = dt.ref_id) 
                     WHEN dt.ref_type = 'RECEIVE' THEN (SELECT c.name FROM customers c WHERE c.id = dt.ref_id) 
                     ELSE 'zero' END) as ref
                    FROM cheque_details dt WHERE dt.is_del =0 ORDER BY dt.id DESC";
        $qry = $this->db->query($qry);
        if($qry->num_rows()>0)
        {
            return $qry->result_array();
        }else{
            return array();
        }
    }
    function get_cheque_by_id($id)
    {
        $qry = "SELECT cd.id, cd.bank_name, cd.cheque_no, 
                cd.amount, cd.pay_name,
                DATE_FORMAT(cd.cheque_date, '%d-%m-%Y') as cheque_date,
                cd.account_name, cd.account_no, cd.ref_type, 
                cd.ref_id
                FROM cheque_details cd WHERE cd.id =?";
        $qry = $this->db->query($qry, $id);
        if($qry->num_rows()>0)
        {
            return $qry->row_array();
        }else{
            return array();
        }
    }
    function updated_cheque_details($id, $data)
    {
        $session_data = $this->session->userdata('logged_in_admin');
        $created_by = $session_data['id'];

        $cheque_date = $data['cheque_date'];
        $cheque_date = date_php_to_mysql($cheque_date);
        $insert = array(
            'bank_name' => $data['bankname'],
            'cheque_date' => $cheque_date,
            'cheque_no' => $data['cheque_no'],
            'amount' => $data['amount'],
            'pay_name' => $data['pay_name'],
            'account_name' => $data['account_name'],
            'account_no' => $data['account_no'],

            'ref_id' => $data['ref_id']
        );
        $this->db->where('id', $id);
        $qry = $this->db->update('cheque_details', $insert);
        return $qry;
    }
    function deletecheque_data($data)
    {
        $chck_item_id = $data['chck_item_id'];
        $info = array('is_del' => 1);
        $this->db->where_in('id', $chck_item_id);
        $qry = $this->db->update('cheque_details', $info);
        return $qry;
    }
}