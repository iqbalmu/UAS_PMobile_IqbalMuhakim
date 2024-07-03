<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class PasienController extends Controller
{
    public function index()
    {
        $data = User::has('pasien')->where('role_id', 5)->get();
        return view('content.pasien.index', [
            'activeMenu' => 'pasien',
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('content.pasien.create', [
            'activeMenu' => 'pasien-new'
        ]);
    }

    public function show($idPasien)
    {
        $pasien = User::has('pasien')->where('id_user', $idPasien)->first();
        $mrn = $pasien->pasien->mrn;
        $rekamMediks = RekamMedik::where('mrn', $mrn)->orderByDesc('created_at')->get();

        return view('content.pasien.show', [
            'activeMenu' => 'pasien',
            'pasien' => $pasien,
            'rekamMediks' => $rekamMediks,
        ]);
    }

    public function edit($idPasien)
    {
        $pasien = User::has('pasien')->where('id_user', $idPasien)->first();
        return view('content.pasien.edit', [
            'activeMenu' => 'pasien',
            'pasien' => $pasien,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "email" => 'required|unique:users',
            "nomor_hp" => 'required|unique:users|min:10',
            "nama" => 'required',
            "password" => 'required|min:8',
            'nik' => 'required|unique:pasiens|size:16',
            'bpjs' => 'nullable|unique:pasiens|size:13',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'profesi' => 'required',
            "image_profile" => "required|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        $foto = $request->file('image_profile');
        $fileName = time() . '.' . $foto->getClientOriginalExtension();
        $filePath = public_path('/uploads/pasien/' . $fileName);

        try {
            DB::transaction(function () use ($validatedData, $foto, $fileName) {
                $user = new User();
                $user->nama = $validatedData['nama'];
                $user->email = $validatedData['email'];
                $user->password = Hash::make($validatedData['password']);
                $user->nomor_hp = $validatedData['nomor_hp'];
                $user->role_id = 5;
                $user->save();

                $foto->move(public_path('/uploads/pasien/'), $fileName);

                $pasien = new Pasien();
                $pasien->nik = $validatedData['nik'];
                $pasien->bpjs = $validatedData['bpjs'];
                $pasien->jenis_kelamin = $validatedData['jenis_kelamin'];
                $pasien->alamat = $validatedData['alamat'];
                $pasien->profesi = $validatedData['profesi'];
                $pasien->image_profile = $fileName;
                $pasien->user_id = $user->id_user;
                $pasien->save();

                notyf()->position('y', 'top')->addSuccess('Data Pasien Berhasil Ditambahkan');
            });
            return redirect()->route('pasien.index');
        } catch (\Exception $exception) {
            DB::rollBack();

            if (file_exists($filePath)) {
                unlink($filePath);
            }

            dd('Update Data Pasien Failed: ' . $exception->getMessage());
            notyf()->position('y', 'top')->addSuccess('Data Pasien Gagal Ditambahkan');
        }

        return redirect()->back();
    }

    public function update(Request $request, $idUser)
    {
        $validatedData = $request->validate([
            "email" => 'required',
            "nomor_hp" => 'required',
            "nama" => 'required',
            "password" => 'nullable|min:8',
            'nik' => 'required',
            'bpjs' => 'nullable',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'profesi' => 'required',
            "image_profile" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        try {
            DB::transaction(function () use ($validatedData, $idUser, $request) {
                $user = User::find($idUser);

                // if ($validatedData['email'] == $user->email) {
                //     return back()->withInput()->withErrors(['email' => 'email exists']);
                // }

                $foto = $request->file('image_profile');
                if ($foto) {
                    $fileName = time() . '.' . $foto->getClientOriginalExtension();
                    $foto->move(public_path('/uploads/pasien/'), $fileName);
                    unlink('uploads/pasien/' . $user->pasien->image_profile);
                } else {
                    $fileName = $user->pasien->image_profile;
                }

                $password = $validatedData['password'] ? Hash::make($validatedData['password']) : $user->password;

                $user->nama = $validatedData['nama'];
                $user->email = $validatedData['email'];
                $user->password = $password;
                $user->nomor_hp = $validatedData['nomor_hp'];
                $user->save();

                $pasien = Pasien::where('user_id', $idUser)->first();
                $pasien->nik = $validatedData['nik'];
                $pasien->bpjs = $validatedData['bpjs'];
                $pasien->jenis_kelamin = $validatedData['jenis_kelamin'];
                $pasien->alamat = $validatedData['alamat'];
                $pasien->profesi = $validatedData['profesi'];
                $pasien->image_profile = $fileName;
                $pasien->save();

                notyf()->position('y', 'top')->addSuccess('Data Pasien Berhasil Diperbarui');
            });
            return redirect()->route('pasien.show', $idUser);
        } catch (\Exception $exception) {
            DB::rollBack();
            notyf()->position('y', 'top')->addError('Data Pasien Gagal Diperbarui');
        }

        return redirect()->back();
    }

    public function pasienMrn($userId, $mrnId)
    {
        $rMedik = RekamMedik::where('id_rekam_medik', $mrnId)->with('pemeriksaan', 'dokter', 'resep')->first();

        return view('content.rekam-medik.index', [
            'activeMenu' => 'pasien',
            'rMedik' => $rMedik
        ]);
    }

    public function destroy($idUser)
    {
        User::destroy($idUser);

        notyf()->position('y', 'top')->addSuccess('Data Pasien Berhasil Dihapus');
        return redirect()->route('pasien.index');
    }

    // public function create($step = 'account')
    // {
    //     $page = 'content.pasien.create.' . $step;
    //     return view($page, [
    //         'activeMenu' => 'pasien-new',
    //         'pasiens' => User::select('nama', 'id_user', 'email')->where('role_id', 5)->get(),
    //         'step' => $step
    //     ]);
    // }

    // public function storeAccount(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         "nama" => 'required',
    //         // "username" => 'required|unique:users',
    //         "password" => 'required|min:8',
    //         "email" => 'required|unique:users,email',
    //         "nomor_hp" => 'required|unique:users,nomor_hp|min:10'
    //     ]);

    //     $user = new User();
    //     $user->nama = $validatedData['nama'];
    //     // $user->username = $validatedData['username'];
    //     $user->email = $validatedData['email'];
    //     $user->password = Hash::make($validatedData['password']);
    //     $user->nomor_hp = $validatedData['nomor_hp'];
    //     $user->role_id = 5; //role pasien
    //     $user->status_aktif = 'aktif';

    //     $user->save();

    //     notyf()->position('y', 'top')->addSuccess('Data Pasien Berhasil Ditambahkan');
    //     return redirect()->route('pasien.create.account');
    // }

    // public function storeProfile(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'user_id' => 'required|unique:pasiens',
    //         'nik' => 'required|unique:pasiens|size:16',
    //         'jenis_kelamin' => 'required',
    //         'alamat' => 'required',
    //         'profesi' => 'required',
    //         // 'tinggi_badan' => 'required',
    //         // 'berat_badan' => 'required',
    //     ]);

    //     $pasien = new Pasien();
    //     $pasien->nik = $validatedData['nik'];
    //     $pasien->jenis_kelamin = $validatedData['jenis_kelamin'];
    //     $pasien->alamat = $validatedData['alamat'];
    //     $pasien->profesi = $validatedData['profesi'];
    //     // $pasien->tinggi_badan = $validatedData['tinggi_badan'];
    //     // $pasien->berat_badan = $validatedData['berat_badan'];
    //     $pasien->user_id = $validatedData['user_id'];

    //     $pasien->save();

    //     notyf()->position('y', 'top')->addSuccess('Profile Pasien Berhasil Ditambahkan');
    //     return redirect()->route('pasien.create.profile');
    // }

}
