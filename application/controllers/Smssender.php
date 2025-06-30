<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Smssender extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model');

        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('post/index');
        }
    }

    function index() {


        $user_id = $this->session->userdata('user_id'); // Get the logged-in user's ID
        $data['groups'] = $this->Dashboard_model->get_sendItem_by_user($user_id);
        $data['contact'] = $this->Dashboard_model->get_userprofile_edit($user_id);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/side_menu');
        $this->load->view('homes/list_send');

        $this->load->view('includes/footer');
    }

    public function add_list_all() {
        $user_id = $this->session->userdata('user_id');
        $data['groups'] = $this->Dashboard_model->get_groups_by_user($user_id);

        $data['contact'] = $this->Dashboard_model->get_userprofile_edit($user_id);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/side_menu');
        $this->load->view('homes/add_list_all');

        $this->load->view('includes/footer');
    }

    public function sendIndividually() {
        $user_id = $this->session->userdata('user_id');
        
        $data['contact'] = $this->Dashboard_model->get_userprofile_edit($user_id);
        $data['groups'] = $this->Dashboard_model->get_groups_by_user($user_id);
        $data['contacts'] = $this->Dashboard_model->get_all_contacts($user_id);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/side_menu');
        $this->load->view('homes/add_sms');

        $this->load->view('includes/footer');
    }

    public function sendMessage() {
        $user_id = $this->session->userdata('user_id');
        
        $data['contact'] = $this->Dashboard_model->get_userprofile_edit($user_id);
        $data['groups'] = $this->Dashboard_model->get_groups_by_user($user_id);
        $data['contacts'] = $this->Dashboard_model->get_all_contacts($user_id);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/side_menu');
        $this->load->view('homes/add_sms_message');

        $this->load->view('includes/footer');
    }

    function groupSave() {

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Retrieve input
            $group_id = $this->input->post('group_id', true);
            $sms_title = $this->input->post('sms_title');
            $sms_language = $this->input->post('sms_language', true);
            $sms_message = $this->input->post('sms_message');
            $user_id = $this->session->userdata('user_id');

            $data = [
                'group_id' => $group_id,
                'sms_language' => $sms_language,
                'sms_title' => $sms_title,
                'sms_message' => $sms_message,
                'user_id' => $user_id,
                'send_status' => 0,
            ];

            $this->Dashboard_model->add_smsdesign($data);
            // // Redirect to list groups
            redirect('Smssender');
        }
    }

    // Edit Group - Display Form
    public function edit_groupText($id) {
        $user_id = $this->session->userdata('user_id');
        $data['text'] = $this->Dashboard_model->get_sendydpate_by_user($id, $user_id);
        $data['contact'] = $this->Dashboard_model->get_userprofile_edit($user_id);
        $data['groups'] = $this->Dashboard_model->get_groups_by_user($user_id);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/side_menu');
        $this->load->view('homes/update_list_all');

        $this->load->view('includes/footer');
    }

    // Update Group
    public function update_groupText() {

        $sms_list_id = $this->input->post('sms_list_id', true);
        $group_id = $this->input->post('group_id', true);
        $sms_title = $this->input->post('sms_title');
        $sms_language = $this->input->post('sms_language', true);
        $sms_message = $this->input->post('sms_message');
        $user_id = $this->session->userdata('user_id');

        $data = [
            'group_id' => $group_id,
            'sms_language' => $sms_language,
            'sms_title' => $sms_title,
            'sms_message' => $sms_message,
            'user_id' => $user_id,
            'send_status' => 0,
        ];

        $this->Dashboard_model->update_groupText($sms_list_id, $data);
        redirect('Smssender');
    }

    // Delete Group
    public function delete_group($sms_list_id) {

        $user_id = $this->session->userdata('user_id'); // Get the logged-in user's ID
        $this->Dashboard_model->delete_groupText($sms_list_id, $user_id);
        $this->session->set_flashdata('success', 'Group deleted successfully.');
        redirect('Smssender');
    }

    public function view_group($group_id) {

        $user_id = $this->session->userdata('user_id'); // Get logged-in user ID
        $data['contacts'] = $this->Dashboard_model->get_contacts_by_user($group_id, $user_id);
        $data['group_id'] = $group_id;
        $this->load->view('homes/group_contacts', $data);
    }

    public function view_g() {

        $user_id = $this->session->userdata('user_id'); // Get logged-in user ID
        $data['contacts'] = $this->Dashboard_model->get_contacts_by_user($group_id, $user_id);
        $data['group_id'] = $group_id;
        $this->load->view('homes/group_contacts', $data);
    }

    public function fetch_contacts() {



        $user_id = $this->session->userdata('user_id'); // Get the logged-in user's ID
        $data['contacts'] = $this->Dashboard_model->get_all_contacts($user_id);

        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('homes/list_contacts', $data);

        $this->load->view('includes/footer');
    }

    public function add_contacts_all() {


        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('homes/add_contact',);

        $this->load->view('includes/footer');
    }

    function contactSave() {



        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            $name = $this->input->post('name', true);
            $phone = $this->input->post('phone', true);

            $array = $this->input->post('language');

            $language = array();
            foreach ($array as $key => $value) {
                $language[] = (int) $value;
            }

            $language = implode(',', $language);

            $data = [
                'language' => $language,
                'name' => $name,
                'phone' => $phone,
                'user_id' => $this->session->userdata('user_id') // Assign user_id
            ];

            $this->Dashboard_model->add_contacts($data);

            redirect('dashboard/fetch_contacts');
        }
    }

    // Edit Contact - Display Form
    public function edit_contact($id) {
        $data['contact'] = $this->Dashboard_model->get_contacts_edit($id);

        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('homes/edit_contact', $data);

        $this->load->view('includes/footer');
    }

    // Update Contact
    public function update_contact() {


        $array = $this->input->post('language');

        $language = array();
        foreach ($array as $key => $value) {
            $language[] = (int) $value;
        }

        $language = implode(',', $language);

        // Fetch the updated data


        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $user_id = $this->session->userdata('user_id'); // Assign user_id



        $this->Dashboard_model->update_contact($id, $language, $name, $phone, $user_id);

        redirect('Dashboard/fetch_contacts');
    }

    // Delete Contact
    public function delete_contact($contact_id) {
        $user_id = $this->session->userdata('user_id');
        $contact = $this->Dashboard_model->get_contact($contact_id);

        if ($contact) {
            $group_id = $contact['group_id'];
            $this->Dashboard_model->delete_contact($contact_id, $user_id);
            $this->session->set_flashdata('success', 'Contact deleted successfully.');

            redirect('Dashboard/fetch_contacts');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete the contact. Please try again.');
            redirect('Dashboard/fetch_contacts');
        }
    }

    // import contacts
    public function import_contacts() {

        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('homes/import_contacts');

        $this->load->view('includes/footer');
    }

    public function handle_import_contacts() {

        $csvFile = fopen($_FILES['fileex']['tmp_name'], 'r') or die("can't open file");

        fgetcsv($csvFile);

        $contacts = [];

        while (($line = fgetcsv($csvFile)) !== FALSE) {
            $contacts[] = [
                'name' => $line[2],
                'phone' => $line[3],
                'user_id' => $this->session->userdata('user_id')
            ];
        }

        fclose($csvFile);

        $this->Dashboard_model->insert_contacts_batch($contacts);

        $this->session->set_flashdata('success', 'Contacts imported successfully.');
        redirect('dashboard/import_contacts');
    }

    function AssignGroup() {


        $user_id = $this->session->userdata('user_id'); // Get the logged-in user's ID
        $data['groups'] = $this->Dashboard_model->get_groups_by_user($user_id);

        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('homes/list_groupsAssigan', $data);

        $this->load->view('includes/footer');
    }

    function edit_contactAssign($id) {


        $user_id = $this->session->userdata('user_id'); // Get the logged-in user's ID
        $data['contacts'] = $this->Dashboard_model->get_all_contacts($user_id);

        $data["glist"] = $this->Dashboard_model->get_group($id);

        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('homes/edit_contactAssign', $data);

        $this->load->view('includes/footer');
    }

    function AssingListtoGroup() {
        $user_id = $this->session->userdata('user_id');
        $ids_list = $this->input->post('ids');
        $group_id = $this->input->post('group_id');

        $list_array = explode(",", $ids_list);
        $result = count($list_array);

        $listcheck = $this->Dashboard_model->check_Assigncontact($group_id, $user_id);

        if (!empty($listcheck)) {


            $this->Dashboard_model->update_Assigncontact($ids_list, $group_id, $user_id);
            echo "Add List " . $result;
        } else {



            $this->Dashboard_model->insert_Assigncontact($ids_list, $group_id, $user_id);
            echo "Add List " . $result;
        }
    }

    function sendtext_group($sms_list_id) {
        $user_id = $this->session->userdata('user_id'); // Get the logged-in user's ID
        $getalltext = $this->Dashboard_model->get_sendydpate_by_user($sms_list_id, $user_id);
        

    
       
       $message = $getalltext[0]['sms_message'];
       $sms_list_id = $getalltext[0]['sms_list_id'];




        $group_id = $getalltext[0]['group_id'];

        if($group_id==0){
            $getassigantext = $this->Dashboard_model->get_assingGroup($group_id, $user_id);

        }else{

            $getassigantext = $this->Dashboard_model->get_assingGroup($group_id, $user_id);

        }


  //   print_r($getassigantext);die;
     
        $language = array();
        foreach ($getassigantext as $list_con) {
            $language[] = $list_con['conatct_list'];
        }

        $list = implode(',', $language);




        $sms_language = $getalltext[0]['sms_language'];



        $sender = $this->Dashboard_model->get_contactwithLanguage($list);



if($sms_language==3){


    foreach ($sender as $senders) {


       
            $rec_contact_no = $senders['phone'];

            $this->send_sms($message, $rec_contact_no);
      
    }
    $getalltext = $this->Dashboard_model->get_Msgsend($sms_list_id, $user_id);

    }else{
        // print_r($sender);die;

        foreach ($sender as $senders) {
        $status = '0'; // Default status

            $select_list = json_decode("[" . $senders['language'] . "]");
            if (in_array($sms_language, $select_list)) {
                $rec_contact_no = $senders['phone'];

                $this->send_sms($message, $rec_contact_no);
                $status = '1'; // Update status if successful

                
            }

        // Retrieve the contact ID from the contacts table using the phone number
        $this->db->select('id');
        $this->db->from('contacts');
        $this->db->where('phone_number', $rec_contact_no);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $contact_id = $query->row()->id; // Retrieve the contact ID
        } else {
            $contact_id = null; // Handle the case where the contact does not exist
        }

        // Insert log into log_report table
        $log_data = array(
            'group_id' => 0, 
            'contact_id' => $contact_id, // Insert  the retrieved contact ID
            'sending_status' => $sending_status,
            'user_id' => $user_id
        );
            $this->Dashboard_model->insert_log_report($log_data);
        }

        $getalltext = $this->Dashboard_model->get_Msgsend($sms_list_id, $user_id);
      
    }



        redirect('Smssender');

    }

