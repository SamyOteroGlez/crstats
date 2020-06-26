<?php

namespace App\Http\Services;

use GuzzleHttp\Client;

class RestClanService
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
     * Get clan data.
     *
     * @return array
     */
    public function clan()
    {
        $response = $this->http->get(env('CR_API_CLAN'));

        return json_decode($response->getBody(), false);
    }

    /**
     * Get clan current war data.
     *
     * @return array
     */
    public function currentWar()
    {
        $response = $this->http->get(env('CR_API_CLAN_CURRENT_WAR'));

        return json_decode($response->getBody(), false);
    }

    /**
     * Get clan war logs.
     *
     * @return array
     */
    public function warLog()
    {
        $response = $this->http->get(env('CR_API_CLAN_WAR_LOG'));

        return json_decode($response->getBody(), false);
    }
}
