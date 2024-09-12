<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property $input
 * @property $Blog_model
 */
class SocialController extends CI_Controller
{
	public function view($post_id){
//		$post_id = $this->input->get('post_id');
		$this->load->model('Blog_model');
		$data['blog'] = $this->Blog_model->getSinglePost($post_id);
		$data['comments'] = $this->Blog_model->getComments($post_id);
		$data['user'] = $this->Blog_model->postedBy($post_id);

		$data['slot'] = $this->load->view('social/post', $data, TRUE);
		$this->load->view('layouts/main', $data);

	}
}
