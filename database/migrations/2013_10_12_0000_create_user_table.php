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
        Schema::create('user', function (Blueprint $table) {
            $table->string('id_user', 10)->primary();
            $table->string('nama', 30);
            $table->string('no_handphone', 12);
            $table->string('role', 10);
            $table->timestamps(); // Menambahkan created_at dan updated_at
            // Schema::rename('user', 'users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
        Schema::rename('users', 'user');
    }
};
