<?php

namespace App\Http\Services;

use GuzzleHttp\Client;

class RestCardsService
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
     * Get all cards.
     *
     * @return array
     */
    public function all()
    {
        $response = $this->http->get(env('CR_API_CARDS'));

        return json_decode($response->getBody(), false);
    }

    /**
     * Count all cards.
     *
     * @return int
     */
    public function count()
    {
        $cards = $this->all();

        return count($cards->items);
    }
}
