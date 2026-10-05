<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemesananController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route API Pemesanan
Route::get('/pemesanans', [PemesananController::class, 'index']);
Route::get('/pemesanans/{id}', [PemesananController::class, 'show']);