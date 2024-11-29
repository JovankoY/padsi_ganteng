<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('user')->insertOrIgnore([
            ['nama' => 'Jono', 'no_handphone' => '081234567890', 'role' => 'admin'],
            ['nama' => 'Siti', 'no_handphone' => '082345678901', 'role' => 'staff'],
            ['nama' => 'Budi', 'no_handphone' => '083456789012', 'role' => 'admin'],
            ['nama' => 'Rina', 'no_handphone' => '084567890123', 'role' => 'staff'],
            ['nama' => 'Andi', 'no_handphone' => '085678901234', 'role' => 'admin'],
            ['nama' => 'Dewi', 'no_handphone' => '086789012345', 'role' => 'staff'],
            ['nama' => 'Cindy', 'no_handphone' => '087890123456', 'role' => 'admin'],
            ['nama' => 'Fajar', 'no_handphone' => '088901234567', 'role' => 'staff'],
            ['nama' => 'Gita', 'no_handphone' => '089012345678', 'role' => 'admin'],
            ['nama' => 'Hadi', 'no_handphone' => '080123456789', 'role' => 'staff'],
        ]);
    }
}
