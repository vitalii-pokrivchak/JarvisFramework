<?php

use app\db\SQLOperations;
use app\models\BookModel;
use app\models\Book;

require_once "bootstrap.php";

$bookModel = new BookModel($db);
// $books = $book->get_all();

// foreach ($books as $book) {
//     echo "Book Title : {$book->get_title()} <br>";
//     echo "Book Author ID : {$book->get_author_id()} <br>";
//     echo "Book Poster : {$book->get_poster()} <br>";
//     echo "Book Pages : {$book->get_pages()} <br>";
//     echo "Book Preview Text : {$book->get_preview_text()} <br>";
//     echo "Book Uploaded At : {$book->get_uploaded_at()} <br>";
//     echo "Book Publishing House ID : {$book->get_publishing_house_id()}<br>";
//     echo "Book Published At : {$book->get_published_at()}<br>";
//     echo "Book Language ID : {$book->get_language_id()}<br>";
//     echo "Book Category ID : {$book->get_book_category_id()}<br>";
//     echo "Book Illustration : {$book->get_illustration()}<br>";
//     echo "Book Type ID : {$book->get_book_type_id()}<br>";
//     echo "Book Price : {$book->get_price()}<br>";
//     echo "=======================";
//     echo "<br>";
// }


$book = $bookModel->get(1);
echo "<pre>";
var_dump($book);
