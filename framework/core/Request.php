<?php

namespace jarvis\core;

class Request
{
    public static function get_request_uri(): array
    {
        $_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = explode('/', rtrim($_SERVER['REQUEST_URI_PATH'], '/'));
        array_shift($url);
        return $url;
    }
    public static function get_params(): string
    {
        if (array_key_exists('QUERY_STRING', $_SERVER)) {
            $query = $_SERVER['QUERY_STRING'];
            return $query;
        } else {
            return false;
        }
    }
    public static function get_method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
