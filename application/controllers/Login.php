<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public $guestAllowedMethods = array(
		'index',
		'process'
	);

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('users_model');

	}

	public function index()
	{
//		require APPPATH . 'libraries/phpqrcode/phpqrcode.php';
//		$wew = QRcode::png('PHP QR Code :)');
//		echo $wew;

		$this->load->view('login');
	}

	public function process() {

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if ($this->users_model->can_login($username, $password)) {
				$this->db->where('user_name', $username);
				$query = $this->db->get('user');
				$user_row = $query->row();
				$session_data = array(
					'username' => $username,
					'user_id' => $user_row->id,
				);
				$this->session->set_userdata($session_data);
				redirect(base_url('login/success')); // dapat sa dashboard ng admin or time emp
			} else {
				$this->session->set_flashdata('error', 'Invalid Username and Password');
				redirect(base_url('login/index'));
			}
		} else {
			redirect(base_url('login/index'));
		}
	}

	public function success() {
		echo '<h2>Welcome - ' . $this->session->userdata('username') . '</h2>';
		echo '<label><a href="' . base_url('employee/create') . '">Create Employee</a></label>';
		echo '<label><a href="' . base_url('login/logout') . '">Logout</a></label>';
	}

	public function logout() {
		$this->session->unset_userdata('username');
		redirect(base_url('login/index'));
	}
}
