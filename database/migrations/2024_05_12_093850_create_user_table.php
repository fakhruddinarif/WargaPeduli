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
            $table->uuid('id')->primary();
            $table->string('username', 100)->unique();
            $table->string('password', 100);
            $table->unsignedBigInteger("level_id")->nullable(false);
            $table->uuid('keluarga_id')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign("level_id")->on("level")->references("id");
            $table->foreign('keluarga_id')->on('keluarga')->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
