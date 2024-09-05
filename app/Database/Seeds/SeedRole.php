<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedRole extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_role' => 'Admin',
            ],
            [
                'nama_role' => 'jobseeker',
            ],
        ];
        $this->db->table('tb_role')->insertBatch($data);
    }
}
