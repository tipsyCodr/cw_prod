<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MatrimonialController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function getProfiles()
    {
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
        }
        $data['profiles'] = $profiles;
        $data['slot'] = $this->load->view('matrimonial/search', $data, TRUE);
        $this->load->view('/layouts/main', $data);
    }
}