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
                'auto_increment' => true,
            ],
            'perusahaan' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
            ],
            'alamat_perusahaan' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
            ],
            'tanggal' => [
                'type' => 'DATE'
            ],
            'portal_id' => [
                'type' => 'INT',
                'constraint'     => 11,
                'unsigned' => true,
            ],
            'status_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'  => true,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'  => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('portal_id', 'tb_portal', 'id');
        $this->forge->addForeignKey('status_id', 'tb_status', 'id');
        $this->forge->createTable('tb_lamaran');
    }

    public function down()
    {
        $this->forge->dropTable('tb_lamaran');
    }
}
