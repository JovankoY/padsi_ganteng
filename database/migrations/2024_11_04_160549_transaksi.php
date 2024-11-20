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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('id_transaksi')->primary(); // ID transaksi, tipe string dengan panjang 10
            $table->float('total_harga'); // Total harga untuk transaksi
            $table->timestamp('tanggal_transaksi'); // Tanggal transaksi
            $table->string('id_user'); // Disesuaikan dengan tabel user
            $table->string('id_pelanggan'); // Disesuaikan dengan tabel pelanggan
            $table->string('id_menu')->default(5); // Disesuaikan dengan tabel menu

            // Foreign keys
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade'); // Relasi ke tabel user
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade'); // Relasi ke tabel pelanggan
            $table->foreign('id_menu')->references('id_menu')->on('menu')->onDelete('cascade'); // Relasi ke tabel menu

            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi'); // Drop tabel transaksi jika rollback
    }
};
