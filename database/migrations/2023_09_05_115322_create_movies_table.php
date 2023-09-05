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
            $table->id();
            $table->string('poster_path');
            $table->boolean('adult')->default(false);
            $table->string('release_date');
            $table->string('original_title');
            $table->string('original_language');
            $table->string('title');
            $table->string('backdrop_path');
            $table->string('popularity');
            $table->string('vote_count');
            $table->string('vote_average');
            $table->boolean('video')->default(false);

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
