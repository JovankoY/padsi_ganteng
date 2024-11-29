<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua pelanggan
        $pelanggans = DB::table('pelanggan')->pluck('id_pelanggan');

        foreach ($pelanggans as $pelanggan) {
            $totalHargaTransaksi = 0; // Inisialisasi total harga transaksi
            
            // Simulasi beberapa transaksi penjualan
            for ($i = 0; $i < rand(1, 30); $i++) { // Random antara 1 hingga 5 transaksi
                // Buat transaksi penjualan
                $transaksi = DB::table('transaksi')->insertGetId([
                    'id_user' => rand(1, 10), // Asumsi ada 10 user
                    'id_pelanggan' => $pelanggan,
                    'total_harga' => 0, // Akan diperbarui nanti
                    'tanggal_transaksi' => now(),
                    'created_at' => now(),
                    'updated_at' => now()                
                ]);

                $detailHargaTransaksi = 0; // Inisialisasi untuk detail harga transaksi
                
                // Buat beberapa detail transaksi untuk setiap transaksi
                for ($j = 0; $j < rand(1, 5); $j++) { // Random antara 1 hingga 5 detail
                    $menu = DB::table('menu')->inRandomOrder()->first(); // Ambil menu acak
                    $jumlahMenu = rand(1, 5); // Jumlah menu yang dibeli
                    $totalHargaPerMenu = $menu->harga * $jumlahMenu;

                    // Simpan detail transaksi penjualan
                    DB::table('detailTransaksi')->insert([
                        'id_menu' => $menu->id_menu,
                        'id_transaksi' => $transaksi,
                        'jumlah_menu' => $jumlahMenu,
                        'total_harga_per_menu' => $totalHargaPerMenu,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    // Akumulasi detail harga transaksi
                    $detailHargaTransaksi += $totalHargaPerMenu;
                }

                // Update total_harga di transaksi
                DB::table('transaksi')->where('id_transaksi', $transaksi)->update([
                    'total_harga' => $detailHargaTransaksi,
                    'updated_at' => now(),
                ]);

                // Akumulasi total harga transaksi untuk pelanggan
                $totalHargaTransaksi += $detailHargaTransaksi;
            }

            // Jika ada kebutuhan untuk update tier member atau lainnya, bisa dilanjutkan di sini
        }
    }
}
