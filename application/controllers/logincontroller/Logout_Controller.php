<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property input $input
 * @property userregistrationmodel $userregistrationmodel
 * @property session $session
 * 
 */
class Logout_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {

        $this->session->unset_userdata('login');
        redirect(base_url());
        
    }
}
