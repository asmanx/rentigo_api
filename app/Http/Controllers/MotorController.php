<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    // 1. Tampilkan Semua Motor / Pencarian berdasarkan Parameter Query
    public function index(Request $request)
    {
        $query = Motor::query();

        // Filter berdasarkan nopol jika ada param ?nopol=...
        if ($request->has('nopol') && !empty($request->nopol)) {
            $query->where('nopol', $request->nopol);
        }

        // Filter berdasarkan nama motor jika ada param ?nama_motor=...
        if ($request->has('nama_motor') && !empty($request->nama_motor)) {
            $query->where('nama_motor', 'like', '%' . $request->nama_motor . '%');
        }

        // Filter berdasarkan status jika ada param ?status=...
        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }

        $data = $query->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data motor',
            'data'    => $data
        ], 200);
    }

    // 2. Tambah Motor Baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_motor' => 'required|string',
            'nopol'      => 'required|string|unique:motors,nopol',
            'harga_sewa' => 'required|numeric|min:0',
            'status'     => 'required|string',
        ]);

        $motor = Motor::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Motor berhasil ditambahkan',
            'data'    => $motor
        ], 201);
    }

    // 3. Tampilkan Detail Motor Berdasarkan ID
    public function show($id)
    {
        $motor = Motor::find($id);

        if (!$motor) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $motor
        ], 200);
    }

    // 4. Update Data Motor
    public function update(Request $request, $id)
    {
        $motor = Motor::find($id);

        if (!$motor) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'nama_motor' => 'nullable|string',
            'nopol'      => 'nullable|string|unique:motors,nopol,' . $id,
            'harga_sewa' => 'nullable|numeric|min:0',
            'status'     => 'nullable|string',
        ]);

        $motor->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data motor berhasil diperbarui',
            'data'    => $motor
        ], 200);
    }

    // 5. Hapus Motor
    public function destroy($id)
    {
        $motor = Motor::find($id);

        if (!$motor) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $motor->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data motor berhasil dihapus'
        ], 200);
    }
}