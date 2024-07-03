<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Pasien;
use App\Models\Poli;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AntrianController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->input("tanggal") ?? Carbon::today()->format('Y-m-d');
        $poli = $request->input('poli_id');
        // dd($tanggal);
        // $antrian = Antrian::query()->where('tanggal', $tanggal)
        //     ->orWhere("poli_id", function ($query) use ($request) {
        //         if ($request->has('poli_id')) {
        //             $query->where('poli_id', $request->poli_id);
        //         }
        //     })->get();

        $antrian = Antrian::query();
        if ($request->filled('tanggal')) {
            $antrian->where('tanggal', $tanggal);
        }

        if ($request->filled('poli_id')) {
            $antrian->where('poli_id', $poli);
        }

        $data = $antrian->get();

        return view('content.antrian.index', [
            'activeMenu' => 'antrian',
            'pasiens' => Pasien::all(),
            'polis' => Poli::all(),
            'tanggal' => $tanggal,
            'antrian' => $data,
            'poli_id' => $poli
        ]);
    }

    public function store(Request $request)
    {
        // $pasien = Pasien::where('user_id', $request->user_id)->first();
        $antrian = new Antrian();
        // $antrian->status = 'menunggu';
        $antrian->mrn = $request->mrn;
        $antrian->poli_id = $request->poli_id;
        $antrian->tanggal = $request->tanggal;
        $antrian->nomor = Antrian::nomorAntrian($request->poli_id, $request->tanggal);
        $antrian->save();

        notyf()->position('y', 'top')->addSuccess('Antrian Pasien Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function update(Request $request)
    {

        $antrian = Antrian::find($request->id);

        $antrian->status = $request->status;
        $antrian->save();

        notyf()->position('y', 'top')->addSuccess('Status Antrian Berhasil Diperbarui');
        return redirect()->back();
    }
}
