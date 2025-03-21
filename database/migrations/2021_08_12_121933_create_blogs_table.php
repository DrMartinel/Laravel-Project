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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('title');
            $table->text('content');
            $table->unsignedBigInteger('uploader_id'); // Foreign Key to users
            $table->timestamps(); // created_at & updated_at

            // Foreign Key Constraint
            $table->foreign('uploader_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
