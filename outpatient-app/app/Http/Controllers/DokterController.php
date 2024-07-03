<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    public function index()
    {
        $data = User::has('dokter')->where('role_id', 3)->get();
        return view('content.dokter.index', [
            'activeMenu' => 'dokter',
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('content.dokter.create', [
            'activeMenu' => 'dokter-new',
            'poli' => Poli::all()
        ]);
    }

    public function edit($idDokter)
    {
        $dokter = User::has('dokter')->where('id_user', $idDokter)->first();
        return view('content.dokter.edit', [
            'activeMenu' => 'dokter',
            'dokter' => $dokter,
            'poli' => Poli::all()
        ]);
    }

    public function show($idDokter)
    {
        $dokter = User::has('dokter')->where('id_user', $idDokter)->first();
        return view('content.dokter.show', [
            'activeMenu' => 'dokter',
            'dokter' => $dokter,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nama" => 'required',
            "password" => 'required|min:8',
            "email" => 'required|unique:users',
            "nomor_hp" => 'required|unique:users|min:10',
            'nomor_str' => 'required|unique:dokters|min:10',
            'nomor_sip' => 'required|unique:dokters|min:10',
            'poli_id' => 'required',
            'spesialisasi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $foto = $request->file('foto');
        $fileName = time() . '.' . $foto->getClientOriginalExtension();
        $filePath = public_path('/uploads/dokter/' . $fileName);

        try {
            DB::transaction(function () use ($validatedData, $foto, $fileName) {
                $user = new User();
                $user->nama = $validatedData['nama'];
                // $user->username = $validatedData['username'];
                $user->email = $validatedData['email'];
                $user->password = Hash::make($validatedData['password']);
                $user->nomor_hp = $validatedData['nomor_hp'];
                $user->role_id = 3;
                $user->save();

                $foto->move(public_path('/uploads/dokter/'), $fileName);

                $dokter = new Dokter();
                $dokter->nomor_str = $validatedData['nomor_str'];
                $dokter->nomor_sip = $validatedData['nomor_sip'];
                $dokter->poli_id = $validatedData['poli_id'];
                $dokter->spesialisasi = $validatedData['spesialisasi'];
                $dokter->foto = $fileName;
                $dokter->user_id = $user->id_user;
                $dokter->save();

                notyf()->position('y', 'top')->addSuccess('Data Dokter Berhasil Ditambahkan');
            });
            return redirect()->route('dokter.index');
        } catch (\Exception $exception) {
            DB::rollBack();

            if (file_exists($filePath)) {
                unlink($filePath);
            }

            dd('Update Data Pasien Failed: ' . $exception->getMessage());
            notyf()->position('y', 'top')->addSuccess('Data Dokter Gagal Ditambahkan');
        }

        return redirect()->back();
    }

    public function update(Request $request, $idDokter)
    {
        $validatedData = $request->validate([
            "nama" => 'required',
            "password" => 'nullable',
            "email" => 'required',
            "nomor_hp" => 'required',
            'nomor_str' => 'required',
            'nomor_sip' => 'required',
            'poli_id' => 'required',
            'spesialisasi' => 'required',
            'foto' => 'nullable',
        ]);

        try {
            DB::transaction(function () use ($validatedData, $request, $idDokter) {
                $user = User::find($idDokter);

                $foto = $request->file('foto');
                if ($foto) {
                    $fileName = time() . '.' . $foto->getClientOriginalExtension();
                    $foto->move(public_path('/uploads/dokter/'), $fileName);
                    unlink('uploads/dokter/' . $user->dokter->foto);
                } else {
                    $fileName = $user->dokter->foto;
                }

                $password = $validatedData['password'] ? Hash::make($validatedData['password']) : $user->password;

                $user->nama = $validatedData['nama'];
                $user->email = $validatedData['email'];
                $user->password = $password;
                $user->nomor_hp = $validatedData['nomor_hp'];
                $user->role_id = 3;
                $user->save();

                $dokter = Dokter::where('user_id', $idDokter)->first();;
                $dokter->nomor_str = $validatedData['nomor_str'];
                $dokter->nomor_sip = $validatedData['nomor_sip'];
                $dokter->poli_id = $validatedData['poli_id'];
                $dokter->spesialisasi = $validatedData['spesialisasi'];
                $dokter->foto = $fileName;
                $dokter->user_id = $user->id_user;
                $dokter->save();
            });

            notyf()->position('y', 'top')->addSuccess('Data Dokter Berhasil Diperbarui');
            return redirect()->route('dokter.show', $idDokter);
        } catch (\Exception $exception) {
            DB::rollBack();

            // dd('Update Data Dokter Failed: ' . $exception->getMessage());
            // if (file_exists($filePath)) {
            //     unlink($filePath);
            // }

            notyf()->position('y', 'top')->addError('Data Dokter Gagal Ditambahkan');
        }

        return redirect()->back();
    }

    public function destroy($idUser)
    {
        $user = User::find($idUser);
        if (!$user) {
            notyf()->position('y', 'top')->addError('Data Dokter Tidak Ditemukan');
            return redirect()->route('dokter.index');
        }

        unlink('uploads/dokter/' . $user->dokter->foto);
        $user->delete();

        notyf()->position('y', 'top')->addSuccess('Data Dokter Berhasil Dihapus');
        return redirect()->route('dokter.index');
    }
}
