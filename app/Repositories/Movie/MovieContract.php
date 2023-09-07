<?php

namespace App\Repositories\Movie;

use App\Contracts\BaseContract;


interface MovieContract extends BaseContract{
    function toGetMovieByName($name);

}



