<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property input $input
 * @property UserRegistrationModel $userregistrationmodel
 * @property upload $upload
 * @property session $session
 * @property form_validation $form_validation
 * 
 * 
 */
class UserRegController extends CI_Controller
{


    public function index()
    {
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('listing_views/user_registration/user_registration_form');
        $this->load->view('footer');
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
                
                redirect('/user_registration');
            } else {
                $this->session->set_flashdata('error', 'User Registration Failed...! Try after some time');
                redirect('/user_registration');
            }
        }
    }
}
