<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->model('Auth_model');

        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('post/index');
        }
    }

    function index() {



        $user_id = $this->session->userdata('user_id');
        $data['contact'] = $this->Dashboard_model->get_userprofile_edit($user_id);

        $data['groups'] = $this->Dashboard_model->groups($user_id);
        $data['phonenumber'] = $this->Dashboard_model->phonenumber($user_id);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/side_menu');
        $this->load->view('homes/dashboard');
        $this->load->view('includes/footer');
    }

    public function list_groups() {
        $user_id = $this->session->userdata('user_id'); // Get the logged-in user's ID

        $data['contact'] = $this->Dashboard_model->get_userprofile_edit($user_id);

        $data['groups'] = $this->Dashboard_model->get_groups_by_user($user_id);

        $this->load->view('includes/header', $data);
        $this->load->view('includes/side_menu');
        $this->load->view('homes/list_groups');

        $this->load->view('includes/footer');
    }

    public function add_groups_all() {


        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('homes/add_group');

        $this->load->view('includes/footer');
    }

    function groupSave() {

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Retrieve input
            $group_name = $this->input->post('group_name', true);

            // Validate input
            if (empty($group_name) || strlen($group_name) > 255) {
                $this->session->set_flashdata('error', 'Group name is required and must be less than 255 characters.');
                redirect('dashboard/add_groups_all');
                return;
            }

            // Retrieve user_id from session
            $user_id = $this->session->userdata('user_id');
            if (!$user_id) {
                $this->session->set_flashdata('error', 'User not logged in.');
                redirect('login');
                return;
            }

            // Prepare data
            $data = [
                'group_name' => trim($group_name),
                'user_id' => $user_id // Add user ID to the data
            ];

            // Insert into database
            if ($this->Dashboard_model->add_groups($data)) {
                $this->session->set_flashdata('success', 'Group added successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to add group. Please try again.');
            }

            // Redirect to list groups
            redirect('dashboard/list_groups');
        }
    }

    // Edit Group - Display Form
    public function edit_group($id) {
        $user_id = $this->session->userdata('user_id');
        $data['contact'] = $this->Dashboard_model->get_userprofile_edit($user_id);

        $data['group'] = $this->Dashboard_model->get_group($id);
        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('homes/edit_group', $data);

        $this->load->view('includes/footer');
    }

    // Update Group
    public function update_group() {
        $id = $this->input->post('id');
        $group_name = $this->input->post('group_name');

        $this->Dashboard_model->update_group($id, $group_name);
        redirect('Dashboard/list_groups');
    }

    // Delete Group
    public function delete_group($group_id) {

        $user_id = $this->session->userdata('user_id'); // Get the logged-in user's ID
        $this->Dashboard_model->delete_group($group_id, $user_id);
        $this->session->set_flashdata('success', 'Group deleted successfully.');
        redirect('Dashboard/list_groups');
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


        $data['contact'] = $this->Dashboard_model->get_userprofile_edit($user_id);

        $data['contacts'] = $this->Dashboard_model->get_all_contacts($user_id);

        $this->load->view('includes/header', $data);
        $this->load->view('includes/side_menu');
        $this->load->view('homes/list_contacts');

        $this->load->view('includes/footer');
    }

    public function add_contacts_all() {
        $user_id = $this->session->userdata('user_id');
        $data['contact'] = $this->Dashboard_model->get_userprofile_edit($user_id);

        $this->load->view('includes/header', $data);
        $this->load->view('includes/side_menu');
        $this->load->view('homes/add_contact',);

        $this->load->view('includes/footer');
    }

    function contactSave() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $name = $this->input->post('name', true);
            $phone = $this->input->post('phone', true);
            $emailaddress = $this->input->post('emailaddress', true);
            $array = $this->input->post('language');

            $language = array();
            if (!empty($array)) {
                foreach ($array as $key => $value) {
                    $language[] = (int) $value;
                }
            }

            $language = implode(',', $language);

            $data = [
                'language' => $language,
                'name' => $name,
                'phone' => $phone,
                'emailaddress' => !empty($emailaddress) ? $emailaddress : null,
                'user_id' => $this->session->userdata('user_id')
            ];

            // Only validate the email if it is not empty
            if (!empty($emailaddress)) {
                $email_check = $this->Dashboard_model->emailValidation($emailaddress);
                if ($email_check > 0) {
                    // Pass error message to the view
                    $this->session->set_flashdata('alertify_error', 'Email already exists. Please use a different email.');
                    redirect('dashboard/add_contacts_all'); // Redirect back to the form page
                    return; // Stop further execution
                }
            }

            // Save contact data
            $this->Dashboard_model->add_contacts($data);
            redirect('dashboard/fetch_contacts');
        }
    }

    // Edit Contact - Display Form
    public function edit_contact($id) {
        $user_id = $this->session->userdata('user_id');
        $data['contact'] = $this->Dashboard_model->get_userprofile_edit($user_id);

        $data['contact_no'] = $this->Dashboard_model->get_contacts_edit($id);

        $this->load->view('includes/header', $data);
        $this->load->view('includes/side_menu');
        $this->load->view('homes/edit_contact');

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
        $emailaddress = $this->input->post('emailaddress');
        $user_id = $this->session->userdata('user_id'); // Assign user_id



        $this->Dashboard_model->update_contact($id, $language, $name, $phone, $emailaddress, $user_id);

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
        $user_id = $this->session->userdata('user_id'); // Get the logged-in user's ID

        $data['contact'] = $this->Dashboard_model->get_userprofile_edit($user_id);
        $data['groups'] = $this->Dashboard_model->get_groups_by_user($user_id);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/side_menu');
        $this->load->view('homes/import_contacts');

        $this->load->view('includes/footer');
    }

    public function handle_import_contacts() {

        $user_id = $this->session->userdata('user_id');

        $language = $this->input->post('sms_language');
        $group_id = $this->input->post('group_id');

        $csvFile = fopen($_FILES['fileex']['tmp_name'], 'r') or die("can't open file");

        fgetcsv($csvFile);

        $contacts = [];

        while (($line = fgetcsv($csvFile)) !== FALSE) {
        $emailaddress="";
            
            if(!empty($line[2])){
                
               $emailaddress =$line[2];
                
            }



            $insertd_ids = $this->Dashboard_model->insert_contacts_batch($language, $line[0], $line[1],$emailaddress, $user_id);
            $this->Dashboard_model->insert_grupAssigncontact( $insertd_ids, $group_id, $user_id);
            $ids[] = $insertd_ids;
        }
        $ids_list = implode(', ', $ids);
      
    ///    echo $ids_list;die;

        $this->Dashboard_model->insert_Assigncontact($ids_list, $group_id, $user_id);

        fclose($csvFile);

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
        
        $data["assignlist"] = $this->Dashboard_model->check_AssigncontactLIst($id,$user_id);

        $this->load->view('includes/header', $data);
        $this->load->view('includes/side_menu');
        $this->load->view('homes/edit_contactAssign');

        $this->load->view('includes/footer');
    }

    function AssingListtoGroup() {
        $user_id = $this->session->userdata('user_id');
        $ids_list = $this->input->post('ids');
        $group_id = $this->input->post('group_id');

        $list_array = explode(",", $ids_list);
        $result = sizeof($list_array);

        $this->Dashboard_model->delete_grupAssigncontact($group_id, $user_id);
        
         $results= $result-1;
        for ($x = 0; $x <= $results; $x++) {


            $this->Dashboard_model->insert_grupAssigncontact($list_array[$x], $group_id, $user_id);
        }


        $listcheck = $this->Dashboard_model->check_Assigncontact($group_id, $user_id);

        if (!empty($listcheck)) {


            $this->Dashboard_model->update_Assigncontact($ids_list, $group_id, $user_id);
            echo "" . $result;
        } else {



            $this->Dashboard_model->insert_Assigncontact($ids_list, $group_id, $user_id);
            echo "" . $result;
        }
    }

    function profile() {
        $user_id = $this->session->userdata('user_id');
        $data['contact'] = $this->Dashboard_model->get_userprofile_edit($user_id);

        $this->load->view('includes/header', $data);
        $this->load->view('includes/side_menu');
        $this->load->view('homes/edit_profile');

        $this->load->view('includes/footer');
    }

    function profileUpdate() {
        $user_id = $this->session->userdata('user_id');

        $full_name = $this->input->post('full_name');
        $company_name = $this->input->post('company_name');
        $company_address = $this->input->post('company_address');
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');
        $profile_pic_old = $this->input->post('profile_pic_old');

        $filename = uniqid() . '-' . time();
        $extension = pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION);
        $image = $filename . '.' . $extension;
        $new_file_name = basename($image);
        $target = "profile/" . basename($new_file_name);

        if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target)) {



            $profile_pic_get = $new_file_name;
        } else {
            $profile_pic_get = $profile_pic_old;
        }



        if (!empty($password)) {

            $password_status = md5($password);
        } else {
            $password_status = $this->input->post('old_password');
        }



        $data = [
            'full_name' => $full_name,
            'company_name' => $company_name,
            'company_address' => $company_address,
            'phone' => $phone,
            'password' => $password_status,
            'profile_pic' => $profile_pic_get,
        ];

        $this->Auth_model->update_profile($user_id, $data);

        redirect('dashboard/profile');
    }

    function cehckPhone() {
        $user_id = $this->session->userdata('user_id');
        $phone = $this->input->post('phone');
        $phone_cal = $this->Dashboard_model->phonenumberValidation($phone, $user_id);
        echo $phone_cal;
        //  echo $phone_cal;
    }

    function cehckPhoneAdmin() {
        $user_id = $this->session->userdata('user_id');
        $phone = $this->input->post('phone');
        $phone_cal = $this->Dashboard_model->phonenumberValidationadmin($phone, $user_id);
        echo $phone_cal;
        //  echo $phone_cal;
    }

    function checkEmail() {

        $email = $this->input->post('emailaddress'); // Get the email from the request
        $email_check = $this->Dashboard_model->emailValidation($emai); // Call the model function
        if ($email_check > 0) {
            $this->session->set_flashdata('error', 'Email already exists. Please use a different email.'); // Email is duplicate
        } else {
            $this->session->set_flashdata('success', 'Email is available');
        }
    }

    function searchAll() {
        $user_id = $this->session->userdata('user_id');

        $query = $this->input->post('query');

        $output = '';

        $list = $this->Dashboard_model->get_contacts_by_auto($query, $user_id);

        $output = '<ul class="list-unstyled" style=" z-index: 1 !important;">';
        if (!empty(($list))) {
            foreach ($list as $item)
                if ($item['user_id'] == $user_id) { {
                        echo '<li id="list_s">' . $item['name'] . '-' . $item['phone'] . '</li>';
                    }
                }
        } else {
            $output .= '<li  id="list_s">Contact Not Found</li>';
        }
        $output .= '</ul>';

        echo $output;
    }

    function ListOnContact() {


        $user_id = $this->session->userdata('user_id'); 
        $data['contact'] = $this->Dashboard_model->get_userprofile_edit($user_id);
        $data['contacts'] = $this->Dashboard_model->get_all_contacts($user_id);
       $data['groups'] = $this->Dashboard_model->get_groups_by_user($user_id);

        $this->load->view('includes/header', $data);
        $this->load->view('includes/side_menu');
        $this->load->view('homes/list_contactswithgroup');

        $this->load->view('includes/footer');
    }

    public function show_log_reports() {

  
    $user_id = $this->session->userdata('user_id');

    if ($user_id) {
        $data['logs'] = $this->Dashboard_model->get_log_reports($user_id);;
        $this->load->view('includes/header', $data);
        $this->load->view('includes/side_menu');
        $this->load->view('homes/log_report', $data);
        $this->load->view('includes/footer');
    }
}
    



}
