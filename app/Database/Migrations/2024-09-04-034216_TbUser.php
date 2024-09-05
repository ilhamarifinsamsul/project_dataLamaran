<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbUsers extends Migration
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
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
            ],
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'role_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned' => true,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'  => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('username', 'username');
        $this->forge->addUniqueKey('email', 'email');
        $this->forge->addForeignKey('role_id', 'tb_role', 'id');
        $this->forge->createTable('tb_users');
    }

    public function down()
    {
        // $this->forge->dropForeignKey('tb_users', 'role_id');
        // $this->forge->dropColumn('tb_users', 'role_id');
        $this->forge->dropTable('tb_users');
        
    }
}
