<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedStatus extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_status' => 'Apply',
            ],
            [
                'nama_status' => 'Psikotest',
            ],
            [
                'nama_status' => 'Interview HR',
            ],
            [
                'nama_status' => 'Interview User',
            ],
            [
                'nama_status' => 'MCU',
            ],
            [
                'nama_status' => 'joined',
            ],
        ];
        $this->db->table('tb_status')->insertBatch($data);
    }
}
