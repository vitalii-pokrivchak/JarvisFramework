<?php

namespace app\core;

class Application
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->router->run();
    }
}
