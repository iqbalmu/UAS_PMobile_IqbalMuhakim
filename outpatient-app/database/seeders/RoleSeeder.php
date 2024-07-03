<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['id_role' => 1, 'roles' => 'admin'],
            ['id_role' => 2, 'roles' => 'admisi'],
            ['id_role' => 3, 'roles' => 'dokter'],
            ['id_role' => 4, 'roles' => 'apoteker'],
            ['id_role' => 5, 'roles' => 'pasien'],
        ]);
    }
}
