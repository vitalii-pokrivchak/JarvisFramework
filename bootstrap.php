<?php

ini_set("display_errors", "on");
ini_set("display_startup_errors", "on");

error_reporting(E_ALL);

require_once  __DIR__ . "/app/config/config.php";
require_once __DIR__ . "/vendor/autoload.php";

use app\core\Application;
use app\core\Request;
use app\core\Router;
use app\db\DbConnection;


$request = new Request;
$router = new Router($request);
$app = new Application($router);
$db = new DbConnection(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);