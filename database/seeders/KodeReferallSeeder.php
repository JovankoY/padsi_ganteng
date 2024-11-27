<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeReferallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jumlah kode redeem yang ingin dibuat
        $jumlahKode = 10;

        for ($i = 0; $i < $jumlahKode; $i++) {
            // Membuat angka acak 4 digit sebagai ID unik
            $idKodeRef = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT); 
            
            // Membuat kode redeem dengan prefix "RF"
            $kodeRedeem = 'RF' . str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

            DB::table('koderef')->insert([
                'id_kode_ref' => $idKodeRef, // ID unik berupa 4 angka
                'kode_ref' => $kodeRedeem, // Kode redeem unik
                'status' => collect(['Sudah Terpakai', 'Belum Terpakai'])->random(), // Pilih status secara acak
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
