<?php

class Users_model extends CI_Model
{
	public function can_login($username, $password)
	{
		$this->db->where('user_name', $username);
		$this->db->where('user_password', $password);
		$query = $this->db->get('user');
		//SELECT * FROM users WHERE username = '$username' AND password = '$password'
		return $query->num_rows() > 0;
	}
}
