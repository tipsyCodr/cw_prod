<?php

class ServiceController extends MY_Controller
{

	public function postJobForm()
	{
		$data['title'] = 'Post Job Form';
		$data['slot'] = $this->load->view('services/post-job', '', true);
		$this->load->view('layouts/main', $data);
	}
	public function postJobSave()
	{
		$this->load->model('Joblistingmodel');
		$data = $this->input->post();

		if (!empty($_FILES['job_image']['name'])) {
			$upload_path = './uploads/job_listing';
			$config['upload_path'] = $upload_path;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			// $config['max_size'] = '2048';  // 2MB
			$config['file_name'] = time() . '_' . $_FILES['job_image']['name'];

			if (!is_dir($upload_path)) {
				if (!mkdir($upload_path, 0755, TRUE) && !is_dir($upload_path)) {
					throw new \RuntimeException(sprintf('Directory "%s" was not created', $upload_path));
				}
			}

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('job_image')) {
				$uploaded_pic_data = $this->upload->data();
				$data['job_image'] = $uploaded_pic_data['file_name'];
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', 'Upload error: ' . $error . ' Path: ' . realpath($upload_path));
				redirect($_SERVER['HTTP_REFERER']);
				//				redirect('services/post/job');
			}
		}

		$this->Joblistingmodel->job_listing($data);

		$this->session->set_flashdata('success', "Data: " . 'Job Listed successfully!');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function postBusinessForm()
	{
		$data['slot'] = $this->load->view('services/post-business', '', true);
		$this->load->view('layouts/main', $data);
	}
	public function postBusinessSave()
	{
		// $this->load->model('Businesslistingmodel');
		// $data = $this->input->post();
		// $this->Businesslistingmodel->post_business($data);



		$this->load->model('businesslistingmodel');

		$business_data = $this->input->post();

		$this->form_validation->set_rules('company_name', 'Company Name', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect($_SERVER['HTTP_REFERER']);
		}

		if (!empty($_FILES['business_image']['name'])) {
			$upload_path = 'uploads/business_listing';
			$config = [
				'upload_path' => $upload_path,
				'allowed_types' => 'jpg|jpeg|png|gif',
				'file_name' => time() . '_' . $_FILES['business_image']['name']
			];

			if (!is_dir($upload_path)) {
				if (!mkdir($upload_path, 0755, TRUE) && !is_dir($upload_path)) {
					throw new \RuntimeException(sprintf('Directory "%s" was not created', $upload_path));
				}
			}

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('business_image')) {
				$uploaded_pic_data = $this->upload->data();
				$business_data['business_image'] = $uploaded_pic_data['file_name'];
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', 'Upload error: ' . $error . ' Path: ' . realpath($upload_path));
				redirect($_SERVER['HTTP_REFERER']);
				//				redirect('services/post/job');
			}

		} else {
			$business_data['business_image'] = ''; // Handle optional image
		}

		if ($this->businesslistingmodel->post_business($business_data)) {
			$this->session->set_flashdata('success', 'Business posted successfully');
		} else {
			$this->session->set_flashdata('error', 'Business posting failed. Try again later.');
		}

		redirect($_SERVER['HTTP_REFERER']);



	}
}
