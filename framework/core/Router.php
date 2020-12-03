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
        $url = Request::get_request_uri();
        $method = Request::get_method();
        $this->ManageRequests($url, $method);
    }
    private function GetControllerName(string $name = null)
    {
        $controller = $name;
        $controller[0] = strtoupper($controller[0]);
        $classname = $this->app_settings['controllers_namespace'] . $controller . "Controller";
        return $classname;
    }
    private function IsControllerMethodExist(object $controller, string $method)
    {
        if (method_exists($controller, $method)) {
            return true;
        } else {
            $this->ShowNotFoundPage();
        }
    }
    public function ShowNotFoundPage()
    {
        http_response_code(404);
        require_once $this->app_settings['not_found_page'];
    }
    private function ManageRequests($url, $method)
    {
        $default_controller = $this->app_settings['controllers_namespace'] . $this->app_settings['default_controller'];
        $default_action = $this->app_settings['default_action'];
        $default_get_method = $this->app_settings['default_get_method'];
        $default_post_method = $this->app_settings['default_post_method'];

        if ($method === "GET") {
            if (count($url) == 0) {
                $home = new $default_controller;
                if (method_exists($home, $default_action)) {
                    $home->$default_action();
                }
            } else {
                $classname = $this->GetControllerName($url[0]);
                if (class_exists($classname)) {
                    $class = new $classname;
                    if (count($url) > 1) {
                        $action = $url[1];
                        if (method_exists($class, $action)) {
                            $class->$action();
                        } else {
                            $param = $url[1];
                            if ($method === "GET") {
                                if ($this->IsControllerMethodExist($class, $default_get_method)) {
                                    $class->$default_get_method($param);
                                }
                            }
                        }
                    } else {
                        if ($this->IsControllerMethodExist($class, $default_action)) {
                            $class->$default_action();
                        }
                    }
                } else {
                    $this->ShowNotFoundPage();
                }
            }
        } else if ($method === "POST") {
            if (array_key_exists(0, $url)) {
                $classname = $this->GetControllerName($url[0]);
            }
            if (count($url) === 0) {
                $home = new $default_controller;
                if ($this->IsControllerMethodExist($home, $default_post_method)) {
                    $home->$default_post_method($_POST);
                }
            } else {
                if (class_exists($classname)) {
                    $class = new $classname;
                    if ($this->IsControllerMethodExist($class, $default_post_method)) {
                        $class->$default_post_method($_POST);
                    }
                }
            }
        }
    }
}