// function sendtext_group($sms_list_id) {
//     $user_id = $this->session->userdata('user_id'); // Get the logged-in user's ID
//     $getalltext = $this->Dashboard_model->get_sendydpate_by_user($sms_list_id, $user_id);

//     $message = $getalltext[0]['sms_message'];
//     $sms_list_id = $getalltext[0]['sms_list_id'];
//     $group_id = $getalltext[0]['group_id'];

//     if ($group_id == 0) {
//         $getassigantext = $this->Dashboard_model->get_assingGroup($group_id, $user_id);
//     } else {
//         $getassigantext = $this->Dashboard_model->get_assingGroup($group_id, $user_id);
//     }

//     $language = array();
//     foreach ($getassigantext as $list_con) {
//         $language[] = $list_con['conatct_list'];
//     }
//     $list = implode(',', $language);

//     $sms_language = $getalltext[0]['sms_language'];
//     $sender = $this->Dashboard_model->get_contactwithLanguage($list);

//     foreach ($sender as $senders) {
//         $rec_contact_no = $senders['phone'];
//         $status = '0'; // Default status

//         if ($sms_language == 3 || in_array($sms_language, json_decode("[" . $senders['language'] . "]"))) {
//             $this->send_sms($message, $rec_contact_no);
//             $status = '1'; // Update status if successful
//         }

