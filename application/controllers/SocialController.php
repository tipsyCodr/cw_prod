<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property $input
 * @property $Blog_model
 */
class SocialController extends MY_Controller
{

	public function getAllPosts()
	{
		$this->load->model('Blog_model');
		$data['posts'] = $this->Blog_model->getPosts();
		foreach ($data['posts'] as $key => $post) {
			$data['user'][$key] = $this->Blog_model->postedBy($post['post_id']);
		}
		return $data;
		// $data['slot'] = $this->load->view('social/index', $data, TRUE);
		// $this->load->view('layouts/main', $data);
	}
	public function getAllMembers()
	{
		$this->load->model('Userregistrationmodel');
		$data['members'] = $this->Userregistrationmodel->getAllMembers();
		$data['slot'] = $this->load->view('social/members', $data, TRUE);
		$this->load->view('layouts/main', $data);
	}
	public function view($post_id)
	{
		//		$post_id = $this->input->get('post_id');
		$this->load->model('Blog_model');
		$data['blog'] = $this->Blog_model->getSinglePost($post_id);
		$data['comments'] = $this->Blog_model->getComments($post_id);
		$data['user'] = $this->Blog_model->postedBy($post_id);

		$data['slot'] = $this->load->view('social/post', $data, TRUE);
		$this->load->view('layouts/main', $data);

	}

	public function add_comments()
	{

		$comment = $this->input->post('comment');
		$blog_id = $this->input->post('blog_id');
		$user_id = $this->session->userdata('user_id');
		$comment_data = array(
			'comment' => $comment,
			'blog_id' => $blog_id,
			'user_id' => $user_id
		);

		// print_r($comment_data);
		$this->load->model('Blog_model');
		$result = $this->Blog_model->add_comment($comment_data);
		if ($result) {
			$this->session->set_flashdata('success', 'Comment added successfully');
			redirect('social/post/' . $blog_id);
		} else {
			$this->session->set_flashdata("error", "Something went wrong");
			redirect('social/post/' . $blog_id);
		}
		return $result;
		//		Array ( [comment_text] => asd [post_id] => 3 [user_id] => 1 [created_at] => 2024-09-12 12:20:54 )
	}
}
