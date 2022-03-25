<?php
class Employee extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('employees_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->helper('url');

    }

	public function index()
	{
		$data['employees'] = $this->employees_model->all();
		$this->load->view('employees/list', $data);
	}

    public function create()
    {
        $this->load->view('employees/create');
    }

    public function store()
    {

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');

        $id = $this->input->post('id');

        if ($this->form_validation->run() === FALSE) {
            if (empty($id)) {
				redirect( base_url('employees/create') );
            } else {
            	redirect( base_url('employees/edit/'.$id) );
            }
        } else {
            $data['employee'] = $this->employees_model->createOrUpdate();
            redirect( base_url('employee/index') );
        }
    }

	public function edit($id)
    {
        $id = $this->uri->segment(3);
        $data = array();

        if (empty($id)) {
			show_404();
        } else {
          	$data['employee'] = $this->employees_model->get_by_id($id);
          	$this->load->view('employees/edit', $data);
        }
    }

	public function delete()
    {
        $id = $this->uri->segment(3);
        if (empty($id)) {
            show_404();
        }

        $this->employees_model->delete($id);

        redirect( base_url('employee/index') );
    }
}
