<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 * @property input $input
 * @property userregistrationmodel $userregistrationmodel
 * 
 */
class Email_verification_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('userregistrationmodel');


    }

    public function verify_email()
    {
        $token = $this->input->get('token');
        $id = $this->input->get('adfas'); //id 
        if ($this->userregistrationmodel->isVerifiedToken($token, $id)) {
            $this->load->view('listing_views/user_registration/verified_success_msg');

        } else {
            $this->load->view('listing_views/user_registration/verified_error_msg');


        }

    }
}
