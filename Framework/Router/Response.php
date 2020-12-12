<?php

namespace Jarvis\Router;

use Jarvis\Config\Config;
use Jarvis\Router\Helpers\ContentType;
use Jarvis\Router\Helpers\StatusCode;

/**
 * class Response work with responses
 */
class Response
{
    /**
     * Content Type
     *
     * @var string
     */
    private $content_type;

    /**
     * Status Code
     *
     * @var int
     */
    private $status_code;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->content_type = ContentType::HTML;
        $this->host = $_SERVER['SERVER_NAME'];
    }

    /**
     * Set Content Type
     *
     * @param  string $content_type
     * @return void
     */
    public function SetContentType(string $content_type)
    {
        $this->content_type = $content_type;
        header("Content-Type: {$this->content_type}");
    }

    /**
     * Set Status Code
     *
     * @param  int $status_code
     * @return void
     */
    public function SetStatusCode(int $status_code)
    {
        $this->status_code = $status_code;
        if ($this->status_code === StatusCode::NOT_FOUND) {
            http_response_code($this->status_code);
            require_once Config::GetAppSettingByKey('Not_Found_Page');
        } else {
            http_response_code($this->status_code);
        }
    }

    /**
     * Get Content Type
     *
     * @return string
     */
    public function GetContentType()
    {
        return $this->content_type;
    }

    /**
     * Get Status Code
     *
     * @return int
     */
    public function GetStatusCode()
    {
        return $this->status_code;
    }

    /**
     * Get Host
     *
     * @return string
     */
    public function GetHost()
    {
        return $this->host;
    }


    /**
     * Redirect
     *
     * @param  string $url
     * @return void
     */
    public function Redirect($url)
    {
        header("Location: $url");
    }
}
