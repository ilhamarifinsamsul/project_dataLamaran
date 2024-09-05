<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class All extends Seeder
{
    public function run()
    {
        $this->call('SeedPortal');
        $this->call('SeedRole');
        $this->call('SeedStatus');
        $this->call('SeedUser');
    }
}
