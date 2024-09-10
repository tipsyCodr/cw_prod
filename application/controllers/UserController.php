<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Upload $upload
 * @property CasteModel $CasteModel
 * @property CityModel $CityModel
 * @property ComplexionModel $ComplexionModel
 * @property EducationModel $EducationModel
 * @property EmployeeInModel $EmployeeInModel
 * @property MatriMonialRegistrationModel $matrimonialmodel
 * @property MotherTongueModel $MotherTongueModel
 * @property StateModel $StateModel
 * @property UserRegistrationModel $userregistrationmodel
 */

class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserRegistrationModel');
    }
    public function index()
    {
        $data['user'] = $this->UserRegistrationModel->getSingleUser($this->session->userdata('login'));

        $data['slot'] = $this->load->view('profile/menu', $data, TRUE);

        // Load main layout with all data
        $this->load->view('/layouts/main', $data);
    }


    public function store()
    {
        if (empty($_POST['user_name']) || empty($_POST['user_mobile']) || empty($_POST['user_email']) || empty($_POST['user_address']) || empty($_POST['user_city']) || empty($_POST['user_pincode'])) {
            $this->session->set_flashdata('error', 'Please fill in all the required fields');
            redirect('/register/page');
        }

        $this->load->library('form_validation');

        $this->form_validation->set_rules('user_name', 'User Name', 'required');
        $this->form_validation->set_rules('user_mobile', 'User Mobile', 'required|numeric');
        $this->form_validation->set_rules('user_email', 'User Email', 'required|valid_email');
        $this->form_validation->set_rules('user_address', 'User Address', 'required');
        $this->form_validation->set_rules('user_city', 'User City', 'required');
        $this->form_validation->set_rules('user_pincode', 'User Pincode', 'required|numeric|exact_length[6]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('navbar');
            $this->load->view('listing_views/user_registration/user_registration_form');
            $this->load->view('footer');
        } else {
            $reg_data = $this->input->post();
            $this->load->model('userregistrationmodel');

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('user_profile_pic');

            if (!$this->upload->data()) {
                $this->session->set_flashdata('error', 'Error uploading image');
                redirect('/register/page');
            }

            $uploaded_pic_data = $this->upload->data();

            $reg_data['user_profile_pic'] = $uploaded_pic_data['file_name'];
            $isInserted = $this->userregistrationmodel->registeruser($reg_data);
            if ($isInserted) {
                $this->session->set_flashdata('success', 'User Registered Successfully');

                redirect('register/page');
            } else {
                $this->session->set_flashdata('error', 'User Registration Failed...! Try after some time');
                redirect('register/page');
            }
        }
    }
    public function matrimonialRegisterForm()
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
}