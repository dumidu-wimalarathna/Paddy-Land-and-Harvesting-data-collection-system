<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Harvest_report extends CI_Controller {

    private $table_name = "paddy_land_harvest";
	
    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('paddy_is_logged_inbackendsession') != "1") {
            redirect(base_url().'adminpanel/login');
        }
        $this->load->model('Harvest_report_model');
        set_title("Report of Harvesting");
    }
    
    public function view() {
        $data=array();
        
        $year = $this->input->post('year', TRUE);
        $district = $this->input->post('district', TRUE);
        $paddy_type_ID = $this->input->post('paddy_type_ID', TRUE);
        $season_ID = $this->input->post('season_ID', TRUE);
        
        $data['year_id'] = $year;
        $data['district_id'] = $district;
        $data['paddy_type_ID'] = $paddy_type_ID;
        $data['season_ID'] = $season_ID;
        
        $data['district_list'] = $this->Harvest_report_model->populate_dropdown('district','ID','district_name','asc');
        $data['paddy_type'] = $this->Harvest_report_model->populate_dropdown('paddy_type','ID','paddy_type_name','asc');
        $data['season_list'] = $this->Harvest_report_model->populate_dropdown('season','ID','season_name','asc');
        
        $data['list_data'] = $this->Harvest_report_model->get_harvest_datails_list('ID','DESC'); 
       
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/report/harvest_report_view',$data);
        $this->load->view('adminpanel/footer_view');
    }

    public function add() {
        $data = array();
        if (empty($data))
        $data['saveStatus'] = 'A';

        $data['list_data'] = $this->Harvest_report_model->populate_dropdown('district','ID','district_name','asc');
        $data['land_data'] = $this->Harvest_report_model->populate_dropdown('paddy_land','ID','land_name','asc');
        $data['paddy_type_data'] = $this->Harvest_report_model->populate_dropdown('paddy_type','ID','paddy_type_name','asc');
        $data['season_data'] = $this->Harvest_report_model->populate_dropdown('season','ID','season_name','asc');
        
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/report/harvest_report_view',$data);
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
            
                $res =$this->Harvest_report_model->save_harvest($save_status,$recID);
                if ($res) {
                    $this->session->set_flashdata('message_saved', ' Saved successfully.');
                    redirect(base_url() . 'adminpanel/report/harvest_report/view');
                    
                }else {
                    $this->session->set_flashdata('message_error', ' Save fail');
                    redirect(base_url() . 'adminpanel/report/harvest_report/view');
                }
         
        } else {
            $this->session->set_flashdata('message_error', 'Save fail');
            redirect(base_url() . 'adminpanel/report/harvest_report/add');           
        }
    }

    public function edit() {
            
            $data['title'] ='Edit';
            $data['saveStatus']='E';
           
            $data['list_data'] = $this->Harvest_report_model->get_all_details($this->table_name,'ID','DESC');
            $data['land_data'] = $this->Harvest_report_model->populate_dropdown('paddy_land','ID','land_name','asc');
            $data['paddy_type_data'] = $this->Harvest_report_model->populate_dropdown('paddy_type','ID','paddy_type_name','asc');
            $data['season_data'] = $this->Harvest_report_model->populate_dropdown('season','ID','season_name','asc');

            
            $recID = $this->uri->segment(5);
            $data['edit_data'] = $this->Harvest_report_model->get_edit_data($recID, $this->table_name);

            $this->load->view('adminpanel/header_view');
            $this->load->view('adminpanel/report/harvest_report_view',$data);
            $this->load->view('adminpanel/footer_view');

    }

    public function delete() {
        $recID = $this->uri->segment(5);
        
        $this->Harvest_report_model->delete_record('ID',$recID,$this->table_name);

        redirect(base_url() . 'adminpanel/report/harvest_report/view');
        
    }

    public function active_record() {
        $recID = $this->uri->segment(5);

        $this->Harvest_report_model->active_record($recID,$this->table_name);

        redirect(base_url() . 'adminpanel/report/harvest_report/view');

    }
    
    public function deactive_record() {
        $recID = $this->uri->segment(5);

        $this->Harvest_report_model->deactive_record($recID,$this->table_name);

        redirect(base_url() . 'adminpanel/report/harvest_report/view');

    }

    
    public function get_havest_report() {
        $data = array();
        $data['list_data'] = $this->Harvest_report_model->get_harvest_datails_list('ID','DESC');
        $this->load->view('adminpanel/report/harvest_report_pdf',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("Harvesting Report.pdf", array("Attachment"=>0));
    }
 
}

?>
