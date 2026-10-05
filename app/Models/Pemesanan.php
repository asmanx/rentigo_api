<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanans';

    protected $primaryKey = 'id_pemesanan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_pemesanan',
        'user_id',
        'id_mobil',
        'id_motor',
        'nomor_invoice',
        'tanggal_pemesanan',
        'tanggal_mulai_sewa',
        'tanggal_selesai_sewa',
        'lama_sewa',
        'harga_sewa',
        'total_harga',
        'metode_pembayaran',
        'status_pembayaran',
        'tanggal_pembayaran',
        'ktp',
        'sim',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'user_id', 'user_id');
    }
}