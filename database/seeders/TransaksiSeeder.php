<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua id_pelanggan dari tabel pelanggan
        $pelangganIds = DB::table('pelanggan')->pluck('id_pelanggan')->toArray();

        // Pastikan ada pelanggan yang dapat digunakan
        if (count($pelangganIds) > 0) {
            // Buat transaksi untuk setiap id_pelanggan
            foreach ($pelangganIds as $index => $id_pelanggan) {
                DB::table('transaksi')->insert([
                    'id_transaksi' => $index + 1, // ID transaksi increment
                    'id_pelanggan' => $id_pelanggan, // ID pelanggan dari tabel pelanggan
                    'id_user' => $index + 1, // ID user, sesuaikan dengan data di tabel user
                    'total_harga' => mt_rand(5000, 50000), // Total harga acak
                    'tanggal_transaksi' => now()->subDays(count($pelangganIds) - $index), // Tanggal transaksi berurutan
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        } else {
            // Jika tidak ada pelanggan di tabel
            echo "Tidak ada data pelanggan untuk diinsert ke transaksi.";
        }
    }
}
