<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data pemesanan',
            'data'    => $pemesanans
        ], 200);
    }

    public function show($id)
    {
        $pemesanan = Pemesanan::find($id);

        if (!$pemesanan) {
            return response()->json([
                'success' => false,
                'message' => 'Data pemesanan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data pemesanan',
            'data'    => $pemesanan
        ], 200);
    }
}