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
        Schema::create('chatters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chatter_id');
            $table->unsignedBigInteger('conversation_id');
            $table->timestamps();

            $table->foreign('chatter_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('conversation_id')->references('id')->on('conversations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chatters');
    }
};
