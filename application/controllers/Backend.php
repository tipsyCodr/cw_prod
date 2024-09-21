<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backend extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		redirect('cw_yaris3556/admin/login');
	}

	//For Admin
	public function LoginAdminForm()
	{
		$data['slot'] = $this->load->view('admin/login', '', true);
		$this->load->view('layouts/main', $data);
	}

	public function loginAsAdmin()
	{
		// Get the posted email and password
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// Check if email exists in the database
		$this->db->where('email', $email);
		$query = $this->db->get('admin');

		if ($query->num_rows() > 0) {
			$stored_password = $query->row()->password;

			// Otherwise, check if the password matches the stored hash
			if (password_verify($password, $stored_password)) {
				// Set the session and log the user in
				$this->session->set_userdata('admin_logged_in', true);
				$this->session->set_userdata('logged_in', TRUE);
				$this->session->set_userdata('logged_uname', 'admin');
				$this->session->set_userdata('verified', 1);
				redirect('cw_yaris3556/admin/dashboard');
				return true;
			} else {
				// Password is incorrect
				echo "Incorrect password, please try again.";
				return false;
			}
		}

		// No matching email found
		echo "User not found, please try again.";
		return false;
	}

}
