<?php

namespace App\Utils;
use App\Repositories\Movie\MovieContract;



class TmdbTool  {

    protected MovieContract $movieContract;
    protected GuzzleTool $guzzleTool;

    public function __construct(MovieContract $_movieContract,GuzzleTool $_guzzleTool)
    {
        $this->movieContract = $_movieContract;
        $this->guzzleTool = $_guzzleTool;
    }

    /**
	 * @param $data
	 */
	public function FormatInsertData($data)
    {
        $insertData = [];

        foreach ($data as $item) {

        $insertData[] = [
        'id'=>$item['id'],
        'adult'=>$item['adult'],
        'backdrop_path'=>array_key_exists('backdrop_path', $item)?$item['backdrop_path']:null,
        'name'=>array_key_exists('name', $item)?$item['name']:$item['title'],
        'original_language'=>array_key_exists('original_language', $item)?$item['original_language']:null,
        'original_name'=>array_key_exists('original_name', $item)?$item['original_name']:$item['original_title'],
        'overview'=>array_key_exists('overview', $item)?$item['overview']:null,
        'poster_path'=>array_key_exists('poster_path', $item)?env('TMDB_IMG_BASE_URL').$item['poster_path']:null,
        'media_type'=>array_key_exists('media_type', $item)?$item['media_type']:null,
        'popularity'=>array_key_exists('popularity', $item)?$item['popularity']:0,
        'first_air_date'=>array_key_exists('first_air_date', $item)?$item['first_air_date']:$item['release_date']??null,
        'vote_average'=>array_key_exists('vote_average', $item)?$item['vote_average']:0,
        'vote_count'=>array_key_exists('vote_count', $item)?$item['vote_count']:0,
        'genre_ids'=>array_key_exists('genre_ids', $item)?json_encode($item['genre_ids']):null,
        //'origin_country'=>array_key_exists('origin_country', $item)?json_encode($item['origin_country']):null,
];
        }

        $this->movieContract->toAdd($insertData);


    }

    /**
	 * @param $totalPages
	 */

    public function FetchImport($totalPages=10)
    {
        $client = new \GuzzleHttp\Client();
        $baseUrl = env('TMDB_BASE_URL');
        $api_key=env('TMDB_API_KEY');

        $response = $this->guzzleTool->guzGet($api_key,$baseUrl);

        $data = json_decode($response->getBody(), true);


            // Fetch and insert data for each page
            for ($page = 1; $page <= $totalPages; $page++) {
                $response = $this->guzzleTool->guzGetPaginate($api_key,$baseUrl,$page);

                $data = json_decode($response->getBody(), true)['results'];

                $this->FormatInsertData($data);
            }

            echo 'Data fetched and inserted successfully!';

}


}
