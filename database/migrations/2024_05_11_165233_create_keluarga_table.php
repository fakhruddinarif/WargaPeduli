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
        Schema::create('keluarga', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nkk', 20)->unique()->nullable(false);
            $table->string('dokumen', 255)->nullable();
            $table->double('pendapatan')->nullable();
            $table->double('luas_bangunan')->nullable();
            $table->integer('jumlah_tanggungan')->nullable();
            $table->double('pajak_bumi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluarga');
    }
};
