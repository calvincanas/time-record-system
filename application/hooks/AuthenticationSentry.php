<?php

class AuthenticationSentry {

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

	public function isUserLoggedin()
	{
//		User check session
//			You must use hooks to be able to check if current user’s session is
//			expired or not. If it is expired, user will be redirected to the login
//			page. If user’s session is still not expired and he tried to access the
//			login page, he will be redirected to employee’s time record page.
		$this->codeIgniterInstance->load->helper('url');
		if (!$this->codeIgniterInstance->session->has_userdata('username')) {
			if (property_exists($this->codeIgniterInstance, 'guestAllowedMethods')) {
				if (!in_array($this->router->fetch_method(), $this->codeIgniterInstance->guestAllowedMethods, false)) {
					redirect(base_url('login/index'));
				}
			} else {
				redirect(base_url('login/index'));
			}
		} else {
			if ('login' == $this->router->fetch_class() && 'index' == $this->router->fetch_method()) {
				redirect(base_url('employee/index'));
			}
		}
	}
}
