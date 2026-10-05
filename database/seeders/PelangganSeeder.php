<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pelanggans')->insert([
            [
                'username' => 'andi',
                'password' => Hash::make('123456'),
                'nama' => 'Andi Pratama',
                'email' => 'andi@gmail.com',
                'alamat' => 'Surabaya',
                'no_hp' => '081234567890',
            ],
            [
                'username' => 'budi',
                'password' => Hash::make('123456'),
                'nama' => 'Budi Santoso',
                'email' => 'budi@gmail.com',
                'alamat' => 'Sidoarjo',
                'no_hp' => '082345678901',
            ],
            [
                'username' => 'citra',
                'password' => Hash::make('123456'),
                'nama' => 'Citra Lestari',
                'email' => 'Gresik',
                'no_hp' => '083456789012',
            ],
        ]);
    }
}