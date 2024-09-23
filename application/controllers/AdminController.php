<?php

class AdminController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        // $this->load->model('AdminModel');
        $this->load->model('User');
        $this->load->model('Admin');
        $this->load->model('Userregistrationmodel');
        $this->load->model('MatriMonialRegistrationModel');
        $this->load->model('Blog_model');
        $this->checkAdmin();
    }

    //Admin Account Auth

    public function checkAdmin()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            // If not logged in, redirect to login page
            redirect('home'); // Replace 'auth/login' with your login URL
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('admin_logged_in');
        $this->session->sess_destroy();
        redirect('home');
    }
    public function createAdmin()
    {
        $data['slot'] = $this->load->view('admin/create', '', true);
        $this->load->view('layouts/main', $data);
    }

    public function addAdmin()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_registration.user_email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->createAdmin();
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $role = $this->input->post('role') ?: 'super_admin';

            $this->Admin->create($name, $email, $password, $role);
            $this->session->set_flashdata('success', 'Admin Created Successfully');
            redirect('cw_yaris3556/admin/create');
        }
    }
    //Admin Account Auth
//dashboard
    public function index()
    {
        //get all verified users
        $this->db->where('user_verified_status', 0);
        $data['unverifiedUsersCount'] = $this->db->count_all_results('user_registration');

        //get all unverified users
        $this->db->where('user_verified_status', 1);
        $data['verifiedUsersCount'] = $this->db->count_all_results('user_registration');

        //get all pending requests
        $this->db->where('status', 'pending');
        $data['pendingMembershipRequestsCount'] = $this->db->count_all_results('verification_requests');

        //get all processed requests
        $this->db->where('status !=', 'pending');
        $data['processedMembershipRequestsCount'] = $this->db->count_all_results('verification_requests');

        $data['matrimonialCount'] = $this->db->count_all_results('matrimonial');
        $data['postCount'] = $this->db->count_all_results('posts');
        $data['jobsCount'] = $this->db->count_all_results('job_listing');
        $data['businessCount'] = $this->db->count_all_results('business_listing');

        $data['slot'] = $this->load->view('admin/index', $data, true);
        $this->load->view('layouts/main', $data);
    }

    //dashboard

    //Users
    public function verifiedUsers()
    {
        $this->db->where('user_verified_status', 1);
        $data['verifiedUsers'] = $this->Userregistrationmodel->getAllMembers();
        $data['slot'] = $this->load->view('admin/users/list', $data, true);
        $this->load->view('layouts/main', $data);
    }
    public function unverifiedUsers()
    {
        $this->db->where('user_verified_status', 0);
        $data['unverifiedUsers'] = $this->Userregistrationmodel->getAllMembers();
        $data['slot'] = $this->load->view('admin/users/list', $data, true);
        $this->load->view('layouts/main', $data);
    }

    public function banUser($id)
    {
        if ($this->Userregistrationmodel->banUser($id)) {
            $this->session->set_flashdata('success', 'User banned successfully');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Error banning user');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function unBanUser($id)
    {
        if ($this->Userregistrationmodel->unBanUser($id)) {
            $this->session->set_flashdata('success', 'User banned successfully');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Error banning user');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    //Users



    //Matrimonial Section
    public function matrimonialProfiles()
    {
        $data['profiles'] = $this->MatriMonialRegistrationModel->getAllMatrimonialData();
        $data['slot'] = $this->load->view('admin/matrimonial/list', $data, true);
        $this->load->view('layouts/main', $data);
    }
    public function viewMatrimonialProfiles($id)
    {
        $data['profile'] = $this->MatriMonialRegistrationModel->get_matrimonial_profile_by_id($id);
        $data['slot'] = $this->load->view('admin/matrimonial/view', $data, true);
        $this->load->view('layouts/main', $data);
    }
    public function suspendMatrimonialProfile($id)
    {
        if ($this->MatriMonialRegistrationModel->suspend_matrimonial_profile($id)) {
            $this->session->set_flashdata('success', 'Profile suspended successfully');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Error suspending profile');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function enableMatrimonialProfile($id)
    {
        if ($this->MatriMonialRegistrationModel->enable_matrimonial_profile($id)) {
            $this->session->set_flashdata('success', 'Profile enabled successfully');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Error enable profile');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    //Matrimonial Section

    //Social Section
    public function postList()
    {
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
            }
        }

        $data['slot'] = $this->load->view('admin/posts/list', $data, true);
        $this->load->view('layouts/main', $data);
    }

    public function viewPost($id)
    {
        $data['post'] = $this->Blog_model->getSinglePost($id);
        $data['comments'] = $this->Blog_model->getComments($id);
        $data['slot'] = $this->load->view('admin/posts/view', $data, true);
        $this->load->view('layouts/main', $data);
    }

    public function banPost($id)
    {
        if ($this->Blog_model->banPost($id)) {
            $this->session->set_flashdata('success', 'Post banned successfully');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Error banning post');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function unBanPost($id)
    {
        if ($this->Blog_model->unBanPost($id)) {
            $this->session->set_flashdata('success', 'Post unbanned successfully');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Error unbanning post');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function deleteComment($id)
    {
        if ($this->Blog_model->adminDeleteComment($id)) {
            $this->session->set_flashdata('success', 'Comment deleted successfully');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Error deleting comment');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function restoreComment($id)
    {
        if ($this->Blog_model->adminRestoreComment($id)) {
            $this->session->set_flashdata('success', 'Comment deleted successfully');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Error deleting comment');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    //Social Section


    //Requests
    public function fetchProcessedRequests()
    {
        $this->db->select('verification_requests.*, user_registration.user_name,user_registration.user_mobile,');
        $this->db->from('verification_requests');
        $this->db->where('verification_requests.status !=', 'pending');
        $this->db->join('user_registration', 'user_registration.uid = verification_requests.user_id', 'left');
        $data['verifications'] = $this->db->get()->result();

        $data['slot'] = $this->load->view('admin/requests/view', $data, true);
        $this->load->view('layouts/main', $data);
    }
    public function fetchPendingRequests()
    {
        $this->db->select('verification_requests.*, user_registration.user_name,user_registration.user_mobile,');
        $this->db->from('verification_requests');
        $this->db->where('verification_requests.status', 'pending');
        $this->db->join('user_registration', 'user_registration.uid = verification_requests.user_id', 'left');
        $data['verifications'] = $this->db->get()->result();

        $data['slot'] = $this->load->view('admin/requests/view', $data, true);
        $this->load->view('layouts/main', $data);
    }

    public function approveMemberShip($request_id)
    {

        $this->db->where('id', $request_id);
        $this->db->update('verification_requests', array('status' => 'accepted'));
        $this->session->set_flashdata('success', 'Request Approved successfully.');
        redirect($_SERVER['HTTP_REFERER']);

    }
    public function rejectMemberShip($request_id)
    {

        $this->db->where('id', $request_id);
        $this->db->update('verification_requests', array('status' => "rejected"));
        $this->session->set_flashdata('success', 'Request Approved successfully.');
        redirect($_SERVER['HTTP_REFERER']);

    }
    //Requests


}
