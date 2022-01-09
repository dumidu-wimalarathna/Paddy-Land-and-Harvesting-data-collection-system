<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Frontend_model extends CI_Model {
    
    public function get_harvest_data($year,$season,$province,$district,$city_ID,$paddy_type_ID) {

        $this->db->select('sum(paddy_land_harvest.crop_damage) as crop_damage,sum(paddy_land_harvest.volume_of_harvested) as volume_of_harvested');
        $this->db->from('paddy_land_harvest');
        $this->db->join('paddy_land', 'paddy_land_harvest.paddy_land_ID = paddy_land.ID');
        $this->db->join('land_owner', 'paddy_land.land_owner_ID = land_owner.ID');
        $this->db->join('city', 'land_owner.city_ID = city.ID');
        $this->db->join('district', 'city.district_ID = district.ID');
        $this->db->join('province', 'district.province_ID = province.ID');
        $this->db->join('paddy_type', 'paddy_land_harvest.paddy_type_ID = paddy_type.ID');
        if($season!=''){
        $this->db->where('paddy_land_harvest.season_ID', $season);
        }
        $this->db->where('paddy_land_harvest.year', $year);
        if($province!=''){
        $this->db->where('province.ID', $province);
        }
        if($district!=''){
        $this->db->where('district.ID', $district);
        }
        if($city_ID!=''){
        $this->db->where('city.ID', $city_ID);
        }
        if($paddy_type_ID!=''){
        $this->db->where('paddy_type.ID', $paddy_type_ID);
        }
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else {
            return array();
        }
    }
    
    public function get_land_data($year,$season,$province,$district,$city_ID,$paddy_type_ID) {

        $this->db->select('sum(paddy_land_harvest.crop_damage) as crop_damage,sum(paddy_land_harvest.volume_of_harvested) as volume_of_harvested,
                    paddy_land.land_name,
                    paddy_land.ID as landID,
                    land_owner.first_name,
                    land_owner.last_name,
                    paddy_land.land_extend,
                    paddy_type.paddy_type_name,
                    city.city_name,
                    season.season_name');
        $this->db->from('paddy_land_harvest');
        $this->db->join('paddy_land', 'paddy_land_harvest.paddy_land_ID = paddy_land.ID');
        $this->db->join('land_owner', 'paddy_land.land_owner_ID = land_owner.ID');
        $this->db->join('city', 'land_owner.city_ID = city.ID');
        $this->db->join('district', 'city.district_ID = district.ID');
        $this->db->join('province', 'district.province_ID = province.ID');
        $this->db->join('paddy_type', 'paddy_land_harvest.paddy_type_ID = paddy_type.ID');
        $this->db->join('season', 'paddy_land_harvest.season_ID = season.ID');
        if($season!=''){
        $this->db->where('paddy_land_harvest.season_ID', $season);
        }
        $this->db->where('paddy_land_harvest.year', $year);
        if($province!=''){
        $this->db->where('province.ID', $province);
        }
        if($district!=''){
        $this->db->where('district.ID', $district);
        }
        if($city_ID!=''){
        $this->db->where('city.ID', $city_ID);
        }
        if($paddy_type_ID!=''){
        $this->db->where('paddy_type.ID', $paddy_type_ID);
        }
        $this->db->group_by('paddy_land.ID'); 
        $this->db->group_by('paddy_type.ID');
        $this->db->group_by('season.ID');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else {
            return array();
        }
    }
    
    public function populate_drop_down_one($table, $field, $oderby) {
        $this->db->select($field);
        $this->db->group_by($field);
        $this->db->where('status', 'Y');
        $this->db->order_by($oderby);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result();
        }else {
            return array();
        }
    }
    

    public function get_province_data($province){
        
        $this->db->select('district.ID,district.district_name');
        $this->db->from('district');
        if($province!=''){
        $this->db->where('district.province_ID', $province);
        }
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else {
            return array();
        }
        
    }
    
    public function get_city_data($province,$district){
        
        $this->db->select('city.ID,city.city_name');
        $this->db->from('city');
        $this->db->join('district', 'city.district_ID = district.ID');
       
        if($province!=''){
        $this->db->where('district.province_ID', $province);
        }
        if($district!=''){
        $this->db->where('district.ID', $district);
        }
        
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else {
            return array();
        }
        
    }
    

}

?>