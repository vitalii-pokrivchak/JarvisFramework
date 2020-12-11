<?php

namespace Jarvis\Router;

/**
 * class Request work with request from web server
 */
class Request
{
    /**
     * @var string $request_method 
     */
    private $request_method;

    /**
     *  @var string $uri
     */
    private $uri;

    /**
     *  @var array|string $query_string
     */
    private $query_string;

    /**
     *  @var int $port
     */
    private $port;

    /**
     *  @var string $origin
     */
    private $origin;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->request_method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->query_string = $_SERVER['QUERY_STRING'] ?? "";
        $this->port = $_SERVER['SERVER_PORT'];
        $this->origin = $_SERVER['SERVER_NAME'];
    }

    /**
     * Get Request Method
     *
     * @return string
     */
    public function GetRequestMethod()
    {
        return $this->request_method;
    }

    /**
     * Get Uri
     *
     * @return string
     */
    public function GetUri()
    {
        return $this->uri;
    }

    /**
     * Get Query String
     *
     * @return string|array
     */
    public function GetQueryString()
    {
        return $this->query_string;
    }

    /**
     * Get Port
     *
     * @return int
     */
    public function GetPort()
    {
        return $this->port;
    }

    /**
     * Get Origin
     *
     * @return string
     */
    public function GetOrigin()
    {
        return $this->origin;
    }
}
