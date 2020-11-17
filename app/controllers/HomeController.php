<?php

namespace app\controllers;

use app\models\AuthorModel;
use app\models\BookModel;

class HomeController extends Controller
{
    private BookModel $book_model;
    private AuthorModel $author_model;
    public function __construct()
    {
        $this->book_model = new BookModel();
        $this->author_model = new AuthorModel();
    }
    public function index()
    {
        $view = "HomeView";
        $title = APP_NAME;
        $all_books = $this->book_model->get_all();
        $all_authors = $this->author_model->get_all();
        require_once VIEWS_PATH . 'MasterView.php';
    }
}
