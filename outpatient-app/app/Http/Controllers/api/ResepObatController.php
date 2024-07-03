<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResepCollection;
use App\Http\Resources\ResepResource;
use App\Models\Pembayaran;
use App\Models\Resep;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class ResepObatController extends Controller
{
    public function index()
    {
        $pasien = Auth::user()->pasien;

        $data = Resep::whereHas('rmedik', function (Builder $query) use ($pasien) {
            $query->where('mrn', $pasien->mrn);
        })->latest()->get();

        return new ResepCollection($data);
    }

    public function show($id)
    {
        $pasien = Auth::user()->pasien;

        $resep = Resep::find($id);

        if(!$resep) {
            throw new HttpResponseException(response([
                'errors' => 'Data Not Found'
            ], 404));
        }

        // cek pembayaran
        $pembayaran = Pembayaran::whereHas('rmedik', function (Builder $query) use ($pasien) {
            $query->where('mrn', $pasien->mrn);
        })->first();

        if($pembayaran->status === 'belum lunas'){
            return response()->json([
                'messages' => "Anda Belum Melakukan Pembayaran !!"
            ]);
        }

        $data = Resep::whereHas('rmedik', function (Builder $query) use ($pasien) {
            $query->where('mrn', $pasien->mrn);
        })
            ->where('id_resep', $id)
            ->with('details')->first();

        return new ResepResource($data);
    }
}
