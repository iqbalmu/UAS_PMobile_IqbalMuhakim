<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index()
    {
        return view('content.poli.index', [
            'activeMenu' => 'poli',
            'data' => Poli::all()
        ]);
    }

    public function store(Request $request)
    {
        $data =  $request->validate([
            'nama' => 'required|min:3',
            'deskripsi' => 'required|min:5',
        ]);

        Poli::create($data);

        notyf()->position('y', 'top')->addSuccess('Data Poli Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'nama' => 'required|min:3',
            'deskripsi' => 'required|min:5',
        ]);

        $poli = Poli::find($data['id']);

        if (!$poli) {
            notyf()->position('y', 'top')->addError('Data Poli Tidak Ada');
            return redirect()->back();
        }

        $poli->nama = $data['nama'];
        $poli->deskripsi = $data['deskripsi'];
        $poli->save();

        notyf()->position('y', 'top')->addSuccess('Data Poli Berhasil Diperbarui');
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $data = $request->validate([
            'id' => 'required'
        ]);

        $poli = Poli::find($data['id']);

        if (!$poli) {
            notyf()->position('y', 'top')->addError('Data Poli Tidak Ada');
            return redirect()->back();
        }

        $poli->delete();

        notyf()->position('y', 'top')->addSuccess('Data Poli Berhasil Dihapus');
        return redirect()->back();
    }
}
