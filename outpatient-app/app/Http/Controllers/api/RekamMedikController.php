<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RekamMedikCollection;
use App\Http\Resources\RekamMedikResource;
use App\Models\RekamMedik;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekamMedikController extends Controller
{
    public function index()
    {
        $pasien = Auth::user()->pasien;

        $data = RekamMedik::where('mrn', $pasien->mrn)->get();

        return new RekamMedikCollection($data);
    }

    public function show($id)
    {
        $pasien = Auth::user()->pasien;

        // return response()->json($pasien->mrn);

        $rmdik = RekamMedik::find($id);

        if(!$rmdik) {
            throw new HttpResponseException(response([
                'errors' => 'Data Not Found'
            ], 404));
        }

        $data = RekamMedik::where('mrn', $pasien->mrn)
            ->where('id_rekam_medik', $id)
            ->with(['resep', 'dokter', 'pemeriksaan'])
            ->first();

        return new RekamMedikResource($data);
    }
}
