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
            $table->string('nkk', 20)->unique()->nullable();
            $table->string('dokumen_kk', 255)->nullable();
            $table->string('nik', 20)->unique()->nullable(false);
            $table->string('dokumen_ktp', 255)->nullable(false);
            $table->string('nama', 100)->nullable(false);
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan'])->nullable(false);
            $table->string('tempat_lahir', 50)->nullable(false);
            $table->date('tanggal_lahir')->nullable(false);
            $table->string('alamat', 255)->nullable(false);
            $table->string('ibu_kandung', 100)->nullable(false);
            $table->enum('status_warga', ['Menetap', 'Pendatang', 'Merantau'])->nullable(false);
            $table->enum('status_keluarga', ['Kepala Keluarga', 'Istri', 'Anak', 'Cucu', 'Menantu', 'Lainnya'])->nullable(false);
            $table->string('telepon', 16)->nullable();
            $table->unsignedBigInteger('rt_id')->nullable(false)->index();
            $table->enum('status', ['Menunggu Konfirmasi', 'Diterima', 'Ditolak', 'Selesai'])->nullable(false);
            $table->enum('status_pengajuan', ['Keluarga', 'Warga']);
            $table->string('username', 100)->nullable();
            $table->string('password', 100)->nullable();
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
