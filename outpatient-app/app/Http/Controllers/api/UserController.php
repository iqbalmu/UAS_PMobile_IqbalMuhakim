<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Profiler\Profile;

class UserController extends Controller
{
    public function createProfile(CreateProfileRequest $request)
    {
        $data = $request->validated();
        $currentUser = auth()->user();

        $user = User::where('id_user', $currentUser->id_user)->with('pasien')->first();

        if ($request->file('image_profile')) {
            $foto = $request->file('image_profile');
            $fileName = time() . '.' . $foto->getClientOriginalExtension();
            // $filePath = public_path('/uploads/pasien/' . $fileName);
            $foto->move(public_path('/uploads/pasien/'), $fileName);

            Pasien::create([
                "nik" => $data['nik'],
                "bpjs" => $data['bpjs'],
                "jenis_kelamin" => $data['jenis_kelamin'],
                "profesi" => $data['profesi'],
                "alamat" => $data['alamat'],
                "user_id" => $currentUser->id_user,
                "image_profile" => $fileName
            ]);
        }

        $resource = new UserResource($user);

        return response()->json([
            'data' => $resource,
            'message' => 'user profile created'
        ], 200);
    }

    public function getProfile()
    {
        $currentUser = auth()->user();
        $data = User::where('id_user', $currentUser->id_user)->with('pasien')->first();

        return new UserResource($data);
    }

    public function updateProfile(UpdateUserRequest $request)
    {
        $data = $request->validated();

        $currentUser = auth()->user();
        $user = User::where('id_user', $currentUser->id_user)->with('pasien')->first();

        // email uniq check
        if ($data['email'] && $data['email'] !== $user->email) {
            $emailExist = User::where('email', $data['email'])->exists();
            if ($emailExist) {
                throw new HttpResponseException(response([
                    'errors' => 'email is already in use !!'
                ], 400));
            }
        }

        // phone uniq check
        if ($data['nomor_hp'] && $data['nomor_hp'] !== $user->nomor_hp) {
            $phoneExist = User::where('nomor_hp', $data['nomor_hp'])->exists();
            if ($phoneExist) {
                throw new HttpResponseException(response([
                    'errors' => 'phone number is already in use !!'
                ], 400));
            }
        }

        // nik uniq check
        if ($data['nik'] && $data['nik'] !== $user->pasien->nik) {
            $phoneExist = Pasien::where('nik', $data['nik'])->exists();
            if ($phoneExist) {
                throw new HttpResponseException(response([
                    'errors' => 'NIK is already in use !!'
                ], 400));
            }
        }

        // data update
        try {
            DB::transaction(function () use ($data, $user, $request) {
                // update data user
                $user->nama = $data['nama'];
                $user->email = $data['email'];
                $user->nomor_hp = $data['nomor_hp'];
                $user->save();

                // update data profile pasien
                $profile = $user->pasien;

                $foto = $request->file('image_profile');
                if ($foto) {
                    $fileName = time() . '.' . $foto->getClientOriginalExtension();
                    $foto->move(public_path('/uploads/pasien/'), $fileName);
                    unlink('uploads/pasien/' . $profile->image_profile);
                } else {
                    $fileName = $profile->image_profile;
                }

                $profile->nik = $data['nik'];
                $profile->bpjs = $data['bpjs'];
                $profile->jenis_kelamin = $data['jenis_kelamin'];
                $profile->profesi = $data['profesi'];
                $profile->alamat = $data['alamat'];
                $profile->image_profile = $fileName;
                $profile->save();
            });

            $resource = new UserResource($user);

            return response()->json([
                'data' => $resource,
                'message' => 'user profile updated'
            ], 200);
        } catch (\Throwable $th) {
            throw new HttpResponseException(response([
                'errors' => $th->getMessage()
            ], $th->getCode()));
        }
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $data = $request->validated();

        $currentUser = auth()->user();

        // cek password benar ?
        $matchPassword = Hash::check($data['password'], $currentUser->password);
        if (!$matchPassword) {
            throw new HttpResponseException(response([
                'errors' => "Wrong Password !!"
            ], 400));
        }

        // confirm new password
        if ($data['newPassword'] !== $data['confirmPassword']) {
            throw new HttpResponseException(response([
                'errors' => "Confirm password does not match"
            ], 400));
        }

        // update password
        $user = User::where('email', $currentUser->email)->first();
        $user->password = $data['newPassword'];
        $user->save();

        return response()->json([
            'message' => 'password updated'
        ]);
    }
}
