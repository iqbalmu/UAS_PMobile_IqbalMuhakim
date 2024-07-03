<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Http\Request;

class JadwalPraktekController extends Controller
{
    public function index()
    {
        $jadwal = Dokter::with('jadwal')->get();

        return response()->json([
            'data' => $jadwal
        ]);
    }
}
