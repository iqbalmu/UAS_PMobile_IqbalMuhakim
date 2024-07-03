<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                "email" => "admin@admin.com",
                'password' => Hash::make('admin'),
                'nama' => 'admin',
                'nomor_hp' => '089898989898',
                'role_id' => 1,
            ],
            [
                "email" => "admisi@admisi.com",
                'password' => Hash::make('admisi'),
                'nama' => 'admisi',
                'nomor_hp' => '088989898923',
                'role_id' => 2,
            ],
            [
                "email" => "apoteker@apoteker.com",
                'password' => Hash::make('apoteker'),
                'nama' => 'apoteker',
                'nomor_hp' => '081234245323',
                'role_id' => 4,
            ],
        ]);
    }
}
