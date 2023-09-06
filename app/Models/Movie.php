<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'adult',
        'backdrop_path',
        'name',
        'original_language',
        'original_name',
        'overview',
        'poster_path',
        'media_type',
        'popularity',
        'first_air_date',
        'vote_average',
        'vote_count',
        'origin_country',
        'genre_ids'

    ];




}
