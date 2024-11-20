<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PelangganSeeder::class,
            BahanSeeder::class,
            MenuSeeder::class,
            TransaksiSeeder::class,
            NotaSeeder::class,
        ]);
    }
}
