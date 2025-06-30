<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AdminDash extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('session');

        if (!$this->session->userdata('userid')) {
            redirect('Admin');
        }
    }

    public function index() {


        $this->load->model('Auth_model');
        $data['users'] = $this->Admin_model->get_all_users();

        $this->load->view('admin_includes/header');
        $this->load->view('admin_includes/side_menu');
        $this->load->view('admin/admin_dashboard', $data);
        $this->load->view('admin_includes/footer');
    }

    function profile($user_id) {

        $data['contact'] = $this->Admin_model->get_userprofile_edit($user_id);

         $this->load->view('admin_includes/header', $data);
        $this->load->view('admin_includes/side_menu');
        $this->load->view('admin/edit_profile', $data);

      $this->load->view('admin_includes/footer');
    }

    function profileUpdate() {
        // $user_id = $this->session->userdata('userid'); 
        $id = $this->input->post('id');
        $full_name = $this->input->post('full_name');
        $company_name = $this->input->post('company_name');
        $company_address = $this->input->post('company_address');
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');

        $apiKey = $this->input->post('apiKey');
        $userID = $this->input->post('userID');
        $senderId = $this->input->post('senderId');

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
            'apiKey' => $apiKey,
            'userID' => $userID,
            'senderId' => $senderId,
        ];

        $this->Admin_model->update_profile($id, $data);

        redirect('AdminDash');
    }

    public function delete_contact($contact_id) {


        $this->Admin_model->delete_profile($contact_id);

        redirect('AdminDash');
    }
    
    
     function profileedit() {
        $user_id = $this->session->userdata('userid');
        $data['admin'] = $this->Admin_model->get_useradmin_edit($user_id);
        
   

        $this->load->view('admin_includes/header');
        $this->load->view('admin_includes/side_menu');
        $this->load->view('admin/edit_admin', $data);
        $this->load->view('admin_includes/footer');
    }
    
    function adminUpdate() {
       
        $id = $this->input->post('id');
        $name = $this->input->post('name');
 
        $password = $this->input->post('password');
         $email = $this->input->post('email');


      
        if (!empty($password)) {

            $password_status = md5($password);
        } else {
            $password_status = $this->input->post('old_password');
        }

        $data = [
            'name' => $name,
            'email'=>$email,
            'password' => $password_status,
            
        ];
        
     //   print_r($data);die;

        $this->Admin_model->update_admin($id, $data);

        redirect('AdminDash');
    }


    public function show_logs() {

            $data['logs'] = $this->Admin_model->get_log_report();;
            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/side_menu');
            $this->load->view('admin/admin_log', $data);
            $this->load->view('admin_includes/footer');
        
    }
    
}
