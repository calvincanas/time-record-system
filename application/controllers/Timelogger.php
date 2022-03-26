<?php

class Timelogger extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('timeloggers_model');
		$this->load->model('employees_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	public function lookup()
	{
		$data['title'] = 'Scan / Search Employee';
		$data['main_content'] = 'timeloggers/lookup';
		$this->load->view('template', $data);
	}

	public function process_lookup()
	{
		// if id provided look for it in employees table
		// if qr provided(maybe

		$id = $this->input->post('id');
		$employee = $this->employees_model->get_by_id($id);
		if (!$employee) {
			echo json_encode(array(
				'status' => 'failed',
				'message' => 'No Employee Record Found!'
			));
			die();
		}

		$userID = $this->session->userdata('user_id');
		$resultMode = $this->timeloggers_model->create($employee->id, $userID);

		echo json_encode(array(
			'status' => 'success',
			'message' => $resultMode
		));
		die();
	}

	public function record($id)
	{
		$id = $this->uri->segment(3);

		if (empty($id)) {
			show_404();
		} else {
			$data['real_data']['employee'] = $this->employees_model->get_by_id($id);
			$data['real_data']['records'] = $this->timeloggers_model->get_logs_of_employee($id);
			$data['title'] = 'Employee Time Record';
			$data['main_content'] = 'timeloggers/record';
			$this->load->view('template', $data);
		}
	}
}
