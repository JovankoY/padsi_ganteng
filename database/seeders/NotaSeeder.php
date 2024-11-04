<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotaSeeder extends Seeder
{
    public function run()
    {
        DB::table('nota')->insert([
            ['id_transaksi' => 'N001', 'tanggal_transaksi' => '2024-10-01 10:00:00', 'jumlah_pendapatan' => 500000, 'nama_pesanan' => 'Nasi Goreng', 'total_harga' => 25000],
            ['id_transaksi' => 'N002', 'tanggal_transaksi' => '2024-10-02 11:00:00', 'jumlah_pendapatan' => 750000, 'nama_pesanan' => 'Ayam Penyet', 'total_harga' => 30000],
            ['id_transaksi' => 'N003', 'tanggal_transaksi' => '2024-10-03 12:00:00', 'jumlah_pendapatan' => 350000, 'nama_pesanan' => 'Soto Ayam', 'total_harga' => 35000],
            ['id_transaksi' => 'N004', 'tanggal_transaksi' => '2024-10-04 13:00:00', 'jumlah_pendapatan' => 400000, 'nama_pesanan' => 'Bakso', 'total_harga' => 20000],
            ['id_transaksi' => 'N005', 'tanggal_transaksi' => '2024-10-05 14:00:00', 'jumlah_pendapatan' => 600000, 'nama_pesanan' => 'Es Teh', 'total_harga' => 5000],
            ['id_transaksi' => 'N006', 'tanggal_transaksi' => '2024-10-06 15:00:00', 'jumlah_pendapatan' => 800000, 'nama_pesanan' => 'Es Jeruk', 'total_harga' => 8000],
            ['id_transaksi' => 'N007', 'tanggal_transaksi' => '2024-10-07 16:00:00', 'jumlah_pendapatan' => 900000, 'nama_pesanan' => 'Kopi', 'total_harga' => 15000],
            ['id_transaksi' => 'N008', 'tanggal_transaksi' => '2024-10-08 17:00:00', 'jumlah_pendapatan' => 300000, 'nama_pesanan' => 'Jus Buah', 'total_harga' => 12000],
            ['id_transaksi' => 'N009', 'tanggal_transaksi' => '2024-10-09 18:00:00', 'jumlah_pendapatan' => 1000000, 'nama_pesanan' => 'Mie Goreng', 'total_harga' => 27000],
            ['id_transaksi' => 'N010', 'tanggal_transaksi' => '2024-10-10 19:00:00', 'jumlah_pendapatan' => 850000, 'nama_pesanan' => 'Pecel', 'total_harga' => 23000],
        ]);
    }
}
