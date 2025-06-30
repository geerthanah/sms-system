<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Validate admin login
    public function login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('admins'); // Ensure you have an `admins` table

        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }

    public function get_all_users()
    {
        $this->db->select('id,full_name, company_name, company_address, phone, email, apiKey, userID, senderId');
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function get_userprofile_edit($id)
     {
         return $this->db->get_where('users', ['id' => $id])->row_array();
     }

    public function delete_profile($contact_id) {
        $this->db->where('id', $contact_id);
        
        $this->db->delete('users');
    }
    
     public function update_profile($user_id, $data)
    {
      
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }
     public function get_useradmin_edit($id)
     {
         return $this->db->get_where('admins', ['id' => $id])->row_array();
     }
public function update_admin($user_id, $data)
    {
      
        $this->db->where('id', $user_id);
        return $this->db->update('admins', $data);
    }

    public function get_log_report() {
        $this->db->select('*');
        $this->db->from('log_report');
        $this->db->join('groups gid', 'gid.id = log_report.group_id');
        $this->db->join('contacts', 'contacts.id = log_report.contact_id'); 


        
        $query = $this->db->get();
        return $query->result_array();
    }
    
  

}



