<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Harvest extends CI_Controller {

    private $table_name = "paddy_land_harvest";
	
    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('paddy_is_logged_inbackendsession') != "1") {
            redirect(base_url().'adminpanel/login');
        }
        $this->load->model('Harvest_model');
        set_title("Cultivation & Harvesting");
    }
    
    public function view() {
        $data=array();
        $data['saveStatus'] = 'V';
        // $data['list_data'] = $this->Harvest_model->get_all_details($this->table_name,'ID','DESC'); 
        $data['list_data'] = $this->Harvest_model->get_harvest_datails_list('ID','DESC'); 
       
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/harvest/harvest_view',$data);
        $this->load->view('adminpanel/footer_view');
    }

    public function add() {
        $data = array();
        if (empty($data))
        $data['saveStatus'] = 'A';

        $data['list_data'] = $this->Harvest_model->get_all_details($this->table_name,'ID','DESC');
        $data['land_data'] = $this->Harvest_model->populate_dropdown('paddy_land','ID','land_name','asc');
        $data['paddy_type_data'] = $this->Harvest_model->populate_dropdown('paddy_type','ID','paddy_type_name','asc');
        $data['season_data'] = $this->Harvest_model->populate_dropdown('season','ID','season_name','asc');
        
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/harvest/harvest_view',$data);
        $this->load->view('adminpanel/footer_view');
    }

    public function save_harvest() {
        
        $save_status = $this->input->post('cSaveStatus', TRUE);
        
        $this->form_validation->set_rules('year', 'year', 'required|trim');
        $this->form_validation->set_rules('cultivated_area', 'ciltivated area', 'required|trim');
        $this->form_validation->set_rules('crop_damage', 'crop damages', 'required|trim');
        $this->form_validation->set_rules('volume_of_harvested', 'volume of harvested', 'required|trim');
        
        
        if ($this->form_validation->run()) {

            $recID = $this->input->post('ID', TRUE);
            
                $res =$this->Harvest_model->save_harvest($save_status,$recID);
                if ($res) {
                    $this->session->set_flashdata('message_saved', ' Saved successfully.');
                    redirect(base_url() . 'adminpanel/harvest/harvest/view');
                    
                }else {
                    $this->session->set_flashdata('message_error', ' Save fail');
                    redirect(base_url() . 'adminpanel/harvest/harvest/view');
                }
         
        } else {
            $this->session->set_flashdata('message_error', 'Save fail');
            redirect(base_url() . 'adminpanel/harvest/harvest/add');           
        }
    }

    public function edit() {
            
            $data['title'] ='Edit';
            $data['saveStatus']='E';
           
            $data['list_data'] = $this->Harvest_model->get_all_details($this->table_name,'ID','DESC');
            $data['land_data'] = $this->Harvest_model->populate_dropdown('paddy_land','ID','land_name','asc');
            $data['paddy_type_data'] = $this->Harvest_model->populate_dropdown('paddy_type','ID','paddy_type_name','asc');
            $data['season_data'] = $this->Harvest_model->populate_dropdown('season','ID','season_name','asc');

            
            $recID = $this->uri->segment(5);
            $data['edit_data'] = $this->Harvest_model->get_edit_data($recID, $this->table_name);

            $this->load->view('adminpanel/header_view');
            $this->load->view('adminpanel/harvest/harvest_view',$data);
            $this->load->view('adminpanel/footer_view');

    }

    public function delete() {
        $recID = $this->uri->segment(5);
        
        $this->Harvest_model->delete_record('ID',$recID,$this->table_name);

        redirect(base_url() . 'adminpanel/harvest/harvest/view');
        
    }

    public function active_record() {
        $recID = $this->uri->segment(5);

        $this->Harvest_model->active_record($recID,$this->table_name);

        redirect(base_url() . 'adminpanel/harvest/harvest/view');

    }
    
    public function deactive_record() {
        $recID = $this->uri->segment(5);

        $this->Harvest_model->deactive_record($recID,$this->table_name);

        redirect(base_url() . 'adminpanel/harvest/harvest/view');

    }
    
 
}

?>
