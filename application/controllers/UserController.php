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

class UserController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserRegistrationModel');
        $this->load->model('User');
    }

    public function index()
    {
        $user_id = $this->session->userdata('login');
        $data['title'] = 'Your Profile';

        if ($user_id) {
            $data['user'] = $this->UserRegistrationModel->getUserById($user_id);
            $data['slot'] = $this->load->view('profile/menu', $data, TRUE);
        }

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
        $name = $this->input->post('user_name');

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
            if (isset($isInserted)) {
                $this->session->set_flashdata('success', 'User Registered Successfully');
                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('logged_uname', $isInserted->user_name);
                $this->session->set_userdata('login', $isInserted->uid); // Store the UID in the session
                $this->session->set_userdata('verified', $isInserted->user_verified_status);

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

    public function logout()
    {
        $this->session->unset_userdata('login');
        $this->session->sess_destroy();
        redirect('/');
    }

    public function verifyForm()
    {

        $user_id = $this->session->userdata('login');
        if ($this->User->requestExist($user_id)) {
            $this->session->set_flashdata('error', 'You have already submitted your request. Please wait While we complete your verification process.');
            redirect('home');
        }
        $data['user'] = $this->UserRegistrationModel->getUserById($user_id);
        $this->db->select('gotra_name');
        $this->db->from('gotra');
        $query = $this->db->get();
        $data['title'] = 'Verify Yourself';
        $data['gotra_list'] = $query->result_array();
        $data['slot'] = $this->load->view('user/verification', $data, TRUE);
        $this->load->view('layouts/main', $data);
    }

    public function verifySave()
    {
        $formData = $this->input->post();

        $config['upload_path'] = './uploads/selfie/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '1000';
        // $config['max_width'] = '1024';
        // $config['max_height'] = '768';
        $config['file_name'] = time() . '_' . $_FILES['selfie']['name'];

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('selfie')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', 'Upload error : ' . $error);
            $this->verifyForm();
            return;
        } else {
            $uploadData = $this->upload->data();
            $formData['selfie'] = $uploadData['file_name'];
        }

        $config['upload_path'] = './uploads/aadhar_card/';
        $config['file_name'] = time() . '_' . $_FILES['aadhar_card']['name'];
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('aadhar_card')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', 'Upload error : ' . $error);
            $this->verifyForm();
            return;
        } else {
            $uploadData = $this->upload->data();
            $formData['aadhar_card'] = $uploadData['file_name'];
        }

        $formData['created_on'] = date('Y-m-d H:i:s');
        $formData['updated_on'] = date('Y-m-d H:i:s');

        $this->db->insert('verification_requests', $formData);
        $inserted = $this->db->insert_id();


        if ($inserted) {
            $this->session->set_flashdata('success', 'Registration successful.');
            redirect('/');
        } else {
            $this->session->set_flashdata('error', 'Registration failed. Please try again.');
            redirect('membership');
        }

    }

    public function profilePic()
    {
        $user_id = $this->session->userdata('login');
        if (!$user_id) {
            redirect('splash-login');
        }
        $data['title'] = 'Profile Setting';
        $data['user'] = $this->UserRegistrationModel->getUserById($user_id);
        $data['slot'] = $this->load->view('user/profile', $data, TRUE);
        $this->load->view('layouts/main', $data);
    }
    public function updateDetails()
    {
        if (!$this->session->userdata('login')) {
            redirect('splash-login');
        }

        $user_id = $this->session->userdata('login');
        $column = $this->input->post('column_name');
        $value = $this->input->post($column);
        if ($column == 'user_password') {
            $value = password_hash($value, PASSWORD_BCRYPT);
        }
        try {
            $this->db->set($column, $value);
            $this->db->where('uid', $user_id);
            $this->db->update('user_registration');
            echo $column . "updated";
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
    public function updateProfilePic()
    {
        $user_id = $this->session->userdata('login');
        $query = $this->db->query("SELECT user_profile_pic FROM user_registration WHERE `uid` = '$user_id'");
        $result = $query->row_array();
        $filename = $result['user_profile_pic'];
        if (empty($filename)) {
            $user = $this->UserRegistrationModel->getUserById($user_id);
            $filename = $user->user_name . '_' . substr(str_shuffle(MD5(microtime())), 0, 8) . '.jpg';
        }
        $formData = $this->input->post(null, true);
        if (!empty($_FILES['user_profile_pic']['name'])) {
            $file_with_query = basename($filename);
            $filename = parse_url($file_with_query, PHP_URL_PATH);
            $config['upload_path'] = './uploads/user_profiles/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $filename;
            $config['overwrite'] = true;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('user_profile_pic')) {
                $error = $this->upload->display_errors();
                $response = array('success' => false, 'message' => $error);
            } else {
                $uploadData = $this->upload->data();
                $this->db->set('user_profile_pic', $uploadData['file_name'] . '?v=' . time());
                $this->db->where('uid', $user_id);
                $this->db->update('user_registration');
                $response = array('success' => true, 'image_path' => base_url('uploads/user_profiles/' . $config['file_name']));
            }
        } else {
            $response = array('success' => false, 'message' => 'No image uploaded.');
        }

        echo json_encode($response);
    }
    public function updateCoverPic()
    {
        $user_id = $this->session->userdata('login');
        $query = $this->db->query("SELECT user_cover_pic FROM user_registration WHERE `uid` = '$user_id'");
        $result = $query->row_array();
        $filename = $result['user_cover_pic'];
        if (empty($filename)) {
            $user = $this->UserRegistrationModel->getUserById($user_id);
            $filename = $user->user_name . '_' . substr(str_shuffle(MD5(microtime())), 0, 8) . '.jpg';
        }
        $formData = $this->input->post(null, true);
        if (!empty($_FILES['user_cover_pic']['name'])) {
            $file_with_query = basename($filename);
            $filename = parse_url($file_with_query, PHP_URL_PATH);
            $config['upload_path'] = './uploads/user_profiles/cover/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $filename;
            $config['overwrite'] = true;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('user_cover_pic')) {
                $error = $this->upload->display_errors();
                $response = array('success' => false, 'message' => $error);
            } else {
                $uploadData = $this->upload->data();
                $this->db->set('user_cover_pic', $uploadData['file_name'] . '?v=' . time());
                $this->db->where('uid', $user_id);
                $this->db->update('user_registration');
                $response = array('success' => true, 'image_path' => base_url('uploads/user_profiles/cover/' . $config['file_name']));
            }
        } else {
            $response = array('success' => false, 'message' => 'No image uploaded.');
        }

        echo json_encode($response);
    }
}
