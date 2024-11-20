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
        Schema::create('menu', function (Blueprint $table) {
            $table->string('id_menu', 10)->primary();
            $table->string('nama_menu', 255); // Memperluas panjang nama_menu
            $table->string('jenis_menu', 50); // Memperluas panjang jenis_menu
            $table->decimal('harga', 10, 2); // Mengganti float dengan decimal
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};

