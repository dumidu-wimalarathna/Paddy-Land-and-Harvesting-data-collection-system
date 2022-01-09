<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Masterdata_model extends CI_Model {


    public function get_all_details($table_name,$field,$order) {

        $this->db->from($table_name);
        $this->db->order_by($field, $order);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }

    public function save_province($save_status,$recID){
        
        $data = array(
            'province_name' => $this->input->post('province_name', TRUE),
            'status' => "Y"
        );

        $this->db->trans_start(); 
        
        if($save_status=='A'){
            $this->db->insert('province', $data);   
        }else{
            $this->db->where('ID', $recID);
            $this->db->update('province', $data);
        }  
               
        $this->db->trans_complete();       

        if ($this->db->trans_status() === FALSE) {
            return false;
        } else {
            return true;
        }
        
    }

    public function save_season($save_status,$recID){
        
        $data = array(
            'season_name' => $this->input->post('season_name', TRUE),
            'status' => "Y"
        );

        $this->db->trans_start(); 
        
        if($save_status=='A'){
            $this->db->insert('season', $data);   
        }else{
            $this->db->where('ID', $recID);
            $this->db->update('season', $data);
        }
               
        $this->db->trans_complete();       

        if ($this->db->trans_status() === FALSE) {
            return false;
        } else {
            return true;
        }
        
    }

    public function save_district($save_status,$recID){
        
        $data = array(
            'district_name' => $this->input->post('district_name', TRUE),
            'province_ID' => $this->input->post('province_ID', TRUE),
            'status' => "Y"
        );

        $this->db->trans_start(); 
        
        if($save_status=='A'){
            $this->db->insert('district', $data);   
        }else{
            $this->db->where('ID', $recID);
            $this->db->update('district', $data);
        }
               
        $this->db->trans_complete();       

        if ($this->db->trans_status() === FALSE) {
            return false;
        } else {
            return true;
        }
        
    }

    public function save_city($save_status,$recID){
        
        $data = array(
            'city_name' => $this->input->post('city_name', TRUE),
            'district_ID' => $this->input->post('district_ID', TRUE),
            'status' => "Y"
        );

        $this->db->trans_start(); 
        
        if($save_status=='A'){
            $this->db->insert('city', $data);   
        }else{
            $this->db->where('ID', $recID);
            $this->db->update('city', $data);
        }
               
        $this->db->trans_complete();       

        if ($this->db->trans_status() === FALSE) {
            return false;
        } else {
            return true;
        }
        
    }

    public function save_paddy_type($save_status,$recID){
        
        $data = array(
            'paddy_type_name' => $this->input->post('paddy_type_name', TRUE),
            'status' => "Y"
        );

        $this->db->trans_start(); 
        
        if($save_status=='A'){
            $this->db->insert('paddy_type', $data);   
        }else{
            $this->db->where('ID', $recID);
            $this->db->update('paddy_type', $data);
        }  
               
        $this->db->trans_complete();       

        if ($this->db->trans_status() === FALSE) {
            return false;
        } else {
            return true;
        }
        
    }

     public function get_edit_data($recID, $table_name) {

        $this->db->from($table_name);
        $this->db->where('ID', $recID);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }

    public function delete_record($colid,$recID, $tblName) {

        $this->db->trans_start();

        $this->db->where("$colid", $recID);
        $this->db->delete($tblName);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('message_error', 'Data delete faild.');
            return false;
        } else {
            $this->session->set_flashdata('message_error', 'Data successfully deleted.');
            return true;
        }
    }

       public function active_record($recID, $tblName) {

        $data = array(
            'status' => 'Y'
        );

        $this->db->trans_start();
        $this->db->where('ID', $recID);
        $this->db->update($tblName, $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('message_error', 'Request faild.');
            return false;
        } else {
            $this->session->set_flashdata('message_saved', 'Data successfully activated.');
            return true;
        }
    }

    public function deactive_record($recID, $tblName) {

        $data = array(
            'status' => 'N'
        );

        $this->db->trans_start();
        $this->db->where('ID', $recID);
        $this->db->update($tblName, $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('message_error', 'Request faild.');
            return false;
        } else {
            $this->session->set_flashdata('message_saved', 'Data successfully deactivated.');
            return true;
        }
    }

    public function populate_dropdown($table_name, $select_field_one, $select_field_two, $order_by) {

        $this->db->select($select_field_one);
        $this->db->select($select_field_two);
        $this->db->where('status', 'Y');
        $this->db->order_by($select_field_two, $order_by);

        $query = $this->db->get($table_name);
         // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result();
        }

    }

}

?>