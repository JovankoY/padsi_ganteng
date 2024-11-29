<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run()
    {
        DB::table('menu')->insertOrIgnore([
            ['nama_menu' => 'Nasi Goreng', 'jenis_menu' => 'Makanan', 'harga' => 25000],
            ['nama_menu' => 'Ayam Penyet', 'jenis_menu' => 'Makanan', 'harga' => 30000],
            ['nama_menu' => 'Soto Ayam', 'jenis_menu' => 'Makanan', 'harga' => 35000],
            ['nama_menu' => 'Bakso', 'jenis_menu' => 'Makanan', 'harga' => 20000],
            ['nama_menu' => 'Es Teh', 'jenis_menu' => 'Minuman', 'harga' => 5000],
            ['nama_menu' => 'Es Jeruk', 'jenis_menu' => 'Minuman', 'harga' => 8000],
            ['nama_menu' => 'Kopi', 'jenis_menu' => 'Minuman', 'harga' => 15000],
            ['nama_menu' => 'Jus Buah', 'jenis_menu' => 'Minuman', 'harga' => 12000],
            ['nama_menu' => 'Mie Goreng', 'jenis_menu' => 'Makanan', 'harga' => 27000],
            ['nama_menu' => 'Pecel', 'jenis_menu' => 'Makanan', 'harga' => 23000],
        ]);
    }
}
