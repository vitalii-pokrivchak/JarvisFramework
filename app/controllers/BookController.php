<?php

namespace app\controllers;

class BookController
{
    public function index()
    {
        $view = "BookView";
        $title = APP_NAME . ' - ' . 'Book Library';
        require_once VIEWS_PATH . "MasterView.php";
    }
}
