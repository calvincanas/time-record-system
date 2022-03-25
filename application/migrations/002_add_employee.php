<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Employee extends CI_Migration
{

	public function up()
	{
		$this->dbforge->add_field(array(
			'first_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'last_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'created_by' => array(
				'type' => 'INT',
			),
			'datetime_added datetime default current_timestamp',
			'datetime_updated datetime default current_timestamp on update current_timestamp',
		));
		$this->dbforge->add_field('CONSTRAINT FOREIGN KEY (created_by) REFERENCES user(id)');
		$this->dbforge->add_field('id');
		$this->dbforge->create_table('employee');
	}

	public function down()
	{
		$this->dbforge->drop_table('employee');
	}
}
