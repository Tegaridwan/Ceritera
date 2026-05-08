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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->string('cover')->nullable();
            $table->text('sinopsis');
            $table->enum('genre', ['romance', 'action', 'comedy', 'horror', 'sci-fi', 'fantasy', 'mystery', 'thriller', 'drama', 'slice of life']);
            $table->enum('status', ['publik', 'privat'])->default('privat');
            $table->boolean('is_draft')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
