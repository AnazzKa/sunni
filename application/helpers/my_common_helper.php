<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function send_custom_email($from, $mail_head, $to, $subject, $email_message)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->load->library('email');

    $config['protocol'] = "smtp";
    $config['smtp_host'] = "ssl://smtp.gmail.com";
    $config['smtp_port'] = "465";
    $config['smtp_user'] = 'techcybaze@gmail.com';
    $config['smtp_pass'] = 'cyb@ze-7';
    $config['charset'] = "utf-8";
    $config['mailtype'] = "html";
    $config['newline'] = "\r\n";

    $ci->email->initialize($config);
    $ci->email->from($from, $mail_head);
    $ci->email->to($to);
    $ci->email->reply_to('no-replay@gmail.com');
    $ci->email->subject($subject);
    $ci->email->message($email_message);
    $send = $ci->email->send();
    if ($send == TRUE) {
        return TRUE;
    } else {
        return FALSE;
    }
}


function safe_b64encode($string)
{
    $data = base64_encode($string);
    $data = str_replace(array('+', '/', '='), array('-', '_', ''), $data);
    return $data;
}

function safe_b64decode($string)
{
    $data = str_replace(array('-', '_'), array('+', '/'), $string);
    $mod4 = strlen($data) % 4;
    if ($mod4) {
        $data .= substr('====', $mod4);
    }
    return base64_decode($data);
}

function encrypt($data)
{
    if (!$data) {
        return false;
    }
    $key = 'mckinley@cybaze1';
    $text = $data;
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB, $iv);
    return trim(safe_b64encode($crypttext));
    /*$key = 'Glom123@cybaze_ium';
    if(16 !== strlen($key)) $key = hash('MD5', $key, true);
    $padding = 16 - (strlen($data) % 16);
    $data .= str_repeat(chr($padding), $padding);
    return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16)));*/
}

function decrypt($data)
{
    $key = 'mckinley@cybaze1';
    if (!$data) {
        return false;
    }
    $crypttext = safe_b64decode($data);
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $crypttext, MCRYPT_MODE_ECB, $iv);
    return trim($decrypttext);

}


/*erp starts here*/
function get_countries()
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $qry = $ci->db->get('countries');
    if ($qry->num_rows() > 0) {
        return $qry->result_array();
    } else {
        return array();
    }
}

function get_countryName_by_id($country_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->where('id', $country_id);
    $ci->db->select('*');
    $qry = $ci->db->get('erp_countries');
    if ($qry->num_rows() > 0) {
        return $qry->row_array();
    } else {
        return array();
    }
}
function get_cast_by_rel($rel_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->where('religion_id', $rel_id);
    $ci->db->where('is_del', 0);
    $ci->db->select('*');
    $qry = $ci->db->get('cast');
    if ($qry->num_rows() > 0) {
        return $qry->result_array();
    } else {
        return array();
    }
}

function get_states_by_country($country_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->where('country_id', $country_id);
    $ci->db->join('countries', 'countries.id = states.country_id');
    $qry = $ci->db->get('states');

    if ($qry->num_rows() > 0) {
        return $qry->result_array();
    } else {
        return array();
    }
}

function getCountry_byName($countryName)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->where('name', $countryName);
    $ci->db->select('*');
    $qry = $ci->db->get('erp_countries');
    if ($qry->num_rows() > 0) {
        return $qry->row_array();
    } else {
        return array();
    }
}

function get_stateName_by_id($state_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->where('id', $state_id);
    $qry = $ci->db->get('erp_states');

    if ($qry->num_rows() > 0) {
        return $qry->row_array();
    } else {
        return array();
    }
}

function getStatebyName($state)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->where('name', $state);
    $qry = $ci->db->get('erp_states');
    if ($qry->num_rows() > 0) {
        return $qry->row_array();
    } else {
        return array();
    }
}

