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
        Schema::create('koderef', function (Blueprint $table) {
            $table->string('id_kode_ref', 36)->primary();
            $table->string('kode_ref', 255); // Memperluas panjang nama_menu
            $table->string('status', 50); // Memperluas panjang jenis_menu

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koderef');
    }
};

