<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function get_groups_by_user($user_id) {
        $this->db->where('user_id', $user_id);
        return $this->db->get('groups')->result_array();
    }

    public function get_contacts_by_user($group_id, $user_id) {
        $this->db->where('group_id', $group_id);
        $this->db->where('user_id', $user_id);
        return $this->db->get('contacts')->result_array();
    }

    // Get a single group
    public function get_group($id) {
        return $this->db->get_where('groups', ['id' => $id])->row_array();
    }

    // Add a new group
    public function add_group($data) {
        return $this->db->insert('groups', $data);
    }

    // Update a group
    public function update_group($id, $name) {

        $data = array('group_name' => $name);

        $this->db->where('id', $id);
        $this->db->update('groups', $data);
    }

    public function delete_group($group_id, $user_id) {
        $this->db->where('id', $group_id);
        $this->db->where('user_id', $user_id);
        $this->db->delete('groups');
    }

    // Get a single contact
    public function get_contacts_edit($id) {
        return $this->db->get_where('contacts', ['id' => $id])->row_array();
    }

    public function get_userprofile_edit($id) {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function get_contact($contact_id) {
        $this->db->select('group_id');
        $this->db->from('contacts');
        $this->db->where('id', $contact_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        }

        return null;
    }

    // Add a new contact
    public function add_contact($data) {
        return $this->db->insert('contacts', $data);
    }

    // Update a contact
    public function update_contact($id, $language, $name, $phone, $emailaddress, $user_id) {

        $data = array('language' => $language, 'name' => $name, 'phone' => $phone, 'emailaddress' => $emailaddress, 'user_id' => $user_id);

        $this->db->where('id', $id);
        $this->db->update('contacts', $data);
    }

    public function delete_contact($contact_id, $user_id) {
        $this->db->where('id', $contact_id);
        $this->db->where('user_id', $user_id);
        $this->db->delete('contacts');
    }

    // Method to check if a phone number already exists for the logged-in user
    public function is_duplicate_phone($phone, $user_id) {
        $this->db->where('phone', $phone);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('contacts');

        return $query->num_rows() > 0;
    }

    public function is_phone_exists($phone) {
        $this->db->where('phone', $phone);
        $query = $this->db->get('contacts');
        return $query->num_rows() > 0;
    }

// public function get_all_groups()
// {
//    
//     return $this->db->get('groups')->result_array();
// }

    public function get_group_by_id($id) {
        return $this->db->get_where('groups', ['id' => $id])->row_array();
    }

    public function add_groups($data) {
        if ($this->db->insert('groups', $data)) {
            return $this->db->insert_id(); // Return the inserted ID if needed
        }
        return false; // Return false if the insert fails
    }

    public function get_all_contacts($user_id) {

        $this->db->where('user_id', $user_id);
        return $this->db->get('contacts')->result_array();
    }

    public function add_contacts($data) {
        // Insert contact data into the database
        if ($this->db->insert('contacts', $data)) {
            return true; // Return true if insertion was successful
        }
        return false; // Return false if insertion failed
    }

    public function insert_contacts_batch($language,$name,$phone, $emailaddress,$user_id) {


        $data = array('language' => $language,
             'group_id' => null, 
            'name' => $name, 
            'phone' => $phone, 
            'emailaddress' => $emailaddress, 
            'user_id' => $user_id);

   
        $this->db->insert('contacts', $data);
        return $this->db->insert_id();
    }

    function check_Assigncontact($ids, $user_id) {

        $this->db->where('group_id', $ids);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('assign_group');

        return $query->num_rows() > 0;
    }
    
    
    
    function check_AssigncontactLIst($ids, $user_id) {

        $this->db->where('group_id', $ids);
        $this->db->where('user_id', $user_id);
        
        
             $query = $this->db->get('assign_group');
        return $query->result();

        
   
    }

    public function insert_Assigncontact($ids, $group_id, $user_id) {

        $data = array('conatct_list' => $ids, 'group_id' => $group_id, 'user_id' => $user_id);

        return $this->db->insert('assign_group', $data);
    }

    public function update_Assigncontact($ids, $group_id, $user_id) {

        $data = array('conatct_list' => $ids, 'user_id' => $user_id);

        $this->db->where('group_id', $group_id);
        $this->db->update('assign_group', $data);
    }
    
    
     public function insert_grupAssigncontact($ids, $group_id, $user_id) {

        $data = array('contacts_id' => $ids, 'group_id' => $group_id, 'user_id' => $user_id);

        return $this->db->insert('contacts_with_group', $data);
    }
    
     public function delete_grupAssigncontact($group_id, $user_id) {
        $this->db->where('group_id', $group_id);
        $this->db->where('user_id', $user_id);
        $this->db->delete('contacts_with_group');
    }

    
    
    

    public function get_sendItem_by_user($user_id) {

        $this->db->join('groups g', 'g.id =sms_list.group_id', 'left');
        $this->db->where('sms_list.user_id', $user_id);
        return $this->db->get('sms_list')->result_array();
    }

    public function get_sendydpate_by_user($id, $user_id) {

        

        $this->db->where('sms_list_id', $id);
        $this->db->where('user_id', $user_id);
        return $this->db->get('sms_list')->result_array();
    }

    public function get_Msgsend($id, $user_id) {

        $data = array('send_status' => 1);

        $this->db->where('sms_list_id', $id);
        $this->db->where('user_id', $user_id);
        $this->db->update('sms_list', $data);
    }

    public function add_smsdesign($data) {
        if ($this->db->insert('sms_list', $data)) {
            return $this->db->insert_id(); // Return the inserted ID if needed
        }
        return false; // Return false if the insert fails
    }

    public function update_groupText($id, $data) {



        $this->db->where('sms_list_id', $id);
        $this->db->update('sms_list', $data);
    }

    public function delete_groupText($group_id, $user_id) {
        $this->db->where('sms_list_id', $group_id);
        $this->db->where('user_id', $user_id);
        $this->db->delete('sms_list');
    }

    function get_assingGroup($group_id, $user_id) {

        if($group_id==0){

     
        $this->db->where('user_id', $user_id);

        return $this->db->get('assign_group')->result_array();

        }else{

            $this->db->where('group_id', $group_id);
            $this->db->where('user_id', $user_id);
    
            return $this->db->get('assign_group')->result_array();

        }


    }

    function get_contactwithLanguage($conatct_list) {


        $this->db->where('id in(' . $conatct_list . ')');
        //  $this->db->where('user_id', $user_id);

        return $this->db->get('contacts')->result_array();
    }

    function groups($user_id) {
        //   $query = $this->db->query('SELECT * FROM groups');
        //  $result =$query->num_rows();

        $this->db->where('user_id', $user_id);
        $result = $this->db->get('groups')->num_rows();

        return $result;
    }

    function phonenumber($user_id) {


        $this->db->where('user_id', $user_id);
        $result = $this->db->get('contacts')->num_rows();

        return $result;
    }

    function phonenumberValidation($phone,$user_id) {

  $this->db->where('user_id', $user_id);
        $this->db->where('phone', $phone);
        $result = $this->db->get('contacts')->num_rows();

        return $result;
    }

    function phonenumberValidationadmin($phone,$user_id) {

  $this->db->where('user_id', $user_id);
        $this->db->where('phone', $phone);
        $result = $this->db->get('users')->num_rows();

        return $result;
    }


    public function emailValidation($email) {
        $this->db->where('emailaddress', $email);
        $result = $this->db->get('contacts')->num_rows();
        return $result;
    }

    public function get_contacts_by_auto($query, $user_id) {

     $this->db->where("name LIKE '%".$query."%' OR phone LIKE '%".$query."%' ");
     $this->db->where('user_id', $user_id);
       return $this->db->get('contacts')->result_array();
    }
     function phonenumberGroup($user_id) {

          $this->db->join('groups g', 'g.id =assign_group.group_id', 'left');
        $this->db->where('assign_group.user_id', $user_id);
         return $this->db->get('assign_group')->result_array();
         
       
        
      
    }
    public function insert_log_report($data) {
        $this->db->insert('log_report', $data);
    }
    

    public function get_log_reports($id) {
        $this->db->select('*');
        $this->db->from('log_report');
        $this->db->join('groups gid', 'gid.id = log_report.group_id');
        $this->db->join('contacts', 'contacts.id = log_report.contact_id'); 
        $this->db->where('log_report.user_id', $id);
        
        $query = $this->db->get();
        return $query->result_array();


        
    }

    
//     public function get_log_reports($id) {
//     $this->db->select('log_report.*, gid.group_name, contacts.phone_number'); // Add columns you want to retrieve
//     $this->db->from('log_report');
//     $this->db->join('groups gid', 'gid.id = log_report.group_id'); // Join with groups table
//     $this->db->join('contacts', 'contacts.id = log_report.contact_id'); // Join with contacts table
//     $this->db->where('log_report.user_id', $id);
    
//     $query = $this->db->get();
//     return $query->result_array();
// }

    
}




