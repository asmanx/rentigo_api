<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            // ID Pemesanan sebagai Primary Key bertipe String (contoh: PMS01)
            $table->string('id_pemesanan')->primary();

            // user_id disesuaikan dengan primary key BigInteger dari tabel 'pelanggans'
            $table->unsignedBigInteger('user_id')->nullable();

            // ID Mobil (contoh: MBL01) dan ID Motor (contoh: MTR01) bertipe String
            $table->string('id_mobil')->nullable();
            $table->string('id_motor')->nullable();

            $table->string('nomor_invoice')->unique();
            $table->date('tanggal_pemesanan');
            $table->date('tanggal_mulai_sewa');
            $table->date('tanggal_selesai_sewa');
            $table->integer('lama_sewa');
            $table->decimal('harga_sewa', 12, 2);
            $table->decimal('total_harga', 12, 2);
            $table->string('metode_pembayaran');
            $table->enum('status_pembayaran', ['pending', 'dibayar', 'dibatalkan', 'kadaluarsa'])->default('pending');
            $table->dateTime('tanggal_pembayaran')->nullable();
            $table->string('ktp');
            $table->string('sim')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};