//         // Insert log entry into log report table
//         $log_data = [
//             'user_id' => $user_id,
//             'phone_number' => $rec_contact_no,
            
//             'group_id' => $group_id
//         ];
//         $this->Dashboard_model->insert_log_report($log_data);
//     }

//     $getalltext = $this->Dashboard_model->get_Msgsend($sms_list_id, $user_id);
//     redirect('Smssender');
// }


    function send_sms($message, $rec_contact_no) {
        $user_id = $this->session->userdata('user_id');
        $contact = $this->Dashboard_model->get_userprofile_edit($user_id);
        $apiKey = $contact['apiKey'];
        $userID = $contact['userID'];
        $senderId = $contact['senderId'];


        
        $fullmsg= htmlspecialchars($message, ENT_COMPAT);

         
$safe_string =str_replace("'", "",  $fullmsg);


        if (!empty($apiKey) || !empty($userID) || !empty($senderId)) {

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "http://send.ozonedesk.com/api/v2/send.php");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,
                    "user_id={$userID}&api_key={$apiKey}&sender_id={$senderId}&to={$rec_contact_no}&message={$safe_string}");

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = curl_exec($ch);

            curl_close($ch);
        }
    }

    function send_sms_singal() {
        $user_id = $this->session->userdata('user_id');

       $contact = $this->Dashboard_model->get_userprofile_edit($user_id);

        $contact_no = $this->input->post('phone_number');
   
        
        
        $str = $contact_no;
$char =  "-";
$str = explode($char, $str);


$rec_contact_no= $str[1];
  
        
        $message = $this->input->post('sms_message');



        $fullmsg= htmlspecialchars($message, ENT_COMPAT);

         
$safe_string =str_replace("'", "",  $fullmsg);



        $apiKey = $contact['apiKey'];
        $userID = $contact['userID'];
        $senderId = $contact['senderId'];

        if (!empty($apiKey) || !empty($userID) || !empty($senderId)) {

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "http://send.ozonedesk.com/api/v2/send.php");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,
                    "user_id={$userID}&api_key={$apiKey}&sender_id={$senderId}&to={$rec_contact_no}&message={$safe_string}");

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = curl_exec($ch);

            curl_close($ch);
            // Determine the status based on the API response
        if ($server_output === "SUCCESS") {
            $sending_status = "1";
        } else {
            $sending_status = "0";
        }
        }

        // Retrieve the contact ID from the contacts table using the phone number
        $this->db->select('id');
        $this->db->from('contacts');
        $this->db->where('phone_number', $rec_contact_no);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $contact_id = $query->row()->id; // Retrieve the contact ID
        } else {
            $contact_id = null; // Handle the case where the contact does not exist
        }

        // Insert log into log_report table
        $log_data = array(
            'group_id' => 0, 
            'contact_id' => $contact_id, // Insert the retrieved contact ID
            'sending_status' => $sending_status,
            'user_id' => $user_id
        );
        $this->db->insert('log_report', $log_data);

                
        redirect('Smssender/sendMessage');

    }

  
    
}