<?php

namespace app\controllers;

class HomeController extends Controller
{
    public function index()
    {
        $view = "HomeView";
        $title = APP_NAME;
        require_once VIEWS_PATH . 'MasterView.php';
    }
}
