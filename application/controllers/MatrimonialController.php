<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MatrimonialController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('MatriMonialRegistrationModel');

    }

    /**
     * Handles global search form submission
     *
     * Fetches search keyword from the request, sanitizes the input, and
     * queries the database for matches. If search keyword is present, fetches
     * matching profiles and passes them to the view. If search keyword is empty,
     * shows an error message.
     *
     * @throws Exception
     */
    public function getProfiles()
    {
        $data = [];

        $this->load->model('MatriMonialRegistrationModel');
        if (!$this->input->post() || empty($this->input->post('looking')) || empty($this->input->post('from_age')) || empty($this->input->post('to_age'))) {
            $profiles = $this->MatriMonialRegistrationModel->getAllMatrimonialData();
        } else {
            $looking = $this->input->post('looking');
            $from_age = $this->input->post('from_age');
            $to_age = $this->input->post('to_age');
            $gotra = $this->input->post('gotra');

            $this->db->where('gender', $looking);
            $this->db->where('TIMESTAMPDIFF(YEAR, dob, CURDATE()) >=', $from_age);
            $this->db->where('TIMESTAMPDIFF(YEAR, dob, CURDATE()) <=', $to_age);
            if (!empty($gotra)) {
                $this->db->where('gotram', $gotra);
            }

            $profiles = $this->db->get('matrimonial')->result_array();
            $data['meta'] = ['gender' => $looking, 'from_age' => $from_age, 'to_age' => $to_age, 'gotra' => $gotra];

        }
        $data['profiles'] = $profiles;
        $data['slot'] = $this->load->view('matrimonial/search', $data, TRUE);
        $this->load->view('/layouts/main', $data);
    }

    /**
     * Handles global search form submission
     *
     * Fetches search keyword from the request, sanitizes the input, and
     * queries the database for matches. If search keyword is present, fetches
     * matching profiles and passes them to the view. If search keyword is empty,
     * shows an error message.
     *
     * @throws Exception
     */
    public function queryProfiles()
    {
        $query = trim(preg_replace('/\s+/', ' ', $this->input->post('search')));
        $gender = $this->input->post('gender');

        if (empty($query) || empty($gender)) {
            $this->session->set_flashdata('error', "Error: Please enter a search keyword.");
            $profiles = $this->MatriMonialRegistrationModel->getAllMatrimonialData();

        }

        $this->db->select('name,hide_contact, hide_name , dob, height, weight, mother_tongue, marrital_status, zodiac, gotram, description, education, job_occupation,images')
            ->like('name', $query)
            ->or_like('dob', $query)
            ->or_like('height', $query)
            ->or_like('weight', $query)
            ->or_like('mother_tongue', $query)
            ->or_like('marrital_status', $query)
            ->or_like('zodiac', $query)
            ->or_like('gotram', $query)
            ->or_like('description', $query)
            ->or_like('education', $query)
            ->or_like('job_occupation', $query);
        $this->db->where('gender', $gender);

        $profiles = $this->db->get('matrimonial')->result_array();

        if (empty($profiles)) {
            $this->session->set_flashdata('error', "Error: Not Found please try with a different term.");
            // redirect('matrimonial/search');
            // $profiles = $this->MatriMonialRegistrationModel->getAllMatrimonialData();
        }

        $data['meta'] = ['gender' => $gender];
        $data['profiles'] = $profiles;
        $data['slot'] = $this->load->view('matrimonial/search', $data, TRUE);
        $this->load->view('/layouts/main', $data);
    }

}