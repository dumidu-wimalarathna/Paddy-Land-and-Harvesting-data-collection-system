<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Land_report_model extends CI_Model {


    public function get_land_datails_list($field,$order) {
        
        $provice = $this->input->post('provice_ID', TRUE);
        $district = $this->input->post('district', TRUE);
        $city_ID = $this->input->post('city_ID', TRUE);
        
        $this->db->select('paddy_land.ID,paddy_land.land_name,paddy_land.land_extend,land_owner.first_name,land_owner.last_name,land_owner.telephone,land_owner.NIC,city.city_name,district.district_name,province.province_name');
        $this->db->from('paddy_land');
        $this->db->join('land_owner', 'paddy_land.land_owner_ID = land_owner.ID');
        $this->db->join('city', 'land_owner.city_ID = city.ID');
        $this->db->join('district', 'city.district_ID = district.ID');
        $this->db->join('province', 'district.province_ID = province.ID');
        if($provice!=''){
        $this->db->where('province.ID', $provice);}
        if($district!=''){
        $this->db->where('district.ID', $district);}
        if($city_ID!=''){
        $this->db->where('city.ID', $city_ID);}
        $query = $this->db->get();
         //echo $this->db->last_query();exit();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }

 
   
    public function populate_dropdown($table_name, $select_field_one, $select_field_two, $order_by) {

        $this->db->select($select_field_one);
        $this->db->select($select_field_two);
        $this->db->where('status', 'Y');
        $this->db->order_by($select_field_two, $order_by);

        $query = $this->db->get($table_name);
         // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result();
        }

    }

}

?>