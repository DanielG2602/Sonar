<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('user_favorite_songs', function (Blueprint $table) {
            $table->foreignId('user_id')->primary();
            $table->foreignId('song_id')->primary();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_favorite_songs');
    }
};
