<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Season extends CI_Controller {

    private $table_name = "season";
	
    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('paddy_is_logged_inbackendsession') != "1") {
            redirect(base_url().'adminpanel/login');
        }
        $this->load->model('Masterdata_model');
        set_title("Season");
    }
    
    public function view() {
        $data=array();
        $data['saveStatus'] = 'V';
        $data['list_data'] = $this->Masterdata_model->get_all_details($this->table_name,'ID','DESC'); 
       
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/season_view',$data);
        $this->load->view('adminpanel/footer_view');
    }

    public function add() {
        $data = array();
        if (empty($data))
            $data['saveStatus'] = 'A';

        $data['list_data'] = $this->Masterdata_model->get_all_details($this->table_name,'ID','DESC');
        $data['title'] ='Add a new Cultivation Season';
        
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/season_view',$data);
        $this->load->view('adminpanel/footer_view');
    }

    public function save_season() {
        
        $save_status = $this->input->post('cSaveStatus', TRUE);
        
        $this->form_validation->set_rules('season_name', 'season name', 'required|trim');
        
        
        if ($this->form_validation->run()) {

            $recID = $this->input->post('ID', TRUE);
            
                $res =$this->Masterdata_model->save_season($save_status,$recID);
                if ($res) {
                    $this->session->set_flashdata('message_saved', ' Saved successfully.');
                    redirect(base_url() . 'adminpanel/masterdata/season/view');
                    
                }else {
                    $this->session->set_flashdata('message_error', ' Save fail');
                    redirect(base_url() . 'adminpanel/masterdata/season/view');
                }
         
        } else {
            $this->session->set_flashdata('message_error', 'Save fail');
            redirect(base_url() . 'adminpanel/masterdata/season/add');           
        }
    }

    public function edit() {
            
            $data['title'] ='Edit';
            $data['saveStatus']='E';
           
            $data['list_data'] = $this->Masterdata_model->get_all_details($this->table_name,'ID','DESC');
            
            $recID = $this->uri->segment(5);
            $data['edit_data'] = $this->Masterdata_model->get_edit_data($recID, $this->table_name);

            $this->load->view('adminpanel/header_view');
            $this->load->view('adminpanel/masterdata/season_view',$data);
            $this->load->view('adminpanel/footer_view');
            
    
    }

    public function delete() {
        $recID = $this->uri->segment(5);
        
        $this->Masterdata_model->delete_record('ID',$recID,$this->table_name);

        redirect(base_url() . 'adminpanel/masterdata/season/view');
        
    }

    public function active_record() {
        $recID = $this->uri->segment(5);

        $this->Masterdata_model->active_record($recID,$this->table_name);

        redirect(base_url() . 'adminpanel/masterdata/season/view');

    }
    
    public function deactive_record() {
        $recID = $this->uri->segment(5);

        $this->Masterdata_model->deactive_record($recID,$this->table_name);

        redirect(base_url() . 'adminpanel/masterdata/season/view');

    }
    
 
}

?>
