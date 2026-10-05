<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mobil;

class MobilSeeder extends Seeder
{
    public function run(): void
    {
        Mobil::create([
            'nama' => 'TOYOTA AVANZA',
            'harga' => 300000,
            'gambar' => null,
            'status' => 'Available',
        ]);

        Mobil::create([
            'nama' => 'HONDA BRIO',
            'harga' => 250000,
            'gambar' => null,
            'status' => 'Available',
        ]);

        Mobil::create([
            'nama' => 'HYUNDAI PALISADE',
            'harga' => 500000,
            'gambar' => null,
            'status' => 'Available',
        ]);

        Mobil::create([
            'nama' => 'BMW M4',
            'harga' => 1000000,
            'gambar' => null,
            'status' => 'Available',
        ]);

        Mobil::create([
            'nama' => 'TOYOTA FORTUNER',
            'harga' => 600000,
            'gambar' => null,
            'status' => 'Available',
        ]);

        Mobil::create([
            'nama' => 'CHERY TIGGO 9',
            'harga' => 550000,
            'gambar' => null,
            'status' => 'Available',
        ]);

        Mobil::create([
            'nama' => 'MAZDA 3 HATCHBACK',
            'harga' => 400000,
            'gambar' => null,
            'status' => 'Available',
        ]);

        Mobil::create([
            'nama' => 'INNOVA REBORN',
            'harga' => 450000,
            'gambar' => null,
            'status' => 'Available',
        ]);
    }
}