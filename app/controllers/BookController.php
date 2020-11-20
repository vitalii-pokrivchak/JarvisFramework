<?php

namespace app\controllers;

use app\core\Bundle;
use app\core\BundleCollection;
use app\models\AuthorModel;
use app\models\BookModel;

class BookController extends Controller
{
    private string $title;
    private string $view;
    private BookModel $bookModel;
    private AuthorModel $authorModel;
    private Bundle $bundle;
    public function __construct()
    {
        $this->title = APP_NAME . ' - ' . 'Book Library';
        $this->view = 'BookView';
        $this->bookModel = new BookModel();
        $this->authorModel = new AuthorModel();
        $this->bundle = new Bundle($this->title, $this->view);
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
                $this->title = $book->get_title();
                $this->bundle->setTitle($this->title);
                $collection = new BundleCollection;
                $collection->addModel($book);
                $collection->addModel($author);
                $this->bundle->setCollection($collection);
                parent::render($this->bundle);
            }
            $this->title = "Book not found";
            $this->bundle->setTitle($this->title);
            parent::render($this->bundle);
        }
    }
}
