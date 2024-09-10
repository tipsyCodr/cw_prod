<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserRegistrationModel');
    }
    public function index()
    {
        $data['user'] = $this->UserRegistrationModel->getSingleUser($this->session->userdata('login'));

        $data['slot'] = $this->load->view('profile/menu', $data, TRUE);

        // Load main layout with all data
        $this->load->view('/layouts/main', $data);
    }
    public function registerForm()
    {

        $data['slot'] = $this->load->view('user/register', "", TRUE);

        // Load main layout with all data
        $this->load->view('/layouts/main', $data);

    }

    public function store()
    {
        if (empty($_POST['user_name']) || empty($_POST['user_mobile']) || empty($_POST['user_email']) || empty($_POST['user_address']) || empty($_POST['user_city']) || empty($_POST['user_pincode'])) {
            $this->session->set_flashdata('error', 'Please fill in all the required fields');
            redirect('/register/page');
        }

        $this->load->library('form_validation');

        $this->form_validation->set_rules('user_name', 'User Name', 'required');
        $this->form_validation->set_rules('user_mobile', 'User Mobile', 'required|numeric');
        $this->form_validation->set_rules('user_email', 'User Email', 'required|valid_email');
        $this->form_validation->set_rules('user_address', 'User Address', 'required');
        $this->form_validation->set_rules('user_city', 'User City', 'required');
        $this->form_validation->set_rules('user_pincode', 'User Pincode', 'required|numeric|exact_length[6]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('navbar');
            $this->load->view('listing_views/user_registration/user_registration_form');
            $this->load->view('footer');
        } else {
            $reg_data = $this->input->post();
            $this->load->model('userregistrationmodel');

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('user_profile_pic');

            if (!$this->upload->data()) {
                $this->session->set_flashdata('error', 'Error uploading image');
                redirect('/register/page');
            }

            $uploaded_pic_data = $this->upload->data();

            $reg_data['user_profile_pic'] = $uploaded_pic_data['file_name'];
            $isInserted = $this->userregistrationmodel->registeruser($reg_data);
            if ($isInserted) {
                $this->session->set_flashdata('success', 'User Registered Successfully');

                redirect('register/page');
            } else {
                $this->session->set_flashdata('error', 'User Registration Failed...! Try after some time');
                redirect('register/page');
            }
        }
    }
}