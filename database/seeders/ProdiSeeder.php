<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prodis = [
            [
                'kode_prodi' => 10000,
                'created_at' => now()
            ],
            [
                'kode_prodi' => 20000,
                'created_at' => now()
            ],
        ];

        Prodi::insert($prodis);
    }
}
