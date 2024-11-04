<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run()
    {
        DB::table('menu')->insert([
            ['id_menu' => 'M001', 'nama_menu' => 'Nasi Goreng', 'jenis_menu' => 'Makanan', 'harga' => 25000],
            ['id_menu' => 'M002', 'nama_menu' => 'Ayam Penyet', 'jenis_menu' => 'Makanan', 'harga' => 30000],
            ['id_menu' => 'M003', 'nama_menu' => 'Soto Ayam', 'jenis_menu' => 'Makanan', 'harga' => 35000],
            ['id_menu' => 'M004', 'nama_menu' => 'Bakso', 'jenis_menu' => 'Makanan', 'harga' => 20000],
            ['id_menu' => 'M005', 'nama_menu' => 'Es Teh', 'jenis_menu' => 'Minuman', 'harga' => 5000],
            ['id_menu' => 'M006', 'nama_menu' => 'Es Jeruk', 'jenis_menu' => 'Minuman', 'harga' => 8000],
            ['id_menu' => 'M007', 'nama_menu' => 'Kopi', 'jenis_menu' => 'Minuman', 'harga' => 15000],
            ['id_menu' => 'M008', 'nama_menu' => 'Jus Buah', 'jenis_menu' => 'Minuman', 'harga' => 12000],
            ['id_menu' => 'M009', 'nama_menu' => 'Mie Goreng', 'jenis_menu' => 'Makanan', 'harga' => 27000],
            ['id_menu' => 'M010', 'nama_menu' => 'Pecel', 'jenis_menu' => 'Makanan', 'harga' => 23000],
        ]);
    }
}
