<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Owner extends CI_Controller {

    private $table_name = "land_owner";
	
    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('paddy_is_logged_inbackendsession') != "1") {
            redirect(base_url().'adminpanel/login');
        }
        $this->load->model('Owner_model');
        set_title("Paddy Land");
    }
    
    public function view() {
        $data=array();
        $data['saveStatus'] = 'V';
        $data['list_data'] = $this->Owner_model->get_all_details($this->table_name,'ID','DESC'); 
       
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/owner/owner_view',$data);
        $this->load->view('adminpanel/footer_view');
    }

    public function add() {
        $data = array();
        if (empty($data))
            $data['saveStatus'] = 'A';

        $data['list_data'] = $this->Owner_model->get_all_details($this->table_name,'ID','DESC');
        $data['city_data'] = $this->Owner_model->populate_dropdown('city','ID','city_name','asc');
        
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/owner/owner_view',$data);
        $this->load->view('adminpanel/footer_view');
    }

    public function save_owner() {
        
        $save_status = $this->input->post('cSaveStatus', TRUE);
        
        $this->form_validation->set_rules('first_name', 'first name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'last name', 'required|trim');
        $this->form_validation->set_rules('address_line_1', 'address line 1', 'required|trim');
        $this->form_validation->set_rules('telephone', 'telephone', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('NIC', 'NIC', 'required|trim');
        $this->form_validation->set_rules('date_of_birth', 'date of birth', 'required|trim');
        $this->form_validation->set_rules('age', 'age', 'required|trim');
        
        
        if ($this->form_validation->run()) {
        
            $recID = $this->input->post('ID', TRUE);
            
                $res =$this->Owner_model->save_owner($save_status,$recID);
                if ($res) {
                    $this->session->set_flashdata('message_saved', ' Saved successfully.');
                    redirect(base_url() . 'adminpanel/owner/owner/view');
                    
                }else {
                    $this->session->set_flashdata('message_error', ' Save fail 321');
                    redirect(base_url() . 'adminpanel/owner/owner/view');
                }
         
        } else {
            
            $this->session->set_flashdata('message_error', 'Save fail 123');
            redirect(base_url() . 'adminpanel/owner/owner/add');           
        }
        
    }

    public function edit() {
            
            $data['title'] ='Edit';
            $data['saveStatus']='E';
           
            $data['list_data'] = $this->Owner_model->get_all_details($this->table_name,'ID','DESC');
            $data['city_data'] = $this->Owner_model->populate_dropdown('city','ID','city_name','asc');
            
            $recID = $this->uri->segment(5);
            $data['edit_data'] = $this->Owner_model->get_edit_data($recID, $this->table_name);

            $this->load->view('adminpanel/header_view');
            $this->load->view('adminpanel/owner/owner_view',$data);
            $this->load->view('adminpanel/footer_view');
            
    
    }

    public function delete() {
        $recID = $this->uri->segment(5);
        
        $this->Owner_model->delete_record('ID',$recID,$this->table_name);

        redirect(base_url() . 'adminpanel/owner/owner/view');
        
    }

    public function active_record() {
        $recID = $this->uri->segment(5);

        $this->Owner_model->active_record($recID,$this->table_name);

        redirect(base_url() . 'adminpanel/owner/owner/view');

    }
    
    public function deactive_record() {
        $recID = $this->uri->segment(5);

        $this->Owner_model->deactive_record($recID,$this->table_name);

        redirect(base_url() . 'adminpanel/owner/owner/view');

    }
    
 
}

?>
