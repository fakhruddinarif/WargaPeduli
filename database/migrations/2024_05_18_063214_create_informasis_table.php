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
        Schema::create('informasi', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal');
            $table->string('judul', 255)->nullable(false);
            $table->text('konten')->nullable(false);
            $table->string('gambar', 255)->nullable(false);
            $table->enum('jenis', ['Pengumuman', 'Berita', 'Kegiatan'])->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi');
    }
};
