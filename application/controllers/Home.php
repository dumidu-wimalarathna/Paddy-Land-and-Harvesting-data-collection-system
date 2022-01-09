<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'vendor/autoload.php';

Class Home extends CI_Controller {

  
    public function __construct() {
        parent::__construct();

        $this->load->model('Frontend_model');
    }

    public function index() {
        $data = array();
        
        $data['province'] = $this->Frontend_model->populate_drop_down_one('province','ID,province_name','province_name');
        $data['district'] = $this->Frontend_model->populate_drop_down_one('district','ID,district_name','district_name');
        $data['city'] = $this->Frontend_model->populate_drop_down_one('city','ID,city_name','city_name');
        $data['paddy_type'] = $this->Frontend_model->populate_drop_down_one('paddy_type','ID,paddy_type_name','paddy_type_name');
        $data['season'] = $this->Frontend_model->populate_drop_down_one('season','ID,season_name','season_name');
        
        $data['yala'] = $this->Frontend_model->get_harvest_data(date('Y')-1,'5','','','','');
        $data['maha'] = $this->Frontend_model->get_harvest_data(date('Y')-1,'6','','','','');
        $data['all'] = $this->Frontend_model->get_harvest_data(date('Y')-1,'','','','','');
        
        $data['land'] = $this->Frontend_model->get_land_data(date('Y')-1,'','','','','');
        
        
        $this->load->view('header');
        $this->load->view('home_view',$data);
        $this->load->view('footer',$data);
        
    }

    public function search_result() {
        
        $data = array();
        $year = $this->input->post('year', true);
        $searchtype = $this->input->post('searchtype', true);
        $province_ID = $this->input->post('province_ID', true);
        $district_ID = $this->input->post('district_ID', true);
        $season_ID = $this->input->post('season_ID', true);
        $city_ID = $this->input->post('city_ID', true);
        $paddy_type_ID = $this->input->post('paddy_type_ID', true);
        
        $data['province'] = $this->Frontend_model->populate_drop_down_one('province','ID,province_name','province_name');
        $data['district'] = $this->Frontend_model->populate_drop_down_one('district','ID,district_name','district_name');
        $data['city'] = $this->Frontend_model->populate_drop_down_one('city','ID,city_name','city_name');
        $data['paddy_type'] = $this->Frontend_model->populate_drop_down_one('paddy_type','ID,paddy_type_name','paddy_type_name');
        $data['season'] = $this->Frontend_model->populate_drop_down_one('season','ID,season_name','season_name');
        
        
        if($searchtype=='1'){
            
            $data['yala'] = $this->Frontend_model->get_harvest_data($year,$season_ID,$province_ID,$district_ID,$city_ID,$paddy_type_ID);
            $data['maha'] = $this->Frontend_model->get_harvest_data($year,$season_ID,$province_ID,$district_ID,$city_ID,$paddy_type_ID);
            $data['all'] = $this->Frontend_model->get_harvest_data($year,$season_ID,$province_ID,$district_ID,$city_ID,$paddy_type_ID);
            
            $this->load->view('header');
            $this->load->view('harvest_view.php',$data);
            $this->load->view('footer',$data);
            
        } else if($searchtype='2'){
            
            $data['land'] = $this->Frontend_model->get_land_data($year,'',$province_ID,$district_ID,$city_ID,$paddy_type_ID);
            
            $this->load->view('header');
            $this->load->view('land_view.php',$data);
            $this->load->view('footer',$data);
            
        }  else {
            
            redirect('home');
            
        }
    }
    
    
    
    
    
    public function get_district() {
        $province = $this->input->post('province');
        $province_data = $this->Frontend_model->get_province_data($province);
        
        $dropdown='<option value="">Please Select</option>';
        foreach($province_data as $row){
                $dropdown.='<option value="'.$row->ID.'">'.$row->district_name.'</option>';
        }
        echo $dropdown;
        
    }
    
    public function get_city() {
        $province = $this->input->post('province');
        $district = $this->input->post('district');
        $city_data = $this->Frontend_model->get_city_data($province,$district);
        
        $dropdown='<option value="">Please Select</option>';
        foreach($city_data as $row){
                $dropdown.='<option value="'.$row->ID.'">'.$row->city_name.'</option>';
        }
        echo $dropdown;
        
    }
}

?>
