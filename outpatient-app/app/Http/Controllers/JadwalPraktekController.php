<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JadwalPraktek;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalPraktekController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role_id !== 3) {
            $data = JadwalPraktek::all();
        }else{
            $dokterId = Dokter::where("user_id", $user->id_user)->first()->id_dokter ?? null;
            $data = JadwalPraktek::where('dokter_id', $dokterId)->get();
        }

        return view('content.jadwal-praktek.index', [
            'activeMenu' => 'jadwal-praktek',
            'dokters' => User::has('dokter')->get(),
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $jadwal = new JadwalPraktek();
        $jadwal->dokter_id = $request->dokter_id;
        $jadwal->hari = $request->hari;
        $jadwal->startTime = $request->mulai;
        $jadwal->endTime = $request->selesai;

        $jadwal->save();

        notyf()->position('y', 'top')->addSuccess('Jadwal Praktek Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $jadwal = JadwalPraktek::find($request->id_jadwal);
        $jadwal->dokter_id = $request->dokter_id;
        $jadwal->hari = $request->hari;
        $jadwal->startTime = $request->mulai;
        $jadwal->endTime = $request->selesai;

        $jadwal->save();

        notyf()->position('y', 'top')->addSuccess('Jadwal Praktek Berhasil Diperbarui');
        return redirect()->back();
    }

    public function remove(Request $request)
    {
        $jadwal = JadwalPraktek::find($request->id_jadwal);
        $jadwal->delete();

        notyf()->position('y', 'top')->addSuccess('Jadwal Praktek Berhasil Dihapus');
        return redirect()->back();
    }
}
