<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Land_model extends CI_Model {


    public function get_all_details($table_name,$field,$order) {

        $this->db->from($table_name);
        $this->db->order_by($field, $order);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }

    public function get_land_datails_list($field,$order) {

        $this->db->select('land_owner.first_name,land_owner.last_name,paddy_land.*');
        $this->db->from('paddy_land');
        $this->db->join('land_owner', 'land_owner.ID = paddy_land.land_owner_ID');
        $this->db->order_by($field, $order);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }

    public function save_paddyland($save_status,$recID){
        
        $data = array(
            'land_name' => $this->input->post('land_name', TRUE),
            'land_extend' => $this->input->post('land_extend', TRUE),
            'land_owner_ID' => $this->input->post('land_owner_ID', TRUE),
            'status' => "Y"
        );

        $this->db->trans_start(); 
        
        if($save_status=='A'){
            $this->db->insert('paddy_land', $data);   
        }else{
            $this->db->where('ID', $recID);
            $this->db->update('paddy_land', $data);
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

    public function populate_dropdown($table_name, $select_field_one, $select_field_two, $select_field_three, $order_by) {

        $this->db->select($select_field_one);
        $this->db->select($select_field_two);
        $this->db->select($select_field_three);
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