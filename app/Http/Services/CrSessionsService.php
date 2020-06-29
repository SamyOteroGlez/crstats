<?php

namespace App\Http\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class CrSessionsService
{
    /**
     * Get a new CrSessionsService instance.
     *
     * @return App\Http\Services\CrSessionsService
     */
    public static function newInstance()
    {
        return new CrSessionsService;
    }

    /**
     * Set the clan data needed for the app to work.
     *
     * @param string $clan_tag
     *
     * @return array
     */
    public function clanApi(string $clan_tag)
    {
        $cr_api = env('CR_API');
        $tag = $clan_tag;
        $clan_tag = tagParser($tag);
        $clan = $this->get("$cr_api/clans/$clan_tag");

        if (!$clan) {
            return null;
        }

        return [
            'CLAN' => true,
            'CR_CLAN_NAME' => $clan->name,
            'CR_CLAN_TAG' => $tag,
            'CR_PARSED_CLAN_TAG' => $clan_tag,
            'CR_API_CLAN' => "$cr_api/clans/$clan_tag",
            'CR_API_CLAN_WAR_LOG' => "$cr_api/clans/$clan_tag/warlog",
            'CR_API_CLAN_CURRENT_WAR' => "$cr_api/clans/$clan_tag/currentwar",
            'CR_API_MEMBERS' => "$cr_api/clans/$clan_tag/members",
            'CR_API_PLAYERS' => "$cr_api/players",
            'CR_API_CARDS' => "$cr_api/cards",
            'CR_API_LOCATION' => "$cr_api/locations",
            'CR_API_CLAN_TOP_100' => "$cr_api/locations/" . env('INTERNATIONAL_LOCATION_ID') . "/rankings/clans?limit=100",
            'CR_API_CLAN_LOCAL_TOP_100' => "$cr_api/locations/" . $clan->location->id . "/rankings/clans?limit=100",
        ];
    }

    /**
     * Get clan data.
     *
     * @param string $url
     *
     * @return array
     */
    protected function get(string $url)
    {
        $http = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . env('CR_API_TOKEN')
            ]
        ]);

        try {
            $response = $http->get($url);
        } catch (ClientException $ex) {
            $response = null;
        }

        return ($response) ? json_decode($response->getBody(), false) : null;
    }

    /**
     * Set the player data needed for the app to work
     *
     * @param string $player_tag
     *
     * @return array
     */
    public function playerApi(string $player_tag)
    {
        $cr_api = env('CR_API');
        $tag = tagParser($player_tag);
        $player = $this->get("$cr_api/players/$tag");

        if (!$player) {
            return null;
        }

        return [
            'PLAYER' => true,
            'CR_PLAYER_TAG' => $tag,
            'CR_API_PLAYERS' => "$cr_api/players",
            'CR_API_CARDS' => "$cr_api/cards",
        ];
    }
}
