<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedPortal extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_portal' => 'Email',
                'created_at' => '2024-09-05 14:15:00.000',
                'updated_at' => '2024-09-05 14:15:00.000'
            ],
            [
                'nama_portal' => 'Google Form',
                'created_at' => '2024-09-05 14:15:00.000',
                'updated_at' => '2024-09-05 14:15:00.000'
            ],
            [
                'nama_portal' => 'LinkedIn',
                'created_at' => '2024-09-05 14:15:00.000',
                'updated_at' => '2024-09-05 14:15:00.000'
            ],
        ];
        $this->db->table('tb_portal')->insertBatch($data);
    }
}
