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
        $userData = $this->Userregistrationmodel->checkpassword($user_name, $user_pass);
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
            $this->load->model('Userregistrationmodel');
            $user = $this->Userregistrationmodel->checkpassword($username, $password);

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
    public function googleAuthenticate()
    {
        // Decode the raw input stream to get the POST data
        $postData = json_decode($this->input->raw_input_stream, true);

        // Validate that the required data is available
        if (!isset($postData['uid'], $postData['email'], $postData['name'], $postData['token'])) {
            return $this->output->set_status_header(400)->set_output(json_encode(['success' => false, 'message' => 'Invalid data']));
        }

        // Extract user data from POST
        $uid = $postData['uid'];
        $email = $postData['email'];
        $name = $postData['name'];
        $token = $postData['token'];
        $photoURL = isset($postData['photoURL']) ? $postData['photoURL'] : null;
        $emailVerified = isset($postData['emailVerified']) ? $postData['emailVerified'] : false;

        // Load the user model
        $this->load->model('Userregistrationmodel');

        // Check if the user is already registered
        if ($this->Userregistrationmodel->isRegistered($email)) {
            $user_data = $this->Userregistrationmodel->getSingleUserByEmail($email);
            $user_name = $user_data->user_name;
            // var_dump($user_data->user_name);
            // Set session for the existing user
            $this->session->set_userdata('logged_in', TRUE);
            $this->session->set_userdata('logged_uname', $user_data->user_name);

            // Return success response
            return $this->output->set_output(json_encode(['success' => true, 'message' => 'User logged in']));
        } else {
            // Prepare data for the new user
            $user_data = array(
                'user_name' => $name,
                'user_password' => password_hash($token, PASSWORD_DEFAULT), // Hash the token for security
                'user_verified_status' => $emailVerified ? 1 : 0,
                'user_email' => $email,
                'user_token' => $token, // Optional: Use token if needed
                'user_profile_pic' => $photoURL,
                'user_created_on' => time()
            );

            // Try saving the new user to the database
            if ($this->Userregistrationmodel->saveGoogleUser($user_data)) {
                // Set session for the new user
                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('logged_uname', $name);

                // Return success response
                return $this->output->set_output(json_encode(['success' => true, 'message' => 'User registered and logged in']));
            } else {
                // Handle database error
                return $this->output->set_status_header(500)->set_output(json_encode(['success' => false, 'message' => 'Failed to register user']));
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