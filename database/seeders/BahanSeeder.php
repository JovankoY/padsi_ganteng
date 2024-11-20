<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahanSeeder extends Seeder
{
    public function run()
    {
        DB::table('bahan')->insertOrIgnore([
            ['id_bahan' => '1', 'id_user' => '1', 'nama_barang' => 'Gula', 'jenis_barang' => 'Bahan Pokok', 'jumlah_barang' => 100],
            ['id_bahan' => '2', 'id_user' => '1', 'nama_barang' => 'Garam', 'jenis_barang' => 'Bahan Pokok', 'jumlah_barang' => 50],
            ['id_bahan' => '3', 'id_user' => '2', 'nama_barang' => 'Minyak', 'jenis_barang' => 'Bahan Pokok', 'jumlah_barang' => 75],
            ['id_bahan' => '4', 'id_user' => '2', 'nama_barang' => 'Beras', 'jenis_barang' => 'Bahan Pokok', 'jumlah_barang' => 200],
            ['id_bahan' => '5', 'id_user' => '3', 'nama_barang' => 'Susu', 'jenis_barang' => 'Bahan Pokok', 'jumlah_barang' => 30],
            ['id_bahan' => '6', 'id_user' => '3', 'nama_barang' => 'Telur', 'jenis_barang' => 'Bahan Pokok', 'jumlah_barang' => 60],
            ['id_bahan' => '7', 'id_user' => '4', 'nama_barang' => 'Sayur', 'jenis_barang' => 'Bahan Segar', 'jumlah_barang' => 150],
            ['id_bahan' => '8', 'id_user' => '4', 'nama_barang' => 'Buah', 'jenis_barang' => 'Bahan Segar', 'jumlah_barang' => 80],
            ['id_bahan' => '9', 'id_user' => '5', 'nama_barang' => 'Daging', 'jenis_barang' => 'Bahan Segar', 'jumlah_barang' => 40],
            ['id_bahan' => '10', 'id_user' => '5', 'nama_barang' => 'Ikan', 'jenis_barang' => 'Bahan Segar', 'jumlah_barang' => 90],
        ]);
    }
}
