<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKontakTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kontak_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kontak_perihal' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'kontak_nama' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'kontak_email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kontak_pesan' => [
                'type' => 'TEXT',
            ],
            'kontak_created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'kontak_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'kontak_updated_by' => [
                'type' => 'INT',
                'null' => true
            ],
            'kontak_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'kontak_deleted_by' => [
                'type' => 'INT',
                'null' => true
            ]
        ]);
        $this->forge->addKey('kontak_id', true);
        $this->forge->createTable('kontak');
    }

    public function down()
    {
        $this->forge->dropTable('kontak');
    }
}
