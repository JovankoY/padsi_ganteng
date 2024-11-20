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
        Schema::create('bahan', function (Blueprint $table) {
            $table->string('id_bahan', 10)->primary();
            $table->string('id_user', 10); // Disesuaikan dengan tabel user
            $table->string('nama_barang', 20);
            $table->string('jenis_barang', 15);
            $table->integer('jumlah_barang');
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at

            // Foreign key ke tabel user
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahan');
    }
};
