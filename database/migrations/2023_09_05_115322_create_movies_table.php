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
        Schema::create('movies', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();

            $table->boolean('adult')->default(false);
            $table->string('backdrop_path')->nullable();
            $table->string('name')->nullable();
            $table->string('original_language')->nullable();
            $table->string('original_name')->nullable();
            $table->text('overview')->nullable();
            $table->string('poster_path')->nullable();
            $table->string('media_type')->nullable();
            $table->integer('popularity')->nullable();
            $table->string('first_air_date')->nullable();
            $table->integer('vote_average')->default(0);
            $table->integer('vote_count')->default(0);
            $table->json('genre_ids')->nullable();
            $table->json('origin_country')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
