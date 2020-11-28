<?php

namespace jarvis\core;

use jarvis\config\Config;

class Router
{
    private array $app_settings;
    public function __construct()
    {
        $this->app_settings = Config::GetAppSettings();
    }
    public function run()
    {
        $default_controller = $this->app_settings['controllers_namespace'] . $this->app_settings['default_controller'];
        $default_action = $this->app_settings['default_action'];
        $default_query_method = $this->app_settings['default_query_method'];
        $url = Request::get_request_uri();
        if (count($url) == 0) {
            $home = new $default_controller;
            if (method_exists($home, $default_action)) {
                $home->$default_action();
            }
        } else {
            $controller = $url[0];
            $controller[0] = strtoupper($controller[0]);
            $classname = $this->app_settings['controllers_namespace'] . $controller . "Controller";
            if (class_exists($classname)) {
                $class = new $classname;
                if (count($url) > 1) {
                    $action = $url[1];
                    if (method_exists($class, $action)) {
                        $class->$action();
                    } else {
                        $param = $url[1];
                        if (method_exists($class, $default_query_method)) {
                            $class->$default_query_method($param);
                        } else {
                            http_response_code(404);
                            require_once $this->app_settings['not_found_page'];
                        }
                    }
                } else {
                    if (method_exists($class, $default_action)) {
                        $class->$default_action();
                    } else {
                        http_response_code(404);
                        require_once $this->app_settings['not_found_page'];
                    }
                }
            } else {
                http_response_code(404);
                require_once $this->app_settings['not_found_page'];
            }
        }
    }
}
