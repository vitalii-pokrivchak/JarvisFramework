<?php

namespace app\controllers;

use jarvis\controllers\Controller;
use jarvis\core\Bundle;

class HomeController extends Controller
{
    private Bundle $bundle;

    public function __construct()
    {
        $this->bundle = new Bundle(APP_NAME, "HomeView");
    }
    public function index()
    {
        parent::render($this->bundle);
    }
}
