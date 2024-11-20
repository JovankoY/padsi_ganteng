<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        DB::table('transaksi')->insert([
            ['id_transaksi' => 1, 'id_pelanggan' => 1, 'id_user' => 1, 'total_harga' => 25000, 'tanggal_transaksi' => '2024-10-01 10:00:00'],
            ['id_transaksi' => 2, 'id_pelanggan' => 2, 'id_user' => 2, 'total_harga' => 30000, 'tanggal_transaksi' => '2024-10-02 11:00:00'],
            ['id_transaksi' => 3, 'id_pelanggan' => 3, 'id_user' => 3, 'total_harga' => 35000, 'tanggal_transaksi' => '2024-10-03 12:00:00'],
            ['id_transaksi' => 4, 'id_pelanggan' => 4, 'id_user' => 4, 'total_harga' => 20000, 'tanggal_transaksi' => '2024-10-04 13:00:00'],
            ['id_transaksi' => 5, 'id_pelanggan' => 5, 'id_user' => 5, 'total_harga' => 5000, 'tanggal_transaksi' => '2024-10-05 14:00:00'],
            ['id_transaksi' => 6, 'id_pelanggan' => 6, 'id_user' => 6, 'total_harga' => 8000, 'tanggal_transaksi' => '2024-10-06 15:00:00'],
            ['id_transaksi' => 7, 'id_pelanggan' => 7, 'id_user' => 7, 'total_harga' => 15000, 'tanggal_transaksi' => '2024-10-07 16:00:00'],
            ['id_transaksi' => 8, 'id_pelanggan' => 8, 'id_user' => 8, 'total_harga' => 12000, 'tanggal_transaksi' => '2024-10-08 17:00:00'],
            ['id_transaksi' => 9, 'id_pelanggan' => 9, 'id_user' => 9, 'total_harga' => 27000, 'tanggal_transaksi' => '2024-10-09 18:00:00'],
            ['id_transaksi' => 10, 'id_pelanggan' => 10, 'id_user' => 10, 'total_harga' => 23000, 'tanggal_transaksi' => '2024-10-10 19:00:00'],
        ]);
        
        
    }
}
