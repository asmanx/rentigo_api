<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class PemesananSeeder extends Seeder
{
 
    public function run(): void
    {
        // 1. Cek apakah tabel 'pelanggans' sudah dibuat oleh migration/temanmu.
        // Jika tabelnya ada, baru buat data dummy pelanggan. Jika belum ada, step ini dilewati dengan aman.
        if (Schema::hasTable('pelanggans')) {
            DB::table('pelanggans')->insertOrIgnore([
                'user_id' => 1,
                'username' => 'pelanggan_dummy',
                'password' => Hash::make('password123'),
                'nama' => 'Budi Santoso',
                'email' => 'budi@gmail.com',
                'alamat' => 'Jl. Merdeka No. 123',
                'no_hp' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 2. Data Dummy Pemesanan (7 Records: PMS01 - PMS07)
        $dataPemesanan = [
            [
                'id_pemesanan' => 'PMS01',
                'user_id' => 1,
                'id_mobil' => 'MBL01',
                'id_motor' => null,
                'nomor_invoice' => 'INV-20261004-001',
                'tanggal_pemesanan' => '2026-10-01',
                'tanggal_mulai_sewa' => '2026-10-02',
                'tanggal_selesai_sewa' => '2026-10-04',
                'lama_sewa' => 2,
                'harga_sewa' => 350000.00,
                'total_harga' => 700000.00,
                'metode_pembayaran' => 'Transfer Bank',
                'status_pembayaran' => 'dibayar',
                'tanggal_pembayaran' => '2026-10-01 10:00:00',
                'ktp' => 'uploads/ktp/ktp_pms01.jpg',
                'sim' => 'uploads/sim/sim_pms01.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pemesanan' => 'PMS02',
                'user_id' => 1,
                'id_mobil' => null,
                'id_motor' => 'MTR01',
                'nomor_invoice' => 'INV-20261004-002',
                'tanggal_pemesanan' => '2026-10-02',
                'tanggal_mulai_sewa' => '2026-10-03',
                'tanggal_selesai_sewa' => '2026-10-04',
                'lama_sewa' => 1,
                'harga_sewa' => 100000.00,
                'total_harga' => 100000.00,
                'metode_pembayaran' => 'E-Wallet',
                'status_pembayaran' => 'dibayar',
                'tanggal_pembayaran' => '2026-10-02 14:30:00',
                'ktp' => 'uploads/ktp/ktp_pms02.jpg',
                'sim' => 'uploads/sim/sim_pms02.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pemesanan' => 'PMS03',
                'user_id' => 1,
                'id_mobil' => 'MBL02',
                'id_motor' => null,
                'nomor_invoice' => 'INV-20261004-003',
                'tanggal_pemesanan' => '2026-10-03',
                'tanggal_mulai_sewa' => '2026-10-05',
                'tanggal_selesai_sewa' => '2026-10-08',
                'lama_sewa' => 3,
                'harga_sewa' => 400000.00,
                'total_harga' => 1200000.00,
                'metode_pembayaran' => 'Transfer Bank',
                'status_pembayaran' => 'pending',
                'tanggal_pembayaran' => null,
                'ktp' => 'uploads/ktp/ktp_pms03.jpg',
                'sim' => 'uploads/sim/sim_pms03.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pemesanan' => 'PMS04',
                'user_id' => 1,
                'id_mobil' => null,
                'id_motor' => 'MTR02',
                'nomor_invoice' => 'INV-20261004-004',
                'tanggal_pemesanan' => '2026-10-04',
                'tanggal_mulai_sewa' => '2026-10-06',
                'tanggal_selesai_sewa' => '2026-10-07',
                'lama_sewa' => 1,
                'harga_sewa' => 120000.00,
                'total_harga' => 120000.00,
                'metode_pembayaran' => 'Kartu Kredit',
                'status_pembayaran' => 'dibatalkan',
                'tanggal_pembayaran' => null,
                'ktp' => 'uploads/ktp/ktp_pms04.jpg',
                'sim' => 'uploads/sim/sim_pms04.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pemesanan' => 'PMS05',
                'user_id' => 1,
                'id_mobil' => 'MBL03',
                'id_motor' => null,
                'nomor_invoice' => 'INV-20261004-005',
                'tanggal_pemesanan' => '2026-10-04',
                'tanggal_mulai_sewa' => '2026-10-10',
                'tanggal_selesai_sewa' => '2026-10-12',
                'lama_sewa' => 2,
                'harga_sewa' => 300000.00,
                'total_harga' => 600000.00,
                'metode_pembayaran' => 'Transfer Bank',
                'status_pembayaran' => 'kadaluarsa',
                'tanggal_pembayaran' => null,
                'ktp' => 'uploads/ktp/ktp_pms05.jpg',
                'sim' => 'uploads/sim/sim_pms05.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pemesanan' => 'PMS06',
                'user_id' => 1,
                'id_mobil' => null,
                'id_motor' => 'MTR03',
                'nomor_invoice' => 'INV-20261004-006',
                'tanggal_pemesanan' => '2026-10-05',
                'tanggal_mulai_sewa' => '2026-10-07',
                'tanggal_selesai_sewa' => '2026-10-09',
                'lama_sewa' => 2,
                'harga_sewa' => 110000.00,
                'total_harga' => 220000.00,
                'metode_pembayaran' => 'E-Wallet',
                'status_pembayaran' => 'dibayar',
                'tanggal_pembayaran' => '2026-10-05 09:15:00',
                'ktp' => 'uploads/ktp/ktp_pms06.jpg',
                'sim' => 'uploads/sim/sim_pms06.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pemesanan' => 'PMS07',
                'user_id' => 1,
                'id_mobil' => 'MBL04',
                'id_motor' => null,
                'nomor_invoice' => 'INV-20261004-007',
                'tanggal_pemesanan' => '2026-10-05',
                'tanggal_mulai_sewa' => '2026-10-08',
                'tanggal_selesai_sewa' => '2026-10-11',
                'lama_sewa' => 3,
                'harga_sewa' => 500000.00,
                'total_harga' => 1500000.00,
                'metode_pembayaran' => 'Transfer Bank',
                'status_pembayaran' => 'pending',
                'tanggal_pembayaran' => null,
                'ktp' => 'uploads/ktp/ktp_pms07.jpg',
                'sim' => 'uploads/sim/sim_pms07.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('pemesanans')->insert($dataPemesanan);
    }
}