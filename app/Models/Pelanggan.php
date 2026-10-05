<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'username',
        'password',
        'nama',
        'email',
        'alamat',
        'no_hp',
    ];

    protected $hidden = [
        'password',
    ];
}