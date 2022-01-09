<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



//class Header_helper {
if (!function_exists('set_title')) {

    function set_title($title) {
        $ci = & get_instance();
        $ci->header_title = $title;
    }

}

if (!function_exists('get_title')) {

    function get_title() {
        $ci = & get_instance();
        return $ci->header_title;
    }

}

if (!function_exists('get_url')) {

    function get_url($string) {
//        $ci = & get_instance();
//        $url_str = preg_replace('/[^a-zA-Z0-9\']/', '-', $string);
//        return $url_str;
        //Lower case everything
        //$string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[,.?;'`~!?\'\"%$]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }

}


//-----------------------------------



if (!function_exists('get_last_activity')) {

    function get_last_activity() {

        $ci = & get_instance();
        $ci->load->database();
        $sql = "SELECT
Max(tbl_logs.dDateTime) as time
FROM
tbl_logs

";
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
            $ret = $result->row();
            return $ret->time;
        } else {
            return NULL;
        }
    }

}

if (!function_exists('load_user_profile_pic'))
{
    function load_user_profile_pic($id) {
        		
        $ci =& get_instance();
        $ci->load->database();

        $sql = "SELECT
tbl_user.fProfilePic
FROM
tbl_user
WHERE
tbl_user.id = '$id'

     ";
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
                $ret = $result->row();
                return $ret->fProfilePic;
        }else{
            return NULL;
        } 
    }
}

if (!function_exists('get_user_by_id'))
{
    function get_user_by_id($id) {
        		
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT
tbl_user.vFirstName
FROM
tbl_user
WHERE
tbl_user.id = '$id'
";
    $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
                $ret = $result->row();
                return $ret->vFirstName;
        }else{
            return NULL;
        } 
    }
}



if (!function_exists('get_dashboard_count'))
{
    function get_dashboard_count($sql) {
        		
        $ci =& get_instance();
        $ci->load->database();

    $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
            $c= $result->result();   
            return count($c);
        }else{
            return 0;
        } 
    }
}


if (!function_exists('get_enable_all_data'))
{
    function get_enable_all_data($tbl,$field,$val,$cEnable) {
        		
        $ci =& get_instance();
        $ci->load->database();

        if($cEnable=='Y'){
            $sql = "SELECT * FROM $tbl WHERE $tbl.cEnable = 'Y' AND $field = $val ";
        }else{
            $sql = "SELECT * FROM $tbl WHERE $field = $val ";
        }
        
        
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
            return $result->result();                        
        }else{
            return array();
        } 
    }
}


if (!function_exists('get_all_data'))
{
    function get_all_data($tbl) {
        		
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT * FROM $tbl";
        
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
                return $result->result();     
        }else{
            return NULL;
        } 
    }
}

if (!function_exists('get_meta_tags_info'))
{
    function get_meta_tags_info($controller,$function) {
       
        $ci =& get_instance();
        $ci->load->database();

        if($function!=''){
            $sql = "SELECT *
            FROM
            tbl_meta_tags
            WHERE
            tbl_meta_tags.vController = '$controller' AND
            tbl_meta_tags.vFunction = '$function'
            ";
        }else{
            $sql = "SELECT *
            FROM
            tbl_meta_tags
            WHERE
            tbl_meta_tags.vController = '$controller'
            ";
        }
        
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
                return $result->result();  
        }else{
            return NULL;
        } 
    }
}


if (!function_exists('get_master_settings'))
{
    function get_master_settings() {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT * FROM tbl_master_settings";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
           return $result->result();  
        }else{
            return NULL;
        } 
    }
}

if (!function_exists('get_temp_cart'))
{
    function get_temp_cart($agro_user_id) {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT
tbl_temp_cart.iProduct
FROM
tbl_temp_cart
WHERE
tbl_temp_cart.iUser = $agro_user_id";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
           return $result->result_array();  
        }else{
            return array();
        } 
    }
}
if (!function_exists('get_temp_cart_count'))
{
    function get_temp_cart_count($agro_user_id) {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT
Count(tbl_temp_cart.id) as count
FROM
tbl_temp_cart
WHERE
tbl_temp_cart.iUser = $agro_user_id";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
                $ret = $result->row();
                return $ret->count;
        }else{
            return 0;
        } 
    }
}
if (!function_exists('get_temp_cart_sum'))
{
    function get_temp_cart_sum($agro_user_id) {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT
Sum(tbl_temp_cart.fTotalPrice) as sum
FROM
tbl_temp_cart
WHERE
tbl_temp_cart.iUser = $agro_user_id";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
                $ret = $result->row();
                return $ret->sum;
        }else{
            return 0;
        } 
    }
}

if (!function_exists('get_temp_delivery_suburb'))
{
    function get_temp_delivery_suburb($city) {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT
tbl_suburb.id,
tbl_suburb.vSuburbName
FROM
tbl_suburb
WHERE
tbl_suburb.cEnable = 'Y' AND
tbl_suburb.iCity =$city
";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
           return $result->result();  
        }else{
            return NULL;
        } 
    }
}

if (!function_exists('get_cart_item'))
{
    function get_cart_item($orderid) {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT
tbl_product.vTitle,
tbl_product.fImage,
tbl_cart.fUnitPrice,
tbl_cart.vUnit,
tbl_product.vUnit,
tbl_cart.fTotalPrice,
tbl_cart.iQty,
tbl_cart.fQuantity
FROM
tbl_cart
INNER JOIN tbl_product ON tbl_product.id = tbl_cart.iProduct
WHERE
tbl_cart.iOrderId =$orderid
";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
           return $result->result();  
        }else{
            return NULL;
        } 
    }
}



