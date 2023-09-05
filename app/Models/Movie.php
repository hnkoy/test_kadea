<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'poster_path',
        'adult',
        'release_date',
        'original_title',
        'original_language',
        'title',
        'backdrop_path',
        'popularity',
        'vote_count',
        'vote_average',
        'video',
    ];

    public function genreIds(): HasMany
    {
        return $this->hasMany(GenreId::class);
    }
}
