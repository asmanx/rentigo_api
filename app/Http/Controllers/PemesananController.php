<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        $data = Pemesanan::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data pemesanan',
            'data' => $data
        ], 200);
    }
}