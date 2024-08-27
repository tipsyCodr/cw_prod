<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 * @property Blog_model $Blog_model
 * @property input $input
 * @property upload $upload
 * @property session $session
 */
class BlogController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Blog_model');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('blog/add_blog_section');
		$data['blogs'] = $this->Blog_model->get_all_blog_posts();
		$this->load->view('blog/blog_test', $data);
		$this->load->view('footer');
	}

	public function blog_details($id)
	{


		$blog['blog'] = $this->Blog_model->getSinglePost($id);
		$blog['comments'] = $this->Blog_model->getComments($id);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('blog/blog_detail', $blog);
		$this->load->view('footer');
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
		$result = $this->Blog_model->add_comment($comment_data);
		return $result;
	}
	public function increseLike()
	{
		$post_id = $this->input->post('id');

		$likeData = $this->Blog_model->handleLikes($post_id);

		echo json_encode($likeData);


	}

	public function add_blog()
	{
		$this->load->library('upload');
		$this->load->database(); // Load the database library

		$files = $_FILES['blog_image'];
		$imageName = [];

		if (is_array($files['name'])) {
			$cpt = count($files['name']);
			for ($i = 0; $i < $cpt; $i++) {
				if ($files['name'][$i] != "") {
					$originalName = $files['name'][$i];
					$fileExtension = pathinfo($originalName, PATHINFO_EXTENSION);
					$sanitizedFileName = $this->sanitizeFileName(pathinfo($originalName, PATHINFO_FILENAME));
					$uniqueName = time() . '_' . $sanitizedFileName . '.' . $fileExtension;

					$_FILES['single_image']['name'] = $uniqueName;
					$_FILES['single_image']['type'] = $files['type'][$i];
					$_FILES['single_image']['tmp_name'] = $files['tmp_name'][$i];
					$_FILES['single_image']['error'] = $files['error'][$i];
					$_FILES['single_image']['size'] = $files['size'][$i];

					$this->upload->initialize($this->set_upload_options());

					if ($this->upload->do_upload('single_image')) {
						$uploadData = $this->upload->data();
						$fileName = $uploadData['file_name'];
						$imageName[] = $fileName;
					} else {
						// $error = $this->upload->display_errors();
						// echo $error;
					}
				}
			}
		} else {
			// Handle single file upload (if somehow it's not passed as an array)
			if ($files['name'] != "") {
				$originalName = $files['name'];
				$fileExtension = pathinfo($originalName, PATHINFO_EXTENSION);
				$sanitizedFileName = $this->sanitizeFileName(pathinfo($originalName, PATHINFO_FILENAME));
				$uniqueName = time() . '_' . $sanitizedFileName . '.' . $fileExtension;

				$_FILES['single_image']['name'] = $uniqueName;
				$_FILES['single_image']['type'] = $files['type'];
				$_FILES['single_image']['tmp_name'] = $files['tmp_name'];
				$_FILES['single_image']['error'] = $files['error'];
				$_FILES['single_image']['size'] = $files['size'];

				$this->upload->initialize($this->set_upload_options());

				if ($this->upload->do_upload('single_image')) {
					$uploadData = $this->upload->data();
					$fileName = $uploadData['file_name'];
					$imageName[] = $fileName;
				} else {
					$error = $this->upload->display_errors();
					// Handle errors if needed
					// redirect("/blog");

				}
			}
		}

		// Combine all image names into a single string
		$imageNames = implode(',', $imageName);

		// Capture the blog caption
		$blogCaption = $this->input->post('blog_caption');

		$isInserted = $this->Blog_model->add_blog($imageNames, $blogCaption);
		if ($isInserted) {
			$this->session->set_flashdata('added_blog', 'Blog Added Successfully');
			redirect("/blog");
		} else {
			$this->session->set_flashdata('error_blog', 'There Is an Error');
			redirect("/blog");
		}
	}


	public function set_upload_options()
	{
		$config['upload_path'] = './uploads/blog_images';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['remove_spaces'] = true;
		return $config;
	}

	function sanitizeFileName($filename)
	{
		// Remove any characters that are not letters, numbers, dashes, or underscores
		$filename = preg_replace('/[^a-zA-Z0-9_-]/', '_', $filename);
		return $filename;
	}

}
