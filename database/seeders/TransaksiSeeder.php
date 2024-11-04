<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        DB::table('transaksi')->insert([
            ['id_transaksi' => 'T001', 'total_harga' => 25000, 'tanggal_transaksi' => '2024-10-01 10:00:00', 'nama_pesanan' => 'Nasi Goreng', 'id_user' => 'U001', 'id_pelanggan' => 'P001'],
            ['id_transaksi' => 'T002', 'total_harga' => 30000, 'tanggal_transaksi' => '2024-10-02 11:00:00', 'nama_pesanan' => 'Ayam Penyet', 'id_user' => 'U002', 'id_pelanggan' => 'P002'],
            ['id_transaksi' => 'T003', 'total_harga' => 35000, 'tanggal_transaksi' => '2024-10-03 12:00:00', 'nama_pesanan' => 'Soto Ayam', 'id_user' => 'U003', 'id_pelanggan' => 'P003'],
            ['id_transaksi' => 'T004', 'total_harga' => 20000, 'tanggal_transaksi' => '2024-10-04 13:00:00', 'nama_pesanan' => 'Bakso', 'id_user' => 'U004', 'id_pelanggan' => 'P004'],
            ['id_transaksi' => 'T005', 'total_harga' => 5000, 'tanggal_transaksi' => '2024-10-05 14:00:00', 'nama_pesanan' => 'Es Teh', 'id_user' => 'U005', 'id_pelanggan' => 'P005'],
            ['id_transaksi' => 'T006', 'total_harga' => 8000, 'tanggal_transaksi' => '2024-10-06 15:00:00', 'nama_pesanan' => 'Es Jeruk', 'id_user' => 'U006', 'id_pelanggan' => 'P006'],
            ['id_transaksi' => 'T007', 'total_harga' => 15000, 'tanggal_transaksi' => '2024-10-07 16:00:00', 'nama_pesanan' => 'Kopi', 'id_user' => 'U007', 'id_pelanggan' => 'P007'],
            ['id_transaksi' => 'T008', 'total_harga' => 12000, 'tanggal_transaksi' => '2024-10-08 17:00:00', 'nama_pesanan' => 'Jus Buah', 'id_user' => 'U008', 'id_pelanggan' => 'P008'],
            ['id_transaksi' => 'T009', 'total_harga' => 27000, 'tanggal_transaksi' => '2024-10-09 18:00:00', 'nama_pesanan' => 'Mie Goreng', 'id_user' => 'U009', 'id_pelanggan' => 'P009'],
            ['id_transaksi' => 'T010', 'total_harga' => 23000, 'tanggal_transaksi' => '2024-10-10 19:00:00', 'nama_pesanan' => 'Pecel', 'id_user' => 'U010', 'id_pelanggan' => 'P010'],
        ]);
    }
}