function get_city_by_state($state_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->where('state_id', $state_id);
    $qry = $ci->db->get('district');

    if ($qry->num_rows() > 0) {
        return $qry->result_array();
    } else {
        return array();
    }
}
function get_taluk_by_district($district_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->where('district_id', $district_id);
    $qry = $ci->db->get('taluk');

    if ($qry->num_rows() > 0) {
        return $qry->result_array();
    } else {
        return array();
    }  
}
function get_panchayath_by_taluk($taluk_Id)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->where('taluk_id', $taluk_Id);
    $qry = $ci->db->get('panchayath');

    if ($qry->num_rows() > 0) {
        return $qry->result_array();
    } else {
        return array();
    }  
}
function get_cityName_by_id($state_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->where('id', $state_id);
    $qry = $ci->db->get('erp_cities');
    if ($qry->num_rows() > 0) {
        return $qry->row_array();
    } else {
        return array();
    }
}

function deleteFromTable($field_name, $feild_value, $table)
{
    $ci =& get_instance();
    $ci->load->database();
    $del = array('is_del' => 1);
    $ci->db->where($field_name, $feild_value);
    $qry = $ci->db->update($table, $del);
    return $qry;
}

function check_duplicate_entry($table, $field_name, $feild_value, $id)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->where($field_name, $feild_value);
    $ci->db->where_not_in('id', $id);
    $qry = $ci->db->get($table);
    if ($qry->num_rows() > 0) {
        return FALSE;
    } else {
        return TRUE;
    }
}
function getwarehouse_by_id($ware_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->where('is_del', 0);
    $ci->db->where('id', $ware_id);
    $qry = $ci->db->get('warehouse');
    if ($qry->num_rows() > 0) {
        return $qry->row_array();
    } else {
        return array();
    }
}

function get_all_warehouse()
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->where('is_del', 0);
    $qry = $ci->db->get('warehouse');
    if ($qry->num_rows() > 0) {
        return $qry->result_array();
    } else {
        return array();
    }
}


function date_php_to_mysql($dt)
{
    $slices = explode("-", $dt);

    $newdate = $slices[2] . "-" . $slices[1] . "-" . $slices[0];
    $newdate = new DateTime($newdate);
    return $newdate->format('Y-m-d');
}

function getExecutives()
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->where('is_del', 0);
    $qry = $ci->db->get('sales_rep');
    if ($qry->num_rows() > 0) {
        return $qry->result_array();
    } else {
        return array();
    }
}

function getCompanyDetails()
{
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->order_by('id', 'desc');
    $ci->db->limit(1);
    $qry = $ci->db->get('company_details');
    if ($qry->num_rows() > 0) {
        return $qry->row_array();
    } else {
        return array();
    }
}

function convert_to_mysql($date)
{

    $mysql_date = date('Y-m-d', strtotime($date));
    return $mysql_date;
}


function convert_ui_date($date)
{

    $ui_date = date('d-m-Y', strtotime($date));
    return $ui_date;
}

function amountInwords($no)
{
    $words = array('0' => '', '1' => 'one', '2' => 'two', '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six', '7' => 'seven', '8' => 'eight', '9' => 'nine', '10' => 'ten', '11' => 'eleven', '12' => 'twelve', '13' => 'thirteen', '14' => 'fouteen', '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen', '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty', '30' => 'thirty', '40' => 'fourty', '50' => 'fifty', '60' => 'sixty', '70' => 'seventy', '80' => 'eighty', '90' => 'ninty', '100' => 'hundred &', '1000' => 'thousand', '100000' => 'lakh', '10000000' => 'crore');

    if ($no == 0) {
        //  return 'Zero ';
    } else {
        $numtype = $no < 0 ? "(-) " : "";
        $no = str_replace("-", "", $no);

        $novalue = '';
        $highno = $no;
        $remainno = 0;
        $value = 100;
        $value1 = 1000;

        while ($no >= 100) {

            if (($value <= $no) && ($no < $value1)) {
                $novalue = $words["$value"];
                $highno = (int)($no / $value);
                $remainno = $no % $value;
                break;
            }

            $value = $value1;
            $value1 = $value * 100;

        }

        if (array_key_exists("$highno", $words))
            return $numtype . $words["$highno"] . " " . $novalue . " " . amountInwords($remainno);
        else {
            $unit = $highno % 10;
            $ten = (int)($highno / 10) * 10;
            return $numtype . $words["$ten"] . " " . $words["$unit"] . " " . $novalue . " " . amountInwords($remainno);
        }
    }

}

?>
