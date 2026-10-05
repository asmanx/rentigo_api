<?php

namespace App\Http\Controllers;

use App\Models\Mobil;

class MobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::all();

        return response()->json($mobils);
    }
}