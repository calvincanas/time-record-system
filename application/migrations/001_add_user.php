<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_User extends CI_Migration
{

	public function up()
	{
		$this->dbforge->add_field(array(
			'user_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'user_password' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'user_type' => array(
				'type' => 'INT',
			),
			'datetime_added datetime default current_timestamp',
			'datetime_modified datetime default current_timestamp on update current_timestamp',
		));
		$this->dbforge->add_field('id');
		$this->dbforge->create_table('user');
	}

	public function down()
	{
		$this->dbforge->drop_table('user');
	}
}
