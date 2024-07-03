<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        try {
            // DB::transaction(function () use ($data) {
            //     $user = new User();
            //     $user->nama = $data['nama'];
            //     $user->email = $data['email'];
            //     $user->password = Hash::make($data['password']);
            //     $user->nomor_hp = $data['nomor_hp'];
            //     $user->role_id = 5;
            //     $user->status_aktif = 'aktif';
            //     $user->save();

            //     $pasien = new Pasien();
            //     $pasien->nik = $data['nik'];
            //     $pasien->jenis_kelamin = $data['jenis_kelamin'];
            //     $pasien->alamat = $data['alamat'];
            //     $pasien->profesi = $data['profesi'];
            //     $pasien->user_id = $user->id_user;
            //     $pasien->save();
            // });
            $user = new User();

            $user->nama = $data['nama'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->nomor_hp = $data['nomor_hp'];
            $user->role_id = 5;
            $user->status_aktif = 'aktif';
            $user->save();
        } catch (\Throwable $e) {
            return response()->json([
                'errors' => $e->getMessage()
            ]);
        }

        $newUser = User::where('email', $data['email'])->first();
        $resource = new UserResource($newUser);

        return response()->json([
            'data' => $resource,
            'message' => 'account created'
        ]);
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->where('role_id', 5)->with('pasien')->first();
        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw new HttpResponseException(response([
                'errors' => 'username or password is wrong !!'
            ], 400));
        }

        $token = Auth::guard('api')->attempt($data);
        if (!$token) {
            throw new HttpResponseException(response([
                'errors' => 'unauthorized'
            ], 401));
        }

        return response()->json([
            'data' => [
                'token' => $token,
                'user' => new UserResource($user)
            ]
        ]);
    }

    public function logout()
    {
        try {
            Auth::logout();
            return response()->json([
                'message' => 'Successfully logged out'
            ]);
        } catch (\Throwable $th) {
            throw new HttpResponseException(response([
                'errors' => $th->getMessage()
            ]));
        }
    }
}
