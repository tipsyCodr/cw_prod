<?php

class AdminController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('AdminModel');
        $this->load->model('User');

    }

    public function fetchRequests()
    {

        $this->db->select('verification_requests.*, user_registration.user_name,user_registration.user_mobile,');
        $this->db->from('verification_requests');
        $this->db->join('user_registration', 'user_registration.uid = verification_requests.user_id', 'left');
        $data['verifications'] = $this->db->get()->result();
        // echo json_encode($data['verifications']);
        // die();
        $data['slot'] = $this->load->view('admin/requests/view', $data, true);
        $this->load->view('layouts/main', $data);
    }


}
