<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property MatriMonialRegistrationModel $matrimonialmodel
 * @property ComplexionModel $ComplexionModel
 * @property EducationModel $EducationModel
 * @property EmployeeInModel $EmployeeInModel
 * @property MotherTongueModel $MotherTongueModel
 * @property StateModel $StateModel
 * @property CasteModel $CasteModel
 * @property CityModel $CityModel
 * 
 * @property CI_Upload $upload
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 */
class MatrimonialController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); // Call the CI_Controller constructor

    }

    public function index()
    {
        $user_id = $this->session->userdata('login');
        if (!$user_id) {
            redirect('/login');

        }
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('matrimonial_views/matrimonial_form');
        $this->load->view('footer');
    }

    public function submit_form()
    {
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('MatriMonialRegistrationModel');

        // Set validation rules
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
        // $this->form_validation->set_rules('job_occupation', 'Job Occupation', 'required');
        // $this->form_validation->set_rules('height', 'Height', 'required');
        // $this->form_validation->set_rules('weight', 'Weight', 'required');
        // $this->form_validation->set_rules('mother_ttongue', 'Mother Tongue', 'required');
        // $this->form_validation->set_rules('gotram', 'Gotram', 'required');
        // $this->form_validation->set_rules('zodiac', 'Zodiac', 'required');
        // $this->form_validation->set_rules('education', 'Education', 'required');
        // $this->form_validation->set_rules('salary', 'Salary', 'required');
        // $this->form_validation->set_rules('gender', 'Gender', 'required');
        // $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
            return;
        }

        $formArray = $this->input->post();

        $user_id = $this->session->userdata('login');
        if (!$user_id) {
            $this->session->set_flashdata('error', 'User not logged in.');
            $this->index();
            return;
        }
        $formArray['user_id'] = $user_id;
        $formArray['created_at'] = date('Y-m-d H:i:s');
        // File upload configuration
        $uploadPath = './uploads/matrimonial_img/user_images';

        // Check if directory exists
        if (!is_dir($uploadPath)) {
            if (!mkdir($uploadPath, 0755, true)) {
                $this->session->set_flashdata('error', 'Failed to create directory: ' . realpath($uploadPath));
                $this->index();
                return;
            }
        }

        // Set upload configuration
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '2048'; // 2MB
        $config['file_name'] = time() . '_' . $_FILES['images']['name'];

        $this->upload->initialize($config);

        // Attempt to upload file
        if ($this->upload->do_upload('images')) {
            $uploadData = $this->upload->data();
            $formArray['images'] = $uploadData['file_name'];
        } else {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', 'Upload error : ' . $error);
            $this->index();
            return;
        }

        // Insert data into the database
        $inserted = $this->MatriMonialRegistrationModel->insert_matrimonial($formArray);

        if ($inserted) {
            $this->session->set_flashdata('success', 'Registration successful.');
        } else {
            $this->session->set_flashdata('error', 'Registration failed. Please try again.');
        }

        $this->index();
    }

    public function matrimonial()
    {
        $this->load->view('header');
        $this->load->view('matrimonial_views/matrimonial_link.php');
        $this->load->view('navbar');
        $this->load->view('matrimonial_views/matrimonial_section');
        $this->load->view('footer');
        $this->load->view('matrimonial_views/matrimonial_script');
    }

    public function find_match()
    {

        $user_id = $this->session->userdata('login');
        if (!$user_id) {
            redirect('/login');

        }
        $this->load->model('MatriMonialRegistrationModel');
        $this->load->library('pagination');


        // Get form data
        $gender = $this->input->post('looking');
        $from_age = $this->input->post('from_age');
        $to_age = $this->input->post('to_age');


        // Query the database
        $matches = $this->MatriMonialRegistrationModel->get_matches($gender, $from_age, $to_age);
        $result = [
            'matches' => $matches,
            'from_age' => $from_age,
            'to_age' => $to_age,
            'gender' => $gender
        ];
        $this->find_match_result($result);

    }

    public function find_match_result($data)
    {
        // Load models
        $this->load->model('ComplexionModel');
        $this->load->model('EducationModel');
        $this->load->model('EmployeeInModel');
        $this->load->model('MotherTongueModel');
        $this->load->model('StateModel');
        $this->load->model('CasteModel');

        // Retrieve data from models
        $complexions = $this->ComplexionModel->getAllComplexions();
        $education = $this->EducationModel->getAllEducation();
        $employeeIn = $this->EmployeeInModel->getAllEmployeeIn();
        $motherTongues = $this->MotherTongueModel->getAllMotherTongues();
        $states = $this->StateModel->getAllState();
        $castes = $this->CasteModel->getAllCaste();

        // Load helper
        $this->load->helper('matrimonial/matrimonial_search_filter_helper');

        // Prepare data for the view
        $viewData = [
            'results' => $data,
            'complexions' => $complexions,
            'education' => $education,
            'employeeIn' => $employeeIn,
            'motherTongues' => $motherTongues,
            'states' => $states,
            'castes' => $castes,
        ];

        // Load views and pass data
        $this->load->view('header');
        $this->load->view('matrimonial_views/matrimonial_link');
        $this->load->view('navbar');
        $this->load->view('matrimonial_views/matrimonial_result', $viewData);
        $this->load->view('footer');
        $this->load->view('matrimonial_views/result_script');
    }
    public function get_cities_by_states()
    {
        $state_ids = $this->input->post('state_ids');

        if (is_string($state_ids)) {
            $state_ids = json_decode($state_ids, true);
        }

        if (!empty($state_ids) && is_array($state_ids)) {
            $this->load->model('CityModel');
            $cities = $this->CityModel->get_cities_by_state_ids($state_ids);

            if (!empty($cities)) {
                echo json_encode($cities);
            } else {
                echo json_encode([]);
            }
        } else {
            echo json_encode([]);
        }
    }
    public function member_filter()
    {
        $this->load->model('MatriMonialRegistrationModel');

        // Fetch the filter values from the request
        $gender = $this->input->post('gender');
        $from_age = $this->input->post('from_age');
        $to_age = $this->input->post('to_age');
        $states = $this->input->post('states');
        $cities = $this->input->post('cities');
        $motherTongues = $this->input->post('motherTongues');
        $Educations = $this->input->post('Educations');
        $EmployeeIn = $this->input->post('EmployeeIn');
        // $photo_search = $this->input->post('photo_search');

        // Debugging: log filter criteria
        log_message('debug', 'Filter criteria: ' . print_r([
            'gender' => $gender,
            'from_age' => $from_age,
            'to_age' => $to_age,
            'states' => $states,
            'cities' => $cities,
            'motherTongues' => $motherTongues,
            'Educations' => $Educations,
            'EmployeeIn' => $EmployeeIn,
            // 'photo_search'=> $photo_search,

        ], true));

        // Convert states and cities to arrays if needed
        // if (!is_array($states)) {
        //     $states = explode(',', $states);
        // }
        // if (!is_array($cities)) {
        //     $cities = explode(',', $cities);
        // }
        // if (!is_array($motherTongues)) {
        //     $states = explode(',', $motherTongues);
        // }
        // Prepare the filter criteria array
        $filter_criteria = [
            'gender' => $gender,
            'from_age' => $from_age,
            'to_age' => $to_age,
            'state_ids' => $states,
            'city_ids' => $cities,
            'motherTongue_ids' => $motherTongues,
            'Education_ids' => $Educations,
            'EmployeeIn_ids' => $EmployeeIn,
            // 'photo_search'=> $photo_search,

        ];

        // Get filtered results from the model
        try {
            $matches = $this->MatriMonialRegistrationModel->filter_members($filter_criteria);
            echo json_encode(['matches' => $matches]);
        } catch (Exception $e) {
            log_message('error', 'Error fetching members: ' . $e->getMessage());
            echo json_encode(['error' => 'An error occurred while fetching data.']);
        }
    }

    public function matromonial_profile($matrimonial_id)
    {
        // Load the model
        $this->load->model('MatriMonialRegistrationModel');
    
        // Retrieve matrimonial profile data by ID
        $data['matrimonial_profile'] = $this->MatriMonialRegistrationModel->getMatrimonialDataById($matrimonial_id);
    
        // Load views with the data
        $this->load->view('header');
        $this->load->view('matrimonial_views/matrimonial_link');
        $this->load->view('navbar');
        $this->load->view('matrimonial_views/matrimonial_profile', $data);
        $this->load->view('footer');
        $this->load->view('matrimonial_views/result_script');
    }
    

}

?>