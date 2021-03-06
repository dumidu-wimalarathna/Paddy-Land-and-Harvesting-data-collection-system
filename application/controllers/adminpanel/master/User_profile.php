<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class User_profile extends CI_Controller {
    private $redirect_path = "adminpanel/master/user_profile/view_profile";
	
    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('paddy_is_logged_inbackendsession') != "1") {
            redirect('login');
        }
        $this->session->set_userdata('paddy_DynMenuSelect', '');
        set_title("View Profile");
    }

    public function view_profile() {
        $data = array();
        if (empty($data))
            $data['saveStatus'] = 'A';

        $this->load->model('common_model');
        $data['profile_data']=$this->common_model->view_profile();
       
       
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/user_profile_view',$data);
        $this->load->view('adminpanel/footer_view');
    }
	
       
    public function edit_user_profile() {

        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/edit_user_profile_view');
        $this->load->view('adminpanel/footer_view');

    }
    
    public function change_profile_picture() {

        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/change_profile_picture_view');
        $this->load->view('adminpanel/footer_view');

    }
	
   
    public function change_password() {   
        
        $this->form_validation->set_rules('pPassword', 'password', 'required|trim|min_length[6]|max_length[40]|xss_clean');
        $this->form_validation->set_rules('cPassword', 'confirm password', 'required|trim|matches[pPassword]|xss_clean');
        $this->form_validation->set_rules('pPasswordold', 'Old password', 'required|trim|xss_clean');
        
        if ($this->form_validation->run()) {
            
            $res =$this->common_model->update_password_data();
            if ($res=='SS') {
                $tDes = "password data has been updated";
                $this->common_model->add_log($tDes);
                $this->session->set_flashdata('message_saved', ' Password changed successfully.');
                redirect(base_url()."adminpanel/master/user_profile/view_profile");
            }else if($res=='NM'){
                $this->session->set_flashdata('message_error', ' Old password is not correct');
                redirect(base_url()."adminpanel/master/user_profile/edit_user_profile");                
            }else {
                $this->session->set_flashdata('message_error', ' Save fail!');
                redirect(base_url()."adminpanel/master/user_profile/edit_user_profile");
            }
        }else{
            $this->session->set_flashdata('message_error', ' Save fail!');
            redirect(base_url()."adminpanel/master/user_profile/edit_user_profile");
        }
    }
    
    public function save_profile_pic() {   
                    
        $res =$this->common_model->save_profile_pic();

        if ($res) {            
            $this->session->set_flashdata('message_saved', ' Profile picture updated');
            redirect(base_url() . $this->redirect_path);
        }else{
            $this->session->set_flashdata('message_error', ' Action fail');
            redirect(base_url() . $this->redirect_path);                
        }
    }


}

?>
