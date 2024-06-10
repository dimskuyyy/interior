<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProjekTable extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'projek_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'projek_nama' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'projek_slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true,
            ],
            'projek_kategori_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'projek_deskripsi' => [
                'type' => 'TEXT',
            ],
            'projek_konten' => [
                'type' => 'TEXT',
            ],
            'projek_media_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'projek_status' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'comment' => '1=save as draft,2=publish',
            ],
            'projek_user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'projek_created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'projek_created_by' => [
                'type' => 'INT',
                'null' => true
            ],
            'projek_published_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'projek_published_by' => [
                'type' => 'INT',
                'null' => true
            ],
            'projek_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'projek_updated_by' => [
                'type' => 'INT',
                'null' => true
            ],
            'projek_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'projek_deleted_by' => [
                'type' => 'INT',
                'null' => true
            ]
        ]);
        $this->forge->addForeignKey('projek_kategori_id', 'kategori', 'kat_id', 'CASCADE', 'CASCADE', 'projek_kategori_id');
        $this->forge->addForeignKey('projek_media_id', 'media', 'media_id', 'CASCADE', 'CASCADE', 'projek_media_id');
        $this->forge->addForeignKey('projek_user_id', 'user', 'user_id', 'CASCADE', 'CASCADE', 'projek_user_id');
        $this->forge->addKey('projek_id', true);
        $this->forge->createTable('projek');
    }

    public function down()
    {
        $this->forge->dropTable('projek');
    }
}
