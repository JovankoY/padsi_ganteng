<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotaSeeder extends Seeder
{
    public function run()
    {
        DB::table('nota')->insertOrIgnore([
            ['id_transaksi' => '1', 'tanggal_transaksi' => '2024-10-01 10:00:00', 'id_menu' => '1', 'harga_menu' => 25000, 'jumlah_pesanan' => 2, 'total_harga' => 50000],
            ['id_transaksi' => '2', 'tanggal_transaksi' => '2024-10-02 11:00:00', 'id_menu' => '2', 'harga_menu' => 30000, 'jumlah_pesanan' => 3, 'total_harga' => 90000],
            ['id_transaksi' => '3', 'tanggal_transaksi' => '2024-10-03 12:00:00', 'id_menu' => '3', 'harga_menu' => 35000, 'jumlah_pesanan' => 1, 'total_harga' => 35000],
            ['id_transaksi' => '4', 'tanggal_transaksi' => '2024-10-04 13:00:00', 'id_menu' => '4', 'harga_menu' => 20000, 'jumlah_pesanan' => 4, 'total_harga' => 80000],
            ['id_transaksi' => '5', 'tanggal_transaksi' => '2024-10-05 14:00:00', 'id_menu' => '5', 'harga_menu' => 5000, 'jumlah_pesanan' => 5, 'total_harga' => 25000],
            ['id_transaksi' => '6', 'tanggal_transaksi' => '2024-10-06 15:00:00', 'id_menu' => '6', 'harga_menu' => 8000, 'jumlah_pesanan' => 6, 'total_harga' => 48000],
            ['id_transaksi' => '7', 'tanggal_transaksi' => '2024-10-07 16:00:00', 'id_menu' => '7', 'harga_menu' => 15000, 'jumlah_pesanan' => 7, 'total_harga' => 105000],
            ['id_transaksi' => '8', 'tanggal_transaksi' => '2024-10-08 17:00:00', 'id_menu' => '8', 'harga_menu' => 12000, 'jumlah_pesanan' => 8, 'total_harga' => 96000],
            ['id_transaksi' => '9', 'tanggal_transaksi' => '2024-10-09 18:00:00', 'id_menu' => '9', 'harga_menu' => 27000, 'jumlah_pesanan' => 2, 'total_harga' => 54000],
            ['id_transaksi' => '10', 'tanggal_transaksi' => '2024-10-10 19:00:00', 'id_menu' => '10', 'harga_menu' => 23000, 'jumlah_pesanan' => 1, 'total_harga' => 23000],
        ]);
    }
}
