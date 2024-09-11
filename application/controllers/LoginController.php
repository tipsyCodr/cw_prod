<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        // Check if user is already logged in
        if ($this->session->userdata('logged_in')) {
            redirect('home');
        }

        // Display login form
        $data['slot'] = $this->load->view('login', '', TRUE);
        $this->load->view('/layouts/splash', $data);
    }
    public function verify()
    {

        $user_name = $this->input->post('user_name');
        $user_pass = $this->input->post('user_pass');
        $userData = $this->userregistrationmodel->checkpassword($user_name, $user_pass);
        if ($userData) {
            $this->session->set_userdata('login', $userData->uid);
            $this->session->set_userdata('logged_uname', $userData->user_name);

            if (isset($_SESSION['intended_url']) && $_SESSION['intended_url'] != "") {
                $url = $_SESSION['intended_url'];
                unset($_SESSION['intended_url']);
                redirect($url);
            } else {
                redirect(base_url());
            }

        } else {
            $this->session->set_flashdata('error', 'Incorrect Username or Password.');
            redirect(base_url('login'));

        }
    }
    public function authenticate()
    {
        // Validate login credentials
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_name', 'Username', 'required');
        $this->form_validation->set_rules('user_pass', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Display login form
            $data['slot'] = $this->load->view('login', '', TRUE);
            $this->load->view('/layouts/splash', $data);
        } else {
            // Check if credentials are correct
            $username = $this->input->post('user_name');
            $password = $this->input->post('user_pass');

            // Assume you have a model to check credentials
            $this->load->model('userregistrationmodel');
            $user = $this->userregistrationmodel->checkpassword($username, $password);

            if ($user) {
                // Set session variable
                $this->session->set_userdata('logged_in', TRUE);

                // Set JavaScript local storage variable
                echo '<script>localStorage.setItem("logged_in", "true");</script>';

                redirect('home');
            } else {
                $this->session->set_flashdata('error', 'Incorrect Username or Password.');
                redirect('login');
            }
        }
    }

    public function phoneRegister()
    {

        $data['slot'] = $this->load->view('login/phone', '', TRUE);
        $this->load->view('/layouts/splash', $data);
    }

    /**
     * Log out the user and redirect to login page
     *
     * Destroys the session and clears the JavaScript local storage variable
     * "logged_in" and redirects the user to the login page.
     *
     * @return void
     */
    public function logout()
    {
        // Destroy session
        $this->session->sess_destroy();

        // Clear JavaScript local storage variable
        echo '<script>localStorage.removeItem("logged_in");</script>';

        redirect('splash-login');
    }
}