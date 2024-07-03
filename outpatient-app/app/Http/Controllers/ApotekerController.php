<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApotekerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::where('role_id', 4)->get();
        return view('content.apoteker.index', [
            'activeMenu' => 'apoteker',
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.apoteker.create', [
            'activeMenu' => 'apoteker-new'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'nomor_hp' => 'required|unique:users,nomor_hp'
        ]);

        try {
            $user = new User();
            $user->nama = $validatedData['nama'];
            $user->password = Hash::make($validatedData['password']);
            $user->email = $validatedData['email'];
            $user->nomor_hp = $validatedData['nomor_hp'];
            $user->role_id = 4;
            $user->save();

            notyf()->position('y', 'top')->addSuccess('Data Apoteker Berhasil Ditambahkan');
            return redirect()->route('apoteker.index');
        } catch (\Throwable $th) {
            notyf()->position('y', 'top')->addError('Data Apoteker Gagal Ditambahkan');
            notyf()->position('y', 'top')->addError($th->getMessage());
            return redirect()->route('apoteker.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id_user', $id)->first();
        return view('content.apoteker.show', [
            'activeMenu' => 'apoteker',
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id_user', $id)->first();
        return view('content.apoteker.edit', [
            'activeMenu' => 'apoteker',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'nomor_hp' => 'required'
        ]);

        $user = User::find($id);

        if (!$user) {
            notyf()->position('y', 'top')->addError('Data Apoteker Tidak Ditemukan');
            return redirect()->back();
        }

        try {
            $password = $validatedData['password'] ? Hash::make($validatedData['password']) : $user->password;

            $user->nama = $validatedData['nama'];
            $user->password = $password;
            $user->email = $validatedData['email'];
            $user->nomor_hp = $validatedData['nomor_hp'];
            $user->role_id = 4;
            $user->save();

            notyf()->position('y', 'top')->addSuccess('Data Apoteker Berhasil Diperbarui');
            return redirect()->route('apoteker.index');
        } catch (\Throwable $th) {
            notyf()->position('y', 'top')->addError('Data Apoteker Gagal Diperbarui');
            notyf()->position('y', 'top')->addError($th->getMessage());
            return redirect()->route('apoteker.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idUser)
    {
        User::destroy($idUser);

        notyf()->position('y', 'top')->addSuccess('Data Apoteker Berhasil Dihapus');
        return redirect()->route('apoteker.index');
    }
}
