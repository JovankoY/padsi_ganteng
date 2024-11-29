<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusKodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status_kode_ref')->insertOrIgnore([
            ['nama_status' => 'Tidak Ada Kode'],
            ['nama_status' => 'Belum Terpakai'],
            ['nama_status' => 'Sudah Terpakai']
        ]);
    }
}
