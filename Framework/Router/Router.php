<?php

namespace Jarvis\Router;

use Jarvis\Router\Helpers\RequestMethod;
use Jarvis\Router\Helpers\StatusCode;

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
    }

    /**
     * Run Router
     *
     * @return void
     */
    public function Run()
    {
        if (count($this->routes) > 0) {
            if ($this->request->GetRequestMethod() == RequestMethod::GET) {
                if (array_key_exists($this->request->GetUri(), $this->routes[RequestMethod::GET])) {
                    $route = $this->routes[RequestMethod::GET][$this->request->GetUri()];
                    if ($this->CheckController(
                        $route->GetController(),
                        $route->GetAction()
                    )) {
                        $controllerName =  $route->GetController();
                        $actionName = $route->GetAction();
                        $controller = new $controllerName;
                        $controller->$actionName($this->response);
                    } else {
                        $this->response->SetStatusCode(StatusCode::NOT_FOUND);
                    }
                } else {
                    $this->response->SetStatusCode(StatusCode::NOT_FOUND);
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
                        $controller->$actionName($this->response);
                    } else {
                        $this->response->SetStatusCode(StatusCode::NOT_FOUND);
                    }
                } else {
                    $this->response->SetStatusCode(StatusCode::NOT_FOUND);
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
