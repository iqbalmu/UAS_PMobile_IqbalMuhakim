<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obatData = [
            [
                'kategori' => 'Analgesik (Pereda Nyeri)',
                'nama' => 'Paracetamol',
                'harga' => 5000,
                'stok' => 'tersedia',
                'penyedia' => 'PT. Kimia Farma Tbk',
                'kadaluarsa' => '2025-12-12',
                'user_id' => 4,
            ],
            [
                'kategori' => 'Antibiotik',
                'nama' => 'Amoxicillin',
                'harga' => 10000,
                'stok' => 'tersedia',
                'penyedia' => 'PT. Kalbe Farma Tbk',
                'kadaluarsa' => '2024-11-11',
                'user_id' => 4,
            ],
            [
                'kategori' => 'Antiseptik',
                'nama' => 'Betadine',
                'harga' => 8000,
                'stok' => 'habis',
                'penyedia' => 'PT. Sanbe Farma',
                'kadaluarsa' => '2026-10-10',
                'user_id' => 4,
            ],
            [
                'kategori' => 'Antihistamin',
                'nama' => 'Cetirizine',
                'harga' => 7000,
                'stok' => 'tersedia',
                'penyedia' => 'PT. Bio Farma (Persero)',
                'kadaluarsa' => '2025-09-09',
                'user_id' => 4,
            ],
            [
                'kategori' => 'Vitamin dan Suplemen',
                'nama' => 'Vitamin C',
                'harga' => 6000,
                'stok' => 'tersedia',
                'penyedia' => 'PT. Indofarma Tbk',
                'kadaluarsa' => '2023-08-08',
                'user_id' => 4,
            ],
            [
                'kategori' => 'Obat Jantung',
                'nama' => 'Aspirin',
                'harga' => 9000,
                'stok' => 'tersedia',
                'penyedia' => 'PT. Dexa Medica',
                'kadaluarsa' => '2024-07-07',
                'user_id' => 4,
            ],
            [
                'kategori' => 'Obat Diabetes',
                'nama' => 'Metformin',
                'harga' => 12000,
                'stok' => 'tersedia',
                'penyedia' => 'PT. Pharos Indonesia',
                'kadaluarsa' => '2025-06-06',
                'user_id' => 4,
            ],
            [
                'kategori' => 'Obat Maag',
                'nama' => 'Antasida',
                'harga' => 4000,
                'stok' => 'tersedia',
                'penyedia' => 'PT. Soho Global Health',
                'kadaluarsa' => '2023-05-05',
                'user_id' => 4,
            ],
        ];

        foreach ($obatData as $obat) {
            DB::table('obats')->insert([
                'kategori' => $obat['kategori'],
                'nama' => $obat['nama'],
                'harga' => $obat['harga'],
                'stok' => $obat['stok'],
                'penyedia' => $obat['penyedia'],
                'kadaluarsa' => Carbon::createFromFormat('Y-m-d', $obat['kadaluarsa']),
                'user_id' => $obat['user_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
