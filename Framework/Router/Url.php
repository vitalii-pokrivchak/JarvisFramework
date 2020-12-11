<?php

namespace Jarvis\Router;

use Jarvis\Config\Config;

/**
 * class Url presents parsing url to (controller , action , parameters)
 */
class Url
{
    /**
     *  @var string $url 
     */
    private $url;

    /** 
     * @var string $controller
     */
    private $controller;

    /** 
     * @var string $action
     */
    private $action;

    /**
     *  @var array|string $parameters
     */
    private $parameters;

    /**
     * __construct
     *
     * @param string $url
     * @param array|string $params
     */
    public function __construct($url, $parameters = "")
    {
        $this->url = $url;
        $this->parameters = $parameters;
        $parsed_url = explode('->', $this->url);
        $this->controller = $parsed_url[0];
        $this->action = $parsed_url[1];
    }

    /**
     * Get Controller from URL
     *
     * @return string
     */
    public function GetController(): string
    {
        return Config::GetAppSettingByKey('Controllers_Namespace') . $this->controller;
    }


    /**
     * Get Action(Method of Controller) from URL
     *
     * @return string
     */
    public function GetAction(): string
    {
        return $this->action;
    }


    /**
     * Get Url Parameters
     *
     * @return array|string
     */
    public function GetParameters()
    {
        return $this->parameters;
    }
}
