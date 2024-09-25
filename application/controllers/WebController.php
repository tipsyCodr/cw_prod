<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WebController extends MY_Controller
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
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Blog_model');
        $this->load->model('Userregistrationmodel');
    }
    public function index()
    {
        // Check if user is already logged in
        if ($this->session->userdata('logged_in')) {
            redirect('home');
        }

        // Display login form
        $data['slot'] = $this->load->view('/login', '', TRUE);
        $this->load->view('/layouts/splash', $data);


    }

    public function home()
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
        $data['blogs'] = $this->Blog_model->get_all_blog_posts_with_user();


        $this->load->model('Businesslistingmodel');
        $data['business_list'] = $this->Businesslistingmodel->getAllBusinessData();

        $this->load->model('joblistingmodel');
        $data['job_list'] = $this->joblistingmodel->getAllJobData();

        $user = $this->Userregistrationmodel->getSingleUser($this->session->userdata('login'));
        $data['profile_pic'] = $user->user_profile_pic;
        $data['is_verified'] = ($user->user_verified_status == 1) ? true : false;

        // Pass the blog data when loading the 'home' view
        $data['slot'] = $this->load->view('/home', $data, TRUE);

        // Load main layout with all data
        $this->load->view('/layouts/main', $data);
    }
    public function about()
    {
        $data['slot'] = $this->load->view('about', "", TRUE);
        $this->load->view('/layouts/main', $data);
    }
    public function flyer()
    {

        $data['slot'] = $this->load->view('flyer', "", TRUE);

        $this->load->view('/layouts/main', $data);
    }
    public function services()
    {
        $this->load->model('joblistingmodel');
        $data['job_list'] = $this->joblistingmodel->getAllJobData();

        $this->load->model('Businesslistingmodel');
        $data['business_list'] = $this->Businesslistingmodel->getAllBusinessData();

        $data['slot'] = $this->load->view('services/services', $data, TRUE);

        $this->load->view('/layouts/main', $data);

    }
    public function social()
    {
        $this->load->model('Blog_model');
        $this->load->model('joblistingmodel');

        // Fetch all blog posts
        $data['blogs'] = $this->Blog_model->get_all_blog_posts();

        // Get all user_ids from blog posts
        $user_ids = array_column($data['blogs'], 'user_id');
        if (!empty($user_ids)) {
            // Fetch all users in one query
            $this->db->where_in('uid', $user_ids);
            $user_query = $this->db->get('user_registration');

            // Map users by their uid
            $users = [];
            foreach ($user_query->result() as $user) {
                $users[$user->uid] = $user->user_name;
            }

            // Assign the username to each blog post
            foreach ($data['blogs'] as $key => $blog) {
                $data['blogs'][$key]['username'] = isset($users[$blog['user_id']]) ? $users[$blog['user_id']] : 'Unknown';
                $data['blogs'][$key]['likes'] = $this->Blog_model->getPostLikes($blog['post_id']);
                $data['blogs'][$key]['likedstatus'] = (bool) $this->Blog_model->isLikedByUser($blog['post_id'], $this->session->userdata('login'));
            }
        }

        // Fetch all job data
        $data['jobs'] = $this->joblistingmodel->getAllJobData();

        // Render the 'social/main' view
        $data['slot'] = $this->load->view('social/main', $data, TRUE);

        // Render the main layout view
        $this->load->view('/layouts/main', $data);
    }
    public function matrimonial()
    {
        $this->db->select('gotra_name');
        $this->db->from('gotra');
        $query = $this->db->get();
        $data['gotram'] = $query->result_array();
        $data['slot'] = $this->load->view('matrimonial/index', $data, TRUE);

        $this->load->view('/layouts/main', $data);
    }

    public function login()
    {
        $data['slot'] = $this->load->view('login', '', TRUE);

        $this->load->view('/layouts/main', $data);

    }
    public function matrimonialForm()
    {
        $data['slot'] = $this->load->view('matrimonial/register', '', TRUE);

        $this->load->view('/layouts/main', $data);

    }
    public function registerForm()
    {

        $data['slot'] = $this->load->view('user/register', "", TRUE);

        // Load main layout with all data
        $this->load->view('/layouts/main', $data);

    }


    public function getSession()
    {
        echo json_encode($this->session->userdata());
    }
}
