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
        Schema::create('bantuan_sosial', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_mulai')->nullable(false);
            $table->date('tanggal_selesai')->nullable(false);
            $table->enum('jenis', ['PKH', 'Pemakanan', 'KIP', 'BPNT', 'PBIJKN'])->nullable(false);
            $table->integer('kapasitas')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantuan_sosial');
    }
};
