<?php

namespace app\controllers;

use jarvis\config\Config;
use jarvis\controllers\Controller;
use jarvis\core\Bundle;

class HomeController extends Controller
{
    private Bundle $bundle;

    public function __construct()
    {
        $this->bundle = new Bundle((string)Config::GetAppSettingByKey("app_name"), "HomeView");
    }
    public function index()
    {
        parent::render($this->bundle);
    }
}
