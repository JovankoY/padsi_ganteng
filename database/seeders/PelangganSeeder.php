<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    public function run()
    {
        DB::table('pelanggan')->insertOrIgnore([
            ['id_pelanggan' => '1', 'nama' => 'Joko', 'no_handphone' => '091234567890', 'kode_referal' => 'REF001'],
            ['id_pelanggan' => '2', 'nama' => 'Sari', 'no_handphone' => '092345678901', 'kode_referal' => 'REF002'],
            ['id_pelanggan' => '3', 'nama' => 'Lina', 'no_handphone' => '093456789012', 'kode_referal' => 'REF003'],
            ['id_pelanggan' => '4', 'nama' => 'Fahmi', 'no_handphone' => '094567890123', 'kode_referal' => 'REF004'],
            ['id_pelanggan' => '5', 'nama' => 'Mila', 'no_handphone' => '095678901234', 'kode_referal' => 'REF005'],
            ['id_pelanggan' => '6', 'nama' => 'Rudi', 'no_handphone' => '096789012345', 'kode_referal' => 'REF006'],
            ['id_pelanggan' => '7', 'nama' => 'Rani', 'no_handphone' => '097890123456', 'kode_referal' => 'REF007'],
            ['id_pelanggan' => '8', 'nama' => 'Tina', 'no_handphone' => '098901234567', 'kode_referal' => 'REF008'],
            ['id_pelanggan' => '9', 'nama' => 'Eka', 'no_handphone' => '091012345678', 'kode_referal' => 'REF009'],
            ['id_pelanggan' => '10', 'nama' => 'Budi', 'no_handphone' => '092123456789', 'kode_referal' => 'REF010'],
        ]);
    }
}
