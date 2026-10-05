<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $fillable = [
        'nama_motor',
        'nopol',
        'harga_sewa',
        'status',
    ];
}