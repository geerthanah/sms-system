<?php

class ReocdeService extends CI_Model {

    function count_catdeatils($user_id) {


        $this->db->select('*');
        $this->db->from('contacts_with_group');
       $this->db->join('contacts', 'contacts.id   = contacts_with_group.contacts_id');
       $this->db->join('groups', 'groups.id   = contacts_with_group.group_id');
        $this->db->where('contacts_with_group.user_id='.$user_id);
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

    function count_catdeatilsfind($group_id, $con_name,$serach_id,$user_id) {

        $this->db->select('*');
        $this->db->from('contacts_with_group');
        $this->db->join('contacts', 'contacts.id   = contacts_with_group.contacts_id');
        $this->db->join('groups', 'groups.id   = contacts_with_group.group_id');

        if ($group_id != '') {

            $this->db->where("groups.id =" . $group_id);
        }

        if ($con_name != '') {

            $this->db->where("contacts.id  =" . $con_name);
        }

         if ($serach_id != '') {

            $this->db->where("contacts.id  =" . $con_name);
        }
       
        
        $this->db->where('contacts_with_group.user_id='.$user_id);
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

    function db_catdeatils($group_id, $con_name,$serach_id, $user_id,$rowperpage, $row) {

        $this->db->select('*,groups.id as groupsid');
     
        $this->db->from('contacts_with_group');
        $this->db->join('contacts', 'contacts.id   = contacts_with_group.contacts_id');
         $this->db->join('groups', 'groups.id   = contacts_with_group.group_id');

        if ($group_id != '') {

            $this->db->where("groups.id =" . $group_id);
        }

        if ($con_name != '') {

            $this->db->where("contacts.id  =" . $con_name);
        }
        if ($serach_id != '') {

            $this->db->where("contacts.phone  LIKE '%".$serach_id."%'");
        }
        
 $this->db->where('contacts_with_group.user_id='.$user_id);
        $this->db->limit($rowperpage, $row);
        $query = $this->db->get();
        return $query->result();
    }
}
