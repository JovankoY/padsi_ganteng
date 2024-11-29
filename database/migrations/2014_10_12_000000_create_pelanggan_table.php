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
            $table->id('id_pelanggan');
            $table->string('nama', 30);
            $table->string('no_handphone', 12)->nullable();
            $table->string('kode_ref')->nullable()->unique();
            $table->unsignedBigInteger('id_status')->default(1);
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at

            $table->foreign('id_status')->references('id_status_koderef')->on('status_kode_ref')->onDelete('cascade');
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
