<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nota', function (Blueprint $table) {
            $table->id('id_nota', 10)->primary(); // Primary key
            $table->timestamp('tanggal_transaksi'); // Waktu transaksi
            $table->string('id_menu', 10); // ID menu
            $table->float('harga_menu'); // Harga per menu
            $table->integer('jumlah_pesanan'); // Jumlah pesanan
            $table->float('total_harga'); // Total harga pesanan
            
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota');
    }
};
