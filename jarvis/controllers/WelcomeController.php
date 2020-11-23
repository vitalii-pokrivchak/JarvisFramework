<?php

namespace jarvis\controllers;

use jarvis\core\Bundle;

class WelcomeController extends Controller
{
    private string $title;
    private string $view;
    private Bundle $bundle;
    public function __construct()
    {
        $this->view = "WelcomeView";
        $this->title = APP_NAME . ' - ' . "Welcome";
        $this->bundle = new Bundle($this->title, $this->view);
    }
    public function index()
    {
        parent::render($this->bundle);
    }
}
