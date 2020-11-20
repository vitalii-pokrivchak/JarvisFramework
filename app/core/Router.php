<?php

namespace app\core;

use app\controllers\HomeController;
use ReflectionMethod;

class Router
{
    private Request $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function run()
    {
        $default_controller = DEFAULT_CONTROLLER;
        $default_action = DEFAULT_ACTION;
        $default_query_method = DEFAULT_QUERY_METHOD;
        $url = $this->request->get_request_uri();
        if (count($url) == 0) {
            $home = new $default_controller;
            if (method_exists($home, $default_action)) {
                $home->$default_action();
            }
        } else {
            $controller = $url[0];
            $controller[0] = strtoupper($controller[0]);
            $classname = CONTROLLERS_NAMESPACE . $controller . "Controller";
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
                            require_once NOT_FOUND_PAGE;
                        }
                    }
                } else {
                    if (method_exists($class, $default_action)) {
                        $class->$default_action();
                    } else {
                        http_response_code(404);
                        require_once NOT_FOUND_PAGE;
                    }
                }
            } else {
                http_response_code(404);
                require_once NOT_FOUND_PAGE;
            }
        }
    }
}
