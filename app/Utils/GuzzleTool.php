<?php

namespace App\Utils;



class GuzzleTool  {



     private $client;


     public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();

    }

    /**
	 * @param $token
     * @param $baseUrl
	 */
    public function guzGet($token,$baseUrl)
    {
       $response= $this->client->get($baseUrl, ['headers' =>
        ['Authorization' => 'Bearer '.$token,
            'accept' => 'application/json',
          ],
        ]);

        return $response;
    }

     /**
	 * @param $token
     * @param $baseUrl
	 */
    public function guzGetPaginate($token,$baseUrl,$page)
    {
       $response= $this->client->get($baseUrl, ['query' => ['page' => $page],
       'headers' => [
           'Authorization' => 'Bearer '.$token,
           'accept' => 'application/json',
         ],
       ]);

        return $response;
    }


}
