<?php

if (!function_exists('playerTagParser')) {

    /**
     * Parse the tag player.
     * The tag returns from cr apilike #qwewer, we need to remove the #
     * and replace it for a %23.
     */
    function playerTagParser(string $tag)
    {
        $parsed = str_replace("#", "%23", $tag);

        return $parsed;
    }
}

if (!function_exists('isRoute')) {

    /**
     * Check if teh current route is the given route.
     */
    function isRoute($route)
    {
        return request()->is($route);
    }
}
