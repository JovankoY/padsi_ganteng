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
        Schema::create('detailTransaksi', function (Blueprint $table) {
            $table->id('id_detail_transaksi'); // ID transaksi, tipe string dengan panjang 10
            $table->unsignedBigInteger('id_menu'); // Foreign key ke tabel menu
            $table->unsignedBigInteger('id_transaksi'); // Foreign key ke tabel transaksiPenjualans
            $table->integer('jumlah_menu'); // Jumlah menu yang dibeli
            $table->decimal('total_harga_per_menu', 10, 2); // Total harga per menu
            $table->timestamps();

            // Set foreign key constraints
            $table->foreign('id_menu')->references('id_menu')->on('menu')->onDelete('restrict');
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailTransaksi');
    }
};
