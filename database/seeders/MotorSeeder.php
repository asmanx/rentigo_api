<?php

namespace Database\Seeders;

use App\Models\Motor;
use Illuminate\Database\Seeder;

class MotorSeeder extends Seeder
{
    public function run(): void
    {
        Motor::create([
            'nama_motor' => 'Honda Beat',
            'nopol' => 'L 1234 AB',
            'harga_sewa' => 75000,
            'status' => 'tersedia',
        ]);

        Motor::create([
            'nama_motor' => 'Honda Vario 125',
            'nopol' => 'L 5678 CD',
            'harga_sewa' => 85000,
            'status' => 'tersedia',
        ]);

        Motor::create([
            'nama_motor' => 'Yamaha NMAX',
            'nopol' => 'L 9012 EF',
            'harga_sewa' => 120000,
            'status' => 'tersedia',
        ]);
    }
}