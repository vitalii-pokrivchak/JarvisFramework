<?php

ini_set("display_errors", "on");
ini_set("display_startup_errors", "on");

error_reporting(E_ALL);

require_once  __DIR__ . "/app/config/config.php";
require_once __DIR__ . "/vendor/autoload.php";

use app\core\Application;
use app\core\Request;
use app\core\Router;
use app\db\BaseSQLOperations;
use app\db\DbConnection;
use app\models\Author;
use app\models\Book;

$request = new Request;
$router = new Router($request);
$app = new Application($router);
$db = new DbConnection(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);


$testDB = new BaseSQLOperations();


$bookparam = array(
    'title' => 'Harry Potter and the Philosopher\'s Stone',
    'author_id' => 15,
    'poster' => 'Harry Potter',
    'pages' => 980,
    'preview_text' => 'tst book',
    'publishing_house_id' => 1,
    'published_at' => 2012,
    'language_id' => 1,
    'book_category_id' => 1,
    'illustration' => 1,
    'book_type_id' => 1,
    'price' => 	299.99,

);
$book = new Book($bookparam);

//$testDB->insert('book', $book);

$date = "1965-07-31";
$date = date("Y-m-d",strtotime($date));

$authorParam = array(
    'fio' => 'J.K. Rowling',
    'country_id' => 1,
    'birthday' => $date,
    'photo' => 'J.K. Rowling.jpg'
);
 $author = new Author($authorParam);

 //$testDB->insert('author',$author);
