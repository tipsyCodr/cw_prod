<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        // Load session library
        $this->load->library('session');
    }

    public function check_login()
    {
        // Check if the user is logged in
        if (!$this->session->userdata('logged_in')) {
            // Redirect to login page
            redirect('login');
        }
    }
}