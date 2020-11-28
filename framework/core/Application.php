<?php

namespace jarvis\core;

class Application
{
    private Router $router;
    private ConfigurationManager $cm;
    public function __construct(ConfigurationManager $cm = null)
    {
        if ($cm != null) {
            $this->cm = $cm;
        } else {
            $this->cm = new ConfigurationManager();
        }
        $this->router = new Router();
        $this->router->run();
    }
}
