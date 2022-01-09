<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class User extends CI_Controller {

    private $table_name = "tbl_user";
    private $redirect_path = "adminpanel/master/user/add_user";
	
    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('paddy_is_logged_inbackendsession') != "1") {
            redirect('login');
        }
        set_title("System Users");
    }

    public function add_user() {
        $data = array();
        
        if (empty($data))
            $data['saveStatus'] = 'A';

        $this->load->model('admin_model');
        $data['list_data'] = $this->admin_model->get_user();
        
        $data['title'] ='Register a New User';
	
        $sql_user_type = "SELECT tbl_user_type.vAccTypeName,tbl_user_type.id FROM tbl_user_type WHERE tbl_user_type.cEnable = 'Y' AND tbl_user_type.id != '1' ORDER BY tbl_user_type.vAccTypeName ASC";
        $data['iUserTypeArr'] = $this->common_model->populate_drop_down($sql_user_type);

       
        $this->load->view('adminpanel/header_view');
        $this->load->view('adminpanel/masterdata/user_view',$data);
        $this->load->view('adminpanel/footer_view');
    }

        public function edit_user() {
			
            $data['title'] ='Edit User Details';
            $this->load->model('admin_model');
            $data['saveStatus']='E';

            $this->load->model('admin_model');


            $data['list_data'] = $this->admin_model->get_user();
            $recID = $this->uri->segment(5);
            $data['edit_user'] = $this->admin_model->get_edit_user($recID,$this->table_name);
            $data['iUserTypeArr'] = $this->admin_model->get_user_types();
            //var_dump($data);

        //$data['arrOffice'] = $this->common_model->populate_drop_down($sql_office);

            $this->load->view('adminpanel/header_view');
            $this->load->view('adminpanel/masterdata/user_view',$data);
            $this->load->view('adminpanel/footer_view');
			
    }
	
	public function view_user() {
            
        $data = array();
        if (empty($data))
            $data['saveStatus'] = 'V';

            $this->load->model('admin_model');

            $data['list_data'] = $this->admin_model->get_user();


            $this->load->view('adminpanel/header_view');

            $this->load->view('adminpanel/masterdata/user_view',$data);
            $this->load->view('adminpanel/footer_view');
        }

       public function save_user() {
        
        $save_status = $this->input->post('cSaveStatus', TRUE);
        $resetType = $this->input->post('resetType', TRUE);
        
        $recID = $this->input->post('id', TRUE);
        if ($save_status === 'E'){
            
            if ($resetType == 'Y'){
               
            $this->form_validation->set_rules('vUserName', 'user name', 'required|trim|xss_clean');
            $this->form_validation->set_rules('pPassword', 'password', 'required|trim|min_length[6]|max_length[14]|xss_clean');
            $this->form_validation->set_rules('pPasswordConfirm', 'confirm password', 'required|trim|matches[pPassword]|xss_clean');
            }else{
               
                $this->form_validation->set_rules('vFirstName', 'first name', 'required|trim|xss_clean');
                $this->form_validation->set_rules('vLastName', 'last name', 'required|trim|xss_clean');
            }

            
            }else{
                
                
            //$this->form_validation->set_rules('vUserName', 'user name', 'required|trim|is_unique[tbl_user.vUserName]|xss_clean');

            // $this->form_validation->set_rules('vEmail', 'email address', 'required|trim|valid_email|xss_clean');
             //$this->form_validation->set_rules('iUserType', 'user type', 'required');
             $this->form_validation->set_rules('pPassword', 'password', 'required|trim|min_length[6]|max_length[14]|xss_clean');
             $this->form_validation->set_rules('pPasswordConfirm', 'confirm password', 'required|trim|matches[pPassword]|xss_clean');
             $this->form_validation->set_rules('vFirstName', 'first name', 'required|trim|xss_clean');
             $this->form_validation->set_rules('vLastName', 'last name', 'required|trim|xss_clean');
             //$this->form_validation->set_rules('vContactNo', 'contact number', 'trim|xss_clean');

             $this->form_validation->set_message('is_unique', 'User name you entered is already exists.');

        }

       // $this->form_validation->set_rules('vAccDescription', 'description', 'trim');

        

        if ($this->form_validation->run()) {
           
            $this->load->model('admin_model');
            $this->load->model('common_model');

            //echo $save_status; exit();
            if ($save_status === 'E') {
                $res =$this->admin_model->save_user($save_status,$recID);
                //exit();
                if ($res=='AV') {
                    $this->session->set_flashdata('message_error', 'Somone else have this username!');
                    redirect(base_url() . 'adminpanel/master/user/edit_user/'.$recID);
                }elseif($res=='TR'){
                    
                    $this->session->set_flashdata('message_saved', 'Saved successfully.');

                    redirect(base_url() . 'adminpanel/master/user/view_user');
                } else {
                    $this->session->set_flashdata('message_error', 'Save fail!');
					redirect(base_url() . 'master/user/edit_user'.$recID);
                }
            } else {
                $res =$this->admin_model->save_user($save_status,$recID);
                //exit();
                
                if ($res=='AV') {
                    $this->session->set_flashdata('message_error', 'Somone else have this username!');
                    redirect(base_url() . 'adminpanel/master/user/view_user');
                    
                }elseif($res=='TR'){
                    $this->session->set_flashdata('message_saved', 'Saved successfully.');
                    redirect(base_url() . 'adminpanel/master/user/view_user');
                }else {
                
                    $this->session->set_flashdata('message_error', 'Save fail!');
                    redirect(base_url() . 'adminpanel/master/user/add_user');
                }
            }
        } else {
            
            if ($save_status === 'E') {
                //echo "hiiitoo"; exit();
                $this->session->set_flashdata('message_error', 'Save fail!111');
               // redirect($this->uri->uri_string());
			    redirect(base_url() . 'adminpanel/master/user/edit_user/'.$recID);
            } else {
                $this->session->set_flashdata('message_error', 'Save fail!');
				//redirect(base_url() . 'master/user/add_user');
                $this->add_user();
            }
        }
    }
   
   
    public function check_username(){
        $this->load->model('admin_model');
        if(isset($_POST['username']))
        {
            $this->output
           ->set_content_type("application/json")
           ->set_output(json_encode($this->admin_model->check_username($_POST['username'])));
        }
    }
 


    public function change_status() {
        $redirect_path = "adminpanel/master/user/view_user";
        $this->common_library->flexigrid_change_status($redirect_path, $this->table_name);
    }
	
    public function active_record() {
        $recID = $this->uri->segment(5);
            
            $tDes = "User is activated. ID = $recID";
            $this->common_model->add_log($tDes);
            $this->load->model('admin_model');
            $this->admin_model->active_record($recID,'tbl_user');

            $redirect_path = "adminpanel/master/user/view_user";
            redirect(base_url() . $redirect_path);

    }
	
    public function deactive_record() {
        $recID = $this->uri->segment(5);
	
        
            $tDes = "User is deactivated. ID = $recID";
            $this->common_model->add_log($tDes);
            
            $this->load->model('admin_model');
            $this->admin_model->deactive_record($recID,'tbl_user');

            $redirect_path = "adminpanel/master/user/view_user";
            redirect(base_url() . $redirect_path);
        
    }
	
	
    public function delete_record() {
	$recID = $this->uri->segment(5);
	
        $tDes = "User Data has been Deleted";
        $this->common_model->add_log($tDes);
        $this->load->model('admin_model');
        
        $this->admin_model->delete_record('id',$recID,'tbl_user');

        
        $redirect_path = "adminpanel/master/user/view_user";
        redirect(base_url() . $redirect_path);
        
    }

}

?>
