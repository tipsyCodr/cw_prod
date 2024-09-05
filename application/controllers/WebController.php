<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WebController extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index()
    {
        $this->load->model('Blog_model');
        $data['comments'] = $this->Blog_model->getAllComments();
        $data['comment_count'] = array();
        foreach ($data['comments'] as $comment) {
            if (isset($comment['post_id'])) {
                $data['comment_count'][$comment['post_id']] = (isset($data['comment_count'][$comment['post_id']])) ? $data['comment_count'][$comment['post_id']] + 1 : 1;
            }
        }


        $this->load->model('Blog_model');
        $data['blogs'] = $this->Blog_model->get_all_blog_posts(); // Get blog posts

        $this->load->model('businesslistingmodel');
        $data['business_list'] = $this->businesslistingmodel->getAllBusinessData();

        $this->load->model('joblistingmodel');
        $data['job_list'] = $this->joblistingmodel->getAllJobData();

        // Pass the blog data when loading the 'home' view
        $data['slot'] = $this->load->view('/home', $data, TRUE);

        // Load main layout with all data
        $this->load->view('/layouts/main', $data);
    }
    public function services()
    {
        $this->load->model('joblistingmodel');
        $data['job_list'] = $this->joblistingmodel->getAllJobData();

        $this->load->model('BusinessListingModel');
        $data['business_list'] = $this->BusinessListingModel->getAllBusinessData();

        $data['slot'] = $this->load->view('listing_views/job_listing/services', $data, TRUE);

        $this->load->view('/layouts/main', $data);

    }
}