if (!function_exists('get_city_list'))
{
    function get_city_list() {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT * FROM tbl_city";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
           return $result->result();  
        }else{
            return NULL;
        } 
    }
}

if (!function_exists('get_suburb_list'))
{
    function get_suburb_list($city) {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT
tbl_suburb.id,
tbl_suburb.vSuburbName
FROM
tbl_suburb
WHERE
tbl_suburb.iCity = $city
";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
           return $result->result();  
        }else{
            return NULL;
        } 
    }
}

if (!function_exists('get_order_city_count'))
{
    function get_order_city_count($id) {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT
Count(tbl_orders.id) as count
FROM
tbl_orders
WHERE
tbl_orders.iCity = $id AND
tbl_orders.cDelivered = 'N' AND
tbl_orders.cAccept != 'R'

";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
                $ret = $result->row();
                return $ret->count;
        }else{
            return 0;
        } 
    }
}

if (!function_exists('get_order_by_suburb'))
{
    function get_order_by_suburb($id) {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT
tbl_orders.dOrderDate,
tbl_orders.vDeliveryAddress,
tbl_orders.vOrderNo
FROM
tbl_orders
WHERE
tbl_orders.iSuburb = $id AND
tbl_orders.cDelivered = 'N' AND
tbl_orders.cAccept != 'R'
ORDER BY
tbl_orders.dOrderDate ASC
";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
           return $result->result();  
        }else{
            return array();
        } 
    }
}

if (!function_exists('get_sales_history'))
{
    function get_sales_history($month) {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT
Sum(tbl_orders.fSubTotal) as sum
FROM
tbl_orders
WHERE
tbl_orders.dOrderDate LIKE '$month%' AND
tbl_orders.cAccept NOT LIKE 'R'

";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
                $ret = $result->row();
                return $ret->sum;
        }else{
            return NULL;
        } 
    }
}

if (!function_exists('get_order_month_count'))
{
    function get_order_month_count($month) {
        $m = date('Y-m');
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT
Count(tbl_orders.id) as count
FROM
tbl_orders
WHERE
tbl_orders.dOrderDate LIKE '$m%' AND
tbl_orders.cAccept != 'R'

";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
                $ret = $result->row();
                return $ret->count;
        }else{
            return 0;
        } 
    }
}

if (!function_exists('get_accept_month_count'))
{
    function get_accept_month_count() {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT
Count(tbl_orders.id) as count
FROM
tbl_orders
WHERE
tbl_orders.cAccept = 'N'

";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
                $ret = $result->row();
                return $ret->count;
        }else{
            return 0;
        } 
    }
}

if (!function_exists('get_accept_month_pending_count'))
{
    function get_accept_month_pending_count() {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT
Count(tbl_orders.id) as count
FROM
tbl_orders
WHERE
tbl_orders.cAccept != 'R' AND
tbl_orders.cDelivered = 'N'

";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
                $ret = $result->row();
                return $ret->count;
        }else{
            return 0;
        } 
    }
}

if (!function_exists('get_today_pending_count'))
{
    function get_today_pending_count($today) {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT
Count(tbl_orders.id) as count
FROM
tbl_orders
WHERE
tbl_orders.cAccept != 'R' AND
tbl_orders.dOrderDate like '$today%'";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
                $ret = $result->row();
                return $ret->count;
        }else{
            return 0;
        } 
    }
}

if (!function_exists('get_deleviry_rout'))
{
    function get_deleviry_rout() {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT
tbl_delivery_routes.vRouteName,
tbl_delivery_routes.id
FROM
tbl_delivery_routes

";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
           return $result->result();  
        }else{
            return array();
        } 
    }
}

if (!function_exists('get_deleviry_subub'))
{
    function get_deleviry_subub($delivery) {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT
tbl_city.vName,
tbl_city.id
FROM
tbl_route_list
INNER JOIN tbl_city ON tbl_city.id = tbl_route_list.isub
WHERE
tbl_route_list.iRoutid = $delivery

";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
           return $result->result();  
        }else{
            return array();
        } 
    }
}

if (!function_exists('get_deleviry_subub_orders'))
{
    function get_deleviry_subub_orders($subid) {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT
            tbl_orders.id,
tbl_orders.vOrderNo,
tbl_orders.fSubTotal,
tbl_orders.vDeliveryAddress,
tbl_orders.dOrderDate
FROM
tbl_orders
WHERE
tbl_orders.cAccept != 'R' AND
tbl_orders.cDelivered = 'N' AND
tbl_orders.iCity= $subid

";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
           return $result->result();  
        }else{
            return array();
        } 
    }
}

if (!function_exists('get_products'))
{
    function get_products($ca_id) {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT *
FROM
tbl_product
WHERE
tbl_product.iCategory = '$ca_id' AND
tbl_product.cEnable = 'Y'

";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
           return $result->result();  
        }else{
            return array();
        } 
    }
}

if (!function_exists('get_paditype_name'))
{
    function get_paditype_name($paditype_id) {
        
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT
        paddy_type.paddy_type_name,
        paddy_type.ID
        FROM
        paddy_type WHERE ID='".$paditype_id."'

        ";
         
        $result = $ci->db->query($sql);
        if ($result->num_rows() > 0) {
           $ret = $result->row();
           return $ret->paddy_type_name;
        }
        return "";
    }
}


?>
