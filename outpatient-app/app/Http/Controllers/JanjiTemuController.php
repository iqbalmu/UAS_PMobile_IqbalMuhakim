<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JanjiTemu;
use App\Models\Kunjungan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JanjiTemuController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role_id == 3) {
            $dokterId = Dokter::where("user_id", $user->id_user)->first()->id_dokter ?? null;
            $janjiTemu = JanjiTemu::where('dokter_id', $dokterId)->get();
        } else {
            $janjiTemu = JanjiTemu::all();
        }

        return view('content.janji-temu.index', [
            'activeMenu' => 'janji-temu',
            'pasiens' => User::has('pasien')->get(),
            'dokters' => User::has('dokter')->get(),
            'data' => $janjiTemu
        ]);
    }

    public function store(Request $request)
    {
        $janjiTemu = new JanjiTemu();
        $janjiTemu->mrn = $request->pasien_id;
        $janjiTemu->dokter_id = $request->dokter_id;
        $janjiTemu->tanggal = $request->tanggal;
        $janjiTemu->waktu = $request->waktu;
        $janjiTemu->status = 'prosess';

        $janjiTemu->save();

        notyf()->position('y', 'top')->addSuccess('Janji Temu Pasien Berhasil Dibuat');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $janjiTemu = JanjiTemu::find($request->id);
        $janjiTemu->status = $request->status;
        $janjiTemu->save();

        notyf()->position('y', 'top')->addSuccess('Status Janji Temu Pasien Berhasil Diperbarui');
        return redirect()->back();
    }
}
