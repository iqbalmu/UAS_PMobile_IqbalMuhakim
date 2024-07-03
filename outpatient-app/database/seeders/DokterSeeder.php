<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         $poliData = [
            [
                'nama' => 'Anak',
                'deskripsi' => 'Poli yang menangani kesehatan anak-anak.',
            ],
            [
                'nama' => 'Bedah',
                'deskripsi' => 'Poli yang melakukan berbagai jenis operasi bedah.',
            ],
            [
                'nama' => 'Gigi',
                'deskripsi' => 'Poli yang menyediakan perawatan dan kesehatan gigi.',
            ],
            [
                'nama' => 'Jantung',
                'deskripsi' => 'Poli khusus untuk menangani penyakit jantung.',
            ],
            [
                'nama' => 'Mata',
                'deskripsi' => 'Poli yang menangani masalah kesehatan mata.',
            ],
            [
                'nama' => 'Saraf',
                'deskripsi' => 'Poli yang menangani penyakit saraf dan otak.',
            ],
            [
                'nama' => 'THT',
                'deskripsi' => 'Poli yang menangani masalah telinga, hidung, dan tenggorokan.',
            ],
            [
                'nama' => 'Umum',
                'deskripsi' => 'Poli untuk konsultasi umum dan pemeriksaan kesehatan.',
            ],
        ];

        foreach ($poliData as $poli) {
            DB::table('polis')->insert([
                'nama' => $poli['nama'],
                'deskripsi' => $poli['deskripsi'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        for ($i = 0; $i < 25; $i++) {
            $user = User::create([
                "email" => fake()->unique()->email,
                'password' => Hash::make('password'),
                'nama' => fake()->name,
                'nomor_hp' => fake()->phoneNumber,
                'role_id' => 3,
            ]);

            // Buat data dokter terkait
            $dokter = new Dokter();
            $dokter->user_id = $user->id_user;
            $dokter->nomor_str = fake()->unique()->numerify('##############'); // 14 digit nomor acak
            $dokter->nomor_sip = fake()->unique()->numerify('##############'); // 14 digit nomor acak
            $dokter->foto = 'sample.png';
            $dokter->spesialisasi = fake()->randomElement(['Bedah Hati', 'Kardiologi', 'Neurologi', 'Ortopedi', 'Pediatri']);
            $dokter->poli_id = fake()->numberBetween(1, 8);
            $dokter->save();
        }
    }
}
