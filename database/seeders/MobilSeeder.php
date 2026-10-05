<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MobilSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mobils')->insert([
            [
                'id' => 'MBL01',
                'nama' => 'Toyota Avanza',
                'harga' => 350000,
                'gambar' => 'uploads/mobil/avanza.jpg',
                'status' => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'MBL02',
                'nama' => 'Honda Brio',
                'harga' => 400000,
                'gambar' => 'uploads/mobil/brio.jpg',
                'status' => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'MBL03',
                'nama' => 'Toyota Calya',
                'harga' => 300000,
                'gambar' => 'uploads/mobil/calya.jpg',
                'status' => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'MBL04',
                'nama' => 'Mitsubishi Xpander',
                'harga' => 500000,
                'gambar' => 'uploads/mobil/xpander.jpg',
                'status' => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}