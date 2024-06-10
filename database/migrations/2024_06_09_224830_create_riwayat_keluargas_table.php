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
        Schema::create('riwayat_keluarga', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('keluarga_id')->index();
            $table->date('tanggal')->nullable(false);
            $table->enum('status', ['Pindah', 'Meninggal', 'Lainnya'])->nullable(false);
            $table->string('surat', 255)->nullable();
            $table->timestamps();

            $table->foreign("keluarga_id")->on("keluarga")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_keluarga');
    }
};
