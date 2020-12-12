<?php

namespace Jarvis\Core;

use Jarvis\Router\Request;
use Jarvis\Router\Response;
use Jarvis\Router\Router;

class Application
{
    /**
     * Router
     *
     * @var Router
     */
    private $router;

    /**
     * Configuration Manager
     *
     * @var ConfigurationManager
     */
    private $configuration;

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
     * Instance of Application
     *
     * @var Application
     */
    private static $instance;


    /**
     * __construct
     *
     * @param  ?ConfigurationManager $cm
     * @return void
     */
    private function __construct(ConfigurationManager $cm = null)
    {
        if ($cm != null) {
            $this->configuration = $cm;
        } else {
            $this->configuration = new ConfigurationManager();
        }
        $this->request = new Request;
        $this->response = new Response;
        $this->router = new Router($this->request, $this->response);
        $this->router->run();
    }
    /**
     * Get Instance of Application
     *
     * @return void
     */
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    /**
     * SetConfiguration
     *
     * @param  ConfigurationManager $cm
     * @return void
     */
    public function SetConfiguration(ConfigurationManager $cm)
    {
        $this->configuration = $cm;
        $this->router = new Router($this->request, $this->response);
        $this->router->run();
    }
}
