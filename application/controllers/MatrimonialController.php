<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MatrimonialController extends MY_Controller
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
    public function getFullProfile($id)
    {
        $data['profile'] = $this->MatriMonialRegistrationModel->get_matrimonial_profile_by_id($id);
        $data['slot'] = $this->load->view('matrimonial/profile', $data, TRUE);
        $this->load->view('/layouts/main', $data);
    }
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
        $data['title'] = 'Search Result';
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

        $this->db->select('matrimonial_id, name, hide_contact, hide_name, dob, height, weight, mother_tongue, marrital_status, zodiac, gotram, description, education, job_occupation,images')
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
        $data['title'] = 'Search Result';

        $data['profiles'] = $profiles;
        $data['slot'] = $this->load->view('matrimonial/search', $data, TRUE);
        $this->load->view('/layouts/main', $data);
    }

    public function sendRequest()
    {
        // Validate input
        $sender = $this->input->post('user_id', TRUE);  // Sanitize the input
        $receiver = $this->input->post('matrimonial_id', TRUE);  // Sanitize the input

        if (!$sender || !$receiver) {
            $response = ['success' => false, 'message' => 'Invalid sender or receiver.'];
            echo json_encode($response);
            return false;
        }

        // Check if the sender has blocked the receiver or vice versa
        // if ($this->isBlocked($sender, $receiver)) {
        //     $response = ['success' => false, 'message' => 'Request cannot be sent. User is blocked.'];
        //     echo json_encode($response);
        //     return false;
        // }

        // Check if the request already exists
        $this->db->where(['user_id' => $sender, 'matrimonial_id' => $receiver]);
        $requestCount = $this->db->get('requests')->num_rows();

        if ($requestCount > 0) {
            $response = ['success' => true, 'message' => 'Request already sent.'];
            echo json_encode($response);
            return $requestCount;
        }

        $response = $this->MatriMonialRegistrationModel->storeRequest($sender, $receiver);
        return $response;

    }

    public function fetchRequest()
    {
        $user = $this->session->userdata('login');
        $recent = $this->MatriMonialRegistrationModel->getPendingRequests($user);
        $old = $this->MatriMonialRegistrationModel->getOldRequests($user);

        foreach ($recent as &$request) {  // Use reference (&) to modify the array in-place
            $this->db->where('matrimonial_id', $request['matrimonial_id']);
            $matrimonial = $this->db->get('matrimonial')->row_array();
            $request['matrimonial'] = $matrimonial;  // Add matrimonial details to the request
        }

        unset($request);  // Break reference to avoid unexpected issues later

        foreach ($old as &$request) {  // Use reference (&) to modify the array in-place
            $this->db->where('matrimonial_id', $request['matrimonial_id']);
            $matrimonial = $this->db->get('matrimonial')->row_array();
            $request['matrimonial'] = $matrimonial;  // Add matrimonial details to the request
        }
        unset($request);  // Break reference to avoid unexpected issues later


        $data['recent'] = $recent;
        $data['title'] = 'My Requests';
        $data['old'] = $old;
        $data['slot'] = $this->load->view('matrimonial/requests', $data, TRUE);
        $this->load->view('/layouts/main', $data);

        // If you want to return JSON-encoded response for debugging or API purposes:
        // echo json_encode($response);  // This will now include the matrimonial data
    }


    public function acceptRequest()
    {
        $id = $this->input->post('request_id');

        $response = $this->MatriMonialRegistrationModel->acceptRequest($id);
        return json_encode($response);

    }
    public function rejectRequest()
    {
        $id = $this->input->post('request_id');
        $response = $this->MatriMonialRegistrationModel->rejectRequest($id);
        return json_encode($response);
    }
    public function kundliForm()
    {
        // $data['profile'] = $this->MatriMonialRegistrationModel->getMatrimonialData($id);
        $data['title'] = "Match Your Kundli";
        $data['slot'] = $this->load->view('matrimonial/kundli/search', '', TRUE);
        $this->load->view('/layouts/main', $data);
    }
    public function kundliResult()
    {
        $data['boy'] = array(
            'name' => $this->input->post('boy_name', TRUE),
            'dob' => $this->input->post('boy_dob', TRUE),
        );
        $data['girl'] = array(
            'name' => $this->input->post('girl_name', TRUE),
            'dob' => $this->input->post('girl_dob', TRUE),
        );
        $data['title'] = "Match Your Kundli";
        $data['slot'] = $this->load->view('matrimonial/kundli/result', $data, TRUE);
        $this->load->view('/layouts/main', $data);
    }

}