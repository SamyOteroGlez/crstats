<?php

if (!function_exists('tagParser')) {

    /**
     * Parse the clan or player tag.
     * The tag returns from cr api like #qwewer, we need to remove the #
     * and replace it for a %23.
     */
    function tagParser(string $tag)
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
