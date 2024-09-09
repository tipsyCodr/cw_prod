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
}