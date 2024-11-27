<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua id_kode_ref dari tabel koderef
        $kodeRefs = DB::table('koderef')->pluck('id_kode_ref')->toArray();

        // Jumlah pelanggan yang ingin dibuat
        $jumlahPelanggan = count($kodeRefs);

        for ($i = 0; $i < $jumlahPelanggan; $i++) {
            DB::table('pelanggan')->insert([
                'id_pelanggan' => str_pad($i + 1, 4, '0', STR_PAD_LEFT), // ID pelanggan 10 digit
                'nama' => 'Pelanggan ' . ($i + 1), // Nama pelanggan
                'no_handphone' => '08' . mt_rand(1000000000, 9999999999), // Nomor handphone acak
                'id_kode_ref' => $kodeRefs[$i], // Ambil kode referensi secara berurutan
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
