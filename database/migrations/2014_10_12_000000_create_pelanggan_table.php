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
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->string('id_pelanggan', 4)->primary();
            $table->string('nama', 30);
            $table->string('no_handphone', 12)->nullable();
            $table->string('id_kode_ref', 36)->nullable();
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at

            $table->foreign('id_kode_ref')->references('id_kode_ref')->on('koderef')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
