<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('user')->insertOrIgnore([
            ['id_user' => '1', 'nama' => 'Jono', 'no_handphone' => '081234567890', 'role' => 'admin'],
            ['id_user' => '2', 'nama' => 'Siti', 'no_handphone' => '082345678901', 'role' => 'staff'],
            ['id_user' => '3', 'nama' => 'Budi', 'no_handphone' => '083456789012', 'role' => 'admin'],
            ['id_user' => '4', 'nama' => 'Rina', 'no_handphone' => '084567890123', 'role' => 'staff'],
            ['id_user' => '5', 'nama' => 'Andi', 'no_handphone' => '085678901234', 'role' => 'admin'],
            ['id_user' => '6', 'nama' => 'Dewi', 'no_handphone' => '086789012345', 'role' => 'staff'],
            ['id_user' => '7', 'nama' => 'Cindy', 'no_handphone' => '087890123456', 'role' => 'admin'],
            ['id_user' => '8', 'nama' => 'Fajar', 'no_handphone' => '088901234567', 'role' => 'staff'],
            ['id_user' => '9', 'nama' => 'Gita', 'no_handphone' => '089012345678', 'role' => 'admin'],
            ['id_user' => '10', 'nama' => 'Hadi', 'no_handphone' => '080123456789', 'role' => 'staff'],
        ]);
    }
}
