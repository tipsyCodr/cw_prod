<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property Joblistingmodel $joblistingmodel
 * @property CI_Upload $upload
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 */

class JobListController extends CI_Controller
{

    public function index()
    {

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('listing_views/job_listing/post_a_job_form');
        $this->load->view('footer');
    }

    public function job_listing()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('job_title', 'Job Title', 'required');
        // $this->form_validation->set_rules('job_type', 'Job Type', 'required');
        // $this->form_validation->set_rules('job_category', 'Job Category', 'required');
        // $this->form_validation->set_rules('job_city', 'Job City', 'required');
        // $this->form_validation->set_rules('job_country', 'Job Country', 'required');
        // $this->form_validation->set_rules('job_minimum_salary', 'Job Minimum Salary', 'required|numeric');
        // $this->form_validation->set_rules('job_maximum_salary', 'Job Maximum Salary', 'required|numeric');
        // $this->form_validation->set_rules('job_education_level', 'Job Education Level', 'required');
        // $this->form_validation->set_rules('job_experience', 'Job Experience', 'required');
        // $this->form_validation->set_rules('job_website', 'Job Website', 'required|valid_url');
        // $this->form_validation->set_rules('job_email', 'Job Email', 'required|valid_email');
        // $this->form_validation->set_rules('job_number', 'Mobile Number', 'required|numeric|exact_length[10]');
        // $this->form_validation->set_rules('job_gender', 'Job Gender', 'required');
        // $this->form_validation->set_rules('job_shift', 'Job Shift', 'required');
        // $this->form_validation->set_rules('job_description', 'Job Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('navbar');
            $this->load->view('listing_views/job_listing/post_a_job_form');
            $this->load->view('footer');
        } else {
            $job_data = $this->input->post();

            $this->load->model('joblistingmodel');

            if (!empty($_FILES['job_image']['name'])) {
                $upload_path = './uploads/job_listing';
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                // $config['max_size'] = '2048';  // 2MB
                $config['file_name'] = time() . '_' . $_FILES['job_image']['name'];

                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0755, TRUE);
                }

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('job_image')) {
                    $uploaded_pic_data = $this->upload->data();
                    $job_data['job_image'] = $uploaded_pic_data['file_name'];
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', 'Upload error: ' . $error . ' Path: ' . realpath($upload_path));
                    $this->load->view('header');
                    $this->load->view('navbar');
                    $this->load->view('listing_views/job_listing/post_a_job_form');
                    $this->load->view('footer');
                    return;
                }
            } else {
                $job_data['job_image'] = ''; // Or handle the case where image is optional
            }

            $isInserted = $this->joblistingmodel->job_listing($job_data);
            if ($isInserted) {
                $this->session->set_flashdata('success', 'Job Listing Successfully');
                $this->load->view('header');
                $this->load->view('navbar');
                $this->load->view('listing_views/job_listing/post_a_job_form');
                $this->load->view('footer');

            } else {
                $this->session->set_flashdata('error', 'Job Listing Failed...! Try after some time');
                $this->load->view('header');
                $this->load->view('navbar');
                $this->load->view('listing_views/job_listing/post_a_job_form');
                $this->load->view('footer');

            }
        }
    }

    public function get_all_job_list()
    {
        $this->load->model('joblistingmodel');
        $data['job_list'] = $this->joblistingmodel->getAllJobData();
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('listing_views/job_listing/job', $data);
        $this->load->view('footer');
    }
}
?>