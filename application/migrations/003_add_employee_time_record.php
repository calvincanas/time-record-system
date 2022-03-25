<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Employee_Time_Record extends CI_Migration
{

	public function up()
	{
		$this->dbforge->add_field(array(
			'employee_id' => array(
				'type' => 'INT',
			),
			'user_id' => array(
				'type' => 'INT',
			),
			'time_in' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
			),
			'time_out' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
			),
			'date_added datetime default current_timestamp',
		));
		$this->dbforge->add_field('id');
		$this->dbforge->create_table('employee_time_record');
	}

	public function down()
	{
		$this->dbforge->drop_table('employee_time_record');
	}
}
