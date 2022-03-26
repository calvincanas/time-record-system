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
				$query = $this->db->get_where('user', array('user_name' => $username));
        		$user_row = $query->row();

				$session_data = array(
					'username' => $username,
					'user_id' => $user_row->id,
					'user_type' => $user_row->user_type,
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
		$data['title'] = 'Dashboard';
		$data['main_content'] = 'logins/success';
		$this->load->view('template', $data);
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_type');

		redirect(base_url('login/index'));
	}
}
