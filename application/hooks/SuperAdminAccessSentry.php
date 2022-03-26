<?php

class SuperAdminAccessSentry {

	/**
	 * @var CI_Controller
	 */
	public $codeIgniterInstance;
	/**
	 * @var object
	 */
	public $router;

	public function __construct()
    {
		$this->codeIgniterInstance =& get_instance();
		$this->router =& load_class('Router');
    }

	public function isCurrentUserSuperAdmin()
	{
		$this->codeIgniterInstance->load->helper('url');
		$userType = $this->codeIgniterInstance->session->userdata('user_type');
		if ($userType !== '1' && property_exists($this->codeIgniterInstance, 'superAdminOnly')) {
			redirect(base_url('login/success'));
		}
	}
}
