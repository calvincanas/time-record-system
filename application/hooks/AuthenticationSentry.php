<?php

class AuthenticationSentry {

	/**
	 * @var CI_Controller
	 */
	private $codeIgniterInstance;

	public function __construct()
    {
		$this->codeIgniterInstance = &get_instance();
    }

	public function isUserLogin()
	{
//		User check session
//			You must use hooks to be able to check if current user’s session is
//			expired or not. If it is expired, user will be redirected to the login
//			page. If user’s session is still not expired and he tried to access the
//			login page, he will be redirected to employee’s time record page.

		if (!$this->codeIgniterInstance->session->has_userdata('username')) {
			if (uri_string() !== 'login') {
				redirect(base_url() . 'login');
			}
		}

		// if logged in and trying to access login page
		if (uri_string() === 'login') {
			redirect(base_url('login/success')); // mmya i recode
		}
	}
}
