<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('admin/admin_login');
    }
    
    
       public function admin_login()
        {
        
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
      
            $data = $this->Admin_model->login($email, $password);

          

            if ($data) {
               

                $this->session->set_userdata('userid', $data['id']);
                $this->session->set_userdata('name', $data['name']);
                $this->session->userdata('user_id');
                $this->session->userdata('name');
            redirect('AdminDash');
            } else {
                
                $this->session->set_flashdata('error', 'Invalid email or password.');
                redirect('Admin');
            }
        }
    
       


    
        public function admin_logout()
        {
            $this->session->unset_userdata('admin_logged_in');
            $this->session->set_flashdata('success', 'Admin logged out successfully.');
            redirect('admin');
        }
    
}
