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
use app\models\Book;

$request = new Request;
$router = new Router($request);
$app = new Application($router);
$db = new DbConnection(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);


$testDB = new BaseSQLOperations();

$bookparam = array(
    'id' => 6,
    'title' => 'PHP 7.4',
    'author_id' => 2,
    'poster' => 'Poster.jpg',
    'pages' => 726,
    'preview_text' => 'this is a preview text',
    'publishing_house_id' => 1,
    'published_at' => '2020-11-12 19:56:04',
    'language_id' => 1,
    'book_category_id' => 2,
    'illustration' => 1,
    'book_type_id' => 3,
    'price' => 	534.99,

);

$book = new Book($bookparam);

$testDB->insert("author",$book);

