<?php

namespace app\controllers;

use app\models\AuthorModel;
use app\models\BookModel;

class BookController extends Controller
{
    private string $title;
    private string $view;
    private BookModel $bookModel;
    private AuthorModel $authorModel;
    public function __construct()
    {
        $this->title = APP_NAME . ' - ' . 'Book Library';
        $this->view = 'BookView';
        $this->bookModel = new BookModel();
        $this->authorModel = new AuthorModel();
    }
    public function index()
    {
        require_once NOT_FOUND_PAGE;
    }
    public function get($id)
    {
        if ($id != 0) {
            $book = $this->bookModel->get($id);
            if ($book != false) {
                $author = $this->authorModel->get($book->get_author_id());
                $title = $book->get_title();
            }
            $title = "Element not found";
            $view = $this->view;
            require_once VIEWS_PATH . "MasterView.php";
        }
    }
}
