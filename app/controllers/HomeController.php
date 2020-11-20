<?php

namespace app\controllers;

use app\core\Bundle;
use app\core\BundleCollection;
use app\models\AuthorModel;
use app\models\BookModel;

class HomeController extends Controller
{
    private string $title;
    private string $view;
    private BookModel $book_model;
    private AuthorModel $author_model;
    private Bundle $bundle;
    public function __construct()
    {
        $this->title = APP_NAME;
        $this->view = "HomeView";
        $this->book_model = new BookModel();
        $this->author_model = new AuthorModel();
        $this->bundle = new Bundle($this->title, $this->view);
    }
    public function index()
    {
        $this->bundle->setData([
            'books' => $this->book_model->get_all(),
            'authors' => $this->author_model->get_all()
        ]);
        parent::render($this->bundle);
    }
}
