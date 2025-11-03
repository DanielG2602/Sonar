<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('playlist_songs', function (Blueprint $table) {
            $table->foreignId('playlist_id')->primary();
            $table->foreignId('song_id')->primary();
            $table->integer('order_index');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('playlist_songs');
    }
};
