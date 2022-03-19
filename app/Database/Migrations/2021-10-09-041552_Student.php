<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Student extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
					'type'           => 'INT',
					'unsigned'       => true,
					'auto_increment' => true,
			],
			'name'       => [
					'type'       => 'VARCHAR',
					'constraint' => '100',
			],
			'tgl_lahir' => [
					'type'			 => 'date',
					'unsigned'       => true,
					'null'			 => true,
			],
			'tmpt_lahir'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'gender'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],

			
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('student');
	}

	public function down()
	{
		$this->forge->dropTable('student');
	}
}
