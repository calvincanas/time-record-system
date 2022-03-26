<?php
class Staff extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['real_data']['users'] = $this->users_model->all();
		$data['title'] = 'List Of Users';
		$data['main_content'] = 'users/list';
		$this->load->view('template', $data);
	}

	public function create()
    {
		$data['title'] = 'Add User';
		$data['main_content'] = 'users/create';
		$this->load->view('template', $data);
    }

    public function store()
    {

        $this->form_validation->set_rules('user_name', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('user_type', 'User Type', 'required');

        $id = $this->input->post('id');

        if ($this->form_validation->run() === FALSE) {
            if (empty($id)) {
				redirect( base_url('staff/create') );
            } else {
            	redirect( base_url('staff/edit/'.$id) );
            }
        } else {
            $this->users_model->createOrUpdate();
            redirect( base_url('staff/index') );
        }
    }

	public function edit($id)
    {
        $id = $this->uri->segment(3);

        if (empty($id)) {
			show_404();
        } else {
          	$data['real_data']['user'] = $this->users_model->get_by_id($id);
			$data['title'] = 'Edit User';
			$data['main_content'] = 'users/edit';
          	$this->load->view('template', $data);
        }
    }

	public function delete()
    {
        $id = $this->uri->segment(3);
        if (empty($id)) {
            show_404();
        }

        $this->users_model->delete($id);

        redirect( base_url('staff/index') );
    }
}
