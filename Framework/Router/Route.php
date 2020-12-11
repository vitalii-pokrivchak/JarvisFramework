<?php

namespace Jarvis\Router;

use Jarvis\Router\Helpers\RequestMethod;

/**
 * The Route class is used when working with route descriptions
 */
class Route
{
    /**
     * Routes array 
     * @var array
     */
    private static $routes;

    /**
     * Describe GET Routes
     *
     * @param  string $path
     * @param  string $url
     * @param  array|string $parameters
     * @return void
     */
    public static function GET($path, $url, $parameters = null)
    {
        self::$routes[RequestMethod::GET][$path] = new Url($url, $parameters);
    }

    /**
     * Describe POST Routes
     *
     * @param  string $path
     * @param  string $url
     * @param  array|string $parameters
     * @return void
     */
    public static function POST($path, $url, $parameters = null)
    {
        self::$routes[RequestMethod::POST][$path] = new Url($url, $parameters);
    }

    /**
     * Get Routes array
     *
     * @return array
     */
    public static function GetRoutes()
    {
        return self::$routes;
    }
}
