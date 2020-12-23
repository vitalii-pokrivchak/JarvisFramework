<?php

namespace Jarvis\Router;

use Jarvis\Config\Config;
use Jarvis\Router\Helpers\RequestMethod;
use Jarvis\Router\Helpers\StatusCode;
use Jenssegers\Blade\Blade;

class Router
{
    /**
     * Routes
     *
     * @var array
     */
    private $routes;

    /**
     * Request
     *
     * @var Request
     */
    private $request;

    /**
     * Response
     *
     * @var Response
     */
    private $response;

    /**
     * blade
     *
     * @var Blade
     */
    private $blade;

    /**
     * __construct
     *
     * @param  Request $request
     * @param  Response $response
     * @return void
     */
    public function __construct($request, $response)
    {
        $this->routes = Route::GetRoutes();
        $this->request = $request;
        $this->response = $response;
        $this->blade = new Blade(
            Config::GetAppSettingByKey('Views_Path'),
            Config::GetAppSettingByKey('Cache_Path')
        );
    }

    /**
     * Run Router
     *
     * @return void
     */
    public function run()
    {
        if (count($this->routes) > 0) {
            if ($this->request->GetRequestMethod() == RequestMethod::GET) {
                if (array_key_exists($this->request->GetUri(), $this->routes[RequestMethod::GET])) {
                    $route = $this->routes[RequestMethod::GET][$this->request->GetUri()];
                    if ($this->CheckController(
                        $route->GetController(),
                        $route->GetAction()
                    )) {
                        $qs = explode('&', $this->request->GetQueryString());
                        $parsed = [];
                        foreach ($qs as $q) {
                            $parsed[] = explode('=', $q);
                        }
                        $combined = [];
                        foreach ($parsed as $value) {
                            if (array_key_exists($value[0], $combined))
                                $combined[$value[0]] =  $value[1];
                        }
                        $params = $route->GetParameters();
                        $parameters = [];
                        if ($params != null) {
                            if (is_array($params)) {
                                foreach ($params as $param) {
                                    if (array_key_exists($param, $combined)) {
                                        $parameters = $combined;
                                    }
                                }
                            } else {
                                if (array_key_exists($params, $combined))
                                    $parameters = $combined[$params];
                            }
                        }
                        $controllerName =  $route->GetController();
                        $actionName = $route->GetAction();
                        $controller = new $controllerName;
                        if (is_array($parameters) && count($parameters) > 0) {
                            $reflection = new \ReflectionMethod($controllerName, $actionName);
                            if (count($reflection->getParameters()) === 1) {
                                $controller->$actionName($parameters);
                            } else {
                                $controller->$actionName($parameters, $this->response);
                            }
                        } else if ((!is_array($parameters)) && ($parameters != "")) {
                            $reflection = new \ReflectionMethod($controllerName, $actionName);
                            if (count($reflection->getParameters()) === 1) {
                                $controller->$actionName($parameters);
                            } else {
                                $controller->$actionName($parameters, $this->response);
                            }
                        }
                        $controller->$actionName($this->response);
                    } else {
                        $this->response->SetStatusCode(StatusCode::NOT_FOUND);
                        echo $this->blade->make(Config::GetAppSettingByKey('Default_View'), [
                            'title' => '404.Not found',
                            'view' => Config::GetAppSettingByKey('Not_Found_Page')
                        ])->render();
                    }
                } else {
                    $this->response->SetStatusCode(StatusCode::NOT_FOUND);
                    echo $this->blade->make(Config::GetAppSettingByKey('Default_View'), [
                        'title' => '404.Not found',
                        'view' => Config::GetAppSettingByKey('Not_Found_Page')
                    ])->render();
                }
            } else if ($this->request->GetRequestMethod() == RequestMethod::POST) {
                if (array_key_exists($this->request->GetUri(), $this->routes[RequestMethod::POST])) {
                    $route = $this->routes[RequestMethod::POST][$this->request->GetUri()];
                    if ($this->CheckController(
                        $route->GetController(),
                        $route->GetAction()
                    )) {
                        $controllerName =  $route->GetController();
                        $actionName = $route->GetAction();
                        $controller = new $controllerName;
                        if (count($_POST) > 0) {
                            $reflection = new \ReflectionMethod($controllerName, $actionName);
                            if (count($reflection->getParameters()) === 1) {
                                $controller->$actionName($_POST);
                            } else {
                                $controller->$actionName($_POST, $this->response);
                            }
                        } else {
                            $controller->$actionName($this->response);
                        }
                    } else {
                        $this->response->SetStatusCode(StatusCode::NOT_FOUND);
                        echo $this->blade->make(Config::GetAppSettingByKey('Default_View'), [
                            'title' => '404.Not found',
                            'view' => Config::GetAppSettingByKey('Not_Found_Page')
                        ])->render();
                    }
                } else {
                    $this->response->SetStatusCode(StatusCode::NOT_FOUND);
                    echo $this->blade->make(Config::GetAppSettingByKey('Default_View'), [
                        'title' => '404.Not found',
                        'view' => Config::GetAppSettingByKey('Not_Found_Page')
                    ])->render();
                }
            }
        }
    }
    /**
     * CheckController
     *
     * @param string $controller
     * @param string $action
     * @return bool
     */
    public function CheckController($controller, $action)
    {
        if (class_exists($controller)) {
            if (method_exists($controller, $action)) {
                return true;
            }
            return false;
        }
        return false;
    }
}
