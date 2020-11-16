<?php

namespace app\core;

use app\controllers\HomeController;

class Router
{
    private Request $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function run()
    {
        $url = $this->request->get_request_uri();
        if (count($url) == 0) {
            $home = new HomeController;
            if (method_exists($home, 'index')) {
                $home->index();
            }
        } else {
            $controller = $url[0];
            $controller[0] = strtoupper($controller[0]);
            $classname = "app\\controllers\\" . $controller . "Controller";
            if (class_exists($classname)) {
                $class = new $classname;
                if (count($url) > 1) {
                    $action = $url[1];
                    $class = new $classname;
                    if (method_exists($class, $action)) {
                        $class->$action();
                    } else {
                        http_response_code(404);
                        require_once "./app/views/404.php";
                    }
                } else {
                    if (method_exists($class, 'index')) {
                        $class->index();
                    } else {
                        http_response_code(404);
                        require_once "./app/views/404.php";
                    }
                }
            } else {
                http_response_code(404);
                require_once "./app/views/404.php";
            }
        }
    }
}
