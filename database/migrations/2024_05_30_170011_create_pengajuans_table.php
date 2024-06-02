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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('dokumen', 255)->nullable();
            $table->string('nkk', 20)->unique()->nullable();
            $table->string('nik', 20)->unique()->nullable();
            $table->string('nama', 100)->nullable(false);
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('ibu_kandung', 100)->nullable();
            $table->enum('status_warga', ['Menetap', 'Pendatang'])->nullable(false);
            $table->string('telepon', 16)->nullable();
            $table->string('username', 100)->nullable()->unique();
            $table->string('password', 100)->nullable();
            $table->enum('status', ['Menunggu Konfirmasi', 'Diterima', 'Ditolak', 'Selesai'])->nullable(false);
            $table->unsignedBigInteger('rt_id')->nullable(false)->index();
            $table->timestamps();

            $table->foreign("rt_id")->on("rukun_tetangga")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
