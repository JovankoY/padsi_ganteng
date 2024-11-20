<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run()
    {
        DB::table('menu')->insertOrIgnore([
            ['id_menu' => '1', 'nama_menu' => 'Nasi Goreng', 'jenis_menu' => 'Makanan', 'harga' => 25000],
            ['id_menu' => '2', 'nama_menu' => 'Ayam Penyet', 'jenis_menu' => 'Makanan', 'harga' => 30000],
            ['id_menu' => '3', 'nama_menu' => 'Soto Ayam', 'jenis_menu' => 'Makanan', 'harga' => 35000],
            ['id_menu' => '4', 'nama_menu' => 'Bakso', 'jenis_menu' => 'Makanan', 'harga' => 20000],
            ['id_menu' => '5', 'nama_menu' => 'Es Teh', 'jenis_menu' => 'Minuman', 'harga' => 5000],
            ['id_menu' => '6', 'nama_menu' => 'Es Jeruk', 'jenis_menu' => 'Minuman', 'harga' => 8000],
            ['id_menu' => '7', 'nama_menu' => 'Kopi', 'jenis_menu' => 'Minuman', 'harga' => 15000],
            ['id_menu' => '8', 'nama_menu' => 'Jus Buah', 'jenis_menu' => 'Minuman', 'harga' => 12000],
            ['id_menu' => '9', 'nama_menu' => 'Mie Goreng', 'jenis_menu' => 'Makanan', 'harga' => 27000],
            ['id_menu' => '10', 'nama_menu' => 'Pecel', 'jenis_menu' => 'Makanan', 'harga' => 23000],
        ]);
    }
}
