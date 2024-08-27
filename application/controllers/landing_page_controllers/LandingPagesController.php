<?php
defined('BASEPATH') or exit('no direct script allowed');

class LandingPagesController extends CI_Controller{
    public function index(){
        $this->load->model('joblistingmodel');
        $data['job_list'] = $this->joblistingmodel->getAllJobData();

        $this->load->model('businesslistingmodel');
        $data['business_list'] = $this->businesslistingmodel->getAllBusinessData();
        
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('landing_views/index', $data);
        $this->load->view('footer');

    }
}

?>