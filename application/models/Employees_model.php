<?php

class Employees_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }

	public function all()
    {
        $query = $this->db->get('employee');
        return $query->result();
    }

	public function get_by_id($id)
	{
		$query = $this->db->get_where('employee', array('id' => $id));
        return $query->row();
	}
     
    public function createOrUpdate()
    {
        $this->load->helper('url');
        $id = $this->input->post('id');
 
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'created_by' => $this->session->userdata('user_id'),
        );
        if (empty($id)) {
            return $this->db->insert('employee', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('employee', $data);
        }
    }

	public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('employee');
    }

	public function massDelete($ids)
	{
		$this->db->where_in('id', $ids);
        return $this->db->delete('employee');
	}
}
