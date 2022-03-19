<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Subject extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
					'type'           => 'INT',
					'unsigned'       => true,
					'auto_increment' => true,
			],
			'subjects'       => [
					'type'       => 'VARCHAR',
					'constraint' => '100',
			],
			'subject_hours' => [
					'type'			 => 'INT',
					'unsigned'       => true,
					'null'			 => true,
			],
	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('subject');
	}

	public function down()
	{
		$this->forge->dropTable('subject');
	}
}
