<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends CI_Model {

   // populate drop down for many table
    public function populate_drop_down($query) {
        $query = $this->db->query($query);
        return $query->result();
    }

    public function add_log($tDes, $title = '') {
        $ip = "";
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        if (!empty($_SERVER['HTTP_X_FORWARD_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARD_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        if (empty($title))
            $title = get_title();

        $logData = array(
            'vPage' => $title,
            'iUserId' => $this->session->userdata('paddy_userbackendsession'),
            'tDes' => $tDes,
            'vIP' => $ip,
        'cEnable' => 'Y',
            'dDateTime' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_logs', $logData);
        // echo $this->db->last_query();
        //exit();
    }

         public function view_profile(){   
            $userid=$this->session->userdata('paddy_userbackendsession');
            $this->db->select('tbl_user.id,
                tbl_user.vTitle,
                tbl_user.vUserName,
                tbl_user.vFirstName,
                tbl_user.vLastName,
                tbl_user.dRegDate,
                tbl_user.vEmail,
                tbl_user.vContactNo,
                tbl_user.tAddress,
                tbl_user.dLastUpDate,
                tbl_user.fProfilePic,
                tbl_user_type.vAccTypeName');
            $this->db->from('tbl_user');
            $this->db->join('tbl_user_type','tbl_user_type.id = tbl_user.iUserType');
            $this->db->where('tbl_user.id', $userid);
            $result = $this->db->get();

            if ($result->num_rows() > 0) {
            return $result->result_array();
            }
            return array();
        }

             public function save_profile_pic() {

                $fProfilePic = $this->input->post('fProfilePic', TRUE);
                $uploadpath = $this->input->post('uploadpath', TRUE);
                $uUserID = $this->session->userdata('paddy_userbackendsession');
                
                $dte=date("ymdHms");

                    
                $insArrCusE=array();
                $field_name="fProfilePic";

                //if($_FILES[$field_name]['name']!='') {                
                    $fileSaveName=$dte.$_FILES['fProfilePic']['name'];                      
                    $uppth2=$uploadpath."/".$fileSaveName;  
                    copy ($_FILES['fProfilePic']['tmp_name'], $uppth2);
                    
                    //exit();
                    
                    $insArrCusE[$field_name]=$fileSaveName;                  
                //}
                //echo $mid; exit();
                $this->db->trans_start();
                $this->db->where('id', $uUserID);
                $this->db->update('tbl_user', $insArrCusE);
                $this->db->trans_complete();
                    
                if ($this->db->trans_status() === FALSE) {
                    return 0;
                } else {
                    return 1;
                }  
            }

                public function update_password_data() {

                    $uUserID = $this->session->userdata('paddy_userbackendsession');
                    
                    $this->db->select('pPassword');
                    $this->db->where('id', $uUserID);
                    $query = $this->db->get('tbl_user');
                    $row = $query->row();
                    $currentPW = $row->pPassword;
                    

                    $newpw = hash('sha256', $this->input->post('pPassword', TRUE));//md5($this->input->post('pPassword', TRUE));
                    $currentPW2 = hash('sha256', $this->input->post('pPasswordold', TRUE));//md5($this->input->post('pPasswordold', TRUE));

                    if ($currentPW == $currentPW2) {
                        $data = array();
                        $data['pPassword'] = $newpw;

                        $query = $this->db->update('tbl_user', $data, "id = $uUserID");
                        if ($query) {
                            return 'SS';
                        } else {
                            return 'FA';
                        }
                    } else {
                        return 'NM';
                    }
                }

}

?>
