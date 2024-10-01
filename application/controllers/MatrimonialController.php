<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/client.php';

use Prokerala\Api\Sample\Exception\ValidationError;
use Prokerala\Api\Sample\ApiClient;

class MatrimonialController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->input = new CI_Input();
        $this->load->database();
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
        $matrimonial_id = $this->input->post('matrimonial_id');
        $user_id = $this->input->post('user_id');
        $data['title'] = "Match Your Kundli";
        $data['profile'] = $this->MatriMonialRegistrationModel->getMatrimonialDataById($matrimonial_id);
        $data['user_profiles'] = $this->MatriMonialRegistrationModel->getUsersProfiles($user_id);
        $data['slot'] = $this->load->view('matrimonial/kundli/search', $data, TRUE);
        $this->load->view('/layouts/main', $data);
    }

    public function kundliResult()
    {

        $clientId = 'bf90eac6-4056-43d3-826d-787b8a492eeb';
        $clientSecret = 'EdTR4YvNzGYIsuxhXtO7oqbbckbIiUOkMnfP6GI0';
        $this->load->library('ApiClient', ['clientId' => $clientId, 'clientSecret' => $clientSecret]);

        $match_with_id = $this->input->post('match_with');
        $for_id = $this->input->post('for');
        $ayanamsa = $this->input->post('ayanamsa');


        $this->load->model('MatriMonialRegistrationModel');
        $match_with = $this->MatriMonialRegistrationModel->getMatrimonialDataById($match_with_id);
        $for = $this->MatriMonialRegistrationModel->getMatrimonialDataById($for_id);

        if ($match_with['gender'] == "M") {
            $boy = $match_with;
        } else {
            $girl = $match_with;
        }
        if ($for['gender'] == "M") {
            $boy = $for;
        } else {
            $girl = $for;
        }

        // Initialize Guzzle client
        $client = new \GuzzleHttp\Client();
        // echo 'boy: ';
        // var_dump($boy);
        // echo 'girl: ';
        // var_dump($girl);
        // Request for boy's coordinates
        $url = "https://geocode.maps.co/search?q=" . urlencode($boy['cities']) . "&api_key=66fba7903028b471845537pjwe8f2cc";
        $response = $client->request('GET', $url);
        $boy_location = json_decode($response->getBody()->getContents(), true);

        var_dump($boy_location);

        // Request for girl's coordinates
        $url = "https://geocode.maps.co/search?q=" . urlencode($girl['cities']) . "&api_key=66fba7903028b471845537pjwe8f2cc";
        $response = $client->request('GET', $url);
        $girl_location = json_decode($response->getBody()->getContents(), true);

        var_dump($girl_location);

        die();

        // Fill boy details
        $detail['boy_dob'] = date('c', strtotime($boy['dob']));
        $detail['boy_name'] = $boy['name'];
        $detail['boy_coordinates'] = $boy_location[0]['lon'] . ',' . $boy_location[0]['lat'];
        // var_dump($detail['boy_coordinates']);

        // Fill girl details
        $detail['girl_dob'] = date('c', strtotime($girl['dob']));
        $detail['girl_name'] = $girl['name'];
        $detail['girl_coordinates'] = $girl_location[0]['lon'] . ',' . $girl_location[0]['lat'];

        $detail['la'] = 'en';
        $detail['ayanamsa'] = $ayanamsa;

        $this->load->library('ApiClient');
        //Now the kumdli matching between boy girl started
        $client = new ApiClient('bf90eac6-4056-43d3-826d-787b8a492eeb', 'EdTR4YvNzGYIsuxhXtO7oqbbckbIiUOkMnfP6GI0');

        try {
            // Call the API
            $data['response'] = $client->get('v2/astrology/kundli-matching', [
                'ayanamsa' => $detail['ayanamsa'],
                'girl_coordinates' => $detail['girl_coordinates'],
                'girl_dob' => $detail['girl_dob'],
                'boy_coordinates' => $detail['boy_coordinates'],
                'boy_dob' => $detail['boy_dob'],
                'la' => $detail['la'],
            ]);

            // Output the result
            echo '<pre>';
            print_r($data);
            echo '</pre>';
            $data['msg_type'] = $data['response']['data']['message']['type'];
            $data['msg_description'] = $data['response']['data']['message']['description'];
            $data['total_points'] = $data['response']['data']['guna_milan']['total_points'];
            $data['max_points'] = $data['response']['data']['guna_milan']['maximum_points'];
            $data['result'] = $data['response'];

            $data['boy_name'] = $detail['boy_name'];
            $data['girl_name'] = $detail['girl_name'];

            $data['title'] = "Match Your Kundli";
            $data['slot'] = $this->load->view('matrimonial/kundli/result', $data, TRUE);
            $this->load->view('/layouts/main', $data);

        } catch (ValidationError $error) {
            print_r($error->getValidationMessages());
        } catch (\Exception $error) {
            echo 'Errors: ' . $error->getMessage();
        }
        //Now the kumdli matching between boy girl ends


    }


}