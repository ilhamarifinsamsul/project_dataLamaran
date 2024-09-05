<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedUser extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'nama_lengkap' => 'Admin Sistem Informasi',
                'password' => password_hash('123', PASSWORD_DEFAULT),
                'alamat' => 'Subang',
                'no_hp' => '087699525330',
                'role_id' => 1,
                'created_at' => '2024-09-05 14:15:00.000',
                'updated_at' => '2024-09-05 14:15:00.000',
            ],
            [
                'username' => 'Ilham',
                'nama_lengkap' => 'Ilham Arifin',
                'password' => password_hash('1234', PASSWORD_DEFAULT),
                'alamat' => 'Subang',
                'no_hp' => '089699525330',
                'role_id' => 2,
                'created_at' => '2024-09-05 14:15:00.000',
                'updated_at' => '2024-09-05 14:15:00.000',
            ],
        ];
        $this->db->table('tb_users')->insertBatch($data);
    }
}
