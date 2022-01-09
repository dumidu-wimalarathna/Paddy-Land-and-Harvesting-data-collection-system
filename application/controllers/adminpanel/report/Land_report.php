<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Land_report extends CI_Controller {

    private $table_name = "paddy_land_harvest";
	
    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('paddy_is_logged_inbackendsession') != "1") {
            redirect(base_url().'adminpanel/login');
        }
        $this->load->model('Land_report_model');
        set_title("Report of Land");
    }

     public function view() {
        $data=array();
        
        
        
        $provice = $this->input->post('provice_ID', TRUE);
        $district = $this->input->post('district', TRUE);
        $city_ID = $this->input->post('city_ID', TRUE);
        
        
        
        $data['district_id'] = $district;
        $data['city_ID'] = $city_ID;
        $data['provice'] = $provice;
        
        $data['district_list'] = $this->Land_report_model->populate_dropdown('district','ID','district_name','asc');
        $data['citys'] = $this->Land_report_model->populate_dropdown('city','ID','city_name','asc');
        $data['provice_list'] = $this->Land_report_model->populate_dropdown('province','ID','province_name','asc');
       
        
        $data['list_data'] = $this->Land_report_model->get_land_datails_list('ID','DESC'); 
       
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/report/land_report_view',$data);
        $this->load->view('adminpanel/footer_view');
    }

    public function get_land_report() {
        $data = array();
        $data['list_data'] = $this->Land_report_model->get_land_datails_list('ID','DESC');
        $this->load->view('adminpanel/report/land_report_pdf',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("Land Report.pdf", array("Attachment"=>0));
    }
    
 
}

?>
