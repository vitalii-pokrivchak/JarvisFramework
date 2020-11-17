<?php

namespace app\controllers;

class AboutController extends Controller
{
    public function index()
    {
        $title = APP_NAME . ' - ' . 'About';
        $view = "AboutView";
        require_once VIEWS_PATH . "MasterView.php";
    }
}
