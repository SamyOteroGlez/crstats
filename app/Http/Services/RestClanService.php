<?php

namespace App\Http\Services;

use Exception;
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
    public function data()
    {
        $response = $this->http->get(session('CR.CR_API_CLAN'));

        return json_decode($response->getBody(), false);
    }

    /**
     * Get clan current war data.
     *
     * @return array
     */
    public function currentWar()
    {
        $response = $this->http->get(session('CR.CR_API_CLAN_CURRENT_WAR'));
        $war = json_decode($response->getBody(), false);
        $war->participants = collect($war->participants)->sortByDesc('wins');

        try {
            $war->clans = collect($war->clans)->sortByDesc('wins');
        } catch (Exception $ex) {
            $war->clans = null;
        }

        return $war;
    }

    /**
     * Get clan war logs.
     *
     * @return array
     */
    public function warLog()
    {
        $response = $this->http->get(session('CR.CR_API_CLAN_WAR_LOG'));

        return json_decode($response->getBody(), false);
    }
}
