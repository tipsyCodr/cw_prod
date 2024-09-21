<?php
class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Load any necessary libraries, helpers, or models here
        $this->load->library('session');

        // Check if user is logged in
        $this->check_login();
    }

    // Function to check if the user is logged in
    protected function check_login()
    {
        // Assuming the user session data has a 'login' key
        if (!$this->session->userdata('login')) {
            // If not logged in, redirect to login page
            redirect('splash-login'); // Replace 'auth/login' with your login URL
        }
    }
}