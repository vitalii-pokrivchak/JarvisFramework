<?php

namespace app\controllers;

use app\models\Model;

class BookController extends Controller
{
    private string $title;
    private string $view;
    private Model $model;
    public function __construct()
    {
        $this->title = APP_NAME . ' - ' . 'Book Library';
        $this->view = 'BookView';
    }
    public function index()
    {
        $view = "BookView";
        $title =
            require_once VIEWS_PATH . "MasterView.php";
    }
}
