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
        Schema::create('detail_bantuan_sosial', function (Blueprint $table) {
            $table->id();
            $table->double('pendapatan')->nullable(false);
            $table->double('luas_bangunan')->nullable(false);
            $table->integer('jumlah_tanggungan')->nullable(false);
            $table->double('pajak_bumi')->nullable(false);
            $table->double('tagihan_listrik')->nullable(false);
            $table->enum('status', ['Diterima', 'Ditolak', 'Menunggu Konfirmasi', 'Selesai'])->default('Menunggu Konfirmasi');
            $table->unsignedBigInteger("bansos_id")->nullable(false);
            $table->uuid('user_id')->nullable(false);
            $table->timestamps();

            $table->foreign("bansos_id")->on("bantuan_sosial")->references("id");
            $table->foreign('user_id')->on('user')->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_bantuan_sosial');
    }
};
