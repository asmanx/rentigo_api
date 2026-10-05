<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    // 1. Tampilkan Semua Pelanggan / Pencarian berdasarkan Parameter Query
    public function index(Request $request)
    {
        $query = Pelanggan::query();

        // Filter berdasarkan email jika ada param ?email=...
        if ($request->has('email') && !empty($request->email)) {
            $query->where('email', $request->email);
        }

        // Filter berdasarkan username jika ada param ?username=...
        if ($request->has('username') && !empty($request->username)) {
            $query->where('username', $request->username);
        }

        // Filter pencarian nama jika ada param ?nama=...
        if ($request->has('nama') && !empty($request->nama)) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }

        $data = $query->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data pelanggan',
            'data'    => $data
        ], 200);
    }

    // 2. Tambah Pelanggan Baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:pelanggans,username',
            'password' => 'required|min:6',
            'nama'     => 'required|string',
            'email'    => 'required|email|unique:pelanggans,email',
            'alamat'   => 'nullable|string',
            'no_hp'    => 'nullable|string',
        ]);

        // Enkripsi password menggunakan Hash::make
        $validated['password'] = Hash::make($request->password);

        $pelanggan = Pelanggan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pelanggan berhasil ditambahkan',
            'data'    => $pelanggan
        ], 201);
    }

    // 3. Tampilkan Detail Pelanggan Berdasarkan ID
    public function show($id)
    {
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $pelanggan
        ], 200);
    }

    // 4. Update Data Pelanggan
    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'username' => 'nullable|unique:pelanggans,username,' . $id . ',user_id',
            'nama'     => 'nullable|string',
            'email'    => 'nullable|email|unique:pelanggans,email,' . $id . ',user_id',
            'alamat'   => 'nullable|string',
            'no_hp'    => 'nullable|string',
        ]);

        if ($request->has('password') && !empty($request->password)) {
            $validated['password'] = Hash::make($request->password);
        }

        $pelanggan->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data pelanggan berhasil diperbarui',
            'data'    => $pelanggan
        ], 200);
    }

    // 5. Hapus Pelanggan
    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $pelanggan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data pelanggan berhasil dihapus'
        ], 200);
    }
}