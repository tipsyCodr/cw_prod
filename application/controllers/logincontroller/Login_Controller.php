<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property input $input
 * @property userregistrationmodel $userregistrationmodel
 * @property upload $upload
 * @property session $session
 * @property form_validation $form_validation
 * 
 * 
 */
class Login_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('userregistrationmodel');
    }


    public function index()
    {
        $this->load->view('header');
        $this->load->view('navbar');

        $this->load->view('login_views/login/login_form');
        $this->load->view('footer');
    }


    public function check_login_with_password()
    {

        $user_name = $this->input->post('user_name');
        $user_pass = $this->input->post('user_pass');
        $userData = $this->userregistrationmodel->checkpassword($user_name, $user_pass);
        if ($userData) {
            $this->session->set_userdata('login', $userData->uid);

            echo true;

        } else {
            echo false;

        }
    }

    public function register_user()
    {
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

            $uploaded_pic_data = $this->upload->data();

            $reg_data['user_profile_pic'] = $uploaded_pic_data['file_name'];
            $isInserted = $this->userregistrationmodel->registeruser($reg_data);
            if ($isInserted) {
                $this->session->set_flashdata('success', 'User Registered Successfully');

                redirect('userregcontroller');
            } else {
                $this->session->set_flashdata('error', 'User Registration Failed...! Try after some time');
                redirect('userregcontroller');
            }
        }
    }
}
