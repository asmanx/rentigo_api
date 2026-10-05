<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PemesananController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('pelanggan', PelangganController::class);

Route::apiResource('motor', MotorController::class);

Route::apiResource('mobil', MobilController::class);

Route::apiResource('pemesanan', PemesananController::class);