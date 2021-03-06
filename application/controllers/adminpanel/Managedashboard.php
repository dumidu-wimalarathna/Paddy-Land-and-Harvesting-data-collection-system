<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


Class Managedashboard extends CI_Controller {

    private $table_name = "";
    private $page_id = "1";
    private $redirect_path = "adminpanel/managedashboard/managedashboard/tab/1";

    public function __construct() {
        parent::__construct();

        $this->load->library('common_library');
        $this->load->helper('header_helper');

        $this->load->model('common_model');
        set_title("Manage Dashboard");
        $this->session->set_userdata('paddy_DynMenuSelect', '1');
        
    }

    public function index() {
        //echo 'ss'; exit();
        //var_dump($_SESSION);
        $this->load->view('adminpanel/header_view');

        $this->load->view('adminpanel/dashboard_view');
       
        $this->load->view('adminpanel/footer_view');
    }


}

?>
