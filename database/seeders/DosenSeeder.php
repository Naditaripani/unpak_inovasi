<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dosens = [
            [
                'nidn' => 1000,
                'kode_prodi' => 2000,
                'created_at' => now()
            ],
            [
                'nidn' => 2000,
                'kode_prodi' => 3000,
                'created_at' => now()
            ],
        ];

        Dosen::insert($dosens);
    }
}
