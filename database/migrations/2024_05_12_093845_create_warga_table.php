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
        Schema::create('warga', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nik', 20)->unique()->nullable(false);
            $table->string('nama', 100)->nullable(false);
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan'])->nullable(false);
            $table->string('tempat_lahir', 50)->nullable(false);
            $table->date('tanggal_lahir')->nullable(false);
            $table->string('alamat', 255)->nullable(false);
            $table->string('ibu_kandung', 100)->nullable(false);
            $table->enum('status_warga', ['Menetap', 'Pendatang', 'Merantau'])->nullable(false);
            $table->enum('status_keluarga', ['Kepala Keluarga', 'Istri', 'Anak', 'Cucu', 'Menantu', 'Lainnya'])->nullable(false);
            $table->string('telepon', 16)->nullable();
            $table->uuid('keluarga_id')->nullable();
            $table->unsignedBigInteger('rt_id')->nullable(false)->index();
            $table->string('dokumen', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("keluarga_id")->on("keluarga")->references("id");
            $table->foreign("rt_id")->on("rukun_tetangga")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
