<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            ['id_user' => 'U001', 'nama' => 'Jono', 'no_handphone' => '081234567890', 'role' => 'admin'],
            ['id_user' => 'U002', 'nama' => 'Siti', 'no_handphone' => '082345678901', 'role' => 'staff'],
            ['id_user' => 'U003', 'nama' => 'Budi', 'no_handphone' => '083456789012', 'role' => 'admin'],
            ['id_user' => 'U004', 'nama' => 'Rina', 'no_handphone' => '084567890123', 'role' => 'staff'],
            ['id_user' => 'U005', 'nama' => 'Andi', 'no_handphone' => '085678901234', 'role' => 'admin'],
            ['id_user' => 'U006', 'nama' => 'Dewi', 'no_handphone' => '086789012345', 'role' => 'staff'],
            ['id_user' => 'U007', 'nama' => 'Cindy', 'no_handphone' => '087890123456', 'role' => 'admin'],
            ['id_user' => 'U008', 'nama' => 'Fajar', 'no_handphone' => '088901234567', 'role' => 'staff'],
            ['id_user' => 'U009', 'nama' => 'Gita', 'no_handphone' => '089012345678', 'role' => 'admin'],
            ['id_user' => 'U010', 'nama' => 'Hadi', 'no_handphone' => '080123456789', 'role' => 'staff'],
        ]);
    }
}
