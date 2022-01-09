<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
//echo hash('sha256', '123123'); exit();//
        #####
        $paddy_userbackendsession = $this->session->userdata('paddy_userbackendsession');

        if ($paddy_userbackendsession != '') {
            //echo 'asd'; exit();
            redirect('adminpanel/managedashboard');
        } else if ($paddy_userbackendsession == '') {
            $data = array();
            $data['error'] = '';
            $this->load->view('adminpanel/login_view', $data);
        }
        #####
    }

    public function login_validation() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('vUserName', 'username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('pPassword', 'password', 'required|trim|xss_clean|callback_username_check');
        
        
        
        if ($this->form_validation->run()) {
            //echo 'sdfsd';exit();

            $this->load->model('model_users');
            $userDetail = $this->model_users->get_user_id();
            //var_dump($userDetail);exit();

            $data = array(
                'paddy_userbackendsession' => $userDetail["id"],
                'paddy_is_logged_inbackendsession' => 1,
                'paddy_vUserNamebackendsession' => $userDetail["vUserName"],
                'paddy_iUserTypeBackendsession' => $userDetail["iUserType"],
                'paddy_iUserTypeNamebackendsession' => $userDetail["vAccTypeName"],
                'paddy_vFirstNamebackendsession' => $userDetail["vFirstName"],
                'paddy_vLastNamebackendsession' => $userDetail["vLastName"],
                'paddy_DynMenuSelect' => '1'
            );
            $this->session->set_userdata($data);

            // system log
            $tDes = "log into system";
            $this->common_model->add_log($tDes, "Home");
            //
           //var_dump($data);
            //echo 'dcscds';exit();
            //redirect('login/home');
            redirect('adminpanel/managedashboard');
        } else {
            //echo 'sadasdas'; exit();
            $data = array();
            $data['error'] = '';
            $this->load->view('adminpanel/login_view', $data);
        }
        // }
        //}
    }
    
    public function g_captcha_validation() {
        if (isset($_POST['token'])){
            $captcha = $_POST['token'];
        }else{
            echo json_encode(array('success' => 'false'));
        }

        $secretKey = "6Le0s6IZAAAAAIrhn6YRt16hQCgqoaKfylg5q0SR";
        $ip = $_SERVER['REMOTE_ADDR'];

        $url =  'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        
        header('Content-type: application/json');
        if($responseKeys["success"]) {
                echo json_encode(array('success' => 'true'));
        } else {
                echo json_encode(array('success' => 'false'));
        }
        

    }

    // sgin up page validation
    public function signup_validation() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('uName', 'Username', 'required|trim|is_unique[user.vUserName]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
        //$this->form_validation->set_rules('email','Email','required|trim|valid_email');

        $this->form_validation->set_message('is_unique', 'User name you entered is already exists.');

        if ($this->form_validation->run()) {
            $this->load->model('model_users');
            if ($this->model_users->add_user()) {
                echo "data added";
            } else {
                echo "Data not added to the tabel";
            }
        } else {
            $this->load->view('signup');
        }
    }

    public function username_check() {
        $this->load->model('model_users');
        if ($this->model_users->can_log()) {
            //echo "hxi";exit();
            return true;
        } else {
            $this->form_validation->set_message('username_check', 'Incorect user name or password.');
            return false;
        }
    }

    public function home() {

        if ($this->session->userdata('paddy_is_logged_inbackendsession')) {
            set_title("Home");
            redirect('managedashboard');
            //$this->load->view('managedashboard');
        } else {
            redirect('login/restricted');
        }
    }

    public function restricted() {
        $this->load->view('restricted');
    }

    public function logout() {
        
        set_title('Logout');
        $tDes = "Sign out from system";
        $this->common_model->add_log($tDes);

        $array_items = array('paddy_vLastNamebackendsession','paddy_vFirstNamebackendsession','paddy_iUserTypeNamebackendsession','paddy_userbackendsession', 'paddy_is_logged_inbackendsession', 'paddy_iUserTypeBackendsession', 'paddy_vUserNamebackendsession', 'paddy_DynMenuSelect');
        $this->session->unset_userdata($array_items);
        //$this->load->cache('index');
        //$this->load->driver('cache');
        //$this->cache->clean();
        //$this->output->nocache();
       // $this->session->sess_destroy();
        //echo 'sdfsd'; exit();
       
        redirect('adminpanel/login');
    }

    public function signup() {
        $this->load->view('signup');
    }

}

?>
