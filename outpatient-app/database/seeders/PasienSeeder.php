<?php

namespace Database\Seeders;

use App\Models\Pasien;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            "email" => "pasien@pasien.com",
            'password' => Hash::make('pasien'),
            'nama' => 'pasien satu',
            'nomor_hp' => '084356532342',
            'role_id' => 5,
        ]);

        $pasien = new Pasien();
        $pasien->user_id = $user->id_user;
        // $pasien->mrn = '12345678';
        $pasien->nik = '1234567890123456';
        $pasien->jenis_kelamin = 'L';
        $pasien->alamat = 'Padang';
        $pasien->profesi = 'Mahasiswa';
        $pasien->save();
    }
}
