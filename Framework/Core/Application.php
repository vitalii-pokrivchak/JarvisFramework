<?php

namespace Jarvis\Core;

use Jarvis\Router\Router;

class Application
{
    private Router $router;
    private ConfigurationManager $cm;
    private static $instance;
    private function __construct(ConfigurationManager $cm = null)
    {
        if ($cm != null) {
            $this->cm = $cm;
        } else {
            $this->cm = new ConfigurationManager();
        }
        $this->router = new Router();
        $this->router->run();
    }
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function SetConfiguration(ConfigurationManager $cm)
    {
        $this->cm = $cm;
        $this->router = new Router;
        $this->router->run();
    }
}
