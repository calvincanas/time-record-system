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

	public function all()
    {
        $query = $this->db->get('user');
        return $query->result();
    }

	public function get_by_id($id)
	{
		$query = $this->db->get_where('user', array('id' => $id));
        return $query->row();
	}

	public function createOrUpdate()
	{
		$this->load->helper('url');
        $id = $this->input->post('id');

        $data = array(
            'user_name' => $this->input->post('user_name'),
            'user_password' => $this->input->post('password'),
            'user_type' => $this->input->post('user_type'),
        );
        if (empty($id)) {
            return $this->db->insert('user', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('user', $data);
        }
	}
}
