<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbLamaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'perusahaan' => [
                'type' => 'VARCHAR',
                'constraint' => '256'
            ],
            'alamat_perusahaan' => [
                'type' => 'VARCHAR',
                'constraint' => '256'
            ],
            'tanggal' => [
                'type' => 'DATE'
            ],
            'portal_id' => [
                'type' => 'INT',
                'constraint'     => 11,
                'unsigned' => true
            ],
            'status_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'created_at' => [
                'type'           => 'DATETIME'
            ],
            'updated_at' => [
                'type'           => 'DATETIME'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_lamaran');
    }

    public function down()
    {
        $this->forge->dropTable('tb_lamaran');
    }
}
