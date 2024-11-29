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
            $table->id('id_transaksi'); // ID transaksi, tipe string dengan panjang 10
            $table->decimal('total_harga', 10, 2); // Total harga untuk transaksi
            $table->dateTime('tanggal_transaksi')->useCurrent(); // Tanggal transaksi
            $table->unsignedBigInteger('id_user'); // Disesuaikan dengan tabel user
            $table->unsignedBigInteger('id_pelanggan'); // Disesuaikan dengan tabel pelanggan
            // Foreign keys
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade'); // Relasi ke tabel user
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade'); // Relasi ke tabel pelanggan
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
