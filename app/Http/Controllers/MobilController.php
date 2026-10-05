<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Daftar data mobil',
            'data' => Mobil::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|string',
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $mobil = Mobil::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Mobil berhasil ditambahkan',
            'data' => $mobil
        ], 201);
    }

    public function show(Mobil $mobil)
    {
        return response()->json([
            'success' => true,
            'data' => $mobil
        ]);
    }

    public function update(Request $request, Mobil $mobil)
    {
        $request->validate([
            'nama' => 'sometimes|required|string',
            'harga' => 'sometimes|required|numeric',
            'gambar' => 'nullable|string',
            'status' => 'sometimes|required|string',
        ]);

        $mobil->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Mobil berhasil diperbarui',
            'data' => $mobil
        ]);
    }

    public function destroy(Mobil $mobil)
    {
        $mobil->delete();

        return response()->json([
            'success' => true,
            'message' => 'Mobil berhasil dihapus'
        ]);
    }
}