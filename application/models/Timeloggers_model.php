<?php

class Timeloggers_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_logs_of_employee($id)
	{
		$query = $this->db->get_where('employee_time_record', array(
			'employee_id' => $id
		));
        return $query->result();
	}

	public function create($employeeID, $userID)
	{
		$this->load->helper('url');
		$query = $this->db->query("SELECT * FROM employee_time_record WHERE employee_id = {$employeeID} ORDER BY id DESC LIMIT 1");
		$latestRecord = $query->row();


		if (isset($latestRecord)) {
			$mode = $latestRecord->mode === 'in' ? 'out' : 'in';
		} else {
			$mode = 'in';
		}

		$data = array(
			'employee_id' => $employeeID,
			'mode' => $mode,
			'user_id' => $userID,
		);

		$this->db->insert('employee_time_record', $data);
		return $mode;
	}

}
