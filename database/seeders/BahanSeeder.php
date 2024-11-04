<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahanSeeder extends Seeder
{
    public function run()
    {
        DB::table('bahan')->insert([
            ['id_stok' => 'B001', 'id_user' => 'U001', 'nama_barang' => 'Gula', 'jenis_barang' => 'Bahan Pokok', 'jumlah_barang' => 100],
            ['id_stok' => 'B002', 'id_user' => 'U001', 'nama_barang' => 'Garam', 'jenis_barang' => 'Bahan Pokok', 'jumlah_barang' => 50],
            ['id_stok' => 'B003', 'id_user' => 'U002', 'nama_barang' => 'Minyak', 'jenis_barang' => 'Bahan Pokok', 'jumlah_barang' => 75],
            ['id_stok' => 'B004', 'id_user' => 'U002', 'nama_barang' => 'Beras', 'jenis_barang' => 'Bahan Pokok', 'jumlah_barang' => 200],
            ['id_stok' => 'B005', 'id_user' => 'U003', 'nama_barang' => 'Susu', 'jenis_barang' => 'Bahan Pokok', 'jumlah_barang' => 30],
            ['id_stok' => 'B006', 'id_user' => 'U003', 'nama_barang' => 'Telur', 'jenis_barang' => 'Bahan Pokok', 'jumlah_barang' => 60],
            ['id_stok' => 'B007', 'id_user' => 'U004', 'nama_barang' => 'Sayur', 'jenis_barang' => 'Bahan Segar', 'jumlah_barang' => 150],
            ['id_stok' => 'B008', 'id_user' => 'U004', 'nama_barang' => 'Buah', 'jenis_barang' => 'Bahan Segar', 'jumlah_barang' => 80],
            ['id_stok' => 'B009', 'id_user' => 'U005', 'nama_barang' => 'Daging', 'jenis_barang' => 'Bahan Segar', 'jumlah_barang' => 40],
            ['id_stok' => 'B010', 'id_user' => 'U005', 'nama_barang' => 'Ikan', 'jenis_barang' => 'Bahan Segar', 'jumlah_barang' => 90],
        ]);
    }
}
