<?php

namespace App\Http\Services;

use GuzzleHttp\Client;

class RestLocationsService
{
    /**
     * Guzzle client.
     *
     * @var GuzzleHttp\Client
     */
    protected $http;

    /**
     * Class constructor.
     *
     * @param \GuzzleHttp\Client $client
     */
    public function __construct(Client $client)
    {
        $this->http = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . env('CR_API_TOKEN')
            ]
        ]);
    }

    /**
     * Get clan international ranking.
     *
     * @return array
     */
    public function clansInternational()
    {
        $response = $this->http->get(session('CR.CR_API_CLAN_TOP_100'));

        return json_decode($response->getBody(), false);
    }

    /**
     * Get clan international ranking.
     *
     * @return array
     */
    public function clansLocation()
    {
        $response = $this->http->get(session('CR.CR_API_CLAN_LOCAL_TOP_100'));

        return json_decode($response->getBody(), false);
    }
}
