<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all available statuses from status_kode_ref table
        $statusIds = DB::table('status_kode_ref')->pluck('id_status_koderef')->toArray(); // Get all status IDs

        // Example for generating customers
        for ($i = 0; $i < 10; $i++) { // Example: Create 50 pelanggan
            // Generate a random status ID from the list of available status IDs
            $randomStatusId = $statusIds[array_rand($statusIds)]; // Select a random status ID

            // Generate a random 5-character alphanumeric kode_ref
            $kodeRef = strtoupper(Str::random(5)); // Generates a 5-character uppercase alphanumeric string

            // Insert new pelanggan with random status and kode_ref
            DB::table('pelanggan')->insert([
                'nama' => 'Pelanggan ' . ($i + 1),
                'no_handphone' => '08' . mt_rand(1000000000, 9999999999), // Random phone number
                'kode_ref' => $kodeRef, // Generated kode_ref
                'id_status' => $randomStatusId, // Randomly selected status ID
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
