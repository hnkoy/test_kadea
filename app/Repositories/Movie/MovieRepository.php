<?php

namespace App\Repositories\Movie;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;

class MovieRepository implements MovieContract {

	/**
	 * @param array $inputs
	 */
	public function toAdd( $inputs) {
        $primaryKey = ['id'];
        $movie = Movie::upsert($inputs, $primaryKey);

        return $movie;
	}

	/**
	 *
	 * @param array $inputs
	 * @param mixed $id
	 * @return Model
	 */
	public function toUpdate(array $inputs, $id): Model {
        $movie = $this->toGetById( $id );

        foreach ( $inputs as $property => $value )
        $movie->$property = $value;
        $movie->update();

        return $movie;
	}

	/**
	 *
	 * @param mixed $id
	 * @return Model
	 */
	public function toDelete($id): Model {
        $movie = $this->toGetById( $id );
        $movie->delete();

        return $movie;
	}

	/**
	 *
	 * @param mixed $n
	 * @return mixed
	 */
	public function toGetAll($n = 50): mixed
    {
        $movies = Movie::paginate( $n );

        return $movies;
	}

	/**
	 *
	 * @param mixed $id
	 * @return Model|null
	 */
	public function toGetById($id): Model|null {
        $movie = Movie::where('id',$id)
        ->first();
        return $movie;
	}


}
