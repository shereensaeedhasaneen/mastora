<?php

use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

if (! function_exists('getRoutePermission')) {
    /**
     * Get Permission name from route name.
     *
     * @param $route
     * @param $routePrefix
     * @return string
     */
    function getRoutePermission($route, $routePrefix = '')
    {
        $permission = explode('.', str_replace($routePrefix, '', $route));
        $permission_name = config('roles-permissions.crud_of_resources')[$permission[1]].' '.$permission[0];

        return $permission_name;
    }
}

if (! function_exists('sentence_case')) {
    /**
     * Convert string to sentence case
     *
     * @param $word
     * @return string
     */
    function sentence_case($word): string
    {
        return Str::title(str_replace('_', ' ', $word));
    }
}



if (! function_exists('toHtmlEntities')) {
    /**
     * Convert special characters to HTML entities.
     *
     * @param $value
     * @return string
     */
    function toHtmlEntities($value)
    {
        return htmlentities($value);
    }
}

if (! function_exists('nestedArrayToDotNotation')) {
    /**
     * Convert string accessing key a[b][c] to a.b.c
     *
     * @param $word
     * @return string
     */
    function nestedArrayToDotNotation($str): string
    {
        return (string)Str::of($str)->replace('[','.')->remove(']');
    }
}
