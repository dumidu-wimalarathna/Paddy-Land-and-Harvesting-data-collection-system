<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Harvest_report_model extends CI_Model {


    public function get_harvest_datails_list($field,$order) {
        
        $year = $this->input->post('year', TRUE);
        $district = $this->input->post('district', TRUE);
        $paddy_type_ID = $this->input->post('paddy_type_ID', TRUE);
        $season_ID = $this->input->post('season_ID', TRUE);
        
        $this->db->select('paddy_type.paddy_type_name,season.season_name,paddy_land_harvest.`year`,paddy_land_harvest.ID,paddy_land_harvest.cultivated_area,paddy_land_harvest.crop_damage,paddy_land_harvest.volume_of_harvested,district.district_name');
        $this->db->from('paddy_land_harvest');
        $this->db->join('paddy_land', 'paddy_land.ID = paddy_land_harvest.paddy_land_ID');
        $this->db->join('paddy_type', 'paddy_type.ID = paddy_land_harvest.paddy_type_ID');
        $this->db->join('season', 'season.ID = paddy_land_harvest.season_ID');
        $this->db->join('land_owner', 'paddy_land.land_owner_ID = land_owner.ID');
        $this->db->join('city', 'land_owner.city_ID = city.ID');
        $this->db->join('district', 'city.district_ID = district.ID');
        if($year!=''){
        $this->db->where('paddy_land_harvest.year', $year);}
        if($district!=''){
        $this->db->where('district.ID', $district);}
        if($paddy_type_ID!=''){
        $this->db->where('paddy_type.ID', $paddy_type_ID);}
        if($season_ID!=''){
        $this->db->where('season.ID', $season_ID);}
        $query = $this->db->get();
        // echo $this->db->last_query();exit();
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