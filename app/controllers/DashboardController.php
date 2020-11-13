<?php

namespace app\controllers;

class DashboardController
{
    public function index()
    {
        $view = "DashboardView";
        $title = APP_NAME . ' - ' . 'Dashboard';
        require_once VIEWS_PATH . "MasterView.php";
    }
}
