<?php

class AdminController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('AdminModel');
        $this->load->model('User');
        $this->load->model('Admin');
        $this->load->model('Userregistrationmodel');
        $this->load->model('MatrimonialRegistrationModel');
        $this->checkAdmin();
    }
    public function checkAdmin()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            // If not logged in, redirect to login page
            redirect('home'); // Replace 'auth/login' with your login URL
        }
    }


    public function index()
    {
        $data['usersCount'] = $this->db->count_all_results('user_registration');
        $data['matrimonialCount'] = $this->db->count_all_results('matrimonial');
        $data['postCount'] = $this->db->count_all_results('posts');
        $data['jobsCount'] = $this->db->count_all_results('job_listing');
        $data['businessCount'] = $this->db->count_all_results('business_listing');

        $data['slot'] = $this->load->view('admin/index', $data, true);
        $this->load->view('layouts/main', $data);
    }

    public function users()
    {
        $data['users'] = $this->Userregistrationmodel->getAllMembers();
        $data['slot'] = $this->load->view('admin/users/list', $data, true);
        $this->load->view('layouts/main', $data);
    }

    public function matrimonialProfiles()
    {
        $data['profiles'] = $this->MatrimonialRegistrationModel->getAllMatrimonialData();
        $data['slot'] = $this->load->view('admin/matrimonial/list', $data, true);
        $this->load->view('layouts/main', $data);
    }
    public function viewMatrimonialProfiles($id)
    {
        $data['profile'] = $this->MatrimonialRegistrationModel->get_matrimonial_profile_by_id($id);
        $data['slot'] = $this->load->view('admin/matrimonial/view', $data, true);
        $this->load->view('layouts/main', $data);
    }





    public function createAdmin()
    {
        $data['slot'] = $this->load->view('admin/create', '', true);
        $this->load->view('layouts/main', $data);
    }

    public function addAdmin()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_registration.user_email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->createAdmin();
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $role = $this->input->post('role') ?: 'super_admin';

            $this->Admin->create($name, $email, $password, $role);
            $this->session->set_flashdata('success', 'Admin Created Successfully');
            redirect('cw_yaris3556/admin/create');
        }
    }

    public function fetchRequests()
    {

        $this->db->select('verification_requests.*, user_registration.user_name,user_registration.user_mobile,');
        $this->db->from('verification_requests');
        $this->db->join('user_registration', 'user_registration.uid = verification_requests.user_id', 'left');
        $data['verifications'] = $this->db->get()->result();
        // echo json_encode($data['verifications']);
        // die();
        $data['slot'] = $this->load->view('admin/requests/view', $data, true);
        $this->load->view('layouts/main', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('admin_logged_in');
        $this->session->sess_destroy();
        redirect('home');
    }

}
