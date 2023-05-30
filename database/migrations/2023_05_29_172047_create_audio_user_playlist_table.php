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
        Schema::create('playlist_user_audio', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('playlist_id');
            $table->foreign('playlist_id')
                ->references('id')
                ->on('playlists')
                ->cascadeOnDelete();
            
            $table->unsignedBigInteger('user_audio_id');
            $table->foreign('user_audio_id')
                ->references('id')
                ->on('audio_user')
                ->cascadeOnDelete();

            $table->integer('pos')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlist_audios');
    }
};
