<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class City extends CI_Controller {

    private $table_name = "city";
	
    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('paddy_is_logged_inbackendsession') != "1") {
            redirect(base_url().'adminpanel/login');
        }
        $this->load->model('Masterdata_model');
        set_title("City");
    }
    
    public function view() {
        $data=array();
        $data['saveStatus'] = 'V';
        $data['list_data'] = $this->Masterdata_model->get_all_details($this->table_name,'ID','DESC'); 
        
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/city_view',$data);
        $this->load->view('adminpanel/footer_view');
    }

    public function add() {
        $data = array();
        if (empty($data))
            $data['saveStatus'] = 'A';

        $data['list_data'] = $this->Masterdata_model->get_all_details($this->table_name,'ID','DESC');
        $data['title'] ='Add a new City';
        $data['district_data'] = $this->Masterdata_model->populate_dropdown('district','ID','district_name','asc');
        
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/city_view',$data);
        $this->load->view('adminpanel/footer_view');
    }

    public function save_city() {
        
        $save_status = $this->input->post('cSaveStatus', TRUE);
        
        $this->form_validation->set_rules('city_name', 'City name', 'required|trim');
        
        
        if ($this->form_validation->run()) {

            $recID = $this->input->post('ID', TRUE);
            
                $res =$this->Masterdata_model->save_city($save_status,$recID);
                if ($res) {
                    $this->session->set_flashdata('message_saved', ' Saved successfully.');
                    redirect(base_url() . 'adminpanel/masterdata/city/view');
                    
                }else {
                    $this->session->set_flashdata('message_error', ' Save fail');
                    redirect(base_url() . 'adminpanel/masterdata/city/view');
                }
         
        } else {
            $this->session->set_flashdata('message_error', 'Save fail');
            redirect(base_url() . 'adminpanel/masterdata/city/add');           
        }
    }

    public function edit() {
            
            $data['title'] ='Edit';
            $data['saveStatus']='E';
           
            $data['list_data'] = $this->Masterdata_model->get_all_details($this->table_name,'ID','DESC');
            $data['district_data'] = $this->Masterdata_model->populate_dropdown('district','ID','district_name','asc');
            
            $recID = $this->uri->segment(5);
            $data['edit_data'] = $this->Masterdata_model->get_edit_data($recID, $this->table_name);

            $this->load->view('adminpanel/header_view');
            $this->load->view('adminpanel/masterdata/city_view',$data);
            $this->load->view('adminpanel/footer_view');
    
    }

    public function delete() {
        $recID = $this->uri->segment(5);
        
        $this->Masterdata_model->delete_record('ID',$recID,$this->table_name);

        redirect(base_url() . 'adminpanel/masterdata/city/view');
        
    }

    public function active_record() {
        $recID = $this->uri->segment(5);

        $this->Masterdata_model->active_record($recID,$this->table_name);

        redirect(base_url() . 'adminpanel/masterdata/city/view');

    }
    
    public function deactive_record() {
        $recID = $this->uri->segment(5);

        $this->Masterdata_model->deactive_record($recID,$this->table_name);

        redirect(base_url() . 'adminpanel/masterdata/city/view');

    }
    
 
}

?>
