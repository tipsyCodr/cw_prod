<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property Businesslistingmodel $businesslistingmodel
 * @property CI_Upload $upload
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 */

class BusinessListController extends CI_Controller
{

    public function index()
    {
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('listing_views/business_listing/post_a_business_form');
        $this->load->view('footer');

    }

    public function business_listing()
    {
        $this->load->library('form_validation');

        // Define validation rules
        $this->form_validation->set_rules('company_name', 'Company Name', 'required');
        // $this->form_validation->set_rules('address_1', 'Address 1', 'required');
        // $this->form_validation->set_rules('address_2', 'Address 2', 'required');
        // $this->form_validation->set_rules('city', 'City', 'required');
        // $this->form_validation->set_rules('country', 'Country', 'required');
        // $this->form_validation->set_rules('opening_time', 'Opening Time', 'required');
        // $this->form_validation->set_rules('closing_time', 'Closing Time', 'required');
        // $this->form_validation->set_rules('business_category', 'Business Category', 'required');
        // $this->form_validation->set_rules('pin_code', 'Pin Code', 'required|numeric');
        // $this->form_validation->set_rules('website', 'Website', 'required|valid_url');
        // $this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
        // $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|numeric');
        // $this->form_validation->set_rules('fax', 'Fax', 'required|numeric');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('navbar');
            $this->load->view('listing_views/business_listing/post_a_business_form');
            $this->load->view('footer');
        } else {
            $business_data = $this->input->post();

            $this->load->model('businesslistingmodel');

            if (!empty($_FILES['business_image']['name'])) {
                $upload_path = './uploads/business_listing';
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = time() . '_' . $_FILES['business_image']['name'];

                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0755, TRUE);
                }

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('business_image')) {
                    $uploaded_pic_data = $this->upload->data();
                    $business_data['business_image'] = $uploaded_pic_data['file_name'];
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', 'Upload error: ' . $error);
                    $this->load->view('header');
                    $this->load->view('navbar');
                    $this->load->view('listing_views/business_listing/post_a_business_form');
                    $this->load->view('footer');
                    return;
                }
            } else {
                $business_data['business_image'] = ''; // Handle optional image
            }

            $isInserted = $this->businesslistingmodel->post_business($business_data);
            if ($isInserted) {
                $this->session->set_flashdata('success', 'Business posted successfully');
            } else {
                $this->session->set_flashdata('error', 'Business posting failed. Try again later.');
            }

            $this->load->view('header');
            $this->load->view('navbar');
            $this->load->view('listing_views/business_listing/post_a_business_form');
            $this->load->view('footer');
        }
    }

    public function get_all_business_list()
    {
        $this->load->model('businesslistingmodel');
        $data['business_list'] = $this->businesslistingmodel->getAllBusinessData();

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('listing_views/business_listing/business', $data);
        $this->load->view('footer');
    }
}

?>