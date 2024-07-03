<?php

namespace App\Http\Controllers;

use App\Models\RekamMedik;
use App\Models\Resep;
use Illuminate\Http\Request;

class TebusObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $rekamMedik = RekamMedik::where('mrn', $request->mrn)->latest()->limit(4)->get();
        // $resep = $rekamMedik ? $rekamMedik->resep : null;
        $reseps = Resep::whereHas('rmedik', function ($query) use ($request) {
            $query->where('mrn', $request->mrn);
        })->limit(4)->latest()->get();

        // $resep = Resep::where('kode', $request->kode)->first();

        return view('content.tebus-obat.index', [
            'activeMenu' => 'tebus-obat',
            'reseps' => $reseps
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
