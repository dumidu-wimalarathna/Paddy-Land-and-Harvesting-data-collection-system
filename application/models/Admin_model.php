<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {

    
    public function get_user() {

        $this->db->select('tbl_user.id,tbl_user.vFirstName,tbl_user.vUserName,tbl_user.vLastName,tbl_user.cEnable,tbl_user.vContactNo,tbl_user.vEmail,tbl_user.iUserType,tbl_user_type.vAccTypeName');
        $this->db->from('tbl_user');
        $this->db->join('tbl_user_type', 'tbl_user.iUserType = tbl_user_type.id');

        $iUserType = $this->session->userdata('paddy_iUserTypeBackendsession');
        if ($iUserType != 1) {
            $this->db->where('tbl_user.iUserType !=', 1);
        }
        /* $iUserproperty = $this->session->userdata('iUserproperty');
          if ($iUserproperty != '') {
          $this->db->where('tbl_user_type.iPropID', $iUserproperty);
          } */
        $this->db->order_by("tbl_user.vFirstName", "ASC");
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        }
        return array();

        /*
          $this->db->order_by("vFirstName", "ASC");
          $result = $this->db->get('tbl_user');

          if ($result->num_rows() > 0) {
          return $result->result();
          }
          return array(); */
    }

    public function get_edit_user($recID, $table_name) {

        $this->db->from($table_name);
        $this->db->where('id', $recID);
        //$this->db->order_by('dDate', "Desc");
        //$this->db->limit('3');
        $query = $this->db->get();
        // echo $this->db->last_query();
        //exit();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }

    public function get_user_types() {

        $iUserType = $this->session->userdata('paddy_iUserTypeBackendsession');
        if ($iUserType != 1) {
            $this->db->where('id !=', 1);
        }

        $this->db->order_by("id", "ASC");
        $result = $this->db->get('tbl_user_type');


        if ($result->num_rows() > 0) {
            return $result->result();
        }
        return array();
    }


    public function save_user($save_status, $recID) {

        $resetType = $this->input->post('resetType', TRUE);
        $vUserName = $this->input->post('vUserName', TRUE);
        $vFirstName = $this->input->post('vFirstName', TRUE);
                
        $this->db->select('vUserName');
        $this->db->where('vUserName', $vUserName);
        $this->db->where('id !=', $recID);
        $query = $this->db->get('tbl_user');
        $row = $query->row();
        if(isset($row)){
            return 'AV';
        }
            
        $data = array(
            'vTitle' => $this->input->post('vTitle', TRUE),
            'vUserName' => $this->input->post('vUserName', TRUE),
            'vFirstName' => $this->input->post('vFirstName', TRUE),
            'vLastName' => $this->input->post('vLastName', TRUE),
            'vEmail' => $this->input->post('vEmail', TRUE),
            'pPassword' => hash('sha256', $this->input->post('pPassword', TRUE)),//sha1($this->input->post('pPassword', TRUE)),
            'vContactNo' => $this->input->post('vContactNo', TRUE),
            'iUserType' => $this->input->post('iUserType', TRUE),
            'tAddress' => $this->input->post('tAddress', TRUE),
            'dRegDate' => date('Y-m-d H:i:s'),
            'dLastUpDate' => date('Y-m-d H:i:s'),
            'cEnable' => $this->input->post('cEnable', TRUE),

        );

        $data4 = array(
            'vFirstName' => $this->input->post('vFirstName', TRUE),
            'vLastName' => $this->input->post('vLastName', TRUE),
            'vTitle' => $this->input->post('vTitle', TRUE),
            'vEmail' => $this->input->post('vEmail', TRUE),
            'vContactNo' => $this->input->post('vContactNo', TRUE),
            'tAddress' => $this->input->post('tAddress', TRUE),
            'iUserType' => $this->input->post('iUserType', TRUE),
            'dLastUpDate' => date('Y-m-d H:i:s'),
            'tAddress' => $this->input->post('tAddress', TRUE),
            'cEnable' => $this->input->post('cEnable', TRUE),

        );
        $this->db->trans_start();
        if ($save_status === 'A') {
            
            $this->db->insert('tbl_user', $data);
            $insert_id = $this->db->insert_id();

        } else {
            if ($resetType == 'Y') {
                $data4['pPassword'] =  hash('sha256', $this->input->post('pPassword', TRUE));
                $data4['vUserName'] = $this->input->post('vUserName', TRUE);
            } 

            $this->db->where('id', $recID);
            $this->db->update('tbl_user', $data4);

        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return 'FA';
        } else {
            return 'TR';
        }
    }

    public function active_record($recID, $tblName) {

        $data = array(
            'cEnable' => 'Y'
        );

        $this->db->trans_start();
        $this->db->where('id', $recID);
        $this->db->update($tblName, $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('message', 'Request faild.');
            return false;
        } else {
            $this->session->set_flashdata('message', 'Data successfully activated.');
            return true;
        }
    }

    public function deactive_record($recID, $tblName) {

        $data = array(
            'cEnable' => 'N'
        );

        $this->db->trans_start();
        $this->db->where('id', $recID);
        $this->db->update($tblName, $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('message', 'Request faild.');
            return false;
        } else {
            $this->session->set_flashdata('message', 'Data successfully deactivated.');
            return true;
        }
    }

    public function delete_record($colid,$recID, $tblName) {

        $this->db->trans_start();

        $this->db->where("$colid", $recID);
        $this->db->delete($tblName);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('message', 'Data delete faild.');
            return false;
        } else {
            $this->session->set_flashdata('message', 'Data successfully deleted.');
            return true;
        }
    }

 

}

?>