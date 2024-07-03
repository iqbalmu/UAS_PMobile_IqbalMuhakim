<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        return view('content.obat.index', [
            'activeMenu' => 'obat',
            'data' => Obat::all()
        ]);
    }

    public function create()
    {
        $vendors = [
            "PT Kimia Farma (Persero) Tbk",
            "PT Kalbe Farma Tbk",
            "PT Indofarma Tbk",
            "PT Sanofi-Aventis Indonesia",
            "PT Eisai Indonesia",
        ];

        return view('content.obat.create', [
            'activeMenu' => 'obat-input',
            'vendors' => $vendors,
        ]);
    }

    public function show($id)
    {
        return view('content.obat.show', [
            'activeMenu' => 'obat',
            'data' => Obat::find($id),
        ]);
    }

    public function edit($id)
    {
        $vendors = [
            "PT Kimia Farma (Persero) Tbk",
            "PT Kalbe Farma Tbk",
            "PT Indofarma Tbk",
            "PT Sanofi-Aventis Indonesia",
            "PT Eisai Indonesia",
        ];

        return view('content.obat.edit', [
            'activeMenu' => 'obat',
            'data' => Obat::find($id),
            'vendors' => $vendors,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'penyedia' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'kadaluarsa' => 'required',
            'keterangan' => 'nullable'
        ]);

        $validatedData['user_id'] = 1;

        // dd($validatedData);

        $obat = new Obat($validatedData);
        $obat->save();

        notyf()->position('y', 'top')->addSuccess('Data Obat Berhasil Disimpan');
        return redirect()->route('obat.index');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'penyedia' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'kadaluarsa' => 'required',
            'keterangan' => 'nullable'
        ]);

        $obat = Obat::find($id);
        $obat->nama = $validatedData['nama'];
        $obat->penyedia = $validatedData['penyedia'];
        $obat->kategori = $validatedData['kategori'];
        $obat->harga = $validatedData['harga'];
        $obat->stok = $validatedData['stok'];
        $obat->kadaluarsa = $validatedData['kadaluarsa'];
        $obat->keterangan = $validatedData['keterangan'];
        $obat->user_id = $validatedData['user_id'] = 1;

        $obat->save();

        notyf()->position('y', 'top')->addSuccess('Data Obat Berhasil Diperbarui');
        return redirect()->route('obat.show', $id);
    }

    public function remove(Request $request)
    {
        $obat = Obat::find($request->id);
        $obat->delete();

        notyf()->position('y', 'top')->addSuccess('Data Obat Berhasil Dihapus');
        return redirect()->back();
    }
}
